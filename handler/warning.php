<?php
class WarningHandler {

    //无条件的获得告警数据并分页
    public static function get_list($status=-1,$page,$pagesize){
         $dao =  new PowerStationWarningMySqlExtDAO();        
         $dao_station = new PowerBaseStationMySqlDAO();
		 $list = $dao->queryByPage($page*$pagesize,$pagesize);
		 $all_count = $dao->get_count();
		 for($i=0;$i<count($list);$i++){
			$sid = $list[$i]->stationId;
			$station_obj = $dao_station->load($sid);
			$list[$i]->stationName = $station_obj->stationName;
		 }
         return array('data'=>$list,'count'=>$all_count);
    }
	public static function get_total_count(){
		$dao =  new PowerStationWarningMySqlExtDAO();      
		$all_count = $dao->get_count();
		return $all_count;
	}
	
	//按类型获得告警的数量
	public static function get_count_by_type(){
		 global $WARNING_TYPE;
		 $dao =  new PowerStationWarningMySqlExtDAO();        
         $dao_station = new PowerBaseStationMySqlDAO();
		 $ret = array();
		 foreach($WARNING_TYPE as $key=>$value){
			$num = $dao->get_count_by_type($key);
			array_push($ret,$num);
		 }
		 return $ret;
    }
	
	//按类型获得告警的数量
	public static function get_count_by_station_id($station_id){
		 global $WARNING_TYPE;
		 $dao =  new PowerStationWarningMySqlExtDAO();        
         $num = $dao->get_count_by_station_id($station_id);
		 return $num;
    }
	
	//按条件检索告警
	public static function query($start,$pagesize,$query_option,$begin_month=-1){
		$dao =  new PowerStationWarningMySqlExtDAO();        
        $dao_station = new PowerBaseStationMySqlDAO();
		$sql = '';
		$sql_arr = array();
		foreach($query_option as $key=>$value){
			if($value){
				array_push($sql_arr,$key.'="'.$value.'"');
			}
		}
		if(count($sql_arr)){
			$sql = implode(' AND ',$sql_arr);
			$list = $dao->search($start,$pagesize,$sql,$begin_month=-1);
			$all_count = $dao->get_count();
			for($i=0;$i<count($list);$i++){
				$sid = $list[$i]->stationId;
				$station_obj = $dao_station->load($sid);
				$list[$i]->stationName = $station_obj->stationName;
			 }
			 return array('data'=>$list,'count'=>$all_count);
		}
	}
}