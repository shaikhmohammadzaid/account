<?php include('../config.php'); ?>
<?php error_reporting(0); ?>
<?php 

$data = json_decode(file_get_contents('php://input'), true);
	
	$id=$_GET['phone'];
               
	$sql = "SELECT * FROM `interview` WHERE phone=$id ";
   	$result = mysqli_query($con, $sql);
	$responsee = mysqli_fetch_assoc($result);
	
	$recordcount = mysqli_num_rows($result);
	if($recordcount == 1)
	 {
	
		if($responsee['status']==1)
		  {
			 $my_array = array(1 => "Accepted", 2=>$responsee);
	 
			  $response = array_merge($my_array);
		
			 
		  }
		 elseif($responsee['status']==2)
		 {
			$my_array = array(1 => "Rejected", 2=>$responsee);
	 
			  $response = array_merge($my_array);
			
			 
		 }
		  elseif($responsee['status']==0)
		 {
			$my_array = array(1 => "no Actonion", 2=>$responsee);
	 
			  $response = array_merge($my_array);
			
			 
		 }
	 	 echo json_encode($response);
	 } 
		
?>
      