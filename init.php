<?php

//ECU同步目录
define('ECU_ROOT_PATH','./ecu/site/');

define('ADDRESS_DATA_PATH','./data/city.json');
//管理员
define('ACCOUNT_TYPE_ADMIN',1);
//普通用户
define('ACCOUNT_TYPE_USER',2);
//联通
define('ACCOUNT_TYPE_CHINA_UNICOM',3);

//基准站
define('STATION_TYPE_NORMAL',1);
//节能站
define('STATION_TYPE_SAVING',2);
//预备站
define('STATION_TYPE_BACKUP',3);

	//站点类型
	$STATION_TYPE = array(
		'1'=>'基准站',
		'2'=>'节能站',
		'3'=>'预备站',
	);
	
	//供电类型
	$POWER_SUPPLY_TYPE = array(
		'1'=>'市政供电',
		'2'=>'物业供电',
	);
	
	//电价收费方
	$FEE_TYPE = array(
		'1'=>'供电局收费',
		'2'=>'物业收费',
		'3'=>'托收',
	);
	
	//建筑类型
	$BUILDING_TYPE = array(
		'1'=>'板房',
		'2'=>'砖墙',
	);
	
	//能耗类型
	$ENERGY_TYPE = array(
		'1'=>'10-20A',
		'2'=>'20-30A',
		'3'=>'30-40A',
		'4'=>'40-50A',
		'5'=>'50-60A',
		'6'=>'70A+',
	);
	
require 'slim/Slim/Slim.php';
require 'model/generated/include_dao.php';
require 'handler/init.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => './template'
));
$response_body = $app->request->getBody();
?> 