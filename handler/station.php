<?php
	class StationHandler {
		public static function get_index_station_num_by_accountid(){
			$accountId = $_COOKIE['user_id'];
			$projects = AccountHandler::get_user_project($accountId);
		}
		
		//根据用户的权限，获得首页的基站数量信息
		public static function get_index_station_num($buildingType=1){
			global $ENERGY_TYPE;
			$dao = new PowerBaseStationMySqlExtDAO();
			$res = array();
			
			$accountId = $_COOKIE['user_id'];
			$projects = AccountHandler::get_user_project($accountId);
			$owner_projects = count($projects);
			
			//有项目的情况
			if($owner_projects){
				for($k=0;$k<$owner_projects;$k++){
					
					//统计每个项目下面得基站数量
					$projectId = $projects[$k]->projectId;
					$temp = array();
					if($projectId){
						
						foreach($ENERGY_TYPE as $key => $value){
							if($projectId){
								$stations = $dao->getByProjectId($projectId);
								$station_num = count($stations);
								$stationId = array();
								for($i=0;$i<$station_num;$i++){
									array_push($stationId,$stations[$i]->stationId);
								}
								
								if(count($stationId)){
									$num = $dao->getNumByEnergyTypeAndProjectIdAndBuildingType($key,$stationId,$buildingType);
								}else{
									$num = 0;
								}
							}else{
								$num = $dao->getNumByEnergyTypeAndBuildType($key,$buildingType);
							}
							
							array_push($temp,$num);
						}
					}
					array_push($res,$temp);
				}
				$ret = array();
				$total = 0;
				for($k=0;$k<count($res);$k++){
					if(count($res[$k])){
						$_temp = $res[$k];
						for($i=0;$i<count($_temp);$i++){
							if($ret[$i] == null){
								$ret[$i] = 0;
							}
							$ret[$i] += $_temp[$i];
							$total = $total + $_temp[$i];
						}
					}
				}
				array_push($ret,$total);
			} else {
				//没有项目 全部为0
				$ret = array();
				$index = 0;
				foreach($ENERGY_TYPE as $key => $value){
					$ret[$index] = 0;
					$index ++;
				}
				array_push($ret,0);
			}
			
			
			return $ret;
		}
		
		//基站首页获得基站的列表
		public static function get_list($start,$end){			
			$dao =  new PowerBaseStationMySqlDAO();
			$exsit = $dao->queryAndPage($start,$end);
			$exsit = StationHandler::_get_list_extend_info($exsit);
			return $exsit;
		}
		
		//获得基站的扩展信息
		public static function _get_list_extend_info($data){
			global $ENERGY_TYPE;
			global $BUILDING_TYPE;
			if($data){
				for($i=0;$i<count($data);$i++){
					$temp = $data[$i];
					$stationProvince = $temp -> stationProvince;
					$stationCity = $temp -> stationCity;
					$stationDistirct = $temp -> stationDistirct;
					$cityName = AddressHandler::get_city_info($stationProvince,$stationCity);
					$data[$i] -> cityName = $cityName->name;
					
					$distirctName = AddressHandler::get_district_info($stationProvince,$stationCity,$stationDistirct );
					$data[$i] -> distirctName = $distirctName->name;
					
					$stationId = $temp -> stationId;
					
					$energy_dao =  new PowerBaseStationEnergyInfoMySqlDAO();
					$station_energy_info = $energy_dao->queryByStationId($stationId)[0];
					$data[$i] -> energyTypeName = $ENERGY_TYPE[$station_energy_info->energyType];
					if(!$data[$i] -> energyTypeName){
						$data[$i] -> energyTypeName = NULL_VAL_DISPLAY;
					}
					
					$data[$i] -> buildTypeName = $BUILDING_TYPE[$station_energy_info->buildingType];
					
					if(!$data[$i] -> buildTypeName){
						$data[$i] -> buildTypeName = NULL_VAL_DISPLAY;
					}
				}
				return $data;
			}
		}
		
		//获得基站的详细数据
		public static function get_one_detail($stationId,$editMode=false){
			global $STATION_TYPE;
			global $POWER_SUPPLY_TYPE;
			global $FEE_TYPE;
			global $BUILDING_TYPE;
			global $ENERGY_TYPE;
			
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
			$station_device_info = $dao->queryByStationId($stationId)[0];
			//var_dump($station_device_info); 
			//获得站点的能耗信息
			$dao =  new PowerBaseStationEnergyInfoMySqlDAO();
			$station_energy_info = $dao->queryByStationId($stationId)[0];
			//var_dump($station_energy_info->powerSupplyType);
			if($station_energy_info->powerSupplyType){
				$station_energy_info->powerSupplyTypeName = $POWER_SUPPLY_TYPE[$station_energy_info->powerSupplyType];
			}
			if($station_energy_info->feeType){
				$station_energy_info->feeTypeName = $POWER_SUPPLY_TYPE[$station_energy_info->feeType];
			}
			if($station_energy_info->buildingType){
				$station_energy_info->buildingTypeName = $BUILDING_TYPE[$station_energy_info->buildingType];
			}
			if($station_energy_info->energyType){
				$station_energy_info->energyTypeName = $ENERGY_TYPE[$station_energy_info->energyType];
			}
			$stationPrevId = intval($stationId) - 1;
			$stationNextId = intval($stationId) + 1;
			if($stationPrevId < 1){
			   $stationPrevId = -1;
			}
			if($editMode){
				$project_list = ProjectHandler::get_list();
				$province_list = AddressHandler::get_province_list();
			}
			return array(
				'next_id' =>$stationNextId,
				'prev_id' =>$stationPrevId,
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
			$dao_station =  new PowerBaseStationMySqlExtDAO();	
			$exsit = $dao_station->checkExist($stationName,$stationSeriseCode,$stationType);
			if($exsit){
				return false;
			}
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
				return true;
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
		
		//更新基站的活动状态
		public static function updateStatus($stationId,$status){
			$dao_station =  new PowerBaseStationMySqlDAO();
			$dao_station->updateStatus($stationId,$status);
		}
		
		//按条件查询
		public static function query($start,$end,$query_option = array(),$overload=0){
			$sql = '';
			$sql_arr = array();
			foreach($query_option as $key=>$value){
				if($value){
					array_push($sql_arr,$key.'="'.$value.'"');
				}
			}
			
			if(count($sql_arr) || $overload){
				$sql = implode(' AND ',$sql_arr);
				$dao_station =  new PowerBaseStationMySqlExtDAO();
				
				//过滤查询条件
				if(count($sql_arr)){
					$res = $dao_station->search($start,$end,$sql);
					$res = StationHandler::_get_list_extend_info($res);
				} else {
					$res = StationHandler::get_list($start,$end);
				}
				
				//选择要过滤负载的
				if($overload) {
				   $dao_station_energy_info =  new PowerBaseStationEnergyInfoMySqlExtDAO();
				   $ret = array();
				   for($i=0;$i<count($res);$i++){
					 $_d = $res[$i];
					 $station_id = $_d->stationId;
					 $_temp = $dao_station_energy_info -> queryByStationIdAndEnergyType($station_id,$overload);
					 if($_temp){
						array_push($ret,$_d);
					 }
				   }
				   return $ret;
				}
			} else {
				//无条件查询
				$res = StationHandler::get_list($start,$end);
			}
			return $res;
		}
		
		//从ECU同步的数据中获得基站的最新信息
		public static function get_current_status($stationId=1){
			$dao =  new PowerBaseStationRuningDataMySqlExtDAO();
			$data = $dao->get_current_status($stationId);
			return $data;
		}
		
		//从ECU同步的数据中获得基站的最新信息
		public static function get_full_day_status($stationId=1){
			$ret = array(
				'power_all' => array(),
				'power_dc' => array(),
				'temp_inside' => array(),
				'temp_outside' => array(),
				'temp_cabint' => array(),
				'temp_air_1' => array(),
				'temp_air_2' => array(),
				'temp_air_1_status'=>array(),
				'temp_air_2_status'=>array(),
				'temp_fan_status'=>array(),
				'time' => array(),
				
			);
			$dao =  new PowerBaseStationRuningDataMySqlExtDAO();
			$data = $dao->get_full_day_status($stationId);
			for($i=0;$i<count($data);$i++){
				$d = $data[$i];
				array_push($ret['power_all'],$d->powerAll);
				array_push($ret['power_dc'],$d->powerDc);
				array_push($ret['temp_inside'],$d->temperatureInside);
				array_push($ret['temp_outside'],$d->temperatureOutside);
				array_push($ret['temp_cabint'],$d->temperatureCabinet);
				array_push($ret['temp_air_1'],$d->temperatureAircondition1);
				array_push($ret['temp_air_2'],$d->temperatureAircondition2);
				array_push($ret['temp_air_1_status'],$d->deviceStatus1);
				array_push($ret['temp_air_2_status'],$d->deviceStatus2);
				array_push($ret['temp_fan_status'],$d->deviceStatusFan);
				array_push($ret['time'],$d->createTime);
			}
			return $ret;
		}
		
		//从ECU同步的数据中获得基站的最新信息 不同的是 这个方法不会强制拉1440条数据
		public static function get_one_day_status($stationId=1,$start_time=0){
			$ret = array(
				'power_all' => array(),
				'power_dc' => array(),
				'temp_inside' => array(),
				'temp_outside' => array(),
				'temp_cabint' => array(),
				'temp_air_1' => array(),
				'temp_air_2' => array(),
				'temp_air_1_status'=>array(),
				'temp_air_2_status'=>array(),
				'temp_fan_status'=>array(),
				'time' => array(),
				'current_date'=>strtotime(date("y-m-d",time())),
			);
			$dao =  new PowerBaseStationRuningDataMySqlExtDAO();

			if($start_time == 0){
				$start_time = date("y-m-d",time());
				$start_time = strtotime($start_time);
			}
			$end_time = $start_time + 24*60*60;
			$data = $dao->get_one_day_status($stationId,$start_time,$end_time);
			for($i=0;$i<count($data);$i++){
				$d = $data[$i];
				array_push($ret['power_all'],$d->powerAll);
				array_push($ret['power_dc'],$d->powerDc);
				array_push($ret['temp_inside'],$d->temperatureInside);
				array_push($ret['temp_outside'],$d->temperatureOutside);
				array_push($ret['temp_cabint'],$d->temperatureCabinet);
				array_push($ret['temp_air_1'],$d->temperatureAircondition1);
				array_push($ret['temp_air_2'],$d->temperatureAircondition2);
				array_push($ret['temp_air_1_status'],$d->deviceStatus1);
				array_push($ret['temp_air_2_status'],$d->deviceStatus2);
				array_push($ret['temp_fan_status'],$d->deviceStatusFan);
				array_push($ret['time'],$d->createTime);
			}
			return $ret;
		}
		
		//月报数据
		public static function get_one_month_status($stationId=1,$start_time=0){
			$dao =  new PowerBaseStationRuningDataMySqlExtDAO();
			$res = array();
			if($start_time == 0 || $start_time == NULL){
				$start_time = date("Y-m",time());
				$start_time = strtotime($start_time);
			}

			$end_time = $start_time + 24*60*60;
			//计算一天的数据效能
			$data = $dao->get_one_day_status($stationId,$start_time,$end_time);
			if($data){
				$start_data = $data[0];
				$end_data = $data[count($data) -  1];
				array_push($res,array(
					'energyAll'=>$end_data->energyAll - $start_data->energyAll,
					'energyDc'=>$end_data->energyDc - $start_data->energyDc,
					'powerAll'=>$end_data->powerAll - $start_data->powerAll,
					'powerDc'=>$end_data->energyAll - $start_data->powerDc,
					'energyAll'=>$end_data->energyAll - $start_data->energyAll,
					'energyAll'=>$end_data->energyAll - $start_data->energyAll,
					'start_time' =>$start_time,
				));
			}
			return $res;
		}
		
		
		//按照时间查看基站的原始数据
		public static function get_origin_data_by_time($stationId=1,$time){
			$dao =  new PowerBaseStationRuningDataMySqlExtDAO();
			$data = $dao->get_origin_data_by_time($stationId,$time);
			return $data;
		}
		
		//计算基站的实时告警情况
		public static function cal_warning_from_runing_data($stationId=1){
			//global $WARNING_TYPE;
			//告警类型
			$WARNING_TYPE = array(
				'STATION_OFFLINE'=>'断站',
				'INSIDE_HIGH_TMP'=>'室内高温',
				'CABINT_HIGH_TMP'=>'恒温柜高温',
				'AMATER_ERROR'=>'电表故障',
				'AC_ERROR'=>'功率异常',
				'REMOTE_CLOSE_STATION'=>'远程关站',
				'PROXY'=>'代理维护按钮',
				'AIR_CONDITION_ERROR'=>'空调故障',
				'TEMPATURE_ERROR'=>'温度感应故障',
			);
			$current_date = time();
			//先获得该基站的最新数据
			$dao =  new PowerBaseStationRuningDataMySqlExtDAO();
			$data = $dao->get_current_status($stationId);
			$ret = array();
			//var_dump($data);
			//室内高温
			if($data->temperatureInside > 38){
				$ret['INSIDE_HIGH_TMP'] = $WARNING_TYPE['INSIDE_HIGH_TMP'];
			}
			
			//基站断站
			if($current_date - $data->createTime > 300){
				$ret['STATION_OFFLINE'] = $WARNING_TYPE['STATION_OFFLINE'];
			}
			
			//恒温柜高温
			if($data->temperatureCabinet > 32){
				$ret['CABINT_HIGH_TMP'] = $WARNING_TYPE['CABINT_HIGH_TMP'];
			}
			
			//无总能耗／无DC能耗／总能耗小于DC
			//电表故障
			if(!$data->energyAll || !$data->energyDc || $data->energyAll < $data->energyDc){
				$ret['AMATER_ERROR'] = $WARNING_TYPE['AMATER_ERROR'];
			}
			//空调温度大于20度（开）
			if($data->temperatureAircondition1>20 || $data->temperatureAircondition2>20){
				$ret['AIR_CONDITION_ERROR'] = $WARNING_TYPE['AIR_CONDITION_ERROR'];
			}
			
			//温度感应故障
			if(!$data->temperatureInside || !$data->temperatureOutside){
				$ret['TEMPATURE_ERROR'] = $WARNING_TYPE['TEMPATURE_ERROR'];
			}

			return $ret;
		}
		
		public static function remove(){
			
		}
	}
?>