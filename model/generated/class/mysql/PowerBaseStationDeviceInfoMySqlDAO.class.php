<?php
/**
 * Class that operate on table 'power_base_station_device_info'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
class PowerBaseStationDeviceInfoMySqlDAO implements PowerBaseStationDeviceInfoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerBaseStationDeviceInfoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_base_station_device_info';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_base_station_device_info ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStationDeviceInfo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM power_base_station_device_info WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationDeviceInfoMySql powerBaseStationDeviceInfo
 	 */
	public function insert($powerBaseStationDeviceInfo){
		$sql = 'INSERT INTO power_base_station_device_info (station_id, air_condition_num, tempature_outside, tempature_inside, fan_out_type, fan_in_type, cabinet_num, battery_type, battery_air_type, air_condition_tempature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->stationId);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->airConditionNum);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->tempatureOutside);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->tempatureInside);
		$sqlQuery->set($powerBaseStationDeviceInfo->fanOutType);
		$sqlQuery->set($powerBaseStationDeviceInfo->fanInType);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->cabinetNum);
		$sqlQuery->set($powerBaseStationDeviceInfo->batteryType);
		$sqlQuery->set($powerBaseStationDeviceInfo->batteryAirType);
		
		$sqlQuery->set($powerBaseStationDeviceInfo->airConditionTempature);

		$id = $this->executeInsert($sqlQuery);	
		$powerBaseStationDeviceInfo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationDeviceInfoMySql powerBaseStationDeviceInfo
 	 */
	public function update($powerBaseStationDeviceInfo){
		$sql = 'UPDATE power_base_station_device_info SET station_id = ?, air_condition_num = ?, tempature_outside = ?, tempature_inside = ?, fan_out_type = ?, fan_in_type = ?, cabinet_num = ?, battery_type = ?, battery_air_type = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->stationId);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->airConditionNum);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->tempatureOutside);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->tempatureInside);
		$sqlQuery->set($powerBaseStationDeviceInfo->fanOutType);
		$sqlQuery->set($powerBaseStationDeviceInfo->fanInType);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->cabinetNum);
		$sqlQuery->set($powerBaseStationDeviceInfo->batteryType);
		$sqlQuery->set($powerBaseStationDeviceInfo->batteryAirType);
		

		$sqlQuery->setNumber($powerBaseStationDeviceInfo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_base_station_device_info';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAirConditionNum($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE air_condition_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempatureOutside($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE tempature_outside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempatureInside($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE tempature_inside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFanOutType($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE fan_out_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFanInType($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE fan_in_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCabinetNum($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE cabinet_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBatteryType($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE battery_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBatteryAirType($value){
		$sql = 'SELECT * FROM power_base_station_device_info WHERE battery_air_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAirConditionNum($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE air_condition_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempatureOutside($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE tempature_outside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempatureInside($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE tempature_inside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFanOutType($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE fan_out_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFanInType($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE fan_in_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCabinetNum($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE cabinet_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBatteryType($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE battery_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBatteryAirType($value){
		$sql = 'DELETE FROM power_base_station_device_info WHERE battery_air_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerBaseStationDeviceInfoMySql 
	 */
	protected function readRow($row){
		$powerBaseStationDeviceInfo = new PowerBaseStationDeviceInfo();
		
		$powerBaseStationDeviceInfo->id = $row['id'];
		$powerBaseStationDeviceInfo->stationId = $row['station_id'];
		$powerBaseStationDeviceInfo->airConditionNum = $row['air_condition_num'];
		$powerBaseStationDeviceInfo->tempatureOutside = $row['tempature_outside'];
		$powerBaseStationDeviceInfo->tempatureInside = $row['tempature_inside'];
		$powerBaseStationDeviceInfo->fanOutType = $row['fan_out_type'];
		$powerBaseStationDeviceInfo->fanInType = $row['fan_in_type'];
		$powerBaseStationDeviceInfo->cabinetNum = $row['cabinet_num'];
		$powerBaseStationDeviceInfo->batteryType = $row['battery_type'];
		$powerBaseStationDeviceInfo->batteryAirType = $row['battery_air_type'];
		$powerBaseStationDeviceInfo->airConditionTempature = $row['air_condition_tempature'];
		return $powerBaseStationDeviceInfo;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PowerBaseStationDeviceInfoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>