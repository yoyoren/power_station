<?php
global $app;
global $response_body;
$request_body = $app->request->getBody();

//API返回码
define("RES_SUCCESS", 0); 
define("RES_ERROR", 1); 
define("RES_NEED_LOGIN", 2); 
define("RES_NO_AUTH", 3); 
define("RES_ACCOUNT_EXIST", 10001); 

function restful_response($code,$data=array()) {
 echo json_encode(array(
	'code'=>$code,
	'data'=>$data,
 ));
 }

$app->post('/account/add', function () {
    global $app;
	$accountName = $app->request->post('name');
    $accountPassword = $app->request->post('password');
    $result = AccountHandler::add($accountName,$accountPassword);
	if($result){
	   restful_response(RES_SUCCESS);
	}else{
	   restful_response(RES_ACCOUNT_EXIST);
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