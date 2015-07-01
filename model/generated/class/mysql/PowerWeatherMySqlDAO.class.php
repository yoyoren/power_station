<?php
/**
 * Class that operate on table 'power_weather'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
class PowerWeatherMySqlDAO implements PowerWeatherDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerWeatherMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_weather WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_weather';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_weather ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerWeather primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM power_weather WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerWeatherMySql powerWeather
 	 */
	public function insert($powerWeather){
		$sql = 'INSERT INTO power_weather (province, city, district, weather, temperature_high, temperature_low, wind, create_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerWeather->province);
		$sqlQuery->set($powerWeather->city);
		$sqlQuery->set($powerWeather->district);
		$sqlQuery->set($powerWeather->weather);
		$sqlQuery->setNumber($powerWeather->temperatureHigh);
		$sqlQuery->setNumber($powerWeather->temperatureLow);
		$sqlQuery->setNumber($powerWeather->wind);
		$sqlQuery->setNumber($powerWeather->createTime);

		$id = $this->executeInsert($sqlQuery);	
		$powerWeather->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerWeatherMySql powerWeather
 	 */
	public function update($powerWeather){
		$sql = 'UPDATE power_weather SET province = ?, city = ?, district = ?, weather = ?, temperature_high = ?, temperature_low = ?, wind = ?, create_time = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerWeather->province);
		$sqlQuery->set($powerWeather->city);
		$sqlQuery->set($powerWeather->district);
		$sqlQuery->set($powerWeather->weather);
		$sqlQuery->setNumber($powerWeather->temperatureHigh);
		$sqlQuery->setNumber($powerWeather->temperatureLow);
		$sqlQuery->setNumber($powerWeather->wind);
		$sqlQuery->setNumber($powerWeather->createTime);

		$sqlQuery->setNumber($powerWeather->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_weather';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProvince($value){
		$sql = 'SELECT * FROM power_weather WHERE province = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM power_weather WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDistrict($value){
		$sql = 'SELECT * FROM power_weather WHERE district = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWeather($value){
		$sql = 'SELECT * FROM power_weather WHERE weather = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureHigh($value){
		$sql = 'SELECT * FROM power_weather WHERE temperature_high = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatureLow($value){
		$sql = 'SELECT * FROM power_weather WHERE temperature_low = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWind($value){
		$sql = 'SELECT * FROM power_weather WHERE wind = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_weather WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProvince($value){
		$sql = 'DELETE FROM power_weather WHERE province = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM power_weather WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDistrict($value){
		$sql = 'DELETE FROM power_weather WHERE district = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWeather($value){
		$sql = 'DELETE FROM power_weather WHERE weather = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureHigh($value){
		$sql = 'DELETE FROM power_weather WHERE temperature_high = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatureLow($value){
		$sql = 'DELETE FROM power_weather WHERE temperature_low = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWind($value){
		$sql = 'DELETE FROM power_weather WHERE wind = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_weather WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerWeatherMySql 
	 */
	protected function readRow($row){
		$powerWeather = new PowerWeather();
		
		$powerWeather->id = $row['id'];
		$powerWeather->province = $row['province'];
		$powerWeather->city = $row['city'];
		$powerWeather->district = $row['district'];
		$powerWeather->weather = $row['weather'];
		$powerWeather->temperatureHigh = $row['temperature_high'];
		$powerWeather->temperatureLow = $row['temperature_low'];
		$powerWeather->wind = $row['wind'];
		$powerWeather->createTime = $row['create_time'];

		return $powerWeather;
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
	 * @return PowerWeatherMySql 
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