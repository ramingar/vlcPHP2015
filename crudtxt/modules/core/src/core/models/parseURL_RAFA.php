<?php


function parseURL()
{
    $controllers = array ('usuarios'=>array('insert', 'select', 'update', 'delete'));
    $uri = $_SERVER['REQUEST_URI'];
    $request = array();
    $params = array();
    $idx = '';
    
    // Convert $uri = '/usuarios/update/id/8' in:
    // $request = array ('controller'=>'usuarios',
    //                   'action'=>'update',
    //                   'params'=>array('id'=>8)
    // );
    $uri = substr($uri,0,1)=='/' ? substr($uri,1,strlen($uri)-1) : $uri;    // WARNING: slash in first position
    $uri = substr($uri,-1)=='/' ? substr($uri,0,strlen($uri)-1) : $uri;     // WARNING: trail slash!!
    $uri = explode('/', $uri);
    foreach ($uri as $key => $value) {
        switch ($key) {
            case 0:
                $request['controller'] = $value;
                break;
            case 1:
                $request['action'] = $value;
                break;
            case $key%2==0:
                $idx = $value;
                $params[$value] = '';
                break;
            case $key%2!=0:
                $params[$idx] = $value;
                break;
        }
    }
    
    // Include params if precondition succeeds
    if (count($params)>0) {
        if (end($params)!='') {
            $request['params'] = $params;
        } else {
            unset($request);
            $request['controller'] = 'error';
            $request['action'] = '412';
        }
    }
    
    // NOT Controller in URI -> C=index / A=index                   // RESULT 1
    // YES, Controller in URI:
    //     Controller exists     -> C=controller *(go below)
    //     Controller NOT exist  -> error = 404                     // RESULT 2
    //
    //         * NOT Action in URI -> C=controller / A=index        // RESULT 3
    //         * YES, Action in URI:
    //               Action exists     -> C=controller / A=action   // RESULT 4 (no need to change anything)
    //               Action NOT exist  -> error = 404               // RESULT 5
    if (!isset($request['controller'])=='error')
    {
        if ($request['controller']!='')
        {
            // echo "<pre>";
            // print_r(scandir('../modules/application/src/application/controllers'));
            // echo "</pre>";
            if (
                in_array($request['controller'],
                         array_map(function ($v) {
                             return explode('.', $v)[0];
                         },scandir($_SERVER['DOCUMENT_ROOT'] . '/../modules/application/src/application/controllers'))
                ) == true
            ){
                if (isset($request['action']))
                {
                    $controller = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../modules/application/src/application/controllers/'.$request['controller'].'.php');
                    if (
                        !in_array('case \''.$request['action'].'\':',
                                  array_map(function ($v) {
                                      return trim($v);
                                  }, explode("\n", $controller))
                        ) == true
                    ){
                        // RESULT 5
                        unset($request);
                        $request['controller'] = 'error';
                        $request['action'] = '404';
                    }
                } else {
                    // RESULT 3
                    $request['action'] = 'index';
                }
            } else {
                // RESULT 2
                unset($request);
                $request['controller'] = 'error';
                $request['action'] = '404';
            }
        } else {
            // RESULT 1
            unset($request);
            $request['controller'] = 'index';
            $request['action'] = 'index';
        }
    }
    
    return $request;
}