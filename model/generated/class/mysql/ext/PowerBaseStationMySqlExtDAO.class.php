<?php
/**
 * Class that operate on table 'power_base_station'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerBaseStationMySqlExtDAO extends PowerBaseStationMySqlDAO{
	//更新基站的状态
	public function updateStatus($stationId,$status){
		$sql = 'UPDATE power_base_station SET status = ? WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($status);
		$sqlQuery->setNumber($stationId);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function queryAndPage($start,$pagesize){
		$sql = 'SELECT * FROM power_base_station WHERE status=0 limit '.$start.','.$pagesize;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function get_count(){
		$sql = 'SELECT COUNT(*) FROM power_base_station WHERE status=0';
		$sqlQuery = new SqlQuery($sql);
		$num = $this->execute($sqlQuery);
		return $num[0][0];
	}
	
	public function get_count_by_projectId($project_id){
		$sql = 'SELECT COUNT(*) FROM power_base_station WHERE project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($project_id);
		$num = $this->execute($sqlQuery);
		return $num[0][0];
	}
		
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
	
	public function getNumByEnergyTypeAndBuildType($energyType,$buildingType){
		$sql_num = 'SELECT count(*) FROM power_base_station_energy_info WHERE energy_type = ? AND building_type = ?';
		$sqlQueryNum = new SqlQuery($sql_num);
		$sqlQueryNum->set($energyType);
		$sqlQueryNum->set($buildingType);
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
	
	//获得项目的数量 按能耗和项目分类
	public function getNumByEnergyTypeAndProjectIdAndBuildingType($energyType,$stationId,$buildingType){
		$sql_temp = '';
		$sql_arr = array();
		for($i=0;$i<count($stationId);$i++){
			$_id = $stationId[$i];
			array_push($sql_arr,'station_id='.$_id);
		}
		$sql_temp = implode(' OR ',$sql_arr);
		$sql_num = 'SELECT count(*) FROM power_base_station_energy_info WHERE energy_type = ? AND building_type = ? AND ('.$sql_temp.')';
		$sqlQueryNum = new SqlQuery($sql_num);
		$sqlQueryNum->set($energyType);
		$sqlQueryNum->set($buildingType);
		$num = $this->execute($sqlQueryNum);
		return $num[0][0];
	}
	
	
	public function search($start,$end,$sql){
		$sql = 'SELECT * FROM power_base_station WHERE status=0 AND '.$sql.' limit '.$start.','.$end;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getByProjectId($projectId){
		$sql = 'SELECT * FROM power_base_station WHERE project_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($projectId);
		return $this->getList($sqlQuery);
	}
	
	//检查是否有重复基站
	public function checkExist($stationName,$stationSeriseCode,$stationType){
		$sql = 'SELECT * FROM power_base_station WHERE station_name = ? AND station_serise_code = ? AND station_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($stationName);
		$sqlQuery->set($stationSeriseCode);
		$sqlQuery->set($stationType);
		return $this->getList($sqlQuery);
	}
	
	//获得前一个基站
	public function getNextStation($stationId){
		$sql = 'SELECT * FROM power_base_station WHERE station_id = (select station_id from power_base_station WHERE station_id > ? order by station_id ASC limit 1)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($stationId);
		return $this->getRow($sqlQuery);
	}
	
	//获得后一个基站
	public function getPrevStation($stationId){
		$sql = 'SELECT * FROM power_base_station WHERE station_id = (select station_id from power_base_station WHERE station_id < ? order by station_id DESC limit 1)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($stationId);
		return $this->getRow($sqlQuery);
	}
	
	//删除一个基站
	public function delStation($stationId){
		$sql = 'UPDATE power_base_station SET status = ? WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber(1);
		$sqlQuery->setNumber($stationId);
		return $this->executeUpdate($sqlQuery);
	}
	
	
}
?>