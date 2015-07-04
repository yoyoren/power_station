<?php
/**
 * Class that operate on table 'power_account'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAccountMySqlExtDAO extends PowerAccountMySqlDAO{
	public function queryByAccountName($value){
		$sql = 'SELECT * FROM power_account_access_info WHERE account_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}
	
	public function updateAccountStatus($status,$account_name){
		$sql = 'UPDATE power_account SET status = ? WHERE account_name = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($status);
		$sqlQuery->set($account_name);
		return $this->executeUpdate($sqlQuery);
	}
	
}
?>