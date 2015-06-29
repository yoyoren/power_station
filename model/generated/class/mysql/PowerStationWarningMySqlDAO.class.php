<?php
/**
 * Class that operate on table 'power_station_warning'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 07:33
 */
class PowerStationWarningMySqlDAO implements PowerStationWarningDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerStationWarningMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_station_warning WHERE warning_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_station_warning';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_station_warning ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerStationWarning primary key
 	 */
	public function delete($warning_id){
		$sql = 'DELETE FROM power_station_warning WHERE warning_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($warning_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerStationWarningMySql powerStationWarning
 	 */
	public function insert($powerStationWarning){
		$sql = 'INSERT INTO power_station_warning (warning_type, warning_desc, create_time, update_time, station_id, warning_status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerStationWarning->warningType);
		$sqlQuery->set($powerStationWarning->warningDesc);
		$sqlQuery->set($powerStationWarning->createTime);
		$sqlQuery->set($powerStationWarning->updateTime);
		$sqlQuery->setNumber($powerStationWarning->stationId);
		$sqlQuery->setNumber($powerStationWarning->warningStatus);

		$id = $this->executeInsert($sqlQuery);	
		$powerStationWarning->warningId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerStationWarningMySql powerStationWarning
 	 */
	public function update($powerStationWarning){
		$sql = 'UPDATE power_station_warning SET warning_type = ?, warning_desc = ?, create_time = ?, update_time = ?, station_id = ?, warning_status = ? WHERE warning_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerStationWarning->warningType);
		$sqlQuery->set($powerStationWarning->warningDesc);
		$sqlQuery->set($powerStationWarning->createTime);
		$sqlQuery->set($powerStationWarning->updateTime);
		$sqlQuery->setNumber($powerStationWarning->stationId);
		$sqlQuery->setNumber($powerStationWarning->warningStatus);

		$sqlQuery->setNumber($powerStationWarning->warningId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_station_warning';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByWarningType($value){
		$sql = 'SELECT * FROM power_station_warning WHERE warning_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWarningDesc($value){
		$sql = 'SELECT * FROM power_station_warning WHERE warning_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_station_warning WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateTime($value){
		$sql = 'SELECT * FROM power_station_warning WHERE update_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_station_warning WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWarningStatus($value){
		$sql = 'SELECT * FROM power_station_warning WHERE warning_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByWarningType($value){
		$sql = 'DELETE FROM power_station_warning WHERE warning_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWarningDesc($value){
		$sql = 'DELETE FROM power_station_warning WHERE warning_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_station_warning WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateTime($value){
		$sql = 'DELETE FROM power_station_warning WHERE update_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_station_warning WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWarningStatus($value){
		$sql = 'DELETE FROM power_station_warning WHERE warning_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerStationWarningMySql 
	 */
	protected function readRow($row){
		$powerStationWarning = new PowerStationWarning();
		
		$powerStationWarning->warningId = $row['warning_id'];
		$powerStationWarning->warningType = $row['warning_type'];
		$powerStationWarning->warningDesc = $row['warning_desc'];
		$powerStationWarning->createTime = $row['create_time'];
		$powerStationWarning->updateTime = $row['update_time'];
		$powerStationWarning->stationId = $row['station_id'];
		$powerStationWarning->warningStatus = $row['warning_status'];

		return $powerStationWarning;
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
	 * @return PowerStationWarningMySql 
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