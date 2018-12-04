<?php
//Include database configuration file
include('config.php');

if(isset($_POST["id"])){
    
    $id=$_POST["id"];
    
    
    
    
    	mysqli_query($con,"UPDATE `purchase` SET `status`='1' WHERE id='$id'");
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Approved Now Reload The Page ! </p>";
			
			echo"<script>window.location.href='purchase_list.php'</script>";	
    
    
    

}




?>