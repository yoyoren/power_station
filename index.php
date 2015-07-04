<?php
ob_start();
ini_set('date.timezone','Asia/Shanghai');
require 'init.php';
require 'restful_api.php';
require 'pageview_api.php';
global $app;
$app->run();

?>
