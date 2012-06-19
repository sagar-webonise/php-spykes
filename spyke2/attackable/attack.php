
<?php
class Attack{
    

function affection()
{
    $link = mysql_connect('localhost', 'root', 'root');
    mysql_select_db("phpSpyke2");
    if (!$link) 
        die('Could not connect: ' . mysql_error());
    else{
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $name = $_POST['comment'];
             
             if($name!="")
             {
             mysql_query("insert into comments (name) values('$name');");
            }
         }

     }
}

function dispComment()
{
    
    $result = mysql_query("select * from comments;");
            $counter = 1;
            while ($row = mysql_fetch_row($result)) {
                echo "can be affected: <div class='innerComment'>$counter)<br />  $row[0]</div>";
                
               $counter++;
            }
}


}

$inst = new Attack();
$inst->affection();
?>

<html>
<head><title>Security Attacks</title>



</head>
<body>
    <link rel="stylesheet" type="text/css" href="../../style.css" />
    <div id="info_form">
    <form method="POST" action="loginPost" name="loginForm" > 
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
            <td></td>
            <td><input type="submit" value="submit" style="float:right" id="login_submit" onclick="javascript:document.loginForm.submit();"/></td>
        </tr>
        </table>
    </form>
    </div>
    <br/>
    <div id="comments">
        <h3>Submit Comment:</h3>
        <div id="single-c">
            <form method="POST" action="attack.php" name="commentForm">
                <textarea cols="50" rows="10" name="comment" ></textarea>
                <input type="submit" value="save" id="com_submit" onclick="javascript:document.commentForm.submit();"/>
            </form>
           
            </div>
        <br />
        <div id="showcomment">
            <h3>All Comments:</h3>
            
            <?php 
          
            $inst->dispComment();
            

            ?>
        </div>
        </div>
    
</body>
</html>
