<?php

include_once('../modules/core/src/core/models/renderView.php');












switch($request['action'])
{        
    default:
    case 'index':
//         include('../modules/application/src/application/views/index/index.phtml');
        $content = renderView($request, $config, array('title'=>'Hello World!!!!!'));
    break;
}

include('../modules/application/src/application/layouts/jumbotron.phtml');











