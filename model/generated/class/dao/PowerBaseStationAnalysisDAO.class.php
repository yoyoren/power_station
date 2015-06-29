<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 07:33
 */
interface PowerBaseStationAnalysisDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerBaseStationAnalysis 
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
 	 * @param powerBaseStationAnalysi primary key
 	 */
	public function delete($analysis_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationAnalysis powerBaseStationAnalysi
 	 */
	public function insert($powerBaseStationAnalysi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationAnalysis powerBaseStationAnalysi
 	 */
	public function update($powerBaseStationAnalysi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStationId($value);

	public function queryByDeviceStatus($value);

	public function queryByAverageEnergyHour($value);

	public function queryByAverageEnergyDay($value);

	public function queryByAverageEnergyWeek($value);


	public function deleteByStationId($value);

	public function deleteByDeviceStatus($value);

	public function deleteByAverageEnergyHour($value);

	public function deleteByAverageEnergyDay($value);

	public function deleteByAverageEnergyWeek($value);


}
?>