<?php
/**
 * Class that operate on table 'power_base_station_energy_info'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerBaseStationEnergyInfoMySqlExtDAO extends PowerBaseStationEnergyInfoMySqlDAO{
	public function updateEnergyInfo($powerBaseStationEnergyInfo){
		$sql = 'UPDATE power_base_station_energy_info SET price = ?, ammeter_num = ?, ammeter_num_chinamobile = ?, fee_type = ?, power_supply_type = ?, overload = ?, overload_normal = ?, sim_num = ?, esg_num = ?, ecu_num = ?, power_base_station_energy_infocol = ?, building_type = ?, ration = ?, energy_type = ? WHERE station_id = ?';
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
		$sqlQuery->set($powerBaseStationEnergyInfo->buildingType);
		$sqlQuery->set($powerBaseStationEnergyInfo->ration);
		$sqlQuery->set($powerBaseStationEnergyInfo->energyType);
		
		$sqlQuery->setNumber($powerBaseStationEnergyInfo->stationId);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function queryByStationIdAndEnergyTypeAndBuildingType($stationId,$energyType,$buildingType){
		if($buildingType==-1){
			$sql = 'SELECT * FROM power_base_station_energy_info WHERE station_id = ? AND energy_type = ?';
			$sqlQuery = new SqlQuery($sql);
			$sqlQuery->setNumber($stationId);
			$sqlQuery->setNumber($energyType);
		}else{
			//只查询建筑类型
			if($energyType == 0){
				$sql = 'SELECT * FROM power_base_station_energy_info WHERE station_id = ? AND building_type = ?';
				$sqlQuery = new SqlQuery($sql);
				$sqlQuery->setNumber($stationId);
				$sqlQuery->setNumber($buildingType);
			}else{
			//查询建筑和能耗类型
				$sql = 'SELECT * FROM power_base_station_energy_info WHERE station_id = ? AND energy_type = ? AND building_type = ?';
				$sqlQuery = new SqlQuery($sql);
				$sqlQuery->setNumber($stationId);
				$sqlQuery->setNumber($energyType);
				$sqlQuery->setNumber($buildingType);
			}
		}
		return $this->getList($sqlQuery);
	}
	
}
?>