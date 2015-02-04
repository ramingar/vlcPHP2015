<?php


function renderView($request, $config, $data=null)
{
    ob_start();
    $view = $config['view_path'].'/'.
            $request['controller'].'/'.
            $request['action'].'.phtml';
    $view = str_replace('\\', '/', $view);
    $view = str_replace('Action', '', $view);
    $view = strtolower($view);

    include($view);
    
    $content = ob_get_contents();
    ob_end_clean();
    return $content;    
}