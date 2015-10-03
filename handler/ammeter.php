<?php
class AmmeterHandler {
    //获取我方电表列表
    public static function get_own_list($start=0,$end=15,$is_bak=0){ 
        $list = DAOFactory::getPowerAmmeterDAO()->queryAndPage($start,$end,$is_bak);
        if($list){
                $num=  count($list);
                foreach($list as $k=>$v){
                     $list[$k]->stationName= DAOFactory::getPowerBaseStationLogDAO()->queryStationName($list[$k]->stationId);                    
                     $list[$k]->operater= DAOFactory::getPowerBaseStationLogDAO()->queryAccountNameById($list[$k]->creatorId);
                     $list[$k]->createTime=date('Y-m-d h:i',$list[$k]->createTime);
		     $list[$k]->readTime=date('Y-m-d h:i',$list[$k]->readTime);
                     $list[$k]->e=$list[$k]->eValue;                                 
                }
            }         
        return $list;
    }
    //获取我局方电表列表
    public static function get_other_list($start=0,$end=15){        
        $list=  DAOFactory::getPowerAmmeterChinamobileDAO()->queryAndPage($start, $end);               
        if($list){
                 $num=  count($list);
                foreach($list as $k=>$v){                    
                     $list[$k]->stationName= DAOFactory::getPowerBaseStationLogDAO()->queryStationName($list[$k]->stationId);                    
                     $list[$k]->operater= DAOFactory::getPowerBaseStationLogDAO()->queryAccountNameById($list[$k]->creatorId);
                     $list[$k]->createTime=date('Y-m-d h:i',$list[$k]->createTime);
                     $list[$k]->readTime=date('Y-m-d h:i',$list[$k]->readTime);
                     $list[$k]->e=$list[$k]->eValue;
                     $list[$k]->ec=$list[$k]->ecValue;

                }
            }
        
        return $list;
    }
    //查询基站是否合理
    public static function is_exsit_station($stationName){
        $exsit =  DAOFactory::getPowerAmmeterDAO()->queryStation($stationName);
        return $exsit;
    }

    //我方验证 
    public static function own_show($stationName,$readTime,$ammeterNormal){   
       $stationId=self::is_exsit_station($stationName);
       if($stationId){   
          //查询基站的我方电表数
           $readTime      =  strtotime($readTime);
           $ammeterNormal =  DAOFactory::getPowerAmmeterChinamobileDAO()->queryNormal($stationId, $readTime);
           if(!$ammeterNormal) $ammeterNormal=0;
           $data['stationId']=$stationId;
           $data['ammeterNormal']=$ammeterNormal;          
           return  $data;
       }else{
           return FALSE;
       }
     
    }
    //我方抄表 
    public static function own_add($stationId,$readTime,$ammeterNormal,$readValue,$is_bak=0){         
            $dao=new PowerAmmeterMySqlDAO;
            $ammeter=new PowerAmmeter();
            $ammeter->stationId    =$stationId;
            $ammeter->readTime     =strtotime($readTime);
            $ammeter->ammeterNormal=$ammeterNormal;
            $ammeter->createTime   =time();
            $ammeter->creatorId    =$_COOKIE['user_id'];
            $ammeter->readValue    =$readValue;
            $ammeter->isBak        =$is_bak;
            //var_dump($ammeter);exit;
            //查询上一次的数据
            $last=DAOFactory::getPowerAmmeterDAO()->lastRow($stationId);         
            if($last){
                if(floatval($readValue)-floatval($last[4])==0){
                    $e=0;  
                }else{
                    $e=sprintf("%.2f", abs((floatval($ammeterNormal)-floatval($last[2]))/(floatval($readValue)-floatval($last[4]))));
                    if($e<1.02 && $e>0.98)  $e=1; 
                }
            }else{
                $e=1;
            }
            $ammeter->eValue    =$e;
            $flag=$dao->insert($ammeter);
            if($flag)  return TRUE;
            return FALSE;
      
     
    }
    //局方验证基站信息成功显示我方抄表数 
    public static function other_show($stationName,$readTime){         
       $stationId=self::is_exsit_station($stationName);
       if($stationId){   
          //查询基站的我方电表数
           $readTime      =  strtotime($readTime);
           $ammeterNormal =  DAOFactory::getPowerAmmeterChinamobileDAO()->queryNormal($stationId, $readTime);
           if(!$ammeterNormal) $ammeterNormal=0;
           $data['stationId']=$stationId;
           $ec=10733;
           $last=DAOFactory::getPowerAmmeterChinamobileDAO()->lastRow($stationId);                   
           if($last) $ec=floatval($last['ec_value']);
           $data['ammeterNormal']=  round(floatval($ammeterNormal)*1000/$ec,2);
           $data['ys_ammeterNormal']=$ammeterNormal;
           return  $data;
       }else{
           return FALSE;
       }
     
    }
    //局方抄表
    public static function other_add($stationId,$readTime,$ammeterNormal,$ammeterNormalChinamobile){         
            $dao=new PowerAmmeterChinamobileMySqlDAO;
            $ammeter=new PowerAmmeter();
            $ammeter->stationId    =$stationId;
            $ammeter->readTime     =strtotime($readTime);
            $ammeter->ammeterNormal=$ammeterNormal;
            $ammeter->createTime   =time();
            $ammeter->creatorId     =$_COOKIE['user_id'];
            $ammeter->ammeterNormalChinamobile=$ammeterNormalChinamobile;
                        //查询上一次的数据
            $last=DAOFactory::getPowerAmmeterChinamobileDAO()->lastRow($stationId);         
            if($last){
                if(floatval($ammeterNormal)-floatval($last['ammeter_normal'])==0){
                    $e=$ec=0;  
                }else{
                    $e=sprintf("%.2f", abs((floatval($ammeterNormalChinamobile)-floatval($last['ammeter_normal_chinamobile']))/(floatval($ammeterNormal)-floatval($last['ammeter_normal']))));
                    if($e<1.02 && $e>0.98)  $e=1;
                    if(floatval($ammeterNormalChinamobile)-floatval($last['ammeter_normal_chinamobile'])==0){
                       $ec=10733;
                    }else{
                       $ec=(floatval($ammeterNormal)-floatval($last['ammeter_normal']))*floatval($last['ec_value'])/(floatval($ammeterNormalChinamobile)-floatval($last['ammeter_normal_chinamobile'])); 
                    }
                    
                }
            }else{
                $e=1;
                $ec=10733;
            }
            $ammeter->eValue    =$e;
            $ammeter->ecValue   =$ec;    
            $flag=$dao->insert($ammeter);
            if($flag)  return TRUE;
            return FALSE;
      
     
    }
    //删除抄表
    public static function delAmmeter($flag,$ammeter_id){
        $dao=new PowerAmmeterMySqlDAO;
        if($flag==1) $dao=new PowerAmmeterChinamobileMySqlDAO;
        $flag=$dao->delete($ammeter_id); 
        if($flag)  return TRUE;
        return FALSE;
         
    }
    public static function query_history_ammter($flag,$stationName,$start,$end,$is_bak=0){
        $stationId=self::is_exsit_station($stationName);
        if($stationId){   
            $sql=" where station_id=".$stationId;
            if($flag==1){
                $list= DAOFactory::getPowerAmmeterChinamobileDAO()->search($start,$end,$sql);
            }else{              
                if($is_bak==1){
                  $sql.=" and is_bak=1";
                }else{
                  $sql.=" and is_bak=0"; 
                }
                $list= DAOFactory::getPowerAmmeterDAO()->search($start, $end, $sql);
            }
            
            if($list){              
                foreach($list as $k=>$v){                    
                     $list[$k]->stationName= DAOFactory::getPowerBaseStationLogDAO()->queryStationName($list[$k]->stationId);                    
                     $list[$k]->operater= DAOFactory::getPowerBaseStationLogDAO()->queryAccountNameById($list[$k]->creatorId);
                     $list[$k]->createTime=date('Y-m-d h:i',$list[$k]->createTime);
                     $list[$k]->readTime=date('Y-m-d h:i',$list[$k]->readTime);
                     $list[$k]->e=$list[$k]->eValue;
                     if($flag==1) $list[$k]->ec=$list[$k]->ecValue; 
                }
            }      
            return $list;
       }else{
           return FALSE;
       }
    }
    
}

