
<?php
//header('Location: hello.php');
$string1 = 'PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.';
$string2 = "PHP does not require (or support) explicit type definition in variable declaration; a variable's type is determined by the context in which the variable is used.";


function allOccPHP($string)
    {
        return substr_count($string, 'PHP');
    }

function allPosPHP($string)
{
    $array = array();
    $i=0;
    $sum =0 ;
    $arr = explode("PHP",$string);
    array_pop($arr);
    foreach($arr as $item)
    {
         $pos = strlen($item);
         $array[$i] = ($pos);
         $i = $i+1;
         $sum = $sum + $pos;
    }
    foreach($array as $item){
       echo $item."  ";
    }
    
}

function capstr($string)
{
  return strtoupper($string);
}

function combine($string1 , $string2)
{
    
    return $string1.$string2;
}

function echoHeredoc($string1,$string2)
{
 /*$string1 = <<<'ONE'
    PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. 
    The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.
     ONE;
 $string2 = <<<'TWO'
    PHP does not require (or support) explicit type definition in variable declaration; 
    a variable's type is determined by the context in which the variable is used.
    TWO;
 */
 return "string1="."'".$string1."<br/> string2="."'".$string2."'";
}  

function today()
{
    return date("Y/m/d");
    
}

function dateform()
{
    $date = new DateTime('1/12/2012');
    return $date->format('jS M Y');
    
}

function sevenDays()
{
    $date = strtotime("+7 day", strtotime(date("Y/m/d")));
    return date("Y/m/d", $date);
    
}

function recPrint($array , $len ,$i){
    
          if($i==$len)
              return;
          else 
          {
             echo "$array[$i]";
             recPrint($array,$len,$i+1);
          }
}
function arrayOfWords($string)
{
    
    $array = explode(" ",$string);
    
    recPrint($array,count($array),0);
    
    
}
function spliteFour($string)
{
    $len = strlen($string);
    $parts = str_split($string, 57);
    $i = 0;
    foreach($parts as $item)
    {
        echo ++$i.":  ";
        echo $item."<br>";
    }

    
}

function divideAndComb($string)
{
    $array = explode(".",$string); 
    
    $array_r = array_reverse($array);
    $combined = "";
    foreach($array_r as $item)
    {
      $combined = $combined.$item;      
    }
    echo $combined;
    
}

function removeHtml($string)
{
    //we can use strip_tags() 
    while(1)
    {
    $pos1 = strpos($string, '<');
    $pos2 = strpos($string, '>');
    
    if($pos1!=false && $pos2!=false && ($pos1<$pos2))
    {
     while($pos1!=($pos2+1))
     {
     $string[$pos1]='';
     $pos1++;     
     
     }
        
    }
    else
        break;
    }
    
    echo $string;
    
}


function printPhpTrav($string1)
{
    $pos = strpos($string1,"PHP");
    echo substr($string1,$pos,3);
    
}

function lengths($string1,$string2)
{
    echo "Length of String1=> ".strlen($string1)."  characters";
    echo "<br />Length of String2=> ".strlen($string2)."  characters";
    
}

function stringFile($string1)
{
    $file = "string1.text";
    $fp = fopen($file, 'w');
    fwrite($fp, $string1);
    fclose($fp);
    echo "string1 written to file string1.text please have a look in current folder";
    
}

function globalVar()
{
    //print_r($GLOBALS); 
    echo phpinfo(INFO_VARIABLES);
    
}

function dateComp()
{
    $date1 =new DateTime("12/4/2010");
    $date2 =new DateTime("12/5/2011");
   if($date1>$date2)
        echo "12/4/2010 is greater than 12/5/2011";
    else {
        echo "12/4/2010 is less than 12/5/2011";
    }
    
    $interval = $date1->diff($date2);
    echo "<br /> Difference=>".$interval->format('%R%a days');
    
        
    
}

function twentyDays()
{
    $date = strtotime("+20 day", strtotime(date("Y/m/d")));
    return date("Y/m/d", $date);
    
}

function dateToArray()
{
     $date = date("Y/m/d");
     $array = explode("/",$date);
     print_r($array);
}
?>
<table border="1px">
       <tr><td >String1 = "<?php echo $string1; ?>"<td rowspan="1">String2="<?php echo $string1; ?>"</td></tr>
</table>

<table border="1px">
    
    <tr><th>Questions</th><th>Answers</th></tr>
    
    
    <tr><td>1. Count occurance of PHP from string 1.</td>  <td><?php echo allOccPHP($string1);?></td></tr>
    
    
    <tr><td>2. Find the position where PHP occures in the string 1.</td><td><?php echo allPosPHP($string1);?></td></tr>
    
    
    <tr><td>3. Create array of words in string 1 & print them using a recursive function.</td><td><?php arrayOfWords($string1);?></td></tr>
    
    
    
    <tr><td>4. Capitalise string 1</td><td><?php echo capstr($string1);?></td></tr>
    
    
    
    <tr><td>5. Combine string 1 & 2.</td><td><?php echo combine($string1 , $string2);?></td></tr>
    
    
    
    <tr><td>6. Echo string 1 & 2 using heredoc.</td><td><?php echo echoHeredoc($string1,$string2);?></td></tr>
    
    
    <tr><td>7. Print current date</td><td><?php echo today(); ?></td></tr>
    
    
    
    <tr><td>8. print 12th Jan 2012</td><td><?php echo dateform(); ?></td></tr>
    
    
    
    <tr><td>9. add 7 days in current date</td><td><?php echo sevenDays() ?></td></tr>
    
    
    <tr><td>10. Cut the string 1 into 4 parts & print it.</td><td><?php spliteFour($string1) ?></td></tr>
    
    
    <tr><td>11. Divide the string 1 by occurances of '.'. Combine the array in reverse word sequence</td><td><?php divideAndComb($string1) ?></td></tr>
    
    
    
    <tr><td>12. Remove the HTML characters from string.</td><td><?php removeHtml($string1);?></td></tr>
    
    
    <tr><td>13. Print the 'PHP' word from string 1 by traversing it using string functions</td><td><?php printPhpTrav($string1);?></td></tr>
    
    
    
    <tr><td>14. Find the length of string 1 & 2</td><td><?php lengths($string1,$string2);?></td></tr>
    
    
    
    <tr><td>15. Create file & write string 1 to that file using PHP functions.</td><td><?php stringFile($string1);?></td></tr>
    
    
    
    <tr><td>16. Print all Global varibles provided by PHP</td><td><?php globalVar();?></td></tr>
    
    
    
    <tr><td>17. Usage and examples of Header (PHP)</td><td>
        1)Php header function will send a http header to the browser.<br/>
        2)Not only does it send this header back to the browser, but it also returns a REDIRECT (302) status code to the browser unless the 201 or a 3xx status code has already been set.
        <br />Here is example <br />
        ?php<br />
          header("Location: http://kirupa.com");<br />
         ?><br /> *This will send a new location to the browser and it will immediately redirect.</td></tr>
    
    
    
    <tr><td>18. Redirect page 1 to page 2.</td><td>We have to remove a comment</td></tr>
    
    
    
    <tr><td>19. Compare two dates. (12-4-2010 & 12-5-2011). Calculate the days between these two dates.</td><td><?php dateComp();?></td></tr>
    
    
    
    
    <tr><td>20. Print date after 20 days from current date</td><td><?php echo twentyDays();?></td></tr>
    
    
    <tr><td>21. Print date in array format.</td><td><?php echo dateToArray();?></td></tr>
   
        
    
    

    
</table>


