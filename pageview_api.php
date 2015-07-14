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

//基站当前状态
$app->get('/base/status', function () use ($app) {
	pageview_api_auth();
	$app->render('base-status.php',array());
});

//基站基础信息
$app->get('/base/info', function () use ($app) {
	pageview_api_auth();
	$app->render('base-info.php',array());
});

//基站基础信息编辑
$app->get('/base/edit', function () use ($app) {
	pageview_api_auth();
	$app->render('base-edit.php',array());
});

//基站创建
$app->get('/base/create', function () use ($app) {
	pageview_api_auth();
	$app->render('base-create.php',array());
});

//日报数据
$app->get('/base/daily', function () use ($app) {
	pageview_api_auth();
	$app->render('base-daily.php',array());
});	

//月报数据
$app->get('/base/month', function () use ($app) {
	pageview_api_auth();
	$app->render('base-month.php',array());
});	

//年报数据
$app->get('/base/year', function () use ($app) {
	pageview_api_auth();
	$app->render('base-year.php',array());
});

//远程控制
$app->get('/base/remote', function () use ($app) {
	pageview_api_auth();
	$app->render('base-remote.php',array());
});

//原始数据
$app->get('/base/origindata', function () use ($app) {
	pageview_api_auth();
	$app->render('base-origindata.php',array());
});

//告警首页
$app->get('/warning', function () use ($app) {
	pageview_api_auth();
	$app->render('warning-index.php',array());
});

//告警策略
$app->get('/warning/rule', function () use ($app) {
	pageview_api_auth();
	$app->render('warning-rule.php',array());
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

//账户首页，账户管理
$app->get('/account', function () use ($app) {
	pageview_api_auth();
	$app->render('account-index.php',array());
});

//账户项目管理
$app->get('/account/project', function () use ($app) {
	pageview_api_auth();
	$app->render('account-project.php',array());
});

//接口测试页面
$app->get('/apitest', function () use ($app) {
	$app->render('api_test.php',array());
});



?>