<?php
$string1 = "PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.";
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
    foreach(explode("PHP",$string) as $item)
    {
         $pos = strlen($item);
         $array[$i] = ($pos - 1);
         $i = $i+1;
         $sum = $sum + $pos;
    }
    return $array;
    
}


?>
<table border="1px">
       <tr><td >String1 = "<?php echo $string1; ?>"<td rowspan="1">String2="<?php echo $string1; ?>"</td></tr>
</table>

<table border="1px">
    
    <tr><th>Questions</th><th>Answers</th></tr>
    <tr><td>1. Count occurance of PHP from string 1.</td>  <td><?php echo allOccPHP($string1);?></td></tr>
    <tr><td>2. Find the position where PHP occures in the string 1.</td><td><?php echo allPosPHP($string1);?></td></tr>
</table>


