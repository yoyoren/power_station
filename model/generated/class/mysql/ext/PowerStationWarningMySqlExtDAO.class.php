<?php
/**
 * Class that operate on table 'power_station_warning'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerStationWarningMySqlExtDAO extends PowerStationWarningMySqlDAO{
	public function queryByPage($page,$pagesize){
		$sql = 'SELECT * FROM power_station_warning limit '.$page.','.$pagesize;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function get_count(){
		$sql = 'SELECT COUNT(*) FROM power_station_warning';
		$sqlQuery = new SqlQuery($sql);
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
}
?>