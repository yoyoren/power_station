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

//默认值，空值的展示
define('NULL_VAL_DISPLAY','n/a');

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
		'6'=>'60-70A',
		'7'=>'70A+',
	);
	
	//告警类型
	define('WARNING_STATION_OFFLINE',1);
	define('WARNING_INSIDE_HIGH_TMP',2);
	define('WARNING_CABINT_HIGH_TMP',3);
	define('WARNING_AMATER_ERROR',4);
	define('WARNING_AC_ERROR',5);
	define('WARNING_REMOTE_CLOSE_STATION',6);
	define('WARNING_PROXY',7);
	define('WARNING_AIR_CONDITION_ERROR',8);
	define('WARNING_TEMPATURE_ERROR',9);
	
	define('WARNING_CLOSE',1);
	define('WARNING_OPEN',1);
	
	//告警类型
	$WARNING_TYPE = array(
		'1'=>'断站',
		'2'=>'室内高温',
		'3'=>'恒温柜高温',
		'4'=>'电表故障',
		'5'=>'功率异常',
		'6'=>'远程关站',
		'7'=>'代理维护按钮',
		'8'=>'空调故障',
		'9'=>'温度感应故障',
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