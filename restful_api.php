<?php
global $app;
global $response_body;
$request_body = $app->request->getBody();

//API返回码
define("RES_SUCCESS", 0); 
define("RES_ERROR", 1); 
define("RES_NEED_LOGIN", 2); 
define("RES_NO_AUTH", 3); 
define("RES_PARAM_ERROR", 4);
define("RES_PARAM_EMPTY", 5);
define("RES_PARAM_TYPE_ERROR", 6);
define("RES_ACCOUNT_EXIST", 10001); 
define("RES_ACCOUNT_PASSWORD_ERROR", 10002); 
define("RES_ACCOUNT_NOT_EXIST", 10003);

define("RES_USER_HAS_IN_PROJECT", 20001);  
define("RES_STATION_EXSIT", 30001);

//http接口返回
function restful_response($code,$data=array()) {
 echo json_encode(array(
	'code'=>$code,
	'data'=>$data,
 ));
 }

//参数合法性检测
function param_check($key,$method='post',$type='',$empty = false){
	global $app;
	if($method == 'post'){
		$val = $app->request->post($key);
	}else{
		$val = $app->request->get($key);
	}
	if(!$empty){
		if($val == '' || $val == NULL){
			restful_response(RES_PARAM_EMPTY,array('PARAM_EMPTY'=>$key));
			die();
			return;
		}
	}
	
	if($type == 'number'){
		if(!is_numeric($val)){
			restful_response(RES_PARAM_EMPTY,array('RES_PARAM_TYPE_ERROR'=>$key));
			die();
		}
	}
	return $val;
 }
 
 function param_check_get($key,$type='',$empty=false){
	return param_check($key,'get',$type,$empty);
 }
 
 function param_check_post($key,$type='',$empty=false){
	return param_check($key,'post',$type,$empty);
 }
 
 //API登陆身份验证
 function restful_api_auth(){
	$result = AccountHandler::is_login();
	if(!$result){
		restful_response(RES_NEED_LOGIN,array('RES_NEED_LOGIN'=>true));
		die();
	}
 }
 

 //增加账户
$app->post('/account/add', function () {
	restful_api_auth();
	$accountName = param_check('name');
    $accountPassword = param_check('password');
	$accountType = param_check('type');
    $result = AccountHandler::add($accountName,$accountPassword,$accountType);
	if($result){
	   restful_response(RES_SUCCESS,array('id'=>$result));
	}else{
	   restful_response(RES_ACCOUNT_EXIST);
	}
	
});

//彻底删除一个账户（危险慎用）
$app->post('/account/remove', function () {
	restful_api_auth();
	$accountId = param_check('user_id');
    $result = AccountHandler::remove($accountId);
	restful_response(RES_SUCCESS);
});


//更新账户信息
$app->post('/account/updateinfo', function () {
	$accountId = param_check('user_id');
	$accountType = param_check('type');
	$project_add_id = param_check('project_add_id','post','',true);
	$project_remove_id = param_check('project_remove_id','post','',true);
	if($project_add_id){
		$project_add_id = explode(',',$project_add_id);
	}
	
	if($project_remove_id){
		$project_remove_id = explode(',',$project_remove_id);
	}
	$accountId = intval($accountId);
	$accountType = intval($accountType);
	AccountHandler::updateUserInfo($accountId,$accountType,$project_add_id,$project_remove_id);
	restful_response(RES_SUCCESS);
});

//账户登录
$app->post('/account/signin', function () {
	$accountName = param_check('name');
    $accountPassword = param_check('password');
	$result = AccountHandler::sign_in($accountName,$accountPassword);
	global $app;
	$expire_time = time() + 7200;
	$app->setCookie('user_type', $result['data']->accoutType,$expire_time );
	$app->setCookie('user_id', $result['data']->accountId,$expire_time );
	$app->setCookie('user_name', $result['data']->accountName,$expire_time);
	$app->setCookie('pass_token', $result['pass_token'],$expire_time);
	
	if($result == 1){
		restful_response(RES_ACCOUNT_NOT_EXIST);
	}else if($result == 2){
		restful_response(RES_ACCOUNT_PASSWORD_ERROR);
	}else{
		restful_response(RES_SUCCESS);
	}
});

//是否登录判断
$app->get('/account/islogin', function () {
    $result = AccountHandler::is_login();
	if($result){
		restful_response(RES_SUCCESS,array('login'=>true));
	}else{
		restful_response(RES_NEED_LOGIN,array('login'=>false));
	}
});

//账户登出
$app->get('/account/logout', function () {
     global $app;
	 $use_id = $_COOKIE['user_id'];
	 $app->deleteCookie('user_name');
	 $app->deleteCookie('user_type');
	 $app->deleteCookie('user_id');
	 $app->deleteCookie('pass_token');
	 
	 session_start();
	 unset($_SESSION['user_login'.$use_id]);
	 restful_response(RES_SUCCESS);
});

//锁定账户
$app->post('/account/lock', function () {
	restful_api_auth();
	$accountName = param_check('name');
    AccountHandler::change_account_status(1,$accountName);
	restful_response(RES_SUCCESS);
});


//解锁账户
$app->post('/account/unlock', function () {
	restful_api_auth();
	$accountName = param_check('name');
    AccountHandler::change_account_status(0,$accountName);
	restful_response(RES_SUCCESS);
});


//获得注册账户列表
$app->get('/account/list', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
    $data = AccountHandler::get_list($start,$end);
	restful_response(RES_SUCCESS,$data);
});

//获得注册账户列表 同时获得这个用户所在的项目
$app->get('/account/list_with_project', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
    $data = AccountHandler::get_list_with_project($start,$end);
	restful_response(RES_SUCCESS,$data);
});

//给用户添加项目权限(单个项目)
$app->post('/account/addproject', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
    $res = AccountHandler::add_to_project($user_id,$project_id);
	if($res){
		restful_response(RES_SUCCESS);
	} else {
		restful_response(RES_USER_HAS_IN_PROJECT);
	}
});

//给用户添加项目权限（批量更新）
$app->post('/account/addproject_mass', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
	$project_arr = explode(',',$project_id);
	
	for($i=0;$i<count($project_arr);$i++){
	   AccountHandler::add_to_project($user_id,$project_arr[$i]);
	}
	restful_response(RES_SUCCESS);
});

//给用户的项目权限删除(单个项目)
$app->post('/account/removeproject', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
    $res = AccountHandler::remove_from_project($user_id,$project_id);
	if($res){
		restful_response(RES_SUCCESS);
	} else {
		restful_response(RES_USER_HAS_IN_PROJECT);
	}
});

//给用户的项目权限删除(批量更新)
$app->post('/account/removeproject_mass', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
	$project_arr = explode(',',$project_id);
	
	for($i=0;$i<count($project_arr);$i++){
	   AccountHandler::remove_from_project($user_id,$project_arr[$i]);
	}
	restful_response(RES_SUCCESS);
});




//获得用户的项目权限
$app->get('/account/getproject', function () {
	restful_api_auth();
	$user_id = param_check_get('user_id');
    $data = AccountHandler::get_user_project($user_id);
	restful_response(RES_SUCCESS,$data);
});



//ecu文件读取的测试接口
$app->get('/ecu/read', function () {
	//restful_api_auth();
	$result = ECUHandler::read();
	restful_response(RES_SUCCESS,$result);
});

//扫描上传ECU文件的目录
$app->get('/ecu/scan', function () {
	restful_api_auth();
	$result = ECUHandler::scan();
	restful_response(RES_SUCCESS,$result);
});

//扫描上传ECU文件的目录
$app->get('/ecu/write', function () {
	restful_api_auth();
	$result = ECUHandler::write();
	restful_response(RES_SUCCESS,$result);
});

//扫描上传ECU文件的目录
$app->get('/ecu/last', function () {
	restful_api_auth();
	$stationId = param_check_get('id');
	$result = ECUHandler::get_last_ecu($stationId);
	restful_response(RES_SUCCESS,$result);
});


//增加一个基站站点
$app->post('/station/add', function () {
	restful_api_auth();
	
	//基站基本信息
	$stationName = param_check('name');
	$stationSeriseCode = param_check('code');
	$stationType = param_check('type');
	$stationProject = param_check('project');
	$stationProjectId = param_check('project_id');
	$stationProvince = param_check('province');
	$stationCity = param_check('city');
	$stationDistirct = param_check('distirct');
	$stationAddress = param_check('address');
	$stationLat = param_check('lat');
	$stationLng = param_check('lng');
	$createTime = param_check('create_time','post','',true);
	
	//设备信息
	$airConditionNum = param_check('air_condition_num');
	$tempatureOutside = param_check('tempature_out_side');
	$tempatureInside = param_check('tempature_in_side');
	$fanOutType = param_check('fan_out_type');
	$fanInType = param_check('fan_in_type');
	$cabinetNum = param_check('cabinet_num');
	$batteryType = param_check('battery_type');
	$batteryAirType = 0;
	
	//能耗信息
	//电价
	$price = param_check('price');
	
	//我方电表号
	$ammeterNum = param_check('ammeter_num');
	
	//局方电表号
	$ammeterNumChinamobile = param_check('ammeter_num_chinamobile');
	
	//电价收费方
	$feeType = param_check('fee_type');
	
	//供电类型
	$powerSupplyType = param_check('power_supply_type');
	
	$overload = param_check('overload');
	$overloadNormal = 0;
	$simNum = param_check('sim_num');
	$esgNum = param_check('esg_num');
	$ecuNum = param_check('ecu_num');
	$powerBaseStationEnergyInfocol = 0;
	
	$buildingType = param_check('building_type');
	$ration = param_check('ration');
	$energyType = param_check('energy_type');
	
	//空调温感
	$airConditionTempature = param_check('air_condition_tempature');
	
	
	$result = StationHandler::add(
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
		$stationProjectId,
		$createTime,
		$airConditionNum,
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
		$airConditionTempature);
	if($result){
		restful_response(RES_SUCCESS);
	} else {
		restful_response(RES_STATION_EXSIT);
	}
});

//增加一个基站站点
$app->post('/station/update', function () {
	restful_api_auth();
	
	//基站基本信息
	$stationId = param_check('station_id');

	$stationProject = param_check('project');
	$stationProjectId = param_check('project_id');
	$stationProvince = param_check('province');
	$stationCity = param_check('city');
	$stationDistirct = param_check('distirct');
	$stationAddress = param_check('address');
	$stationLat = param_check('lat');
	$stationLng = param_check('lng');
	$createTime = param_check('create_time','post','',true);
	
	//设备信息
	$airConditionNum = param_check('air_condition_num');
	$tempatureOutside = param_check('tempature_out_side');
	$tempatureInside = param_check('tempature_in_side');
	$fanOutType = param_check('fan_out_type');
	$fanInType = param_check('fan_in_type');
	$cabinetNum = param_check('cabinet_num');
	$batteryType = param_check('battery_type');
	$batteryAirType = 0;
	
	//能耗信息
	//电价
	$price = param_check('price');
	
	//我方电表号
	$ammeterNum = param_check('ammeter_num');
	
	//局方电表号
	$ammeterNumChinamobile = param_check('ammeter_num_chinamobile');
	
	//电价收费方
	$feeType = param_check('fee_type');
	
	//供电类型
	$powerSupplyType = param_check('power_supply_type');
	
	$overload = param_check('overload');
	$overloadNormal = 0;
	$simNum = param_check('sim_num');
	$esgNum = param_check('esg_num');
	$ecuNum = param_check('ecu_num');
	$powerBaseStationEnergyInfocol = 0;
	
	$buildingType = param_check('building_type');
	$ration = param_check('ration');
	$energyType = param_check('energy_type');
	
	//空调温感
	$airConditionTempature = param_check('air_condition_tempature');
	
	$result = StationHandler::update(
		$stationId,
		$stationProject,
		$stationProvince,
		$stationCity,
		$stationDistirct,
		$stationAddress,
		$stationLat,
		$stationLng,
		$stationProjectId,
		$createTime,
		$airConditionNum,
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
		$airConditionTempature);
		
	restful_response(RES_SUCCESS);
});


//基站列表
$app->get('/station/list', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$pagesize = param_check_get('pagesize');
	$data = StationHandler::get_list($start,$pagesize,true);
	restful_response(RES_SUCCESS,$data);
});

//删除基站
$app->post('/station/online', function () {
	restful_api_auth();
	$stationId = param_check('id');
	StationHandler::update($stationId,0);
	restful_response(RES_SUCCESS);
});

//恢复基站
$app->post('/station/offline', function () {
	restful_api_auth();
	$stationId = param_check('id');
	StationHandler::update($stationId,1);
	restful_response(RES_SUCCESS);
});

//按条件检索基站
$app->get('/station/query', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
	$project = param_check_get('project','',true);
	$province = param_check_get('province','',true);
	$city = param_check_get('city','',true);
	$district = param_check_get('district','',true);
	$station_type = param_check_get('station_type','',true);
	$overload = param_check_get('overload','',true);
	$building_type = param_check_get('building_type','',true);
	$query_option = array(
		'project_id'=>$project,
		'station_province'=>$province,
		'station_city'=>$city,
		'station_distirct'=>$district,
		'station_type'=>$station_type
	);
		
	$data = StationHandler::query($start,$end,$query_option,$overload,$building_type);
	restful_response(RES_SUCCESS,$data);
});

//获得基站的数量,首页
$app->get('/station/num', function () {
	restful_api_auth();	
	$project_id = $_COOKIE['current_project_id'];
	$data = StationHandler::get_index_station_num($project_id);
	restful_response(RES_SUCCESS,$data);
});

//获得基站的数量,首页
$app->get('/station/status/:id', function ($id) use ($app) {
	restful_api_auth();
	$data = StationHandler::get_current_status($id);
	restful_response(RES_SUCCESS,$data);
});

//用最新一条数据计算出基站当前存在的告警
$app->get('/station/warning/:id', function ($id) use ($app) {
	restful_api_auth();
	$data = StationHandler::cal_warning_from_runing_data($id);
	restful_response(RES_SUCCESS,$data);
});

//获得基站的原始数据
$app->get('/station/origindata/:id', function ($id) use ($app) {
	restful_api_auth();
	//时间戳
	$time = param_check_get('time');
	$data = StationHandler::get_origin_data_by_time($id,$time);
	restful_response(RES_SUCCESS,$data);
});

//获得基站最新的数据
$app->get('/station/last/origindata/:id', function ($id) use ($app) {
	restful_api_auth();
	//时间戳
	$data = StationHandler::get_origin_data_by_time($id,-2);
	restful_response(RES_SUCCESS,$data);
});

//获得基站谋天的数据
$app->get('/station/oneday', function () use ($app) {
	global $Redis_client;
	restful_api_auth();
	//时间戳
	$time = param_check_get('time');
	$id = param_check_get('id');
	$time = intval($time);
	$cache_key = 'daliy_cache_'.$id.$time;
	if($Redis_client->get($cache_key)){
		$data = $Redis_client->get($cache_key);
		$data = json_decode($data);
		restful_response(RES_SUCCESS,$data);
	}else{
		$data = StationHandler::get_one_day_status($id,$time);
		if($data){
		   $Redis_client->set($cache_key,json_encode($data));
		}
		restful_response(RES_SUCCESS,$data);
	}
});

//获得基站月报的数据
$app->get('/station/onemonth', function () use ($app) {
	restful_api_auth();
	//时间戳
	$time = param_check_get('time');
	$id = param_check_get('id');
	$time = intval($time);
	$data = StationHandler::get_one_month_status($id,$time);
	restful_response(RES_SUCCESS,$data);
});

//生成一个月的月报数据
$app->get('/station/month/write', function () use ($app) {
	restful_api_auth();
	//时间戳
	$time = param_check_get('time');
	$id = param_check_get('id');
	$time = intval($time);
	$data = StationHandler::write_month_report($id,$time);
	restful_response(RES_SUCCESS,$data);
});

$app->get('/station/month/read', function () use ($app) {
	restful_api_auth();
	//时间戳
	$year = param_check_get('year');
	$month = param_check_get('month');
	$id = param_check_get('id');
	$time = intval($time);
	$data = StationHandler::read_month_report($id,$year,$month);
	restful_response(RES_SUCCESS,$data);
});

//获得基站月报的数据
$app->get('/station/onemonth/ration', function () use ($app) {
	restful_api_auth();
	//时间戳
	$time = param_check_get('time');
	$time = intval($time);
	$id = param_check_get('id');
	$data = StationHandler::get_one_month_ration($id,$time);
	restful_response(RES_SUCCESS,$data);
});

//获得基站月报的数据
$app->get('/station/getbyname', function () use ($app) {
	restful_api_auth();
	$name = param_check_get('name');
	$data = StationHandler::get_station_by_station_name($name);
	restful_response(RES_SUCCESS,$data);
});

//获得基站月报的数据
$app->post('/station/delete', function () use ($app) {
	restful_api_auth();
	$id = param_check('id');
	$data = StationHandler::del_station($id);
	restful_response(RES_SUCCESS,$data);
});

//获得告警的数据
$app->get('/warning/list', function () use ($app) {
	restful_api_auth();
	$page = param_check_get('page');
	$pagesize = param_check_get('pagesize');
	$data = WarningHandler::get_list(-1,$page,$pagesize);
	restful_response(RES_SUCCESS,$data);
});

//按条件检索告警
$app->get('/warning/query', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$pagesize = param_check_get('pagesize');
	$create_time = param_check_get('create_time','',true);
	$warning_status = param_check_get('warning_status','',true);
	$warning_type = param_check_get('warning_type','',true);
	$query_option = array(
		'warning_status'=>$warning_status,
		'warning_type'=>$warning_type
	);
	$data = WarningHandler::query($start,$pagesize,$query_option,$create_time);
	restful_response(RES_SUCCESS,$data);
});

//按条件检索告警
$app->get('/warning/test', function () {
	restful_api_auth();
	$type = 8;
	$id = 209;
	$data = StationHandler::warning_test($id,$type);
	restful_response(RES_SUCCESS,$data);
});

//新建项目
$app->post('/project/add', function () {
	restful_api_auth();
	$name = param_check('name');
	ProjectHandler::add($name);
	restful_response(RES_SUCCESS);
});

//项目列表
$app->get('/project/list', function () {
	restful_api_auth();
	$data = ProjectHandler::get_list();
	restful_response(RES_SUCCESS,$data);
});

//删除项目
$app->post('/project/remove', function () {
	restful_api_auth();
	$id = param_check('id');
	ProjectHandler::remove($id);
	restful_response(RES_SUCCESS);
});

//获得所有的城市数据
$app->get('/city/all', function () {
	 $data = file_get_contents('./data/city.json');
	 $data = json_decode($data);
     restful_response(RES_SUCCESS,$data);
});

//获得所有的省数据
$app->get('/address/province', function () {
	$data = file_get_contents(ADDRESS_DATA_PATH);
	$data = json_decode($data);
	$res = array();
	for($i=0;$i<count($data);$i++){
		array_push($res,array(
			'name'=>$data[$i]->region->name,
			'code'=>$data[$i]->region->code,
		));
	}
	restful_response(RES_SUCCESS,$res);
});

//获得所有的市数据
$app->get('/address/city', function () {
	$province = param_check_get('province');
	$data = file_get_contents(ADDRESS_DATA_PATH);
	$data = json_decode($data);
	$res = array();
	for($i=0;$i<count($data);$i++){
		if($data[$i]->region->code == $province){
			$res = $data[$i]->region->state;
			restful_response(RES_SUCCESS,$res);
		}
	}
});

//获得所有的区数据
$app->get('/address/district', function () {
	$province = param_check_get('province');
	$city = param_check_get('city');
	$data = file_get_contents(ADDRESS_DATA_PATH);
	$data = json_decode($data);
	$res = array();
	for($i=0;$i<count($data);$i++){
		if($data[$i]->region->code == $province){
			$_data = $data[$i]->region->state;
			for($j=0;$j<count($_data);$j++){
				if($_data[$j]->code == $city){
					restful_response(RES_SUCCESS,$_data[$j]->city);
				}
			}
		}
	}
});

$app->get('/remote/get', function () {
	$id = param_check_get('id');
	$ip = "192.168.88.133";
	$name = "redwoodsh";
	$res = snmpget($ip,$name, "1.3.6.1.4.1.682.1.".$id.".0");
	restful_response(RES_SUCCESS,$res);
});

//设置配置ID
$app->get('/remote/set/id', function () {
	//CUSHSHPD100640
	$id = param_check_get('id');
	$ip = "192.168.88.133";
	$name = "redwoodsh";
	$res = snmpset($ip,$name, "1.3.6.1.4.1.682.1.2","string",$id,3,1);
});

//设置修改节能状态
$app->get('/remote/set/savestatus', function () {
	$status = param_check_get('status');
	$ip = "192.168.88.133";
	$name = "redwoodsh";
	$res = snmpset($ip,$name, "1.3.6.1.4.1.682.1.14","string",$status,3,1);
});

//设置电源开关
$app->get('/remote/set/engerystatus', function () {
	$status = param_check_get('status');
	$ip = "192.168.88.133";
	$name = "redwoodsh";
	$res = snmpset($ip,$name, "1.3.6.1.4.1.682.1.4","string",$status,3,1);
});

$app->get('/remote/walk', function () {
	$id = param_check_get('id');
	$ip = "192.168.88.133";
	$name = "redwoodsh";
	$res = snmpwalk($ip,$name, "1.3.6.1.4.1.682.1.".$id);
	restful_response(RES_SUCCESS,$res);
});
 
 
//显示天气
$app->get('/weather/show', function () {
     global $app;
     $result=WeatherHandler::show();
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});

//插入天气
$app->post('/weather/add', function () {
     global $app;
     $result = WeatherHandler::add_weather();
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
});

$app->get('/weather/baidu/get', function () {
     global $app;
     $result = WeatherHandler::get_weather_baidu('上海');
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
});

$app->get('/weather/month/get', function () {
     global $app;
	 $province = param_check_get('province');
     $city = param_check_get('city');
	 $startMonth = param_check_get('time');
     $result = WeatherHandler::get_weather_by_month($startMonth,$province,$city);
     restful_response(RES_SUCCESS,$result);
});


//日志列表
$app->get('/log/list', function () {
    global $app;
    $start = param_check_get('start');
    $end = param_check_get('end');
    $result=LogHandler::show_log($start, $end);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
//显示操作者
$app->get('/log/operater', function () {
    global $app;
    $result=LogHandler::get_operater();
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
//查询日志
$app->post('/log/list', function () {
    global $app;
    $createTime=param_check('createTime','post','',True);
    $logType=param_check('logType','post','',True);
    $creatorId=param_check('operaterId','post','',True);
    $start = param_check('start','post','',True);
     $end = param_check('end','post','',True);
    $result=LogHandler::show_log($start, $end, $createTime, $logType, $creatorId);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
//显示我方抄表数据
$app->get('/ammeter/ownList', function () {
    global $app;
    $start = param_check_get('start');
    $end = param_check_get('end');
    $is_bak = param_check_get('is_bak');
    $result=  AmmeterHandler::get_own_list($start, $end,$is_bak);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
//插入我方抄表数据
$app->post('/ammeter/ownAdd', function () {
    global $app;
    $stationId    = param_check('stationId');
    $readTime       = param_check('readTime').":00";
    $readValue      = param_check('own');
    $ammeterNormal  = param_check('du');
    $is_bak         = param_check('is_bak');
    $result=  AmmeterHandler::own_add($stationId, $readTime, $ammeterNormal,$readValue,$is_bak);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS);
     }
	
});
//显示局方抄表数据
$app->get('/ammeter/otherList', function () {
    global $app;
    //$stationName=param_check_post("stationName",'',true);
    $start = param_check_get('start');
    $end = param_check_get('end');
    $result=  AmmeterHandler::get_other_list($start, $end);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
//验证基站信息
$app->post('/ammeter/otherShow', function () {
    global $app;
    $stationName = param_check('stationName');
    $readTime    = param_check('readTime').":00";
    $result=  AmmeterHandler::other_show($stationName, $readTime);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
//插入局方抄表数据
$app->post('/ammeter/otherAdd', function () {
    global $app;
    $stationId                 = param_check('stationId');
    $readTime                  = param_check('readTime').":00";
    $ammeterNormal             = param_check('own');
    $ammeterNormalChinamobile  = param_check('du');
    
    $result=  AmmeterHandler::other_add($stationId, $readTime, $ammeterNormal, $ammeterNormalChinamobile);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS);
     }
	
});
//删除抄表
$app->post('/ammeter/ammeterdel', function () {
    global $app;
    $ammeterId            = param_check('ammeterId');
    $flag                 = param_check('flag');
    $result=  AmmeterHandler::delAmmeter($flag, $ammeterId);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS);
     }
	
});
//显示我方历史抄表数据
$app->post('/ammeter/historyList', function () {
    global $app;
    $flag        = param_check('flag');
    $stationName = param_check('stationName');
    $start       = param_check('start');
    $end         = param_check('end'); 
    $is_bak      = param_check('is_bak','post','',true);
    $result      = AmmeterHandler::query_history_ammter($flag, $stationName, $start, $end,$is_bak);
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
?>