<?php
/**
 * Class that operate on table 'power_base_station_runing_data'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerBaseStationRuningDataMySqlExtDAO extends PowerBaseStationRuningDataMySqlDAO{
	
	//获得一个基站最新的数据情况
	public function get_current_status($stationId){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ? ORDER BY runing_data_id DESC limit 0,1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($stationId);
		return $this->getRow($sqlQuery);
	}
	
	public function get_full_day_status($stationId){
		$count = 60 * 24;
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ? ORDER BY runing_data_id DESC limit 0,'.$count ;
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($stationId);
		return $this->getList($sqlQuery);
	}
	
	public function get_one_day_status($stationId,$start_time,$end_time){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ? AND create_time > ? AND create_time < ? ORDER BY runing_data_id DESC';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($stationId);
		$sqlQuery->setNumber($start_time);
		$sqlQuery->setNumber($end_time);
		return $this->getList($sqlQuery);
	}
	
	// date("y-m-d",$time)
	
	//按天为单位获得原始数据
	public function get_origin_data_by_time($stationId,$time){
		if($time == -1){
			$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ? ORDER BY runing_data_id DESC limit 0,1';
		}else if($time == -2){
			$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ? ORDER BY runing_data_id DESC limit 0,100';
		} else {
			$time_end = $time + 24 * 60 *60;
			$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ? AND create_time > '.$time.' AND create_time < '.$time_end.' ORDER BY runing_data_id DESC';
		}
		
		
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($stationId);
		if($time == -1){
			return $this->getRow($sqlQuery);
		}else{
			return $this->getList($sqlQuery);
		}
	}
	
	
	
}
?>