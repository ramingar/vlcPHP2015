<?php
namespace Phpzero\adapters;

class MysqlAdapter
{
    private $config;
    private $link;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }
    
    private function connect()
    {
        $this->link = mysqli_connect($this->config['host'],
                                     $this->config['user'],
                                     $this->config['password']
                                    );
        
        mysqli_select_db($this->link, $this->config['database']);
    }

    public function queryRead($queryString)
    {
        $array = [];

        $result = mysqli_query($this->link, $queryString);
        while ($row = mysqli_fetch_assoc($result))
        {
            $array[]=$row;
        }

        return $array;
    }
    
    public function queryUpdate($queryString)
    {
        mysqli_query($this->link, $queryString);
    }

    private function close()
    {
        return mysqli_close($this->link);
    }

    public function __destruct()
    {
        return $this->close();
    }
}