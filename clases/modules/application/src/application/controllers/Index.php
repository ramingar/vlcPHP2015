<?php
namespace application\controllers;

include('../modules/core/src/core/models/renderView.php');


class Index
{
    public $config;
    public $request;


    public function __construct($config, $request)
    {
        $this->request = $request;
        $this->config = $config;
    }
    
    public function indexAction()
    {
        $content = renderView($this->request, $this->config);
    }
}


// include('../modules/application/src/application/layouts/jumbotron.phtml');











