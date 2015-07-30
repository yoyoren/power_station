<?php
	//定义字节和位数的转化
	define('BYTE_1',8);
	
	//无符号是15个bit
	define('BYTE_2_UNSIGN',15);
	define('BYTE_2',16);
	
	define('BYTE_4',32);
	define('BYTE_8',64);
	
	//文件的版本信息是固定的4字节
	define('FILE_VERSION_SIZE',BYTE_4);
	
	//ECU数据中一个数据体是56个字节
	define('FILE_CONTENT_SIZE',72 * BYTE_1);
	
	class ECUHandler {
		public static function read($path=ECU_ROOT_PATH.'beijing/ecu1234567-20150728-221152.engy'){
			$file = fopen($path,'rb');
			$content=fread($file,filesize($path));
			
			
			
			//转成4字节的 16位转成整数
			$byte_array = unpack("V*",$content);
			
			//转成标准的2进制
			$byte_array_2 = unpack("N*",$content);

			$decode_content = '';
			
			$decode_content_2 = '';
			
			//按字节转成2进制序列，并补0
			for($i=1;$i<=count($byte_array);$i++){
				$_data = $byte_array[$i];
				$_data = decbin($_data);
				
				$_str_data = strval($_data);
				$l = strlen($_str_data);
				$plus_zero = '';
				if($l < BYTE_4){
				for($k = 0;$k<(BYTE_4 - $l); $k++){
						$plus_zero .= '0'; 
					}
					$_str_data = $plus_zero.$_str_data;
				}
				$decode_content .= $_str_data;
			}
			
			//按字节转成2进制序列，并补0
			for($i=1;$i<=count($byte_array_2);$i++){
				$_data = $byte_array_2[$i];
				$_data = decbin($_data);
				
				$_str_data = strval($_data);
				$l = strlen($_str_data);
				$plus_zero = '';
				if($l < BYTE_4){
				for($k = 0;$k<(BYTE_4 - $l); $k++){
						$plus_zero .= '0'; 
					}
					$_str_data = $plus_zero.$_str_data;
				}
				$decode_content_2 .= $_str_data;
			}
			
			$decode_content_arr = array();
			//$decode_content_temp = explode('',$decode_content);
			
			for($i=0;$i<strlen($decode_content_2);$i++){
				$_temp = '';
				$_temp.= $decode_content_2[$i*8];
				$_temp.= $decode_content_2[$i*8 + 1];
				$_temp.= $decode_content_2[$i*8 + 2];
				$_temp.= $decode_content_2[$i*8 + 3];
				$_temp.= $decode_content_2[$i*8 + 4];
				$_temp.= $decode_content_2[$i*8 + 5];
				$_temp.= $decode_content_2[$i*8 + 6];
				$_temp.= $decode_content_2[$i*8 + 7];
				array_push($decode_content_arr,$_temp);
			}
			//var_dump($decode_content_arr);

			$file_version = bindec(substr($decode_content,0,FILE_VERSION_SIZE));
			$file_content = array(); 
			
			//一个ECU中可能是多个文件数据 56字节是一个数据
			$file_count = (strlen($decode_content) - FILE_VERSION_SIZE)/FILE_CONTENT_SIZE;
			
			//文件指针的起始位置
			$head_poiner = FILE_VERSION_SIZE;
			$head_index = 4;
		
			for($i = 0;$i < $file_count; $i++){
				$one_file_content = substr($decode_content,$head_poiner,FILE_CONTENT_SIZE);
				$current_file = array_slice($decode_content_arr,$head_index,72);
				$head_index += 72;
			
				array_push($file_content,array(
					'date'=>date('Y-m-d H:i:s',bindec(substr($one_file_content,0,BYTE_4))),
					'timestamps'=>bindec(substr($one_file_content,0,BYTE_4)),
					
					//非4字节整数 必须使用 current_file 中的字段解析
					'target_temperature_old'=>bindec($current_file[4]),
					'target_temperature'=>bindec($current_file[4]),
					
					//节能状态
					'egy_save_status'=>bindec($current_file[5]),
					
					'fault_code'=>$current_file[6],

					'relay_status'=>$current_file[7],
					
					//新风机
					'fan_status'=>$current_file[7][7],
					//蓄电池空调
					'battery_air_status'=>$current_file[7][6],
					//蓄电池小风扇
					'battery_fan_status'=>$current_file[7][5],
					//空调1-4
					
					'air_condition_1_status'=>$current_file[7][4],
					'air_condition_2_status'=>$current_file[7][3],
					'air_condition_3_status'=>$current_file[7][2],
					'air_condition_4_status'=>$current_file[7][1],
					//电能数据4组：每组4字节
					'elec_engy'=>array(
						bindec(substr($one_file_content,64,BYTE_4))/100,
						bindec(substr($one_file_content,96,BYTE_4))/100,
						bindec(substr($one_file_content,128,BYTE_4))/100,
						bindec(substr($one_file_content,160,BYTE_4))/100,
					),
					//功率数据4组：每组4字节
					'elec_power'=>array(
						bindec(substr($one_file_content,192,BYTE_4)),
						bindec(substr($one_file_content,224,BYTE_4)),
						bindec(substr($one_file_content,256,BYTE_4)),
						bindec(substr($one_file_content,288,BYTE_4)),
					),
					//电流数据4组：每组2字节
					'current'=>array(
						bindec($current_file['41'].$current_file['40']),
						bindec($current_file['43'].$current_file['42']),
						bindec($current_file['45'].$current_file['44']),
						bindec($current_file['47'].$current_file['46']),
						//bindec(substr($one_file_content,224,BYTE_2)),
						//bindec(substr($one_file_content,240,BYTE_2)),
					),
					//温度10组：每组温度2字节
					'temperature'=>array(
						//室内
						bindec($current_file['49'].$current_file['48'])/100,
						//室外
						bindec($current_file['51'].$current_file['50'])/100,
						//空调1
						bindec($current_file['53'].$current_file['52'])/100,
						//空调2
						bindec($current_file['55'].$current_file['54'])/100,
						//空调3
						bindec($current_file['57'].$current_file['56'])/100,
						//空调4
						bindec($current_file['59'].$current_file['58'])/100,
						//蓄电池1
						bindec($current_file['61'].$current_file['60'])/100,
						//蓄电池2
						bindec($current_file['63'].$current_file['62'])/100,
						
						//预留
						bindec($current_file['65'].$current_file['48'])/100,
						bindec($current_file['67'].$current_file['50'])/100,
					),
					/*
					'temperature'=>array(
						bindec(substr($one_file_content,257,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,273,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,289,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,305,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,321,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,337,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,353,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,369,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,385,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,401,BYTE_2_UNSIGN))/100,
					),
					*/
					
					'humidity'=>array(
						bindec($current_file['68']),
						bindec($current_file['69']),
					),
					
					'reserved'=>array(
						bindec($current_file['70']),
						bindec($current_file['71']),
					)
					
				));
				//指针前移一个完整数据字段的大小
				$head_poiner += FILE_CONTENT_SIZE;
				
			}
			
			return array(
				file_version => $file_version, 
				file_content => $file_content, 
			);
		}
		
		
		//扫描目录
		public static function scan(){
			$res = array();
			$stations = scandir(ECU_ROOT_PATH);
			$counts = count($stations);
			for($i=0;$i<$counts;$i++){
				$dir = $stations[$i];
				if(is_dir(ECU_ROOT_PATH.'/'.$dir) && !is_dir($dir)){
					$station_data = scandir(ECU_ROOT_PATH.'/'.$dir);
					for($k=0;$k<count($station_data);$k++){
						if(!is_dir(ECU_ROOT_PATH.$dir.'/'.$station_data[$k])){
							array_push($res,ECU_ROOT_PATH.$dir.'/'.$station_data[$k]);
						}
					}
				}
			}
			return $res;
		}
		
		//将扫描后的文件放到库里
		public static function write($path=ECU_ROOT_PATH.'ecu1234567-20150717-221043.engy'){
			$data = ECUHandler::read($path);
		
			$data = $data['file_content'];
			$dao =  new PowerBaseStationRuningDataMySqlDAO();
			$current_time = time();
			$all = count($data);
			for($i=0;$i<$all;$i++){
				$cur_data = $data[$i];
				
				$dao_obj = new PowerBaseStationRuningData();
				
				//节能状态
				$dao_obj->workingStatus = $cur_data['egy_save_status'];
									
				//空调状态
				$dao_obj->deviceStatus1 = $cur_data['air_condition_1_status'];
				$dao_obj->deviceStatus2 = $cur_data['air_condition_2_status'];
				$dao_obj->deviceStatus3 = $cur_data['air_condition_3_status'];
				$dao_obj->deviceStatus4 = $cur_data['air_condition_4_status'];
				$dao_obj->deviceStatus5 = -1;
				$dao_obj->deviceStatus6 = -1;
				$dao_obj->deviceStatus7 = -1;
				$dao_obj->deviceStatus8 = -1;
				$dao_obj->deviceStatusFan = $cur_data['fan_status'];
				$dao_obj->deviceStatusCabinet = $cur_data['battery_air_status'];
				$dao_obj->deviceStatusVentilator = $cur_data['battery_fan_status'];
				$dao_obj->stationId = 1;
				$dao_obj->wetInside = $cur_data['humidity'][0];
				$dao_obj->wetOutside = $cur_data['humidity'][1];
				$dao_obj->ammeterNormal = -1;
				$dao_obj->ammeterSmart = -1;
				$dao_obj->overloadAc = -1;
				$dao_obj->overloadDc = -1;
				
				//室内温度
				$dao_obj->temperatureInside = $cur_data['temperature'][0];
				//室外温度
				$dao_obj->temperatureOutside = $cur_data['temperature'][1];
				
				//空调1
				$dao_obj->temperatureAircondition1 = $cur_data['temperature'][2];
				//空调2
				$dao_obj->temperatureAircondition2 = $cur_data['temperature'][3];
				//空调3
				$dao_obj->temperatureAircondition3 = $cur_data['temperature'][4];
				//空调4
				$dao_obj->temperatureAircondition4 = $cur_data['temperature'][5];
				
				//蓄电池1
				$dao_obj->temperatureAircondition5 = $cur_data['temperature'][6];
				
				//蓄电池2
				$dao_obj->temperatureAircondition6 = $cur_data['temperature'][7];
				
				//预留
				$dao_obj->temperatureAircondition7 = $cur_data['temperature'][8];
				$dao_obj->temperatureAircondition8 = $cur_data['temperature'][9];
				
				//恒温柜
				$dao_obj->temperatureCabinet = $cur_data['temperature'][6];
				
				$dao_obj->createTime = $cur_data['timestamps'];
				
				//新增
				$dao_obj->energyAll = $cur_data['elec_engy'][0];
				$dao_obj->energyDc = $cur_data['elec_engy'][1];
				
				$dao_obj->powerAll = $cur_data['elec_power'][0];
				$dao_obj->powerDc = $cur_data['elec_power'][1];
				
				
				//var_dump($dao_obj);
				$dao->insert($dao_obj);
				
			}
				
		}
	}
?>