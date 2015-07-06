<?php
define('ECU_ROOT_PATH','./ecu/site/');
require 'slim/Slim/Slim.php';
require 'model/generated/include_dao.php';
require 'handler/init.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => './template'
));
$response_body = $app->request->getBody();
?> 