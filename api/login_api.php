<?php include('config.php'); 


	$username=$data['username'];
	$password=md5($data['password']);
	
	$sql = mysqli_query($con,"SELECT * FROM `admin` WHERE username='".$username."' and password='".$password."' ");
		$sql1 = mysqli_query($con,"SELECT * FROM `company` WHERE username='".$username."' and password='".$password."' ");
	if(mysqli_num_rows($sql) > 0)
	{
		$result = mysqli_fetch_array($sql);
		$_GET['username'] = $result['username'];
		$_GET['id'] = $result['id'];
		$_GET['uid'] = $result['uid'];
			$_GET['c_id'] = $result['c_name'];
			 $response['message'] = "Login Successfull"; 
			echo json_encode($response);
		
	
	}
	else
	{
	     $response['message'] = "Either Username/Password Worng Try Again"; 
			echo json_encode($response);
	}
	if(mysqli_num_rows($sql1) > 0)
	{
		$result1 = mysqli_fetch_array($sql1);
		$_GET['username1'] = $result1['username'];
		$_GET['c_id'] = $result1['c_id'];
		$_GET['id'] = $result1['id'];
	 $response['message'] = "Login Successfull"; 
			echo json_encode($response);
		
	}
	else
	{
	 $response['message'] = "Login Successfull"; 
			echo json_encode($response);
	}
	
	


?>


