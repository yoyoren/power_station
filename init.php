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

require 'slim/Slim/Slim.php';
require 'model/generated/include_dao.php';
require 'handler/init.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => './template'
));
$response_body = $app->request->getBody();
?> 