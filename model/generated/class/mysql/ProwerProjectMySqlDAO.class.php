<?php
/**
 * Class that operate on table 'prower_project'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-12 10:47
 */
class ProwerProjectMySqlDAO implements ProwerProjectDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProwerProjectMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prower_project WHERE id = ?';
		
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		#var_dump($sqlQuery);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prower_project';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prower_project ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prowerProject primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM prower_project WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProwerProjectMySql prowerProject
 	 */
	public function insert($prowerProject){
		$sql = 'INSERT INTO prower_project (project_name, project_desc, create_time, creator_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prowerProject->projectName);
		$sqlQuery->set($prowerProject->projectDesc);
		$sqlQuery->setNumber($prowerProject->createTime);
		$sqlQuery->setNumber($prowerProject->creatorId);

		$id = $this->executeInsert($sqlQuery);	
		$prowerProject->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProwerProjectMySql prowerProject
 	 */
	public function update($prowerProject){
		$sql = 'UPDATE prower_project SET project_name = ?, project_desc = ?, create_time = ?, creator_id = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prowerProject->projectName);
		$sqlQuery->set($prowerProject->projectDesc);
		$sqlQuery->setNumber($prowerProject->createTime);
		$sqlQuery->setNumber($prowerProject->creatorId);

		$sqlQuery->setNumber($prowerProject->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prower_project';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProjectName($value){
		$sql = 'SELECT * FROM prower_project WHERE project_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProjectDesc($value){
		$sql = 'SELECT * FROM prower_project WHERE project_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM prower_project WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatorId($value){
		$sql = 'SELECT * FROM prower_project WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProjectName($value){
		$sql = 'DELETE FROM prower_project WHERE project_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProjectDesc($value){
		$sql = 'DELETE FROM prower_project WHERE project_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM prower_project WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatorId($value){
		$sql = 'DELETE FROM prower_project WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProwerProjectMySql 
	 */
	protected function readRow($row){
		$prowerProject = new ProwerProject();
		
		$prowerProject->id = $row['id'];
		$prowerProject->projectName = $row['project_name'];
		$prowerProject->projectDesc = $row['project_desc'];
		$prowerProject->createTime = $row['create_time'];
		$prowerProject->creatorId = $row['creator_id'];

		return $prowerProject;
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
	 * @return ProwerProjectMySql 
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