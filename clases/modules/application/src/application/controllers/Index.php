<?php

include('../modules/core/src/core/models/renderView.php');


class Index
{
    public $filename;
    public $request;
    
    public function __construct($config)
    {
        $this->config = $config['filename'];
    }
    
    public function indexAction()
    {
        $content = renderView($request, $config);
    }
}


// include('../modules/application/src/application/layouts/jumbotron.phtml');











