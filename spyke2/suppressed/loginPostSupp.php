<?php

function secureSuperGlobalPOST(&$value, $key)
    {
        $_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
        $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
        $_POST[$key] = mysql_escape_string($_POST[$key]);
        return $_POST[$key];
    }
    
function affection()
{
    //error_reporting(E_ALL);
    //ini_set('display_errors', '1');
    $link = mysql_connect('localhost', 'root', 'root');
    mysql_select_db("phpSpyke2");
    if (!$link) 
        die('Could not connect: ' . mysql_error());
    else{
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $username = $_POST['username'];
             if($username!="")
             {
                $username = htmlspecialchars(stripslashes($username));
                $username = str_ireplace("script", "blocked", $username);
                $username = mysql_escape_string($username);
                $query = "select * from user where username='$username';";
               
                $result = mysql_query($query);
                if(mysql_num_rows($result))
                {
                    while($rows = mysql_fetch_row($result))
                    {
                        foreach($rows as $row)
                           echo "<br/>$row";
                    }

                }else{
                    
                    echo "No Data Found";
                }      
            }
         }

     }
}
affection();
?>
