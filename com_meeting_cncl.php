<?php
include('config.php');
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");  
if(isset($_GET['id']))
{
$status1=$_GET['id'];
$select=mysqli_query($con,"select * from sh_meeting where id='$status1'");
while($row=mysqli_fetch_object($select))
{
$status_var=$row->status;
$status_varx=$row->email;
$status_var1=$row->ename; 
$status_var2=$row->phnumber;     
$status_var3=$row->address;     
$status_var4=$row->location;     
$status_var5=$row->dte;
$status_var6=$row->name; 

if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=mysqli_query($con,"update sh_meeting set status='$status_state' where id='$status1' ");
if($update)
{
$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject = 'Meeting Cancel  Notification';
$body = "The Meeting is Canceled, Meeting Date is :   ". $status_var5   . "  Meeting Address Is   " .$status_var3;
//$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($status_varx);

$mail->AddReplyTo($email);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->WordWrap = 120;
if(!$mail->Send()) 
{
  echo 'Message was not sent.';
 echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else {

  header("Location:com_meeting_list.php");
}
   
  
	


}
else
{
echo mysqli_error();
}
}
?>
<?php
}
?>