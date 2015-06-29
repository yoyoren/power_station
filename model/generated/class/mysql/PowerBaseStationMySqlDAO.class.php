<?php
/**
 * Class that operate on table 'power_base_station'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 07:33
 */
class PowerBaseStationMySqlDAO implements PowerBaseStationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerBaseStationMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_base_station WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_base_station';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_base_station ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStation primary key
 	 */
	public function delete($station_id){
		$sql = 'DELETE FROM power_base_station WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($station_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationMySql powerBaseStation
 	 */
	public function insert($powerBaseStation){
		$sql = 'INSERT INTO power_base_station (station_name, station_serise_code, station_type, station_project, station_building_type, station_province, station_city, station_distirct, station_address, station_lat, station_lng, create_time, creator_id, data_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerBaseStation->stationName);
		$sqlQuery->set($powerBaseStation->stationSeriseCode);
		$sqlQuery->setNumber($powerBaseStation->stationType);
		$sqlQuery->set($powerBaseStation->stationProject);
		$sqlQuery->setNumber($powerBaseStation->stationBuildingType);
		$sqlQuery->set($powerBaseStation->stationProvince);
		$sqlQuery->set($powerBaseStation->stationCity);
		$sqlQuery->set($powerBaseStation->stationDistirct);
		$sqlQuery->set($powerBaseStation->stationAddress);
		$sqlQuery->set($powerBaseStation->stationLat);
		$sqlQuery->set($powerBaseStation->stationLng);
		$sqlQuery->set($powerBaseStation->createTime);
		$sqlQuery->setNumber($powerBaseStation->creatorId);
		$sqlQuery->setNumber($powerBaseStation->dataStatus);

		$id = $this->executeInsert($sqlQuery);	
		$powerBaseStation->stationId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationMySql powerBaseStation
 	 */
	public function update($powerBaseStation){
		$sql = 'UPDATE power_base_station SET station_name = ?, station_serise_code = ?, station_type = ?, station_project = ?, station_building_type = ?, station_province = ?, station_city = ?, station_distirct = ?, station_address = ?, station_lat = ?, station_lng = ?, create_time = ?, creator_id = ?, data_status = ? WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerBaseStation->stationName);
		$sqlQuery->set($powerBaseStation->stationSeriseCode);
		$sqlQuery->setNumber($powerBaseStation->stationType);
		$sqlQuery->set($powerBaseStation->stationProject);
		$sqlQuery->setNumber($powerBaseStation->stationBuildingType);
		$sqlQuery->set($powerBaseStation->stationProvince);
		$sqlQuery->set($powerBaseStation->stationCity);
		$sqlQuery->set($powerBaseStation->stationDistirct);
		$sqlQuery->set($powerBaseStation->stationAddress);
		$sqlQuery->set($powerBaseStation->stationLat);
		$sqlQuery->set($powerBaseStation->stationLng);
		$sqlQuery->set($powerBaseStation->createTime);
		$sqlQuery->setNumber($powerBaseStation->creatorId);
		$sqlQuery->setNumber($powerBaseStation->dataStatus);

		$sqlQuery->setNumber($powerBaseStation->stationId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_base_station';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStationName($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationSeriseCode($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_serise_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationType($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationProject($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationBuildingType($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_building_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationProvince($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_province = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationCity($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationDistirct($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_distirct = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationAddress($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationLat($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_lat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationLng($value){
		$sql = 'SELECT * FROM power_base_station WHERE station_lng = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_base_station WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatorId($value){
		$sql = 'SELECT * FROM power_base_station WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataStatus($value){
		$sql = 'SELECT * FROM power_base_station WHERE data_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStationName($value){
		$sql = 'DELETE FROM power_base_station WHERE station_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationSeriseCode($value){
		$sql = 'DELETE FROM power_base_station WHERE station_serise_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationType($value){
		$sql = 'DELETE FROM power_base_station WHERE station_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationProject($value){
		$sql = 'DELETE FROM power_base_station WHERE station_project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationBuildingType($value){
		$sql = 'DELETE FROM power_base_station WHERE station_building_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationProvince($value){
		$sql = 'DELETE FROM power_base_station WHERE station_province = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationCity($value){
		$sql = 'DELETE FROM power_base_station WHERE station_city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationDistirct($value){
		$sql = 'DELETE FROM power_base_station WHERE station_distirct = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationAddress($value){
		$sql = 'DELETE FROM power_base_station WHERE station_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationLat($value){
		$sql = 'DELETE FROM power_base_station WHERE station_lat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationLng($value){
		$sql = 'DELETE FROM power_base_station WHERE station_lng = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_base_station WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatorId($value){
		$sql = 'DELETE FROM power_base_station WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataStatus($value){
		$sql = 'DELETE FROM power_base_station WHERE data_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerBaseStationMySql 
	 */
	protected function readRow($row){
		$powerBaseStation = new PowerBaseStation();
		
		$powerBaseStation->stationId = $row['station_id'];
		$powerBaseStation->stationName = $row['station_name'];
		$powerBaseStation->stationSeriseCode = $row['station_serise_code'];
		$powerBaseStation->stationType = $row['station_type'];
		$powerBaseStation->stationProject = $row['station_project'];
		$powerBaseStation->stationBuildingType = $row['station_building_type'];
		$powerBaseStation->stationProvince = $row['station_province'];
		$powerBaseStation->stationCity = $row['station_city'];
		$powerBaseStation->stationDistirct = $row['station_distirct'];
		$powerBaseStation->stationAddress = $row['station_address'];
		$powerBaseStation->stationLat = $row['station_lat'];
		$powerBaseStation->stationLng = $row['station_lng'];
		$powerBaseStation->createTime = $row['create_time'];
		$powerBaseStation->creatorId = $row['creator_id'];
		$powerBaseStation->dataStatus = $row['data_status'];

		return $powerBaseStation;
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
	 * @return PowerBaseStationMySql 
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