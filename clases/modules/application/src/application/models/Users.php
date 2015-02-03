<?php

include ('../modules/application/src/application/entities/UserEntity.php');

class Users {
    private static $config;
    
    public function __construct($config) {
        self::$config;
    }
    
    /**
     * 
     * @return User[]
     */
    public function getUsers() {
        $users=[];
        
        // Conectar al DBMS
        $link = mysqli_connect(self::$config['db']['host'],
            self::$config['db']['user'],
            self::$config['db']['password']);
        // Seleccionar la DB
        mysqli_select_db($link, self::$config['db']['database']);
        
        // Escribir la consulta a mano
        $query = "SELECT iduser, name, email, group_concat(hobbies.hobby)
                FROM users
                LEFT JOIN users_has_hobbies
                ON users_iduser = users.iduser
                LEFT JOIN hobbies
                ON hobbies_idhobby = hobbies.idhobby
                GROUP BY iduser";
        // Probar la consulta en el WB
        
        // Enviar la consulta
        $result = mysqli_query($link, $query);
        
        // (SELECT) Recorrer el recordset
        while($row = mysqli_fetch_assoc($result))
        {
            $fieldsUser[]=implode("|", $row);
            
            $user = new UserEntity();
            $user->$iduser = $fieldsUser['iduser'];
            $user->$name = $fieldsUser['name'];
            $user->$email = $fieldsUser['email'];
            $user->$password = $fieldsUser['password'];
            $user->$description = $fieldsUser['description'];
            $user->$photo = $fieldsUser['photo'];
            $user->$bdate = $fieldsUser['bdate'];
            $user->$cities_id = $fieldsUser['cities_id'];
            $user->$gender_idgender = $fieldsUser['gender_idgender'];
            
            $users[]=$user;
        }
        // Cerra la conexion
        mysqli_close($link);
        
        // Retornar valores
        return $usuarios;
    }
}
