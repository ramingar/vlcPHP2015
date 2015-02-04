<?php
require_once('../autoload.php');
$config = core\models\FrontController::getConfig();
$request = core\models\FrontController::parseURL();

// $request = core\models\FrontController::routeURL($request);
// $mysql = new acl\adapters\MysqlAdapter($config['db']);
// $query = "SELECT * FROM users";
// $usuario = $mysql->querySelect($query);

// echo "<pre>";
// print_r($request);
// echo "</pre>";
// die;

$dispatch = new core\models\Dispatch($request, $config);
$dispatch->run();



