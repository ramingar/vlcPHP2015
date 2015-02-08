<?php
namespace Phpzero\adapters;

class TxtAdapter
{
    private $config;
    private $fileContent;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }
    
    private function connect()
    {
        $this->fileContent = file_get_contents($this->config['filename']);
    }

    public function fetch($id = null)
    {
        $users = explode("\n", $this->fileContent);
        if ($id!==null) {   // GET 1 user
            $key = $this->findUserKey($id, $users);
            $users = $users[$key];
        }
        return $users;
    }
    
    public function save($data, $id = null)
    {
        foreach ($data as $key => $value)
        {
            if(is_array($value))
                $data[$key]=implode(",", $value);
        }
        
        move_uploaded_file($_FILES['photo']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
        
        $users = $this->fetch();
        
        if ($id===null) {   // INSERT
            reset($data);
            $data[key($data)]= hash('sha256', $data['email']);
            $user = implode("|",$data);
            $user = $users[0]!='' ? "\n".$user : $user;
            file_put_contents($this->config['filename'], $user, FILE_APPEND | LOCK_EX);
        } else {            // UPDATE
            $this->delete($id);
            $this->save($data);
        }
    }
    
    public function delete($id)
    {
        $users = $this->fetch();
        
        $key = $this->findUserKey($id, $users);
        
        array_splice($users, $key, 1);
        file_put_contents($this->config['filename'],implode("\n",$users));
        return $id;
    }
    
    private function findUserKey($id, $users)
    {
        return array_search($id, array_map(function ($v) { return explode("|", $v)[0]; }, $users));
    }
}