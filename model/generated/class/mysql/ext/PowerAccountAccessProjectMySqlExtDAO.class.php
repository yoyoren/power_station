<?php
/**
 * Class that operate on table 'power_account_access_project'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-12 10:47
 */
class PowerAccountAccessProjectMySqlExtDAO extends PowerAccountAccessProjectMySqlDAO{
	public function queryByAccountId_And_ProjectId($accountId,$projectId){
		$sql = 'SELECT * FROM power_account_access_project WHERE account_id = ? AND project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($accountId);
		$sqlQuery->setNumber($projectId);
		return $this->getList($sqlQuery);
	}
	
	public function removeUserFromProject($accountId,$projectId){
		$sql = 'DELETE FROM power_account_access_project WHERE account_id = ? AND project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($accountId);
		$sqlQuery->setNumber($projectId);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function removeAllFromProject($projectId){
		$sql = 'DELETE FROM power_account_access_project WHERE project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($projectId);
		return $this->executeUpdate($sqlQuery);
	}
	
	
	
}
?>