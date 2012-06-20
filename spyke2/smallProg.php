<?php

interface Shape
{
    
    public function getAttr();
    public function displayAttr();
}

class Triangle implements Shape
{
    public $area;
    public $no;
    public $name;    
    public function getAttr()
    {
        $area = 200;
        $no = 1;
        $name = "Triangle";
        
    }
    public function displayAttr()
    {
        echo "No=>$no <br /> Name => $name <br/> area=> $area <br/>  " ;
        
    }
    
}



$tr = new Triangle();
$tr->getAttr();
$tr->displayAttr()
?>
