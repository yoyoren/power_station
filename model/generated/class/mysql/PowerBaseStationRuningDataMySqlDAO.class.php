<?php
/**
 * Class that operate on table 'power_base_station_runing_data'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
class PowerBaseStationRuningDataMySqlDAO implements PowerBaseStationRuningDataDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerBaseStationRuningDataMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE runing_data_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_base_station_runing_data';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_base_station_runing_data ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStationRuningData primary key
 	 */
	public function delete($runing_data_id){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE runing_data_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($runing_data_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationRuningDataMySql powerBaseStationRuningData
 	 */
	public function insert($powerBaseStationRuningData){
		$sql = 'INSERT INTO power_base_station_runing_data (working_status, device_status_1, device_status_2, device_status_3, device_status_4, device_status_5, device_status_6, device_status_7, device_status_8, device_status_fan, device_status_cabinet, device_status_ventilator, station_id, wet_inside, wet_outside, ammeter_normal, ammeter_smart, overload_ac, overload_dc, temperature_inside, temperature_outside, temperature_cabinet, temperature_aircondition_1, temperature_aircondition_2, temperature_aircondition_3, temperature_aircondition_4, temperature_aircondition_5, temperature_aircondition_6, temperature_aircondition_7, temperature_aircondition_8, create_time,energy_all,energy_dc,power_all,power_dc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationRuningData->workingStatus);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus1);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus2);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus3);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus4);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus5);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus6);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus7);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus8);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatusFan);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatusCabinet);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatusVentilator);
		$sqlQuery->setNumber($powerBaseStationRuningData->stationId);
		$sqlQuery->setNumber($powerBaseStationRuningData->wetInside);
		$sqlQuery->setNumber($powerBaseStationRuningData->wetOutside);
		$sqlQuery->setNumber($powerBaseStationRuningData->ammeterNormal);
		$sqlQuery->setNumber($powerBaseStationRuningData->ammeterSmart);
		$sqlQuery->setNumber($powerBaseStationRuningData->overloadAc);
		$sqlQuery->setNumber($powerBaseStationRuningData->overloadDc);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureInside);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureOutside);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureCabinet);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition1);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition2);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition3);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition4);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition5);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition6);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition7);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition8);
		$sqlQuery->setNumber($powerBaseStationRuningData->createTime);
		
		//新增字段
		$sqlQuery->setNumber($powerBaseStationRuningData->energyAll);
		$sqlQuery->setNumber($powerBaseStationRuningData->energyDc);
		$sqlQuery->setNumber($powerBaseStationRuningData->powerAll);
		$sqlQuery->setNumber($powerBaseStationRuningData->powerDc);

		$id = $this->executeInsert($sqlQuery);	
		$powerBaseStationRuningData->runingDataId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationRuningDataMySql powerBaseStationRuningData
 	 */
	public function update($powerBaseStationRuningData){
		$sql = 'UPDATE power_base_station_runing_data SET working_status = ?, device_status_1 = ?, device_status_2 = ?, device_status_3 = ?, device_status_4 = ?, device_status_5 = ?, device_status_6 = ?, device_status_7 = ?, device_status_8 = ?, device_status_fan = ?, device_status_cabinet = ?, device_status_ventilator = ?, station_id = ?, wet_inside = ?, wet_outside = ?, ammeter_normal = ?, ammeter_smart = ?, overload_ac = ?, overload_dc = ?, temperature_inside = ?, temperature_outside = ?, temperature_cabinet = ?, temperature_aircondition_1 = ?, temperature_aircondition_2 = ?, temperature_aircondition_3 = ?, temperature_aircondition_4 = ?, temperature_aircondition_5 = ?, temperature_aircondition_6 = ?, temperature_aircondition_7 = ?, temperature_aircondition_8 = ?, create_time = ? WHERE runing_data_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationRuningData->workingStatus);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus1);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus2);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus3);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus4);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus5);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus6);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus7);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatus8);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatusFan);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatusCabinet);
		$sqlQuery->setNumber($powerBaseStationRuningData->deviceStatusVentilator);
		$sqlQuery->setNumber($powerBaseStationRuningData->stationId);
		$sqlQuery->setNumber($powerBaseStationRuningData->wetInside);
		$sqlQuery->setNumber($powerBaseStationRuningData->wetOutside);
		$sqlQuery->setNumber($powerBaseStationRuningData->ammeterNormal);
		$sqlQuery->setNumber($powerBaseStationRuningData->ammeterSmart);
		$sqlQuery->setNumber($powerBaseStationRuningData->overloadAc);
		$sqlQuery->setNumber($powerBaseStationRuningData->overloadDc);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureInside);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureOutside);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureCabinet);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition1);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition2);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition3);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition4);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition5);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition6);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition7);
		$sqlQuery->setNumber($powerBaseStationRuningData->temperatureAircondition8);
		$sqlQuery->setNumber($powerBaseStationRuningData->createTime);
		
		

		$sqlQuery->setNumber($powerBaseStationRuningData->runingDataId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_base_station_runing_data';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByWorkingStatus($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE working_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus1($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus2($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus3($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus4($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus5($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus6($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus7($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus8($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatusFan($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_fan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatusCabinet($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_cabinet = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatusVentilator($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE device_status_ventilator = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWetInside($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE wet_inside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWetOutside($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE wet_outside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmmeterNormal($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE ammeter_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmmeterSmart($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE ammeter_smart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOverloadAc($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE overload_ac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOverloadDc($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE overload_dc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureInside($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_inside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureOutside($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_outside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureCabinet($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_cabinet = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition1($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition2($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition3($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition4($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition5($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition6($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition7($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureAircondition8($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE temperature_aircondition_8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_base_station_runing_data WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByWorkingStatus($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE working_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus1($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus2($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus3($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus4($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus5($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus6($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus7($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus8($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatusFan($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_fan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatusCabinet($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_cabinet = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatusVentilator($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE device_status_ventilator = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWetInside($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE wet_inside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWetOutside($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE wet_outside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmmeterNormal($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE ammeter_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmmeterSmart($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE ammeter_smart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOverloadAc($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE overload_ac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOverloadDc($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE overload_dc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureInside($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_inside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureOutside($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_outside = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureCabinet($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_cabinet = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition1($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition2($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition3($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition4($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition5($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition6($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition7($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureAircondition8($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE temperature_aircondition_8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_base_station_runing_data WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerBaseStationRuningDataMySql 
	 */
	protected function readRow($row){
		$powerBaseStationRuningData = new PowerBaseStationRuningData();
		
		$powerBaseStationRuningData->runingDataId = $row['runing_data_id'];
		$powerBaseStationRuningData->workingStatus = $row['working_status'];
		$powerBaseStationRuningData->deviceStatus1 = $row['device_status_1'];
		$powerBaseStationRuningData->deviceStatus2 = $row['device_status_2'];
		$powerBaseStationRuningData->deviceStatus3 = $row['device_status_3'];
		$powerBaseStationRuningData->deviceStatus4 = $row['device_status_4'];
		$powerBaseStationRuningData->deviceStatus5 = $row['device_status_5'];
		$powerBaseStationRuningData->deviceStatus6 = $row['device_status_6'];
		$powerBaseStationRuningData->deviceStatus7 = $row['device_status_7'];
		$powerBaseStationRuningData->deviceStatus8 = $row['device_status_8'];
		$powerBaseStationRuningData->deviceStatusFan = $row['device_status_fan'];
		$powerBaseStationRuningData->deviceStatusCabinet = $row['device_status_cabinet'];
		$powerBaseStationRuningData->deviceStatusVentilator = $row['device_status_ventilator'];
		$powerBaseStationRuningData->stationId = $row['station_id'];
		$powerBaseStationRuningData->wetInside = $row['wet_inside'];
		$powerBaseStationRuningData->wetOutside = $row['wet_outside'];
		$powerBaseStationRuningData->ammeterNormal = $row['ammeter_normal'];
		$powerBaseStationRuningData->ammeterSmart = $row['ammeter_smart'];
		$powerBaseStationRuningData->overloadAc = $row['overload_ac'];
		$powerBaseStationRuningData->overloadDc = $row['overload_dc'];
		$powerBaseStationRuningData->temperatureInside = $row['temperature_inside'];
		$powerBaseStationRuningData->temperatureOutside = $row['temperature_outside'];
		$powerBaseStationRuningData->temperatureCabinet = $row['temperature_cabinet'];
		$powerBaseStationRuningData->temperatureAircondition1 = $row['temperature_aircondition_1'];
		$powerBaseStationRuningData->temperatureAircondition2 = $row['temperature_aircondition_2'];
		$powerBaseStationRuningData->temperatureAircondition3 = $row['temperature_aircondition_3'];
		$powerBaseStationRuningData->temperatureAircondition4 = $row['temperature_aircondition_4'];
		$powerBaseStationRuningData->temperatureAircondition5 = $row['temperature_aircondition_5'];
		$powerBaseStationRuningData->temperatureAircondition6 = $row['temperature_aircondition_6'];
		$powerBaseStationRuningData->temperatureAircondition7 = $row['temperature_aircondition_7'];
		$powerBaseStationRuningData->temperatureAircondition8 = $row['temperature_aircondition_8'];
		$powerBaseStationRuningData->createTime = $row['create_time'];
		$powerBaseStationRuningData->energyAll = $row['energy_all'];
		$powerBaseStationRuningData->energyDc = $row['energy_dc'];
		$powerBaseStationRuningData->powerAll = $row['power_all'];
		$powerBaseStationRuningData->powerDc = $row['power_dc'];

		return $powerBaseStationRuningData;
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
	 * @return PowerBaseStationRuningDataMySql 
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