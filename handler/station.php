<?php
	class StationHandler {
		public static function get_list($start,$end){
			$dao =  new PowerBaseStationMySqlDAO();
			$exsit = $dao->queryAndPage($start,$end);
			if($exsit){
				for($i=0;$i<count($exsit);$i++){
					$temp = $exsit[$i];
					$stationProvince = $temp -> stationProvince;
					$stationCity = $temp -> stationCity;
					$stationDistirct = $temp -> stationDistirct;
					$cityName = AddressHandler::get_city_info($stationProvince,$stationCity);
					$exsit[$i] -> cityName = $cityName->name;
					
					$distirctName = AddressHandler::get_district_info($stationProvince,$stationCity,$stationDistirct );
					$exsit[$i] -> distirctName = $distirctName->name;
			
				}
			}
			
			return $exsit;
		}
		
		public static function get_one_detail($stationId,$editMode=false){
			global $STATION_TYPE;
			global $POWER_SUPPLY_TYPE;
			global $FEE_TYPE;
			global $BUILDING_TYPE;
			
			$res = array();
			$dao =  new PowerBaseStationMySqlDAO();
			$dao_project = new ProwerProjectMySqlDAO();
			$station_base_info = $dao->load($stationId);
			$station_base_info->stationType = $STATION_TYPE[$station_base_info->stationType];
			
			//获得项目名称
			$project_id = $station_base_info->projectId;
			$project = $dao_project->load($project_id);
			$station_base_info->projectName = $project->projectName;
			
			//时间转换
			$station_base_info->displayDate = date('Y-m-d H:i:s',$station_base_info->createTime);
		
			
			$station_base_info->stationProvinceName = AddressHandler::get_province_info($station_base_info->stationProvince);
			$station_base_info->stationProvinceName = $station_base_info->stationProvinceName->name;
			
			$station_base_info->stationCityName = AddressHandler::get_city_info($station_base_info->stationProvince,$station_base_info->stationCity);
			$station_base_info->stationCityName = $station_base_info->stationCityName->name;
			
			$station_base_info->stationDistirctName = AddressHandler::get_district_info($station_base_info->stationProvince,$station_base_info->stationCity,$station_base_info->stationDistirct);
			$station_base_info->stationDistirctName = $station_base_info->stationDistirctName->name;
			
			//获得站点的设备信息
			$dao =  new PowerBaseStationDeviceInfoMySqlDAO();
			$station_device_info = $dao->load($stationId);
			
			//获得站点的能耗信息
			$dao =  new PowerBaseStationEnergyInfoMySqlDAO();
			$station_energy_info = $dao->load($stationId);

			$station_energy_info->powerSupplyTypeName = $POWER_SUPPLY_TYPE[$station_energy_info->powerSupplyType];
			$station_energy_info->feeTypeName = $POWER_SUPPLY_TYPE[$station_energy_info->feeType];
			$station_energy_info->buildingTypeName = $BUILDING_TYPE[$station_energy_info->buildingType];
			
			if($editMode){
				$project_list = ProjectHandler::get_list();
				$province_list = AddressHandler::get_province_list();
			}
			return array(
				'info'=>$station_base_info,
				'device'=>$station_device_info,
				'energy'=>$station_energy_info,
				'project_list'=>$project_list,
				'province_list'=>$province_list,
				
			);
		}
		
		public static function add(
		$stationName,
		$stationSeriseCode,
		$stationType,
		$stationProject,
		$stationProvince,
		$stationCity,
		$stationDistirct,
		$stationAddress,
		$stationLat,
		$stationLng,
		$projectId = 0,
		$createTime = 0,
		$airConditionNum = 0,
		$tempatureOutside,
		$tempatureInside,
		$fanOutType,
		$fanInType,
		$cabinetNum,
		$batteryType,
		$batteryAirType,
		$price,
		$ammeterNum,
		$ammeterNumChinamobile,
		$feeType,
		$powerSupplyType,
		$overload,
		$overloadNormal,
		$simNum,
		$esgNum,
		$ecuNum,
		$powerBaseStationEnergyInfocol,
		$buildingType,
		$ration,
		$energyType,
		$airConditionTempature){
			if($creatTime == 0){
				$creatTime = time();
			}
			$dao_station =  new PowerBaseStationMySqlDAO();	
			$station = new PowerBaseStation();
			$station->stationName = $stationName;
			$station->stationSeriseCode = $stationSeriseCode;
			$station->stationType = $stationType;
			$station->stationProject = $stationProject;
			$station->stationProvince = $stationProvince;
			$station->stationCity = $stationCity;
			$station->stationDistirct = $stationDistirct;
			$station->stationAddress = $stationAddress;
			$station->stationLat = $stationLat;
			$station->stationLng = $stationLng;
			$station->createTime = $createTime;
			$station->creatorId = $_COOKIE['user_id'];
			$station->status = 0;
			$station->projectId = $projectId;
			$station_id = $dao_station->insert($station);
			
			//插入站点的设备信息和节能信息
			if($station_id){
				$dao_station_device_info =  new PowerBaseStationDeviceInfoMySqlDAO();
				$dao_station_energy_info =  new PowerBaseStationEnergyInfoMySqlDAO();
				$station_device_info = new PowerBaseStationDeviceInfo();
				$station_device_info->stationId = $station_id;
				$station_device_info->airConditionNum = $airConditionNum;
				$station_device_info->tempatureOutside = $tempatureOutside;
				$station_device_info->tempatureInside = $tempatureInside;
				$station_device_info->fanOutType = $fanOutType;
				$station_device_info->fanInType = $fanInType;
				$station_device_info->cabinetNum = $cabinetNum;
				$station_device_info->batteryType = $batteryType;
				$station_device_info->batteryAirType = $batteryAirType;
				$station_device_info->airConditionTempature = $airConditionTempature;
				$dao_station_device_info->insert($station_device_info);
				
				$station_energy_info = new PowerBaseStationEnergyInfo();
				$station_energy_info->price = $price;
				$station_energy_info->ammeterNum = $ammeterNum;
				$station_energy_info->ammeterNumChinamobile = $ammeterNumChinamobile;
				$station_energy_info->feeType = $feeType;
				$station_energy_info->powerSupplyType = $powerSupplyType;
				$station_energy_info->overload = $overload;
				$station_energy_info->overloadNormal = $overloadNormal;
				$station_energy_info->simNum = $simNum;
				$station_energy_info->esgNum = $esgNum;
				$station_energy_info->ecuNum = $ecuNum;
				$station_energy_info->powerBaseStationEnergyInfocol = $powerBaseStationEnergyInfocol;
				$station_energy_info->stationId = $station_id;
				$station_energy_info->buildingType = $buildingType;
				$station_energy_info->ration = $ration;
				$station_energy_info->energyType = $energyType;
				$dao_station_energy_info->insert($station_energy_info);
			}
		}
		
		public static function update(
		$stationId,
		$stationProject,
		$stationProvince,
		$stationCity,
		$stationDistirct,
		$stationAddress,
		$stationLat,
		$stationLng,
		$projectId = 0,
		$createTime = 0,
		$airConditionNum = 0,
		$tempatureOutside,
		$tempatureInside,
		$fanOutType,
		$fanInType,
		$cabinetNum,
		$batteryType,
		$batteryAirType,
		$price,
		$ammeterNum,
		$ammeterNumChinamobile,
		$feeType,
		$powerSupplyType,
		$overload,
		$overloadNormal,
		$simNum,
		$esgNum,
		$ecuNum,
		$powerBaseStationEnergyInfocol,
		$buildingType,
		$ration,
		$energyType,
		$airConditionTempature){
			if($creatTime == 0){
				$creatTime = time();
			}
			$dao_station =  new PowerBaseStationMySqlExtDAO();	
			$station = new PowerBaseStation();
			$station->stationProject = $stationProject;
			$station->stationProvince = $stationProvince;
			$station->stationCity = $stationCity;
			$station->stationDistirct = $stationDistirct;
			$station->stationAddress = $stationAddress;
			$station->stationLat = $stationLat;
			$station->stationLng = $stationLng;
			$station->createTime = $createTime;
			$station->creatorId = $_COOKIE['user_id'];
			$station->status = 0;
			$station->projectId = $projectId;
			$station->stationId = $stationId;
			$dao_station->updateStationInfo($station);
			
			//插入站点的设备信息和节能信息
			//if($station_id){
				$dao_station_device_info =  new PowerBaseStationDeviceInfoMySqlExtDAO();
				$dao_station_energy_info =  new PowerBaseStationEnergyInfoMySqlExtDAO();
				
				//设备信息更新
				$station_device_info = new PowerBaseStationDeviceInfo();
				$station_device_info->stationId = $stationId;
				$station_device_info->airConditionNum = $airConditionNum;
				$station_device_info->tempatureOutside = $tempatureOutside;
				$station_device_info->tempatureInside = $tempatureInside;
				$station_device_info->fanOutType = $fanOutType;
				$station_device_info->fanInType = $fanInType;
				$station_device_info->cabinetNum = $cabinetNum;
				$station_device_info->batteryType = $batteryType;
				$station_device_info->batteryAirType = $batteryAirType;
				$station_device_info->airConditionTempature = $airConditionTempature;
				$dao_station_device_info->updateDeviceInfo($station_device_info);
				
				//能耗信息更新
				$station_energy_info = new PowerBaseStationEnergyInfo();
				$station_energy_info->price = $price;
				$station_energy_info->ammeterNum = $ammeterNum;
				$station_energy_info->ammeterNumChinamobile = $ammeterNumChinamobile;
				$station_energy_info->feeType = $feeType;
				$station_energy_info->powerSupplyType = $powerSupplyType;
				$station_energy_info->overload = $overload;
				$station_energy_info->overloadNormal = $overloadNormal;
				$station_energy_info->simNum = $simNum;
				$station_energy_info->esgNum = $esgNum;
				$station_energy_info->ecuNum = $ecuNum;
				$station_energy_info->powerBaseStationEnergyInfocol = $powerBaseStationEnergyInfocol;
				$station_energy_info->stationId = $stationId;
				$station_energy_info->buildingType = $buildingType;
				$station_energy_info->ration = $ration;
				$station_energy_info->energyType = $energyType;
				$dao_station_energy_info->updateEnergyInfo($station_energy_info);
			//}
		}
		
		public static function updateStatus($stationId,$status){
			$dao_station =  new PowerBaseStationMySqlDAO();
			$dao_station->updateStatus($stationId,$status);
		}
		
		public static function remove(){
			
		}
	}
?>