<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-12 10:47
 */
interface PowerBaseStationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PowerBaseStation 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param powerBaseStation primary key
 	 */
	public function delete($station_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerBaseStation powerBaseStation
 	 */
	public function insert($powerBaseStation);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerBaseStation powerBaseStation
 	 */
	public function update($powerBaseStation);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStationName($value);

	public function queryByStationSeriseCode($value);

	public function queryByStationType($value);

	public function queryByStationProject($value);

	public function queryByStationBuildingType($value);

	public function queryByStationProvince($value);

	public function queryByStationCity($value);

	public function queryByStationDistirct($value);

	public function queryByStationAddress($value);

	public function queryByStationLat($value);

	public function queryByStationLng($value);

	public function queryByCreateTime($value);

	public function queryByCreatorId($value);

	public function queryByStatus($value);

	public function queryByProjectId($value);


	public function deleteByStationName($value);

	public function deleteByStationSeriseCode($value);

	public function deleteByStationType($value);

	public function deleteByStationProject($value);

	public function deleteByStationBuildingType($value);

	public function deleteByStationProvince($value);

	public function deleteByStationCity($value);

	public function deleteByStationDistirct($value);

	public function deleteByStationAddress($value);

	public function deleteByStationLat($value);

	public function deleteByStationLng($value);

	public function deleteByCreateTime($value);

	public function deleteByCreatorId($value);

	public function deleteByStatus($value);

	public function deleteByProjectId($value);


}
?>