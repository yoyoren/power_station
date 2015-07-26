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
	
}
?>