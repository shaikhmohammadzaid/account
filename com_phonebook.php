<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);

	if(isset($_POST['submit'])){
		
		$cname = $_POST['cname'];
			$num= $_POST['num'];
				$snum = $_POST['snum'];
					$email = $_POST['email'];
						$address = $_POST['address'];
							$date = date('Y-m-d');
		  $c_nameeee =  $_SESSION['c_id'];
	$insert=mysqli_query($con,"insert into phonebook (`c_id`,`cname`,`num`,`snum`,`email`,`address`,`date`)values('$c_nameeee','$cname','$num','$snum','$email','$address','$date')");
		if($insert)
		{
		    $mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'ADD NEW PHONEBOOK'.$email;
$pdfimage = 'pdfimage';
$body = "ADD NEW PHONEBOOK :   ". $email    . " On  Date is  " .$date;
//$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

$mail->addAttachment("images/".$nam);		
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
  echo 'Message was not sent.';
 echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else {

 echo 'mail send ok';
}
		    
		    
		    
		    
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
                    <h3 class="text-themecolor">Add Phonebook</h3>
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
                                <h4 class="card-title">Add New Phonebook</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Contact Name:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Contact Name" name="cname" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Mobile Number:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Mobile Number" name="num" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Secondary Number(optional):</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Secondry Number" name="snum" >
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Email Id:</label>
												<div class="col-md-5">
												<input type="email" id="firstName" class="form-control" placeholder="Email Id" name="email" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label"> Address:</label>
												<div class="col-md-5">
												<input type="textarea" id="firstName" class="form-control" placeholder="Address" name="address" >
											</div>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

         <?php include('footer.php'); ?>
