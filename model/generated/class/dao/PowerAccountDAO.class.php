<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
interface PowerAccountDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerAccount 
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
 	 * @param powerAccount primary key
 	 */
	public function delete($account_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAccount powerAccount
 	 */
	public function insert($powerAccount);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAccount powerAccount
 	 */
	public function update($powerAccount);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAccountName($value);

	public function queryByAccountPassword($value);

	public function queryByAccountSalt($value);

	public function queryByAccoutType($value);

	public function queryByCreateTime($value);

	public function queryByLastLoginTime($value);


	public function deleteByAccountName($value);

	public function deleteByAccountPassword($value);

	public function deleteByAccountSalt($value);

	public function deleteByAccoutType($value);

	public function deleteByCreateTime($value);

	public function deleteByLastLoginTime($value);


}
?>