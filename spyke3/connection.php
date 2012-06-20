<?php

class Conn
{
    public function connect(){
        $host = "localhost";
        $username ="root";
        $password = "root";
        try {
            $db = new PDO("mysql:dbname=pdo;host=$host", "$username", "$password" );
            echo "Connection successful";
          
                    }
        catch(PDOException $e)
            {
            echo $e->getMessage();
            }
        return $db;
    }   
}
?>
