<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
interface PowerBaseStationRuningDataDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerBaseStationRuningData 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStationRuningData primary key
 	 */
	public function delete($runing_data_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationRuningData powerBaseStationRuningData
 	 */
	public function insert($powerBaseStationRuningData);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationRuningData powerBaseStationRuningData
 	 */
	public function update($powerBaseStationRuningData);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByWorkingStatus($value);

	public function queryByDeviceStatus1($value);

	public function queryByDeviceStatus2($value);

	public function queryByDeviceStatus3($value);

	public function queryByDeviceStatus4($value);

	public function queryByDeviceStatus5($value);

	public function queryByDeviceStatus6($value);

	public function queryByDeviceStatus7($value);

	public function queryByDeviceStatus8($value);

	public function queryByDeviceStatusFan($value);

	public function queryByDeviceStatusCabinet($value);

	public function queryByDeviceStatusVentilator($value);

	public function queryByStationId($value);

	public function queryByWetInside($value);

	public function queryByWetOutside($value);

	public function queryByAmmeterNormal($value);

	public function queryByAmmeterSmart($value);

	public function queryByOverloadAc($value);

	public function queryByOverloadDc($value);

	public function queryByTemperatureInside($value);

	public function queryByTemperatureOutside($value);

	public function queryByTemperatureCabinet($value);

	public function queryByTemperatureAircondition1($value);

	public function queryByTemperatureAircondition2($value);

	public function queryByTemperatureAircondition3($value);

	public function queryByTemperatureAircondition4($value);

	public function queryByTemperatureAircondition5($value);

	public function queryByTemperatureAircondition6($value);

	public function queryByTemperatureAircondition7($value);

	public function queryByTemperatureAircondition8($value);

	public function queryByCreateTime($value);


	public function deleteByWorkingStatus($value);

	public function deleteByDeviceStatus1($value);

	public function deleteByDeviceStatus2($value);

	public function deleteByDeviceStatus3($value);

	public function deleteByDeviceStatus4($value);

	public function deleteByDeviceStatus5($value);

	public function deleteByDeviceStatus6($value);

	public function deleteByDeviceStatus7($value);

	public function deleteByDeviceStatus8($value);

	public function deleteByDeviceStatusFan($value);

	public function deleteByDeviceStatusCabinet($value);

	public function deleteByDeviceStatusVentilator($value);

	public function deleteByStationId($value);

	public function deleteByWetInside($value);

	public function deleteByWetOutside($value);

	public function deleteByAmmeterNormal($value);

	public function deleteByAmmeterSmart($value);

	public function deleteByOverloadAc($value);

	public function deleteByOverloadDc($value);

	public function deleteByTemperatureInside($value);

	public function deleteByTemperatureOutside($value);

	public function deleteByTemperatureCabinet($value);

	public function deleteByTemperatureAircondition1($value);

	public function deleteByTemperatureAircondition2($value);

	public function deleteByTemperatureAircondition3($value);

	public function deleteByTemperatureAircondition4($value);

	public function deleteByTemperatureAircondition5($value);

	public function deleteByTemperatureAircondition6($value);

	public function deleteByTemperatureAircondition7($value);

	public function deleteByTemperatureAircondition8($value);

	public function deleteByCreateTime($value);


}
?>