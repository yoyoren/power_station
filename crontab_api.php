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
	
	//
	$app->get('/crontab/ecu/sync', function () use ($app) {
		//crontab_api_auth();
		$res = ECUHandler::write_dir();
		if($res){
			restful_response(RES_SUCCESS,$res);
		}else{
			restful_response(RES_FAIL);
		}
	});
?>