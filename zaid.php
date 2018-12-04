<?php
	include('config.php');
include 'fpdf.php';
    include('config.php');
    	require_once('bin/class.phpmailer.php');

require("bin/class.smtp.php");
	
	if(($_POST['bulk_delete_submitabc'])){
		$idArr = implode(',', $_POST['checked_id']);
		
     
			$user_role = $_POST['user_role'];
        
		$chkid = $_POST['checked_id'];
		foreach($chkid as $id)
		{
		   
		   


$date=date('Y-m-d');
	
	
$pdf = new PDF_HTML();
///var_dump(get_class_methods($pdf));

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

//$pdf->AddPage();
$pdf->SetFont("Arial", "B", "20");
//$pdf->Cell(0,10,"");


$pdf->SetFont('Arial', 'B', 11);
// Fetch data 
$i ='2';

$res = mysqli_query($con,"select * from latters1 where id='$id'");
while ($contact = mysqli_fetch_array($res)) {
    $type = $contact['subject'];
    $html = $contact['html'];
}
$pdf->Cell(10,10,'TO:');
$pdf->Cell(40,10,$type);

$pdf->WriteHTML(str_replace(['&nbsp;', '&ndash;'], [' ', '-'], $html));
$filename=uniqid();
$pdf->Output('pdf/'.$filename.'.pdf', 'F');




		
		$sl=mysqli_query($con,"UPDATE `latters1` SET `status`='1',`pdf`='$filename' WHERE id='$id'");
  if($sl)
	   {
			echo '<script>alert("DONE")</script>';
			
		  

$tday = date('Y-m-d');
$chknum=mysqli_query($con,"SELECT * FROM `latters1` WHERE id = '$id' ");
$numrand=mysqli_fetch_array($chknum);
$fname=$numrand['pdf'];
$user=$numrand['send'];
 
$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = "";
$subject = "From Namasteji";
$body = "This  mail is Auto Genrated By System  \n Mail Sender Name:". $name1 ."\n Mail Sender Email:". $email ."\n Messge : ". $message. 'IP:	' .$_SERVER['REMOTE_ADDR'].'\n\n';
 
$mail->IsSMTP(); 

$mail->SMTPSecure = 'ssl';
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 

$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($user);
$mail->AddAttachment('pdf/'.$fname.'.pdf');

$mail->AddAttachment('images/'.$user_role);
//$mail->AddAddress("$email");  
$mail->AddReplyTo($email, $name1);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->WordWrap = 120;
if(!$mail->Send()) 
{
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} 


	echo "<script type='text/javascript'>";
			echo "window.location='latter_send'";
			echo "</script>";
	   }
		}
		
	 
    }

?>