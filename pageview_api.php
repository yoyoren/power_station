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
	$station_num = StationHandler::get_index_station_num();
	$app->render('main.php',array('station_num'=>$station_num));
});

$app->get('/main', function () use ($app) {
	pageview_api_auth();
	$station_num = StationHandler::get_index_station_num();
	$app->render('main.php',array('station_num'=>$station_num));
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
$app->get('/base/status/:id', function ($id) use ($app) {
	pageview_api_auth();
	$station = StationHandler::get_one_detail($id);
	$status = StationHandler::get_current_status(1);
	$weather = WeatherHandler::get_weather_baidu($station['info']->stationCityName)->retData;
	$app->render('base-status.php',array('weather'=>$weather,'station'=>$station,'status'=>$status,'id'=>$id));
});

//基站基础信息
$app->get('/base/info/:id', function ($id) use ($app) {
	pageview_api_auth();
	$data = StationHandler::get_one_detail($id);
	//var_dump($data['energy']);
	$app->render('base-info.php',array('station'=>$data,'id'=>$id));
});

//基站基础信息编辑
$app->get('/base/edit/:id', function ($id) use ($app) {
	pageview_api_auth();
	$data = StationHandler::get_one_detail($id,true);
	
	$data_json = json_encode($data);
	$app->render('base-edit.php',array('station_json'=>$data_json,'station'=>$data,'id'=>$id));
});

//基站创建
$app->get('/base/create', function () use ($app) {
	pageview_api_auth();
	$app->render('base-create.php',array('id'=>1));
});

//日报数据
$app->get('/base/daily/:id', function ($id) use ($app) {
	pageview_api_auth();
	$app->render('base-daily.php',array('id'=>$id));
});	

//月报数据
$app->get('/base/month/:id', function ($id) use ($app) {
	pageview_api_auth();
	$app->render('base-month.php',array('id'=>$id));
});	

//年报数据
$app->get('/base/year/:id', function ($id) use ($app) {
	pageview_api_auth();
	$app->render('base-year.php',array('id'=>$id));
});

//远程控制
$app->get('/base/remote', function () use ($app) {
	pageview_api_auth();
	$app->render('base-remote.php',array());
});

//原始数据
$app->get('/base/origindata/:id', function ($id) use ($app) {
	pageview_api_auth();
	$app->render('base-origindata.php',array('id'=>$id));
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

$app->get('/ammeter-other', function () use ($app) {
	pageview_api_auth();
	$app->render('ammeter-other.php',array());
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