<?php
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
                
                $query = "select * from user where username='$username';";
                echo $query;
                $result = mysql_query($query);
            
                if(mysql_num_rows($result))
                {
                    while($rows = mysql_fetch_row($result))
                    {
                          foreach($rows as $row)
                           echo "<br/>$row";
                    }
                    echo "Hii";    
                }else{
                    
                    echo "No Data Found";
                }   
                    
            }
         }

     }
}
affection();
?>
