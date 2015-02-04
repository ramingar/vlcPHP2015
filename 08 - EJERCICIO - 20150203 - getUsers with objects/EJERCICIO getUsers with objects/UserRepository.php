//# clases/modules/application/src/application/entities/UserRepository.php
<?php

include_once ('../modules/application/src/application/entities/UserEntity.php');

class UserRepository
{
    
    /**
     * 
     * @param $adapter Adapter
     * @return User[]
     */
    public function getUsers($adapter)
    {
        $users=[];

        // Escribir la consulta a mano
        $queryString = "SELECT *
                FROM users";
        // Probar la consulta en el WB
        
        $rows = $adapter->query($queryString);
        
        foreach ($rows as $key => $row) {
            $user = new UserEntity();
            $user->iduser = $row['iduser'];
            $user->name = $row['name'];
            $user->email = $row['email'];
            $user->description = $row['description'];
            $user->photo = $row['photo'];
            $user->bdate = $row['bdate'];
            $user->cities_id = $row['cities_idcity'];
            $user->gender_idgender = $row['genders_idgender'];
        
            $users[]=$user;
        }
        
        // Retornar valores
        return $users;
    }
}
