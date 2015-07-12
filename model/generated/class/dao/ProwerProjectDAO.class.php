<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-12 10:47
 */
interface ProwerProjectDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ProwerProject 
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
 	 * @param prowerProject primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProwerProject prowerProject
 	 */
	public function insert($prowerProject);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProwerProject prowerProject
 	 */
	public function update($prowerProject);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProjectName($value);

	public function queryByProjectDesc($value);

	public function queryByCreateTime($value);

	public function queryByCreatorId($value);


	public function deleteByProjectName($value);

	public function deleteByProjectDesc($value);

	public function deleteByCreateTime($value);

	public function deleteByCreatorId($value);


}
?>