<?php 
include('../config.php');

$response = array();
$data = json_decode(file_get_contents('php://input'), true);
	
		
		
		$task = $data['task'];
			$role = $data['role'];
			
			  $date =date('Y-m-d');
			  
  if($role !==" " || $task  !==" " )
  {
  
   	$id=$_GET['id'];
		
     	$rr=mysqli_query($con,"insert into task_list (`task`) values('$task')");
		
			if($rr)
	{
			$response['message'] = "Success"; 
			echo json_encode($response);
	}
  }
	else
	{
		$response['message'] = "filup the fill "; 
			echo json_encode($response);
	}
	
?>
