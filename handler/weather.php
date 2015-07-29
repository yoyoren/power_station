<?php
class WeatherHandler {
    //显示所有天气
    public static function show(){
         $dao =  new PowerWeatherMySqlDAO();        
         $list=$dao->queryAllOrderBy('create_time desc');       	 
         if($list){
             foreach($list as $k=>$v){
                $v->createTime=date('Y-m-d h:i',$v->createTime);
             }
             return $list;
         }else{
             return FALSE;
         }
    }
	public function get_weather_baidu($name='上海'){   
		$ch = curl_init();
		$url = 'http://apis.baidu.com/apistore/weatherservice/weather?cityname='.$name;
		$header = array(
			'apikey: dff6ebd14c9afe22f7a22ad0c84fbeb5',
		);
		// 添加apikey到header
		curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 执行HTTP请求
		curl_setopt($ch , CURLOPT_URL , $url);
		$res = curl_exec($ch);
		$res = json_decode($res);
		return $res;
	}
	
	//baidu API获得天气数据
	public function add_weather_baidu($province_code,$city_code){
		$city_info = AddressHandler::get_city_info($province_code,$city_code);
		if(!$city_info){
		   return false;
		}
		
		$city_name = $city_info->name;
		if(!$city_name){
		   return false;
		}
		$weatherinfo = WeatherHandler::get_weather_baidu($city_name);
		if($weatherinfo->errNum!=0){
		   return false;
		}
		$weatherinfo = $weatherinfo->retData;
		$current_date = strtotime(date('Ymd'));
		$weather = new PowerWeather();
		$weather->province = $province_code;
        $weather->city = $city_code;
        $weather->district = -1;
        $weather->weather = $weatherinfo->weather;
        $weather->temperatureHigh = $weatherinfo->h_tmp;
        $weather->temperatureLow = $weatherinfo->l_tmp;
        $weather->wind = $weatherinfo->WS;	
		$weather->createTime = $current_date;
        $dao =  new PowerWeatherMySqlDAO(); 
		$dao->insert($weather);
		return $weatherinfo;
    }
	
	public function get_weather_by_month($startMonth = -1,$province,$city){
		$dao =  new PowerWeatherMySqlExtDAO();
		if($startMonth == -1){
		   $startMonth = strtotime(date('Ym'));
		}
		$data = $dao -> get_weather_by_month($startMonth,$province,$city);
		return $data;
	}
	
      //获取地区天气信息
     public function get_weather($district='上海'){        
		
       $date=  date("Ymdhis");
       $str="area".$district."showapi_appid2630showapi_timestamp".$date."ab14ae8e4d3d467b9adf0443d2d8a486";
       $sign=  md5($str);
       $url="http://route.showapi.com/9-2?area=".$district."&areaid=&needIndex=&needMoreDay=&showapi_appid=2630&showapi_timestamp=".$date."&showapi_sign=".$sign;
       $data =  json_decode(file_get_contents($url),true);
  
	   if($data['showapi_res_code']){
           $weather=FALSE;
       }else{
           //$data['showapi_res_body']['cityInfo']['c5']
            $weather['weather']=$data['showapi_res_body']['f1']['day_weather'];
            $weather['temperature_high']=$data['showapi_res_body']['f1']['day_air_temperature'];
            $weather['temperature_low']=$data['showapi_res_body']['f1']['night_air_temperature'];
            $weather['wind']=  str_replace('级', '', $data['showapi_res_body']['now']['wind_power']);
       }      
       return $weather;
        
     }
    //添加一条天气
    public  function add($area,$weatherinfo){     	
		$weather = new PowerWeather();
		$weather->province=$area['province'];
        $weather->city=$area['city'];
        $weather->district=$area['district'];
        $weather->weather=$weatherinfo['weather'];
        $weather->temperatureHigh=$weatherinfo['temperature_high'];
        $weather->temperatureLow=$weatherinfo['temperature_low'];
        $weather->wind=$weatherinfo['wind'];	
		$weather->createTime = time();
        $dao =  new PowerWeatherMySqlDAO(); 
		$dao->insert($weather);
    }
        //获取所有基站所在地区的名称添加天气
     public static function add_weather(){
         $distrct=DAOFactory::getPowerWeatherDAO()->grouppbystationDistirct();
         if(!$distrct){
             $distrct=array(array('province'=>'上海','city'=>'上海','district'=>'上海'));            
         }
		 
		 $distrct=array(array('province'=>'上海','city'=>'上海','district'=>'上海'));
         foreach($distrct as $v){
		 
            $weather=self::get_weather($v['district']);
            if($weather){
                self::add($v, $weather);
                return $weather;
            }else{
                return false;  
            }
           
         }
         
     }
}