<?php
include('config.php');

$id=$_GET['id'];


       

       $sql="UPDATE `purchase` SET `status`='1' WHERE id='$id'";
        $result=  $this->con->query($sql);
        
         if($result){
          return 'Successfully Updated Purchase';     
        }else{
         return 'An error occurred while inserting data';     
        }
          
        
           
       

