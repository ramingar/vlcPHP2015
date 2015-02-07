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
        if ($id!==null) {
            $users = $users[$id];
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
        
        if ($id===null) {
            reset($data);
            $data[key($data)]= hash('sha256', $data['email']);
            $user = implode("|",$data);
//             echo '<pre>';
//             print_r($user);
//             echo '</pre>';
//             die;
            
            file_put_contents($this->config['filename'], "holaaa", FILE_APPEND | LOCK_EX);
        } else {
            file_put_contents($filename,implode("|",$data)."\n",FILE_APPEND);
        }
    }
    
    public function delete($id)
    {
        $users = $this->fetch();
        array_splice($users, $id, 1);
        file_put_contents($this->config['filename'],implode("\n",$users));
        return $id;
    }
}