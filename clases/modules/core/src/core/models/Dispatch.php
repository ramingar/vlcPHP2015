<?php
namespace core\models;
class Dispatch
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function run()
    {
        $controllerName = $this->request['controller'];  //# application\controllers\Users
        $actionName = $this->request['action'];

        $controller = new $controllerName();
        $controller->$actionName();
    }

}