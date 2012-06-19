<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
   
   echo mysql_select_db("phpSpyke2");
   
 /*  $tables = table("show tables from phpSpyke2;");
   
   while ($row = mysql_fetch_row($tables)) {
    echo "Table: $row\n";
    }
   */

}
?>
