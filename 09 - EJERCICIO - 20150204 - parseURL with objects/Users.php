<?php

namespace application\controllers;

include ('../modules/application/src/application/models/getUsers.php');
include ('../modules/application/src/application/models/getUsersDB.php');
include ('../modules/application/src/application/models/getUserDB.php');
include ('../modules/application/src/application/models/getUser.php');
include ('../modules/application/src/application/models/insertUser.php');
include ('../modules/application/src/application/models/insertUserDB.php');
include ('../modules/application/src/application/models/updateUser.php');
include ('../modules/application/src/application/models/updateUserDB.php');
include ('../modules/application/src/application/models/deleteUser.php');
include ('../modules/application/src/application/models/deleteUserDB.php');

include('../modules/application/src/application/forms/userForm.php');

include('../modules/core/src/core/models/getColumns.php');
include('../modules/core/src/core/models/validateForm.php');
include('../modules/core/src/core/models/filterForm.php');
include('../modules/core/src/core/models/renderForm.php');
include('../modules/core/src/core/models/renderView.php');

class Users
{
    
    public $config;
    public $request;


    public function __construct($config, $request)
    {
        $this->request = $request;
        $this->config = $config;
    }
    
    public function insertAction()
    {
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
            if($validatedata)
            {
        
                //insertUser($filterdata, $filename);
                insertUserDB($this->config, $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            $content = renderView($this->request, $config, array('usuario'=>$usuario));
        }
    }
    
    public function updateAction() 
    {
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
        
            if($validatedata)
            {
                // $usuario = updateUser($filterdata['id'], $filterdata, $filename);
                $usuario = updateUserDB($this->config, $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario = getUserDB($this->config, $this->request['params']['id']);
            $content = renderView($this->request, $this->config, array('usuario'=>$usuario));
        }
    }
    
    public function deleteAction()
    {
        if(isset($_POST['id']))
        {
            //             deleteUser($_POST['id'], $filename);
            if($_POST['submit']=='Bórrame!')
            {
                deleteUserDB($this->config, $_POST['id']);
            }
            header('Location: /users');
        }
        else
        {
            $content = renderView($this->request, $this->config, array('usuario'=>$this->request['params']['id']));
        }
    }
    
    public function selectAction()
    {
        //$usuarios1 = getUsers($filename);
        $usuarios = getUsersDB($this->config);
        $content = renderView($this->request, $this->config, array('usuarios'=>$usuarios));
    }
    
    public function indexAction()
    {
        $this->selectAction();
    }
    
    public function __destruct()
    {
         include('../modules/application/src/application/layouts/dashboard.phtml');
    }
}

