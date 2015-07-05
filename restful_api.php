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
 
define("RES_ACCOUNT_EXIST", 10001); 
define("RES_ACCOUNT_PASSWORD_ERROR", 10002); 
define("RES_ACCOUNT_NOT_EXIST", 10003); 


function restful_response($code,$data=array()) {
 echo json_encode(array(
	'code'=>$code,
	'data'=>$data,
 ));
 }

 //增加账户
$app->post('/account/add', function () {
    global $app;
	$accountName = $app->request->post('name');
    $accountPassword = $app->request->post('password');
	$accountType = $app->request->post('type');
    $result = AccountHandler::add($accountName,$accountPassword,$accountType);
	if($result){
	   restful_response(RES_SUCCESS);
	}else{
	   restful_response(RES_ACCOUNT_EXIST);
	}
	
});

 //账户登录
$app->post('/account/signin', function () {
    global $app;
	$accountName = $app->request->post('name');
    $accountPassword = $app->request->post('password');
	$result = AccountHandler::sign_in($accountName,$accountPassword);
	
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
		restful_response(RES_SUCCESS);
	}else{
		restful_response(RES_NEED_LOGIN);
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
	global $app;
	$accountName = $app->request->post('name');
    AccountHandler::is_login(1,$accountName);
	restful_response(RES_SUCCESS);
});


//解锁账户
$app->post('/account/unlock', function () {
	global $app;
	$accountName = $app->request->post('name');
    AccountHandler::is_login(0,$accountName);
	restful_response(RES_SUCCESS);
});



$app->get('/file/read', function () {
	$result = ECUHandler::read();
	echo json_encode($result);
});
?>