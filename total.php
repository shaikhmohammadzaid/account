<?php
include('config.php');


if(isset($_POST['businessa']))
{
    $emp_id = $_POST['businessa'];
    $i=(int)$emp_id;
  
   
  // connection should be on this page  
   $sql = mysqli_query($con,"select * from emp_salary where emp_id =$i ");
 
     while($row = mysqli_fetch_array($sql))
		{
			
			
				echo'<label class="control-label">Total</label>';
				echo '<input type="checkbox" class="form-control" id="txt1"  name="day" value="'.$row['salary'].'" readonly>';
			
		}
}


if($rowCount > 0){
       
	}






?>
