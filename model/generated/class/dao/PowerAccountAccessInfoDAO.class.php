<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
interface PowerAccountAccessInfoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerAccountAccessInfo 
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
 	 * @param powerAccountAccessInfo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAccountAccessInfo powerAccountAccessInfo
 	 */
	public function insert($powerAccountAccessInfo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAccountAccessInfo powerAccountAccessInfo
 	 */
	public function update($powerAccountAccessInfo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAccountId($value);

	public function queryByAccessDataTable($value);


	public function deleteByAccountId($value);

	public function deleteByAccessDataTable($value);


}
?>