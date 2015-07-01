<?php
/**
 * Class that operate on table 'power_account_access_info'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
class PowerAccountAccessInfoMySqlDAO implements PowerAccountAccessInfoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerAccountAccessInfoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_account_access_info WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_account_access_info';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_account_access_info ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerAccountAccessInfo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM power_account_access_info WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAccountAccessInfoMySql powerAccountAccessInfo
 	 */
	public function insert($powerAccountAccessInfo){
		$sql = 'INSERT INTO power_account_access_info (account_id, access_data_table) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAccountAccessInfo->accountId);
		$sqlQuery->set($powerAccountAccessInfo->accessDataTable);

		$id = $this->executeInsert($sqlQuery);	
		$powerAccountAccessInfo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAccountAccessInfoMySql powerAccountAccessInfo
 	 */
	public function update($powerAccountAccessInfo){
		$sql = 'UPDATE power_account_access_info SET account_id = ?, access_data_table = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAccountAccessInfo->accountId);
		$sqlQuery->set($powerAccountAccessInfo->accessDataTable);

		$sqlQuery->setNumber($powerAccountAccessInfo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_account_access_info';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAccountId($value){
		$sql = 'SELECT * FROM power_account_access_info WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccessDataTable($value){
		$sql = 'SELECT * FROM power_account_access_info WHERE access_data_table = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAccountId($value){
		$sql = 'DELETE FROM power_account_access_info WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccessDataTable($value){
		$sql = 'DELETE FROM power_account_access_info WHERE access_data_table = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerAccountAccessInfoMySql 
	 */
	protected function readRow($row){
		$powerAccountAccessInfo = new PowerAccountAccessInfo();
		
		$powerAccountAccessInfo->id = $row['id'];
		$powerAccountAccessInfo->accountId = $row['account_id'];
		$powerAccountAccessInfo->accessDataTable = $row['access_data_table'];

		return $powerAccountAccessInfo;
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
	 * @return PowerAccountAccessInfoMySql 
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