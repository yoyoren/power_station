<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
interface PowerBaseStationEnergyInfoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerBaseStationEnergyInfo 
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
 	 * @param powerBaseStationEnergyInfo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationEnergyInfo powerBaseStationEnergyInfo
 	 */
	public function insert($powerBaseStationEnergyInfo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationEnergyInfo powerBaseStationEnergyInfo
 	 */
	public function update($powerBaseStationEnergyInfo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPrice($value);

	public function queryByAmmeterNum($value);

	public function queryByAmmeterNumChinamobile($value);

	public function queryByFeeType($value);

	public function queryByPowerSupplyType($value);

	public function queryByOverload($value);

	public function queryByOverloadNormal($value);

	public function queryBySimNum($value);

	public function queryByEsgNum($value);

	public function queryByEcuNum($value);

	public function queryByPowerBaseStationEnergyInfocol($value);

	public function queryByStationId($value);


	public function deleteByPrice($value);

	public function deleteByAmmeterNum($value);

	public function deleteByAmmeterNumChinamobile($value);

	public function deleteByFeeType($value);

	public function deleteByPowerSupplyType($value);

	public function deleteByOverload($value);

	public function deleteByOverloadNormal($value);

	public function deleteBySimNum($value);

	public function deleteByEsgNum($value);

	public function deleteByEcuNum($value);

	public function deleteByPowerBaseStationEnergyInfocol($value);

	public function deleteByStationId($value);


}
?>