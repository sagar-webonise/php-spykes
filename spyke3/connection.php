<?php

class Conn
{
    public function connect(){
        try {
            $db = new PDO("mysql:dbname=pdo;host=localhost", "root", "root" );
            echo "PDO connection object created";
            }
        catch(PDOException $e)
            {
            echo $e->getMessage();
            }
    }   
}
?>
