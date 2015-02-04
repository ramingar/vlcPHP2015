<?php
namespace core\models;
class Dispatch
{
    public $request;
    private $config;

    public function __construct($request, $config)
    {
        $this->request = $request;
        $this->config = $config;
    }

    public function run()
    {
        $controllerName = $this->request['controller'];  //# application\controllers\Users
        $actionName = $this->request['action'];

        $controller = new $controllerName($this->config, $this->request);
        $controller->$actionName();
    }

}