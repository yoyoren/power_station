<?php
/**
 * Class that operate on table 'power_base_station_analysis'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 07:33
 */
class PowerBaseStationAnalysisMySqlDAO implements PowerBaseStationAnalysisDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerBaseStationAnalysisMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_base_station_analysis WHERE analysis_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_base_station_analysis';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_base_station_analysis ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStationAnalysi primary key
 	 */
	public function delete($analysis_id){
		$sql = 'DELETE FROM power_base_station_analysis WHERE analysis_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($analysis_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationAnalysisMySql powerBaseStationAnalysi
 	 */
	public function insert($powerBaseStationAnalysi){
		$sql = 'INSERT INTO power_base_station_analysis (station_id, device_status, average_energy_hour, average_energy_day, average_energy_week) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationAnalysi->stationId);
		$sqlQuery->setNumber($powerBaseStationAnalysi->deviceStatus);
		$sqlQuery->setNumber($powerBaseStationAnalysi->averageEnergyHour);
		$sqlQuery->setNumber($powerBaseStationAnalysi->averageEnergyDay);
		$sqlQuery->setNumber($powerBaseStationAnalysi->averageEnergyWeek);

		$id = $this->executeInsert($sqlQuery);	
		$powerBaseStationAnalysi->analysisId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationAnalysisMySql powerBaseStationAnalysi
 	 */
	public function update($powerBaseStationAnalysi){
		$sql = 'UPDATE power_base_station_analysis SET station_id = ?, device_status = ?, average_energy_hour = ?, average_energy_day = ?, average_energy_week = ? WHERE analysis_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationAnalysi->stationId);
		$sqlQuery->setNumber($powerBaseStationAnalysi->deviceStatus);
		$sqlQuery->setNumber($powerBaseStationAnalysi->averageEnergyHour);
		$sqlQuery->setNumber($powerBaseStationAnalysi->averageEnergyDay);
		$sqlQuery->setNumber($powerBaseStationAnalysi->averageEnergyWeek);

		$sqlQuery->setNumber($powerBaseStationAnalysi->analysisId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_base_station_analysis';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_base_station_analysis WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceStatus($value){
		$sql = 'SELECT * FROM power_base_station_analysis WHERE device_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAverageEnergyHour($value){
		$sql = 'SELECT * FROM power_base_station_analysis WHERE average_energy_hour = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAverageEnergyDay($value){
		$sql = 'SELECT * FROM power_base_station_analysis WHERE average_energy_day = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAverageEnergyWeek($value){
		$sql = 'SELECT * FROM power_base_station_analysis WHERE average_energy_week = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_base_station_analysis WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceStatus($value){
		$sql = 'DELETE FROM power_base_station_analysis WHERE device_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAverageEnergyHour($value){
		$sql = 'DELETE FROM power_base_station_analysis WHERE average_energy_hour = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAverageEnergyDay($value){
		$sql = 'DELETE FROM power_base_station_analysis WHERE average_energy_day = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAverageEnergyWeek($value){
		$sql = 'DELETE FROM power_base_station_analysis WHERE average_energy_week = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerBaseStationAnalysisMySql 
	 */
	protected function readRow($row){
		$powerBaseStationAnalysi = new PowerBaseStationAnalysi();
		
		$powerBaseStationAnalysi->analysisId = $row['analysis_id'];
		$powerBaseStationAnalysi->stationId = $row['station_id'];
		$powerBaseStationAnalysi->deviceStatus = $row['device_status'];
		$powerBaseStationAnalysi->averageEnergyHour = $row['average_energy_hour'];
		$powerBaseStationAnalysi->averageEnergyDay = $row['average_energy_day'];
		$powerBaseStationAnalysi->averageEnergyWeek = $row['average_energy_week'];

		return $powerBaseStationAnalysi;
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
	 * @return PowerBaseStationAnalysisMySql 
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