<?php
ob_start();
ini_set('date.timezone','Asia/Shanghai');
require 'init.php';
require 'restful_api.php';
require 'pageview_api.php';
require 'crontab_api.php';
require 'predis/autoload.php';

Predis\Autoloader::register();
$Redis_client = new Predis\Client();
global $app;
$app->run();


?>
