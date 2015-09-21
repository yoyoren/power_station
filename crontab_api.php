<?php 
	global $app;
	
	 //定时操作的API登陆身份验证
	 function crontab_api_auth(){
		$auth_token = '4fb090a1ca55145ad302187ccfe674a9';
		$token = param_check_get('token');
		if($auth_token!=$token){
			restful_response(RES_NEED_LOGIN,array('RES_NEED_LOGIN'=>true));
			die();
		}
	 }
	//按城市同步当天最新的天气信息到数据库
	$app->get('/crontab/weather/sync', function () use ($app) {
		crontab_api_auth();
		$province = param_check_get('province');
		$city = param_check_get('city');
		$res = WeatherHandler::add_weather_baidu($province,$city);
		if($res){
			restful_response(RES_SUCCESS,$res);
		}else{
			restful_response(RES_FAIL);
		}
	});
	
	//ECU历史数据同步
	$app->get('/crontab/ecu/sync', function () use ($app) {
		//crontab_api_auth();
		$name = param_check_get('name');
		$res = ECUHandler::write_dir($name);
		restful_response(RES_SUCCESS,$res);
	});
	
	//告警历史数据计算
	$app->get('/crontab/warning/sync', function () use ($app) {
		//crontab_api_auth();
		$start = param_check_get('start');
		$pagesize = param_check_get('pagesize');
		$station_id = 1;
		$res = StationHandler::cal_warning_from_history_running_data($station_id,$start,$pagesize);
		restful_response(RES_SUCCESS,$res);
		
	});
?>