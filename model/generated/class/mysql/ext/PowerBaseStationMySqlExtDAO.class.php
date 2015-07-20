<?php
/**
 * Class that operate on table 'power_base_station'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerBaseStationMySqlExtDAO extends PowerBaseStationMySqlDAO{
	public function updateStationInfo($powerBaseStation){
		$sql = 'UPDATE power_base_station SET station_project = ?, station_building_type = ?, station_province = ?, station_city = ?, station_distirct = ?, station_address = ?, station_lat = ?, station_lng = ?, project_id = ? WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($powerBaseStation->stationProject);
		$sqlQuery->setNumber($powerBaseStation->stationBuildingType);
		$sqlQuery->set($powerBaseStation->stationProvince);
		$sqlQuery->set($powerBaseStation->stationCity);
		$sqlQuery->set($powerBaseStation->stationDistirct);
		$sqlQuery->set($powerBaseStation->stationAddress);
		$sqlQuery->set($powerBaseStation->stationLat);
		$sqlQuery->set($powerBaseStation->stationLng);
		$sqlQuery->set($powerBaseStation->projectId);


		$sqlQuery->setNumber($powerBaseStation->stationId);
		return $this->executeUpdate($sqlQuery);
	}
	
	//获得项目的数量 按能耗分类
	public function getNumByEnergyType($energyType){
		$sql_num = 'SELECT count(*) FROM power_base_station_energy_info WHERE energy_type = ?';
		$sqlQueryNum = new SqlQuery($sql_num);
		$sqlQueryNum->set($energyType);
		$num = $this->execute($sqlQueryNum);
		return $num[0][0];
	}
	//获得项目的数量 按能耗和项目分类
	public function getNumByEnergyTypeAndProjectId($energyType,$stationId){
		$sql_temp = '';
		$sql_arr = array();
		for($i=0;$i<count($stationId);$i++){
			$_id = $stationId[$i];
			array_push($sql_arr,'station_id='.$_id);
		}
		$sql_temp = implode(' OR ',$sql_arr);
		$sql_num = 'SELECT count(*) FROM power_base_station_energy_info WHERE energy_type = ? AND ('.$sql_temp.')';
		$sqlQueryNum = new SqlQuery($sql_num);
		$sqlQueryNum->set($energyType);
		$num = $this->execute($sqlQueryNum);
		return $num[0][0];
	}
	
	
	public function search($start,$end,$sql){
		$sql = 'SELECT * FROM power_base_station WHERE '.$sql.' limit '.$start.','.$end;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getByProjectId($projectId){
		$sql = 'SELECT * FROM power_base_station WHERE project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($projectId);
		return $this->getList($sqlQuery);
	}
	
}
?>