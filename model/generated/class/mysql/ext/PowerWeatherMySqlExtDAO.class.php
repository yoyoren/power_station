<?php
/**
 * Class that operate on table 'power_weather'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerWeatherMySqlExtDAO extends PowerWeatherMySqlDAO{
	 public function grouppbystationDistirct(){
		$sql = 'SELECT station_province as province,station_city as city,station_distirct as district FROM power_base_station GROUP BY station_distirct';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
    }
	
	public function get_weather_by_month($startMonth,$province='11',$city='01'){
		$sql = 'SELECT * FROM power_weather WHERE province = ? AND city = ? AND create_time > ? AND create_time < ? GROUP BY create_time';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($province);
		$sqlQuery->set($city);
		$sqlQuery->setNumber($startMonth);
		$endMonth = $startMonth + 31*24*3600;
		$sqlQuery->setNumber($endMonth);
		return $this->getList($sqlQuery);
	}
	
}
?>