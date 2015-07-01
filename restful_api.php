<?php
global $app;
global $response_body;
$request_body = $app->request->getBody();
//返回码
$RES_SUCCESS = 0;
$RES_ERROR = 1;
$RES_NEED_LOGIN = 2;
$RES_NO_AUTH = 3;
$RES_ACCOUNT_EXIST = 10001;

function restful_response($code,$data=array()) {
 echo json_encode(array(
	'code'=>$code,
	'data'=>$data,
 ));
 }

$app->post('/account/add', function () {
    global $app;
	global $RES_SUCCESS;
	global $RES_ACCOUNT_EXIST;
	$accountName = $app->request->post('name');
    $accountPassword = $app->request->post('password');
    $result = AccountHandler::add($accountName,$accountPassword);
	if($result){
	   restful_response($RES_SUCCESS);
	}else{
	   restful_response($RES_ACCOUNT_EXIST);
	}
	
});


$app->post('/account/login', function () {
    
});


$app->get('/account/logout', function () {
    
});


$app->post('/account/lock', function () {
    
});



$app->post('/account/lock', function () {
    
});
?>