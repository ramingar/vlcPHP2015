<?php

include('../modules/core/src/core/models/parseURL.php');

// echo "<pre>";
// print_r($_SERVER['REQUEST_URI']);
// echo "</pre>";

$request = parseURL($_SERVER['REQUEST_URI']);

echo "<pre>";
print_r($request);
echo "</pre>";

switch($request['controller'])
{
    case 'usuarios':
        include('../modules/application/src/application/controllers/usuarios.php');
    break;
    
    case 'error':
        include('../modules/application/src/application/controllers/error.php');
    break;    
        
    
}