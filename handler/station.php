<?php	
	class StationHandler {
		public static function get_list($start,$end){
			$dao =  new PowerBaseStationMySqlDAO();
			$exsit = $dao->queryAndPage($start,$end);
			return $exsit;
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
		$stationLng){
		
			$dao_station =  new PowerBaseStationMySqlDAO();
			$current_time = time();
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
			$station->createTime = $current_time;
			$station->creatorId = $_COOKIE['user_id'];
			$station->status = 0;
			$station_id = $dao_station->insert($station);
			
			//插入站点的设备信息和节能信息
			if($station_id){
				$dao_station_device_info =  new PowerBaseStationDeviceInfoMySqlDAO();
				$dao_station_energy_info =  new PowerBaseStationEnergyInfoMySqlDAO();
				$station_device_info = new PowerBaseStationDeviceInfo();
				$station_energy_info = new PowerBaseStationEnergyInfo();
				
				$dao_station_device_info->insert($station_device_info);
				$dao_station_energy_info->insert($station_energy_info);
			}
		}
		
		public static function update($stationId,$status){
			$dao_station =  new PowerBaseStationMySqlDAO();
			$dao_station->updateStatus($stationId,$status);
		}
		
		public static function remove(){
			
		}
	}
?>