<?php
class AmmeterHandler {
    //获取我方电表列表
    public static function get_own_list($start=0,$end=15){ 
        $list = DAOFactory::getPowerAmmeterDAO()->queryAndPage($start,$end);
        if($list){
                $num=  count($list);
                foreach($list as $k=>$v){
                     $list[$k]->stationName= DAOFactory::getPowerBaseStationLogDAO()->queryStationName($list[$k]->stationId);                    
                     $list[$k]->operater= DAOFactory::getPowerBaseStationLogDAO()->queryAccountNameById($list[$k]->creatorId);
                     $list[$k]->createTime=date('Y-m-d h:i',$list[$k]->createTime);
                     $e=1;                   
                     if($k<$num-1 && $num>1) $e=sprintf("%.2f", abs((intval($v->ammeterNormal)-intval($list[$k+1]->ammeterNormal))/(intval($v->readValue)-intval($list[$k+1]->readValue))));                     
                     $list[$k]->e=$e;
                     if($e<1.02 && $e>0.98)  $list[$k]->e=1;
                     $list[$k]->readTime=date('Y-m-d h:i',$list[$k]->readTime);
                     
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
                     $e=1;
                     if($k<$num-1 && $num>1) $e=sprintf("%.2f", abs((intval($v->ammeterNormalChinamobile)-intval($list[$k+1]->ammeterNormalChinamobile))/(intval($v->ammeterNormal)-intval($list[$k+1]->ammeterNormal))));                     
                     $list[$k]->e=$e;
                     if($e<1.02 && $e>0.98)  $list[$k]->e=1;
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
    public static function own_add($stationId,$readTime,$ammeterNormal,$readValue){         
            $dao=new PowerAmmeterMySqlDAO;
            $ammeter=new PowerAmmeter();
            $ammeter->stationId    =$stationId;
            $ammeter->readTime     =strtotime($readTime);
            $ammeter->ammeterNormal=$ammeterNormal;
            $ammeter->createTime   =time();
            $ammeter->creatorId    =$_COOKIE['user_id'];
            $ammeter->readValue    =$readValue;
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
           $data['ammeterNormal']=$ammeterNormal;         
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

    
}

