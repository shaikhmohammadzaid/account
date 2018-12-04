<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");  

error_reporting(0);
$id=$_GET['id'];
$sl=mysqli_query($con,"SELECT * FROM `sh_meeting` WHERE id='$id'");
$row=mysqli_fetch_array($sl);
$rv = $row['ename'];
$address = $row['address'];
$location = $row['location'];
$rohit = $row['email'];






	if(isset($_POST['submit']))
	{
	   
	
		$dte =$_POST['dte'];
		
		
		   
	//$insert = mysqli_query($con,"insert into sh_meeting(`c_name`, `Name`, `ename`, `phnumber`, `mpersone`, `location`,`address`,`note`,`dte`,`email`)values('$c_name','$name','$ename','$phnumber','$mpersone','$location','$address','$note','$dte','$rohit')");
  	$insert=	mysqli_query($con,"UPDATE `sh_meeting` SET `dte`='$dte' WHERE id='$id'");


	$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject =  'Forward  Meeting Notification';
$body = '<html><body style="background-color: #999;"><div class="col-lg-4 col-xlg-3" style="width:90%;margin:0 auto;">
		
				<div class="card" style="border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;padding: 20px;width: 100%;float: left;">
				<center>
					<a href="namasteji.in"><img class="card-img-top" src="http://account.namasteji.co.in/images/logo.png" alt="Card image cap" style="width: 150px;border-top-left-radius: calc(.25rem - 1px);border-top-right-radius: calc(.25rem - 1px);"></a>
				</center>
					<div class="card-body little-profile" style="width:100%;float:left;">
					<h4 class="card-title" style = "color:black";>Meeting Information</h4>
					<div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" style="border: 1px solid;">
										<tbody>
											<tr>
											    <td class="center" style="border: 1px solid;text-align: center;">Meeting Address</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.$address.'</td>
											</tr>
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Location</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $location  . '</td>
											</tr>
										
												<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Email Id</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.  $rohit   . '</td>
											</tr>
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;"> On Date</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $dte  .'</td>
											</tr>
											
										
												<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Meeting With </td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $rv  .'</td>
											</tr>
	                                        
	                                        
											
										
											
                                        </tbody>
                                    </table>
                                </div>
	</div>
	</div>
</div></body></html>';

$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($rohit);

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

 echo 'mail send ok';
}
		if($insert)
		{
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		}
		
	}
?>
 <style>
    label.col-md-4.col-form-label {
    text-align: right;
}
</style>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Forward Meeting</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Meeting</li>
                        <li class="breadcrumb-item active">Forward Meeting</li>
                    </ol>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Forward Meeting</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" >
									
							
									  <div class="form-group row">
											<label class="col-md-4 col-form-label">Select Date</label>
												<div class="col-md-5">
											<input type="date" class="form-control" name="dte" value="<?php echo $row['dte']  ?>" >
									</div>
								</div>
									
									
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

         <?php include('footer.php'); ?>
