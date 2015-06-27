<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
interface PowerBaseStationLogDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerBaseStationLog 
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
 	 * @param powerBaseStationLog primary key
 	 */
	public function delete($log_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationLog powerBaseStationLog
 	 */
	public function insert($powerBaseStationLog);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationLog powerBaseStationLog
 	 */
	public function update($powerBaseStationLog);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStationId($value);

	public function queryByLogType($value);

	public function queryByLogDesc($value);

	public function queryByOriginValue($value);

	public function queryByCurrentValue($value);

	public function queryByCreateTime($value);

	public function queryByCreatorId($value);


	public function deleteByStationId($value);

	public function deleteByLogType($value);

	public function deleteByLogDesc($value);

	public function deleteByOriginValue($value);

	public function deleteByCurrentValue($value);

	public function deleteByCreateTime($value);

	public function deleteByCreatorId($value);


}
?>