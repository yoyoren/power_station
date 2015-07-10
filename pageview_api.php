<?php
global $app;
global $response_body;


 //API登陆身份验证
 function pageview_api_auth(){
	$result = AccountHandler::is_login();
	if(!$result){
		header("Location: /login");
		die();
	}
 }
$app->get('/', function () use ($app) {
	pageview_api_auth();
	$app->render('main.php',array());
});

$app->get('/main', function () use ($app) {
	pageview_api_auth();
	$app->render('main.php',array());
});

//登录
$app->get('/login', function () use ($app) {
	$result = AccountHandler::is_login();
	if($result){
		header("Location: /main");
		die();
	}
	$app->render('login.php',array());
});

//基站首页
$app->get('/base', function () use ($app) {
	pageview_api_auth();
	$app->render('base-index.php',array());
});

//告警首页
$app->get('/warning', function () use ($app) {
	pageview_api_auth();
	$app->render('warning-index.php',array());
});

//电表首页
$app->get('/ammeter', function () use ($app) {
	pageview_api_auth();
	$app->render('ammeter-index.php',array());
});

//维护日志首页
$app->get('/log', function () use ($app) {
	pageview_api_auth();
	$app->render('log-index.php',array());
});

//报表首页
$app->get('/report', function () use ($app) {
	pageview_api_auth();
	$app->render('report-index.php',array());
});

//账户首页
$app->get('/account', function () use ($app) {
	pageview_api_auth();
	$app->render('account-index.php',array());
});

$app->get('/apitest', function () use ($app) {
	$app->render('api_test.php',array());
});



?>