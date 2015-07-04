<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
interface PowerStationWarningDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerStationWarning 
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
 	 * @param powerStationWarning primary key
 	 */
	public function delete($warning_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerStationWarning powerStationWarning
 	 */
	public function insert($powerStationWarning);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerStationWarning powerStationWarning
 	 */
	public function update($powerStationWarning);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByWarningType($value);

	public function queryByWarningDesc($value);

	public function queryByCreateTime($value);

	public function queryByUpdateTime($value);

	public function queryByStationId($value);

	public function queryByWarningStatus($value);


	public function deleteByWarningType($value);

	public function deleteByWarningDesc($value);

	public function deleteByCreateTime($value);

	public function deleteByUpdateTime($value);

	public function deleteByStationId($value);

	public function deleteByWarningStatus($value);


}
?>