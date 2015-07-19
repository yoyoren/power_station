<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-12 10:47
 */
interface PowerAccountAccessProjectDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerAccountAccessProject 
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
 	 * @param powerAccountAccessProject primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAccountAccessProject powerAccountAccessProject
 	 */
	public function insert($powerAccountAccessProject);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAccountAccessProject powerAccountAccessProject
 	 */
	public function update($powerAccountAccessProject);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProjectId($value);

	public function queryByAccountId($value);

	public function queryByCreateTime($value);

	public function queryByStatus($value);


	public function deleteByProjectId($value);

	public function deleteByAccountId($value);

	public function deleteByCreateTime($value);

	public function deleteByStatus($value);


}
?>