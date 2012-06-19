
<?php
function affection()
{
   $link = mysql_connect('localhost', 'root', 'root');
    if (!$link) 
        die('Could not connect: ' . mysql_error());
    else{
         if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
             echo "Posted";
    }
    mysql_select_db("phpSpyke2");
    $tables = mysql_query("show tables from phpSpyke2;");
   
   while ($row = mysql_fetch_row($tables)) {
    echo "Table: $row[0]\n";
    }
  
    }
 


}

affection();
?>

<html>
<head><title>Security Attacks</title>



</head>
<body>
    <link rel="stylesheet" type="text/css" href="../style.css" />
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
        </div>
        </div>
    
</body>
</html>
