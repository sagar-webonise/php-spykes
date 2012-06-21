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
        $this->area = 200;
        $this->no = 1;
        $this->name = "Triangle";
        
    }
    public function displayAttr()
    {
        echo "No=>$this->no <br /> Name => $this->name <br/> area=> $this->area <br/>  " ;
        
    }
    
}



$tr = new Triangle();
$tr->getAttr();
$tr->displayAttr()
?>
