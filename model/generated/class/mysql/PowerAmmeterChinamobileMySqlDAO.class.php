<?php
/**
 * Class that operate on table 'power_ammeter_chinamobile'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-20 13:00
 */
class PowerAmmeterChinamobileMySqlDAO implements PowerAmmeterChinamobileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerAmmeterChinamobileMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE ammeter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_ammeter_chinamobile';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_ammeter_chinamobile ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerAmmeterChinamobile primary key
 	 */
	public function delete($ammeter_id){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE ammeter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ammeter_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAmmeterChinamobileMySql powerAmmeterChinamobile
 	 */
	public function insert($powerAmmeterChinamobile){
		$sql = 'INSERT INTO power_ammeter_chinamobile (station_id, ammeter_normal, ammeter_normal_chinamobile, read_time, begin_value, end_value, creator_id, create_time) VALUES (?,?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAmmeterChinamobile->stationId);
		$sqlQuery->setNumber($powerAmmeterChinamobile->ammeterNormal);
		$sqlQuery->setNumber($powerAmmeterChinamobile->ammeterNormalChinamobile);
                $sqlQuery->setNumber($powerAmmeterChinamobile->readTime);
		$sqlQuery->setNumber($powerAmmeterChinamobile->beginValue);
		$sqlQuery->setNumber($powerAmmeterChinamobile->endValue);
		$sqlQuery->setNumber($powerAmmeterChinamobile->creatorId);
		$sqlQuery->setNumber($powerAmmeterChinamobile->createTime);

		$id = $this->executeInsert($sqlQuery);	
		$powerAmmeterChinamobile->ammeterId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAmmeterChinamobileMySql powerAmmeterChinamobile
 	 */
	public function update($powerAmmeterChinamobile){
		$sql = 'UPDATE power_ammeter_chinamobile SET station_id = ?, ammeter_normal = ?, ammeter_normal_chinamobile = ?, begin_value = ?, end_value = ?, creator_id = ?, create_time = ? WHERE ammeter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAmmeterChinamobile->stationId);
		$sqlQuery->setNumber($powerAmmeterChinamobile->ammeterNormal);
		$sqlQuery->setNumber($powerAmmeterChinamobile->ammeterNormalChinamobile);
		$sqlQuery->setNumber($powerAmmeterChinamobile->beginValue);
		$sqlQuery->setNumber($powerAmmeterChinamobile->endValue);
		$sqlQuery->setNumber($powerAmmeterChinamobile->creatorId);
		$sqlQuery->setNumber($powerAmmeterChinamobile->createTime);

		$sqlQuery->setNumber($powerAmmeterChinamobile->ammeterId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_ammeter_chinamobile';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStationId($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmmeterNormal($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE ammeter_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmmeterNormalChinamobile($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE ammeter_normal_chinamobile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBeginValue($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE begin_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndValue($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE end_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatorId($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_ammeter_chinamobile WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStationId($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmmeterNormal($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE ammeter_normal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmmeterNormalChinamobile($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE ammeter_normal_chinamobile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBeginValue($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE begin_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndValue($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE end_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatorId($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_ammeter_chinamobile WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerAmmeterChinamobileMySql 
	 */
	protected function readRow($row){
		$powerAmmeterChinamobile = new PowerAmmeterChinamobile();
		
		$powerAmmeterChinamobile->ammeterId = $row['ammeter_id'];
		$powerAmmeterChinamobile->stationId = $row['station_id'];
		$powerAmmeterChinamobile->ammeterNormal = $row['ammeter_normal'];
		$powerAmmeterChinamobile->ammeterNormalChinamobile = $row['ammeter_normal_chinamobile'];
                $powerAmmeterChinamobile->readTime = $row['read_time'];
		$powerAmmeterChinamobile->beginValue = $row['begin_value'];
		$powerAmmeterChinamobile->endValue = $row['end_value'];
		$powerAmmeterChinamobile->creatorId = $row['creator_id'];
		$powerAmmeterChinamobile->createTime = $row['create_time'];

		return $powerAmmeterChinamobile;
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
	 * @return PowerAmmeterChinamobileMySql 
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