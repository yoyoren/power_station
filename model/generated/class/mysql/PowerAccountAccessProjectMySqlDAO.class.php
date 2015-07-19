<?php
/**
 * Class that operate on table 'power_account_access_project'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-12 10:47
 */
class PowerAccountAccessProjectMySqlDAO implements PowerAccountAccessProjectDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerAccountAccessProjectMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_account_access_project WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_account_access_project';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_account_access_project ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerAccountAccessProject primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM power_account_access_project WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAccountAccessProjectMySql powerAccountAccessProject
 	 */
	public function insert($powerAccountAccessProject){
		$sql = 'INSERT INTO power_account_access_project (project_id, account_id, create_time, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAccountAccessProject->projectId);
		$sqlQuery->setNumber($powerAccountAccessProject->accountId);
		$sqlQuery->setNumber($powerAccountAccessProject->createTime);
		$sqlQuery->setNumber($powerAccountAccessProject->status);

		$id = $this->executeInsert($sqlQuery);	
		$powerAccountAccessProject->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAccountAccessProjectMySql powerAccountAccessProject
 	 */
	public function update($powerAccountAccessProject){
		$sql = 'UPDATE power_account_access_project SET project_id = ?, account_id = ?, create_time = ?, status = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAccountAccessProject->projectId);
		$sqlQuery->setNumber($powerAccountAccessProject->accountId);
		$sqlQuery->setNumber($powerAccountAccessProject->createTime);
		$sqlQuery->setNumber($powerAccountAccessProject->status);

		$sqlQuery->setNumber($powerAccountAccessProject->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_account_access_project';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProjectId($value){
		$sql = 'SELECT * FROM power_account_access_project WHERE project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountId($value){
		$sql = 'SELECT * FROM power_account_access_project WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_account_access_project WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM power_account_access_project WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProjectId($value){
		$sql = 'DELETE FROM power_account_access_project WHERE project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountId($value){
		$sql = 'DELETE FROM power_account_access_project WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_account_access_project WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM power_account_access_project WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerAccountAccessProjectMySql 
	 */
	protected function readRow($row){
		$powerAccountAccessProject = new PowerAccountAccessProject();
		
		$powerAccountAccessProject->id = $row['id'];
		$powerAccountAccessProject->projectId = $row['project_id'];
		$powerAccountAccessProject->accountId = $row['account_id'];
		$powerAccountAccessProject->createTime = $row['create_time'];
		$powerAccountAccessProject->status = $row['status'];

		return $powerAccountAccessProject;
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
	 * @return PowerAccountAccessProjectMySql 
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