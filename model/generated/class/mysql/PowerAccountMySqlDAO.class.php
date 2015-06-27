<?php
/**
 * Class that operate on table 'power_account'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAccountMySqlDAO implements PowerAccountDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerAccountMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_account WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_account';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_account ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerAccount primary key
 	 */
	public function delete($account_id){
		$sql = 'DELETE FROM power_account WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($account_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAccountMySql powerAccount
 	 */
	public function insert($powerAccount){
		$sql = 'INSERT INTO power_account (account_name, account_password, account_salt, accout_type, create_time, last_login_time) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerAccount->accountName);
		$sqlQuery->set($powerAccount->accountPassword);
		$sqlQuery->setNumber($powerAccount->accountSalt);
		$sqlQuery->setNumber($powerAccount->accoutType);
		$sqlQuery->set($powerAccount->createTime);
		$sqlQuery->set($powerAccount->lastLoginTime);

		$id = $this->executeInsert($sqlQuery);	
		$powerAccount->accountId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAccountMySql powerAccount
 	 */
	public function update($powerAccount){
		$sql = 'UPDATE power_account SET account_name = ?, account_password = ?, account_salt = ?, accout_type = ?, create_time = ?, last_login_time = ? WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerAccount->accountName);
		$sqlQuery->set($powerAccount->accountPassword);
		$sqlQuery->setNumber($powerAccount->accountSalt);
		$sqlQuery->setNumber($powerAccount->accoutType);
		$sqlQuery->set($powerAccount->createTime);
		$sqlQuery->set($powerAccount->lastLoginTime);

		$sqlQuery->setNumber($powerAccount->accountId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_account';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAccountName($value){
		$sql = 'SELECT * FROM power_account WHERE account_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountPassword($value){
		$sql = 'SELECT * FROM power_account WHERE account_password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountSalt($value){
		$sql = 'SELECT * FROM power_account WHERE account_salt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccoutType($value){
		$sql = 'SELECT * FROM power_account WHERE accout_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_account WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastLoginTime($value){
		$sql = 'SELECT * FROM power_account WHERE last_login_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAccountName($value){
		$sql = 'DELETE FROM power_account WHERE account_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountPassword($value){
		$sql = 'DELETE FROM power_account WHERE account_password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountSalt($value){
		$sql = 'DELETE FROM power_account WHERE account_salt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccoutType($value){
		$sql = 'DELETE FROM power_account WHERE accout_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_account WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastLoginTime($value){
		$sql = 'DELETE FROM power_account WHERE last_login_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerAccountMySql 
	 */
	protected function readRow($row){
		$powerAccount = new PowerAccount();
		
		$powerAccount->accountId = $row['account_id'];
		$powerAccount->accountName = $row['account_name'];
		$powerAccount->accountPassword = $row['account_password'];
		$powerAccount->accountSalt = $row['account_salt'];
		$powerAccount->accoutType = $row['accout_type'];
		$powerAccount->createTime = $row['create_time'];
		$powerAccount->lastLoginTime = $row['last_login_time'];

		return $powerAccount;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PowerAccountMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>