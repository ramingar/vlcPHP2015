<?php
namespace core\models;

class FrontController
{

    public static function getConfig()
    {
        return (array_merge(require_once('../configs/global.php'),
                    require_once('../configs/local.php')
                )
        );         
    }
    
    public static function parseURL()
    {
        // dividir la url en un array
        $request = explode("/", $_SERVER['REQUEST_URI']);
        $request[1]=ucfirst($request[1]);
        if($request[1]=='')
            return array('controller'=>'application\controllers\Index',
                    'action'=>'indexAction'
            );
  
        // Mientras que el ultimo elemento es vacio, eliminarlo
        while($request[count($request)-1]=='')
            unset($request[count($request)-1]);
        // Tiene parametros?
        $params = array();
        // Es longitud par?
        if(count($request)>3 && (count($request)%2)==0)
        {
            // KO deveolver error 412
            return array('controller'=>'application\controllers\Error',
                    'action'=>'412'
            );
        }
        else
        {
            for($a=3;$a<count($request);$a+=2)
            {
                $params[$request[$a]]=$request[$a+1];
            }
        }
        if(file_exists($_SERVER['DOCUMENT_ROOT'].
                "/../modules/application/src/application/controllers/".
                $request[1].".php")
        )
        {
            // Buscar las actions que tiene el controller
            $actions = get_class_methods('application\controllers\\' . $request[1]);
            
            if(isset($request[2]))
                if(in_array($request[2].'Action', $actions))
                {
                    return array('controller'=>'application\controllers\\'.$request[1],
                            'action'=>$request[2].'Action',
                            'params'=>$params
                    );
                }
            else
            {
                return array('controller'=>'application\controllers\Error',
                        'action'=>'404'
                );
            }
            else
            {
                return array('controller'=>'application\controllers\\'.$request[1],
                        'action'=>'indexAction'
                );
            }
        }
        else
        {
            return array('controller'=>'application\controllers\Error',
                    'action'=>'404'
            );
        }
    }
}

