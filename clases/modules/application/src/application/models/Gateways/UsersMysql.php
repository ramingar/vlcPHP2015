<?php
namespace application\models\Gateways;

use core\models\FrontController;
class UsersMysql extends \Phpzero\adapters\MysqlAdapter
{
    
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->fetch($sql);        
    }
    
    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE iduser = '". $id ."'";
        return $this->fetch($sql)[0];
    }
    
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE iduser = '". $id ."'";
        return $this->save($sql);
    }
    
    public function insertUser($data)
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
        
        $data['photo']=$_FILES['photo']['name'];
        $data['iduser'] = hash('sha256', $data['email']);
        
        $columns =getColumns(FrontController::getInstace()->getConfig(), 'users');
        
        $sql = array();
        foreach ($data as $key => $value)
        {
            if(!in_array($key, $columns))
                unset ($data[$key]);
            else
                $sql[] = $key."='".$value."'";
        }
        $sql = implode(",", $sql);
        $sql = 'INSERT INTO users SET '.$sql;
        
        return $this->save($sql);
    }
    
    public function updateUser($id, $data)
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
    
        $data['photo']=$_FILES['photo']['name'];
        $data['iduser'] = hash('sha256', $data['email']);
    
        $columns =getColumns(FrontController::getInstace()->getConfig(), 'users');
    
        $sql = array();
        foreach ($data as $key => $value)
        {
            if(!in_array($key, $columns))
                unset ($data[$key]);
            else
                $sql[] = $key."='".$value."'";
        }
        $sql = implode(",", $sql);
        $sql = "UPDATE users SET ".$sql. " WHERE iduser = '". $id ."'";
        
        return $this->save($sql);
    }
}