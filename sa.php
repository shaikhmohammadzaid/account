<?php
include('config.php');


if(isset($_POST['empId']))
{
    $emp_id = $_POST['empId'];
    $i=(int)$emp_id;
  
   
  // connection should be on this page  
   $sql = mysqli_query($con,"select * from vendor_registration where id =$i ");
  
    $res = mysqli_fetch_array($sql);
    echo $res['dsalary'];
    
}

elseif(!empty($_POST["monthly"])  && !empty($_POST["emplyid"])){
    //Fetch all state data

    
      $query1 = mysqli_query($con,"select SUM(total_rate) AS value_sum FROM emp_petrol where month='".$_POST['monthly']."' and 	emp_id='".$_POST['emplyid']."' and 	status='0'");
  
   
    
    
    
    $row = mysqli_fetch_assoc($query1); 
 $sum = $row['value_sum']; 
    //Count total number of rows
  
    
    //State option list
    if($row > 0){
      
      
            echo '<option value="'. $row['value_sum'].'">'. $row['value_sum'].'</option>';
       
    }
    else{
        echo '<option value="">No Record Found</option>';
    }
  
    
}

elseif(!empty($_POST["month"])  && !empty($_POST["emppid"]) &&  !empty($_POST["year"])){
    //Fetch all state data
    
    
      $query1 = mysqli_query($con,"select * from att_total where userid='".$_POST['emppid']."' and month='".$_POST['month']."' and year='".$_POST['year']."' ");
  
   
    
    
    
     
    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
      
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['total'].'">'.$row1['total'].'</option>';
        }
    }else{
        echo '<option value="">No Record Found</option>';
    }
  
    
}






if(isset($_POST['venID']))
{
    $emp_id = $_POST['venID'];
    $i=(int)$emp_id;
  
   
  // connection should be on this page  
   $sql = mysqli_query($con,"select * from vendor_registration where id =$i ");
  
    $res = mysqli_fetch_array($sql);
    echo $res['email'];
    
}

if(isset($_POST['phnID']))
{
    $emp_id = $_POST['phnID'];
    $i=(int)$emp_id;
  
   
  // connection should be on this page  
   $sql = mysqli_query($con,"select * from vendor_registration where id =$i ");
  
    $res = mysqli_fetch_array($sql);
    echo $res['mobile_number'];
    
}

if(isset($_POST['addID']))
{
    $emp_id = $_POST['addID'];
    $i=(int)$emp_id;
  
   
  // connection should be on this page  
   $sql = mysqli_query($con,"select * from vendor_registration where id =$i ");
  
    $res = mysqli_fetch_array($sql);
    echo $res['address'];
    
}
?>
