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
    
    public $filename;
    public $request;


    public function __construct($config)
    {
        $this->config = $config['filename'];
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
                insertUserDB($config, $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            $content = renderView($request, $config, array('usuario'=>$usuario));
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
                $usuario = updateUserDB($config, $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario = getUserDB($config, $request['params']['id']);
            $content = renderView($request, $config, array('usuario'=>$usuario));
        }
    }
    
    public function deleteAction()
    {
        if(isset($_POST['id']))
        {
            //             deleteUser($_POST['id'], $filename);
            if($_POST['submit']=='Bórrame!')
            {
                deleteUserDB($config, $_POST['id']);
            }
            header('Location: /users');
        }
        else
        {
            $content = renderView($request, $config, array('usuario'=>$request['params']['id']));
        }
    }
    
    public function selectAction()
    {
        //$usuarios1 = getUsers($filename);
        $usuarios = getUsersDB($config);
        $content = renderView($request, $config, array('usuarios'=>$usuarios));
    }
    
    public function indexAction()
    {
        $this->request['action'] = 'select';
        $this->selectAction();
    }
}



// include('../modules/application/src/application/layouts/dashboard.phtml');
