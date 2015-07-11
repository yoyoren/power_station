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
	
}
?>