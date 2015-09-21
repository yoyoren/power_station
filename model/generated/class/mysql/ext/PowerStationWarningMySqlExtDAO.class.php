<?php
/**
 * Class that operate on table 'power_station_warning'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerStationWarningMySqlExtDAO extends PowerStationWarningMySqlDAO{
	public function queryByPage($page,$pagesize){
		$sql = 'SELECT * FROM power_station_warning ORDER BY warning_id DESC limit '.$page.','.$pagesize.' ';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function get_count(){
		$sql = 'SELECT COUNT(*) FROM power_station_warning';
		$sqlQuery = new SqlQuery($sql);
		$num = $this->execute($sqlQuery);
		return $num[0][0];
	}
	
	public function get_count_by_station_id($station_id){
		$sql = 'SELECT COUNT(*) FROM power_station_warning WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($station_id);
		$num = $this->execute($sqlQuery);
		return $num[0][0];
	}
	
	public function get_count_by_type($type){
		$sql = 'SELECT COUNT(*) FROM power_station_warning WHERE warning_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($type);
		$num = $this->execute($sqlQuery);
		return $num[0][0];
	}
	
	public function search($start,$pagesize,$sql){
		$sql = 'SELECT * FROM power_station_warning WHERE '.$sql.' limit '.$start.','.$pagesize;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function update_one($warning_obj){
	    $type = $warning_obj->warningType;
		$stationId = $warning_obj->stationId;
		
		$sql = 'SELECT * FROM power_station_warning WHERE warning_type = ? AND station_id = ? ORDER BY warning_id DESC limit 0,1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($type);
		$sqlQuery->setNumber($stationId);
		$data = $this->getList($sqlQuery);
		
		if($data){
		   $data = $data[0];
		   $current_date = time();
			//小于五分钟的告警 不会创建新的告警
		   if($current_date - $data->updateTime < 300){
			$sql_update = 'UPDATE power_station_warning SET update_time = ? WHERE warning_id = ?';
			$sqlQuery = new SqlQuery($sql_update);
			$sqlQuery->setNumber($current_date);
			$sqlQuery->setNumber($data->warningId);
			$data = $this->executeUpdate($sqlQuery);
			return true;
		   }else{
			return false;
		   }
		}else{
			return false;
		}
	}
	
	public function check_rencent($type,$stationId){
		$sql = 'SELECT * FROM power_station_warning WHERE warning_type = ? AND station_id = ? limit 0,1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($type);
		$sqlQuery->setNumber($stationId);
		return $this->getList($sqlQuery);
	}
}
?>