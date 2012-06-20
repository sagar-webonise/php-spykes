
<?php

class Attack{
    
public $token="";

//register globals 
function unregister_globals()
 { if (ini_get('register_globals')) {
        $array = array('_REQUEST', '_FILES');
        foreach ($array as $value) {
            if(isset($GLOBALS[$value])){
                foreach ($GLOBALS[$value] as $key => $var) {
                    if (isset($GLOBALS[$key]) && $var === $GLOBALS[$key]) {
                        //echo 'found '.$key.' = '.$var.' in $'.$value."\n";                    
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
}
function csrfAtk(){
       session_start();
       require_once('nocsrf.php');
       $this->token = NoCSRF::generate( 'csrf_token' );
}
function affection()
{
    $link = mysql_connect('localhost', 'root', 'root');
    mysql_select_db("phpSpyke2");
    if (!$link) 
        die('Could not connect: ' . mysql_error());
    else{
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $name = $_POST['comment'];
             if (get_magic_quotes_gpc())
               {
                  function magicQuotes_awStripslashes(&$value, $key) {$value = stripslashes($value);}
                  $gpc = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
                  array_walk_recursive($gpc, 'magicQuotes_awStripslashes');
                 echo "magic Quates are enabled";
               }
             else
                 echo "magic Quates are disabled";
             if($name!="")
             {
             mysql_query("insert into comments (name) values('$name');");
            }
            
            
           
            
       
            }
            
         }

     }



function xss()
{
    
    $result = mysql_query("select * from comments;");
            $counter = 1;
            while ($row = mysql_fetch_row($result)) {
                
                echo "Suppressed :<div class='innerComment'>$counter)<br />".htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8')."</div>";
               $counter++;
            }
    
}



function  formSpoof()
{
    //if strcmp("")
   $check =  $_SERVER['HTTP_REFERER'];
   if(strcmp($check,"http://localhost/php-spykes/"))
        echo "Form is spoofed";
   
    
    
}
    

}


$inst = new Attack();
$inst->affection();
$inst->csrfAtk();
$inst->unregister_globals();
$inst->formSpoof();
?>

<html>
<head><title>Security Attacks</title>



</head>
<body>
    <link rel="stylesheet" type="text/css" href="../../style.css" />
    <div id="info_form">
    <form method="POST" action="loginPostSupp" name="loginForm" > 
        <table>
        <tr>
           <td>UserName</td>
           <td><input type="text" name="username" /> </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td><input type="hidden" name="csrf_token" value="<?php echo $inst->token; ?>"></td>
            <td><input type="submit" value="submit" style="float:right" id="login_submit" onclick="javascript:document.loginForm.submit();"/></td>
        </tr>
        </table>
    </form>
    </div>
    <br/>
    <div id="comments">
        <h3>Submit Comment:</h3>
        <div id="single-c">
            <form method="POST" action="attackSupp.php" name="commentForm">
                <textarea cols="50" rows="10" name="comment" ></textarea>
                
                <input type="submit" value="save" id="com_submit" onclick="javascript:document.commentForm.submit();"/>
            </form>
           
            </div>
        <form action="fileUpload.php" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file" /> 
            <br />
            <input type="submit" name="submit" value="Submit" onclick="javascript:document.commentForm.submit();" />
    </form>
        <br />
        
        <div id="showcomment">
            <h3>All Comments:</h3>
            
            <?php 
          
            $inst->xss();
            

            ?>
        </div>
        </div>
    
</body>
</html>
