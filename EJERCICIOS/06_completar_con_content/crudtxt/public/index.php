<?php

require_once('../modules/core/src/core/models/parseURL.php');
require_once('../modules/core/src/core/models/getConfig.php');

$config = getConfig();
$request = parseURL();
// $request = routeURL($request);

$controllerPath = $config['controller_path'];


switch($request['controller'])
{
    case 'users':
        include_once($controllerPath.'/users.php');
    break;
    
    case 'error':
        include_once($controllerPath.'/error.php');
    break; 

    case 'index':
        include_once($controllerPath .'/index.php');
    break;
    
        
    
}