<?php
/**
 * Class that operate on table 'power_base_station_energy_info'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
class PowerBaseStationEnergyInfoMySqlDAO implements PowerBaseStationEnergyInfoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerBaseStationEnergyInfoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_base_station_energy_info';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_base_station_energy_info ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStationEnergyInfo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStationEnergyInfoMySql powerBaseStationEnergyInfo
 	 */
	public function insert($powerBaseStationEnergyInfo){
		$sql = 'INSERT INTO power_base_station_energy_info (price, ammeter_num, ammeter_num_chinamobile, fee_type, power_supply_type, overload, overload_normal, sim_num, esg_num, ecu_num, power_base_station_energy_infocol, station_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->price);
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->ammeterNum);
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->ammeterNumChinamobile);
		$sqlQuery->set($powerBaseStationEnergyInfo->feeType);
		$sqlQuery->set($powerBaseStationEnergyInfo->powerSupplyType);
		$sqlQuery->set($powerBaseStationEnergyInfo->overload);
		$sqlQuery->set($powerBaseStationEnergyInfo->overloadNormal);
		$sqlQuery->set($powerBaseStationEnergyInfo->simNum);
		$sqlQuery->set($powerBaseStationEnergyInfo->esgNum);
		$sqlQuery->set($powerBaseStationEnergyInfo->ecuNum);
		$sqlQuery->set($powerBaseStationEnergyInfo->powerBaseStationEnergyInfocol);
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->stationId);

		$id = $this->executeInsert($sqlQuery);	
		$powerBaseStationEnergyInfo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStationEnergyInfoMySql powerBaseStationEnergyInfo
 	 */
	public function update($powerBaseStationEnergyInfo){
		$sql = 'UPDATE power_base_station_energy_info SET price = ?, ammeter_num = ?, ammeter_num_chinamobile = ?, fee_type = ?, power_supply_type = ?, overload = ?, overload_normal = ?, sim_num = ?, esg_num = ?, ecu_num = ?, power_base_station_energy_infocol = ?, station_id = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->price);
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->ammeterNum);
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->ammeterNumChinamobile);
		$sqlQuery->set($powerBaseStationEnergyInfo->feeType);
		$sqlQuery->set($powerBaseStationEnergyInfo->powerSupplyType);
		$sqlQuery->set($powerBaseStationEnergyInfo->overload);
		$sqlQuery->set($powerBaseStationEnergyInfo->overloadNormal);
		$sqlQuery->set($powerBaseStationEnergyInfo->simNum);
		$sqlQuery->set($powerBaseStationEnergyInfo->esgNum);
		$sqlQuery->set($powerBaseStationEnergyInfo->ecuNum);
		$sqlQuery->set($powerBaseStationEnergyInfo->powerBaseStationEnergyInfocol);
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->stationId);

		$sqlQuery->setNumber($powerBaseStationEnergyInfo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_base_station_energy_info';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPrice($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmmeterNum($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE ammeter_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmmeterNumChinamobile($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE ammeter_num_chinamobile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFeeType($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE fee_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPowerSupplyType($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE power_supply_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOverload($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE overload = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOverloadNormal($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE overload_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySimNum($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE sim_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEsgNum($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE esg_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEcuNum($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE ecu_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPowerBaseStationEnergyInfocol($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE power_base_station_energy_infocol = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_base_station_energy_info WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPrice($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmmeterNum($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE ammeter_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmmeterNumChinamobile($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE ammeter_num_chinamobile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFeeType($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE fee_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPowerSupplyType($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE power_supply_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOverload($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE overload = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOverloadNormal($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE overload_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySimNum($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE sim_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEsgNum($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE esg_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEcuNum($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE ecu_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPowerBaseStationEnergyInfocol($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE power_base_station_energy_infocol = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_base_station_energy_info WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerBaseStationEnergyInfoMySql 
	 */
	protected function readRow($row){
		$powerBaseStationEnergyInfo = new PowerBaseStationEnergyInfo();
		
		$powerBaseStationEnergyInfo->id = $row['id'];
		$powerBaseStationEnergyInfo->price = $row['price'];
		$powerBaseStationEnergyInfo->ammeterNum = $row['ammeter_num'];
		$powerBaseStationEnergyInfo->ammeterNumChinamobile = $row['ammeter_num_chinamobile'];
		$powerBaseStationEnergyInfo->feeType = $row['fee_type'];
		$powerBaseStationEnergyInfo->powerSupplyType = $row['power_supply_type'];
		$powerBaseStationEnergyInfo->overload = $row['overload'];
		$powerBaseStationEnergyInfo->overloadNormal = $row['overload_normal'];
		$powerBaseStationEnergyInfo->simNum = $row['sim_num'];
		$powerBaseStationEnergyInfo->esgNum = $row['esg_num'];
		$powerBaseStationEnergyInfo->ecuNum = $row['ecu_num'];
		$powerBaseStationEnergyInfo->powerBaseStationEnergyInfocol = $row['power_base_station_energy_infocol'];
		$powerBaseStationEnergyInfo->stationId = $row['station_id'];

		return $powerBaseStationEnergyInfo;
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
	 * @return PowerBaseStationEnergyInfoMySql 
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