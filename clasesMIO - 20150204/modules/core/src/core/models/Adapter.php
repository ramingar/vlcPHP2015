<?php

include_once('../modules/application/src/application/entities/UserRepository.php');

class Adapter
{
    private $config;
    private $link;
    
    public function __construct($config)
    {
        
        $this->config = $config;
        // Conectar al DBMS
        $this->link = mysqli_connect($config['db']['host'],
                $config['db']['user'],
                $config['db']['password']);
        
        // Seleccionar la DB
        mysqli_select_db($this->link, $config['db']['database']);
    }
    
    public function query($queryString)
    {
        $array = [];
        
        $result = mysqli_query($this->link, $queryString);
        
        // TODO: switch with all cases (update, delete, etc.)
        // (case SELECT) Recorrer el recordset
        while ($row = mysqli_fetch_assoc($result))
        {
            $array[]=$row;
        }
        
        return $array;
    }
    
    public function close()
    {
        // Cierra la conexion
        return mysqli_close($this->link);
    }
    
    public function __destruct()
    {
        return $this->close();
    }
    
    public function getUserRepository()
    {
        return new UserRepository();
    }
}