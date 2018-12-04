<?php
include('config.php');


if(isset($_POST['proleID']))
{
    $emp_id = $_POST['proleID'];
    
  
   
  
   $sql = mysqli_query($con,"select * from latters1 where id ='$emp_id'");
  
    $res = mysqli_fetch_array($sql);
   echo $res['html'];
    
}


?>