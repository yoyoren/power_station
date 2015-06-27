<?php
/**
 * Class that operate on table 'power_base_station_log'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerBaseStationLogMySqlDAO implements PowerBaseStationLogDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerBaseStationLogMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_base_station_log WHERE log_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_base_station_log';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_base_station_log ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStationLog primary key
 	 */
	public function delete($log_id){
		$sql = 'DELETE FROM power_base_station_log WHERE log_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($log_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationLogMySql powerBaseStationLog
 	 */
	public function insert($powerBaseStationLog){
		$sql = 'INSERT INTO power_base_station_log (station_id, log_type, log_desc, origin_value, current_value, create_time, creator_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationLog->stationId);
		$sqlQuery->setNumber($powerBaseStationLog->logType);
		$sqlQuery->set($powerBaseStationLog->logDesc);
		$sqlQuery->setNumber($powerBaseStationLog->originValue);
		$sqlQuery->setNumber($powerBaseStationLog->currentValue);
		$sqlQuery->set($powerBaseStationLog->createTime);
		$sqlQuery->setNumber($powerBaseStationLog->creatorId);

		$id = $this->executeInsert($sqlQuery);	
		$powerBaseStationLog->logId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationLogMySql powerBaseStationLog
 	 */
	public function update($powerBaseStationLog){
		$sql = 'UPDATE power_base_station_log SET station_id = ?, log_type = ?, log_desc = ?, origin_value = ?, current_value = ?, create_time = ?, creator_id = ? WHERE log_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationLog->stationId);
		$sqlQuery->setNumber($powerBaseStationLog->logType);
		$sqlQuery->set($powerBaseStationLog->logDesc);
		$sqlQuery->setNumber($powerBaseStationLog->originValue);
		$sqlQuery->setNumber($powerBaseStationLog->currentValue);
		$sqlQuery->set($powerBaseStationLog->createTime);
		$sqlQuery->setNumber($powerBaseStationLog->creatorId);

		$sqlQuery->setNumber($powerBaseStationLog->logId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_base_station_log';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogType($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogDesc($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOriginValue($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE origin_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCurrentValue($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE current_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatorId($value){
		$sql = 'SELECT * FROM power_base_station_log WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_base_station_log WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogType($value){
		$sql = 'DELETE FROM power_base_station_log WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogDesc($value){
		$sql = 'DELETE FROM power_base_station_log WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOriginValue($value){
		$sql = 'DELETE FROM power_base_station_log WHERE origin_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCurrentValue($value){
		$sql = 'DELETE FROM power_base_station_log WHERE current_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_base_station_log WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatorId($value){
		$sql = 'DELETE FROM power_base_station_log WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerBaseStationLogMySql 
	 */
	protected function readRow($row){
		$powerBaseStationLog = new PowerBaseStationLog();
		
		$powerBaseStationLog->logId = $row['log_id'];
		$powerBaseStationLog->stationId = $row['station_id'];
		$powerBaseStationLog->logType = $row['log_type'];
		$powerBaseStationLog->logDesc = $row['log_desc'];
		$powerBaseStationLog->originValue = $row['origin_value'];
		$powerBaseStationLog->currentValue = $row['current_value'];
		$powerBaseStationLog->createTime = $row['create_time'];
		$powerBaseStationLog->creatorId = $row['creator_id'];

		return $powerBaseStationLog;
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
	 * @return PowerBaseStationLogMySql 
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