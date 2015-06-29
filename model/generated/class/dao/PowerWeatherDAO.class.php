<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 07:33
 */
interface PowerWeatherDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerWeather 
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
 	 * @param powerWeather primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerWeather powerWeather
 	 */
	public function insert($powerWeather);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerWeather powerWeather
 	 */
	public function update($powerWeather);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProvince($value);

	public function queryByCity($value);

	public function queryByDistrict($value);

	public function queryByWeather($value);

	public function queryByTemperatureHigh($value);

	public function queryByTemperatureLow($value);

	public function queryByWind($value);

	public function queryByCreateTime($value);


	public function deleteByProvince($value);

	public function deleteByCity($value);

	public function deleteByDistrict($value);

	public function deleteByWeather($value);

	public function deleteByTemperatureHigh($value);

	public function deleteByTemperatureLow($value);

	public function deleteByWind($value);

	public function deleteByCreateTime($value);


}
?>