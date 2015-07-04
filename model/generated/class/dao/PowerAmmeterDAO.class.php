<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
interface PowerAmmeterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerAmmeter 
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
 	 * @param powerAmmeter primary key
 	 */
	public function delete($ammeter_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAmmeter powerAmmeter
 	 */
	public function insert($powerAmmeter);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAmmeter powerAmmeter
 	 */
	public function update($powerAmmeter);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByBeginValue($value);

	public function queryByEndValue($value);

	public function queryByCreatorId($value);

	public function queryByCreateTime($value);


	public function deleteByBeginValue($value);

	public function deleteByEndValue($value);

	public function deleteByCreatorId($value);

	public function deleteByCreateTime($value);


}
?>