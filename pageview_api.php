<?php
global $app;
global $response_body;

$app->get('/', function () use ($app) {
	$app->render('home.php',array());
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

?>