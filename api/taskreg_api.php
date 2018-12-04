<?php  
include('../config.php');
 $response = array();
$data = json_decode(file_get_contents('php://input'), true);
                    
	$comment = $_GET['comment'];

    $chk_id= $_GET['id'];
		

		  $insert=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment', `status`='1'  WHERE id='$chk_id'  ");
		 if($insert){
		     
		    	$response['message'] = "Update Success "; 
			echo json_encode($response);
		 }
		 else{
		     $response['message'] = "Note Update Success "; 
			echo json_encode($response);
		     
		 }

$response = array();
$data = json_decode(file_get_contents('php://input'), true);
                    
	$comment1 = $_GET['comment'];

    $chk_id1= $_GET['id'];
		

		
		  $insert1=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment1', `status`='2'  WHERE id='$chk_id1'  ");
		 if($insert1){
		     
		     $response['message'] = "Successfully Registered ! "; 
			echo json_encode($response);
		     
		 }
		 else
		 {
		     $response['message'] = "Note Registered ! "; 
			echo json_encode($response);
		     
		     
		 }
		 
		 

$response = array();
$data = json_decode(file_get_contents('php://input'), true);
                    
	$comment1 = $_GET['comment'];

    $chk_id1= $_GET['id'];
		

		
		  $insert2=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment1', `status`='3'  WHERE id='$chk_id1'  ");
		 if($insert2){
		     
		     $response['message'] = "Successfully Registered ! "; 
			echo json_encode($response);
		 }
		 else{
		     $response['message'] = "Note Registered ! "; 
			echo json_encode($response);
		     
		 }

?>

<?php 
error_reporting(0);
?>

<?php
$response = array();
$data = json_decode(file_get_contents('php://input'), true);

   $c_name = 	$_GET['c_id'];
  $work = $data['work'];
  $date =date('Y-m-d');
   $edate = $data['edate'];
   $userid = $_GET['id'];
   	$id=$_GET['id'];
   	$role = $data['role'];
   	$emprole = $data['emprole'];
   	$status2 = $data['status'];
   	$users = $data['user'];
   $user = implode(',', $data['user']);
  
   	$pieces = explode(",", $user);
   	
				        $file=$_FILES['profile']['name'];
                        $type=$_FILES['profile']['type'];
                        $size=$_FILES['profile']['size'];
                        $temp=$_FILES['profile']['tmp_name'];
                        // $RandomNo = mt_rand(1, 99999);
                        $nam=$file;
                      
                    
                        move_uploaded_file($temp,"images/".$nam);
                        $save="img/".$lfile;	
                        
					 foreach ($pieces as $value) 
					 {
                            "$value <br>";
    
 $results=mysqli_query($con,"select * from admin where id ='$value'");
												
													    $contacts=mysqli_fetch_array($results);
													    
													       $zemail = $contacts['email'];
  
  $insert=mysqli_query($con,"INSERT INTO `task`(`work`, `user`,`date`,`work_sender`,`edate`,`email`,`role`,`emprole`,`status`,`c_name`,`profile`) VALUES ('$work','$value','$date','$id','$edate','$zemail','$role','$emprole','$status2','$c_name','$file')");
  
  
$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject = 'Task Notification';
$pdfimage = 'pdfimage';
//$body = "THE Vehical :   ". $vehicle_no    . "is Entered in Gita Mandir Pakring On   " .$tday;
$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($zemail);

$mail->AddReplyTo($email);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->WordWrap = 120;
if(!$mail->Send()) 
{
  $response['message'] = "Message was not sent ! "; 
			echo json_encode($response);  
 
} 
else {
 $response['message'] = "mail send ok ! "; 
			echo json_encode($response);
}
   
				}
  if($insert)
  {
    $response['message'] = "Successfully Added ! "; 
			echo json_encode($response);  
  }
  else
  {
       $response['message'] = "note Added ! "; 
			echo json_encode($response); 
  }
  

 if($insert)
    {
          header("Location: taskreg.php");    
        
    }
  



?>
       