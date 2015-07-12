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


//http接口返回
function restful_response($code,$data=array()) {
 echo json_encode(array(
	'code'=>$code,
	'data'=>$data,
 ));
 }

//参数合法性检测
function param_check($key,$method='post',$type=''){
	global $app;
	if($method == 'post'){
		$val = $app->request->post($key);
	}else{
		$val = $app->request->get($key);
	}
	if($val == '' || $val == NULL){
		restful_response(RES_PARAM_EMPTY,array('PARAM_EMPTY'=>$key));
		die();
		return;
	}
	
	if($type == 'number'){
		if(!is_numeric($val)){
			restful_response(RES_PARAM_EMPTY,array('RES_PARAM_TYPE_ERROR'=>$key));
			die();
		}
	}
	return $val;
 }
 
 function param_check_get($key,$type=''){
	return param_check($key,'get',$type);
 }
 
 function param_check_post($key,$type=''){
	return param_check($key,'post',$type);
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
	   restful_response(RES_SUCCESS);
	}else{
	   restful_response(RES_ACCOUNT_EXIST);
	}
	
});

 //账户登录
$app->post('/account/signin', function () {
	$accountName = param_check('name');
    $accountPassword = param_check('password');
	$result = AccountHandler::sign_in($accountName,$accountPassword);
	global $app;
	$app->setCookie('user_id', $result['data']->accountName);
	$app->setCookie('pass_token', $result['pass_token']);
	
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


//ecu文件读取的测试接口
$app->get('/ecu/read', function () {
	restful_api_auth();
	$result = ECUHandler::read();
	restful_response(RES_SUCCESS,$result);
});

//扫描上传ECU文件的目录
$app->get('/ecu/scan', function () {
	restful_api_auth();
	$result = ECUHandler::scan();
	restful_response(RES_SUCCESS,$result);
});

//增加一个基站站点
$app->post('/station/add', function () {
	restful_api_auth();
	$stationName = param_check('name');
	$stationSeriseCode = param_check('code');
	$stationType = param_check('type');
	$stationProject = param_check('project');
	$stationProvince = param_check('province');
	$stationCity = param_check('city');
	$stationDistirct = param_check('distirct');
	$stationAddress = param_check('address');
	$stationLat = param_check('lat');
	$stationLng = param_check('lng');
	
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
		$stationLng);
		
	restful_response(RES_SUCCESS);
});

//基站列表
$app->get('/station/list', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
	$data = StationHandler::get_list($start,$end);
	restful_response(RES_SUCCESS,$data);
});


$app->post('/station/online', function () {
	restful_api_auth();
	$stationId = param_check('id');
	StationHandler::update($stationId,0);
	restful_response(RES_SUCCESS);
});

$app->post('/station/offline', function () {
	restful_api_auth();
	$stationId = param_check('id');
	StationHandler::update($stationId,1);
	restful_response(RES_SUCCESS);
});
?>