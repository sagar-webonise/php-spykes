<?php

require_once('nocsrf.php');
session_start();
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
           try
                {
                    // Run CSRF check, on POST data, in exception mode, with a validity of 10 minutes, in one-time mode.
                    NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                 
                }
                catch ( Exception $e )
                {
                    echo "CSRF attack detected$e";
                }           
             $username = $_POST['username'];
             $password = crypt($_POST['password']);
             echo "Encrypted password : $password";
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
