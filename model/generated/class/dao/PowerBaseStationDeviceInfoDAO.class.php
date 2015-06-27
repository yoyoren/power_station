<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
interface PowerBaseStationDeviceInfoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerBaseStationDeviceInfo 
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
 	 * @param powerBaseStationDeviceInfo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationDeviceInfo powerBaseStationDeviceInfo
 	 */
	public function insert($powerBaseStationDeviceInfo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationDeviceInfo powerBaseStationDeviceInfo
 	 */
	public function update($powerBaseStationDeviceInfo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStationId($value);

	public function queryByAirConditionNum($value);

	public function queryByTempatureOutside($value);

	public function queryByTempatureInside($value);

	public function queryByFanOutType($value);

	public function queryByFanInType($value);

	public function queryByCabinetNum($value);

	public function queryByBatteryType($value);

	public function queryByBatteryAirType($value);


	public function deleteByStationId($value);

	public function deleteByAirConditionNum($value);

	public function deleteByTempatureOutside($value);

	public function deleteByTempatureInside($value);

	public function deleteByFanOutType($value);

	public function deleteByFanInType($value);

	public function deleteByCabinetNum($value);

	public function deleteByBatteryType($value);

	public function deleteByBatteryAirType($value);


}
?>