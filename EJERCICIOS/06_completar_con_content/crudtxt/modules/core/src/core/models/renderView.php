<?php


function renderView($request, $config, $data)
{
//     echo '<pre>';
//     print_r($config['view_path'].'/'.
//                 $request['controller'].'/'.
//                 $request['action'].'.phtml');
//     echo '</pre>';
    ob_start();
        include($config['view_path'].'/'.
                $request['controller'].'/'.
                $request['action'].'.phtml'
               );
    $content = ob_get_contents();
    ob_end_clean();
    return $content;    
}