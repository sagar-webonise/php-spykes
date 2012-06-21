<?php
include 'connection.php';

class category{
       public $no;
       
       public $name;
      
       public $totalItems;
       
       public function concate(){
           
           return "no=$this->no  name=$this->name  totalItems=$this->totalItems<br/>";
           
       }
}
class Implemenation extends PDOException{
    public $pdo;
    public $sql;
    public function conn()
    {
        $conn =new Conn();
        
        $this->pdo = $conn->connect();
        $this->sql = "select * from category";
        
    }
    public function insertData()
    {
        
        if($_SERVER["REQUEST_METHOD"]==='POST')
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $totalitems = $_POST['totalItem'];
            $inser_q="insert into category values ('$id','$name','$totalitems')";
            $count = $this->pdo->exec($inser_q);
            echo "rows affeted => $count";
            //echo $id.$name.$totalitems;
        }
        
    }
    
    public function assoc()
    {
      
        $stmt = $this->pdo->query($this->sql);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      
    }
    public function num()
    {
 
        $stmt = $this->pdo->query($this->sql);
        $result=$stmt->fetch(PDO::FETCH_NUM);
        return $result;
      
    }
    public function both()
    {

        $stmt = $this->pdo->query($this->sql);
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        return $result;
      
    }
    
    public function obj()
    {
     
        $stmt = $this->pdo->query($this->sql);
        $result=$stmt->fetch(PDO::FETCH_OBJ);
        return $result;
      
    }
    
    public function lazy()
    {
     
        $stmt = $this->pdo->query($this->sql);
        $result=$stmt->fetch(PDO::FETCH_LAZY);
        return $result;
      
    }
    
    public function classs()
    {
       $stmt = $this->pdo->query($this->sql);
       $result = $stmt->fetchALL(PDO::FETCH_CLASS, 'category');
       return $result;
        
    }
    
   public function errorHand()
    {   
       
        $sq_query = "select position from category";
         try{
             
             
                 $sql = "SELECT username FROM animals";

                foreach ( $this->pdo->query($this->sql) as $row)
                    {
                    print $row['animal_type'] .' - '. $row['animal_name'] . '<br />';
                    }
            }
         catch(PDOException $e)
         {
         
             echo $e->getMessage();
             
         }
       
    }
    
    public function prepared()
    {
        $no = 2;
        $name = "shoes";
        $totalItems= 299;
        
        $stmt = $this->pdo->prepare("SELECT * FROM category WHERE no= :number AND name = :catname");
        $stmt->bindParam(':number', $no, PDO::PARAM_INT);
        $stmt->bindParam(':catname', $name, PDO::PARAM_STR, 200);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];
        
        
    }
    
    public function transaction()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->beginTransaction();
        try{
        $this->pdo->exec("insert into category values ('23','test2','28')");
        $this->pdo->exec("insert into category values ('33','ds2','32')");
        $this->pdo->exec("insert into category1 values ('2111','bahhhsb','2')");
        
        $this->pdo->commit();
        echo "Transaction successfull";
        }
        catch(Exception $e)
        {
            $this->pdo->rollback();
            echo "Transaction failed";
        }
    }
    
    public function lastInserted()
    { 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $inser_q="insert into category values ('20','test','2828')";
        $count = $this->pdo->exec($inser_q);
        return $this->pdo->lastInsertId();
    }
    
}



$impl = new Implemenation();

?>
<html>
    <head><link rel="stylesheet" type="text/css" href="../../style.css" />
    </head>
    <body>
        
<div id="pdotable">
    <h3>PDO Implementations:</h3>
    <table border="1px;">
        <tr><th width="200px;">Task/functions</th><th width="400px;">Implementations</th></tr>
        <tr><td>1) Connection to db</td><td><?php $impl->conn(); ?></td></tr>
        
               
        <tr><td>2) Insert </td> <?php $impl->insertData();?><td>
                
                <h4>Add Categoy info:</h4>
                <form method ="POST" action="" name="catform">
                <table><tr>
                        <td>no</td>
                        <td><input type="text" name="id" ></td>
                    </tr> 
                        <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" ></td>
                        </tr>
                        <tr>
                        <td>TotalItems</td>
                        <td><input type="text" name="totalItem" ></td>
                        
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" onclick="javascript:document.catform.submit()"></td>
                        </tr>
                
                </table>
                
            </td></tr>
        <tr><td>3) Assoc</td><td><?php $result = $impl->assoc();
            if($result)
                   foreach($result as $key=>$val)
                            {
                                    echo "<br/>".$key."=>".$val;
                            }     
        
        ?></td></tr>
       
        
        <tr><td>4) Num</td><td>
                <?php $result = $impl->num();
                if($result)
                   foreach($result as $key=>$val)
                            {
                                    echo "<br/>".$key."=>".$val;
                            }     
        
        ?>
                
            </td></tr>
        
        
        <tr><td>5) Both</td>
            <td>
                
                <?php $result = $impl->both();
                if($result)
                   foreach($result as $key=>$val)
                            {
                                    echo "<br/>".$key."=>".$val;
                            }     
        
                ?>
                
            </td></tr>
       
        
        <tr><td>6) Object</td><td>
                <?php $result = $impl->obj();?>
                <table border="1px;">
                <tr><th>no</th><th>name</th><th>total Items</th></tr>
                 <?php 
                  //while($result){
                   echo "<tr>";
                   echo "<td>".$result->no."</td>";
                   echo "<td>".$result->name."</td>";
                   echo "<td>".$result->totalItems."</td>";
                   echo "</tr>";
                  //}
                   ?>
                </table>   
                
                   
                
                
            </td></tr>
        
        
        <tr><td>7) Lazy</td><td>
                
                <?php $result = $impl->lazy();
                if($result)
                   foreach($result as $key=>$val)
                            {
                                    echo "<br/>".$key."=>".$val;
                            }     
        
                ?>
                
                
            </td></tr>
        
        
        <tr><td>8) Class</td><td>
                <?php $result = $impl->classs();
                if($result)
                   foreach($result as $item)
                            {
                                    echo $item->concate();
                            }     
        
                ?>
                
            </td></tr>
       
        
        <tr><td>9) Error handling</td><td>
                 <?php 
                 
                     echo  $impl->errorHand()   ;
                     
                ?>
               
                
            </td></tr>
        
        
        <tr><td>10) Prepared</td><td>
                
                <?php $result = $impl->prepared();
                if($result)
                   foreach($result as $key=>$val)
                            {
                                    echo "<br/>".$key."=>".$val;
                            }     
        
                ?>
                
                
            </td></tr>
        
        
        <tr><td>11) Transaction</td><td>
                
                <?php
                $impl->transaction();
                //  echo "transaction done";
                ?>
                
                
            </td></tr>
        
        
        <tr><td>12) Get last insert Id</td><td>
                <?php
                  echo $impl->lastInserted();
                ?>
                
            </td></tr>
        
        
        <tr><td>13) Close connection</td><td>
                <?php
                        $impl->pdo = null;
                        if(!$impl->pdo)
                            echo "connection colsed!!";
                ?>
                
            </td></tr>
        
 
        
        
        <tr><td></td><td></td></tr>
        
        
        <tr><td></td><td></td></tr>
        
        
        <tr><td></td><td></td></tr>
        
        
        <tr><td></td><td></td></tr>
        
        
        <tr><td></td><td></td></tr>
        
        
    </table>
    
    
</div>
    </body>
</html>
