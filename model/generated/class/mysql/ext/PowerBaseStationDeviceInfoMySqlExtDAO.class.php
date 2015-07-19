<?php
/**
 * Class that operate on table 'power_base_station_device_info'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerBaseStationDeviceInfoMySqlExtDAO extends PowerBaseStationDeviceInfoMySqlDAO{
	public function updateDeviceInfo($powerBaseStationDeviceInfo){
		$sql = 'UPDATE power_base_station_device_info SET air_condition_num = ?, tempature_outside = ?, tempature_inside = ?, fan_out_type = ?, fan_in_type = ?, cabinet_num = ?, battery_type = ?, battery_air_type = ?,air_condition_tempature = ? WHERE station_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->airConditionNum);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->tempatureOutside);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->tempatureInside);
		$sqlQuery->set($powerBaseStationDeviceInfo->fanOutType);
		$sqlQuery->set($powerBaseStationDeviceInfo->fanInType);
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->cabinetNum);
		$sqlQuery->set($powerBaseStationDeviceInfo->batteryType);
		$sqlQuery->set($powerBaseStationDeviceInfo->batteryAirType);
		$sqlQuery->set($powerBaseStationDeviceInfo->airConditionTempature);
		
		$sqlQuery->setNumber($powerBaseStationDeviceInfo->stationId);

		return $this->executeUpdate($sqlQuery);
	}
	
}
?>