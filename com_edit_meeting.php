<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");  

error_reporting(0);
$id=$_GET['id'];
$sl=mysqli_query($con,"SELECT * FROM `sh_meeting` WHERE id='$id'");
$row=mysqli_fetch_array($sl);
$rv = $row['c_name'];



	if(isset($_POST['submit']))
	{
	    $c_name = $_POST['id'];
	    $rohit = $_POST['email'];
		$name = $_POST['Name'];
		$ename = $_POST['ename'];
		$phnumber = $_POST['phnumber'];
		$mpersone = $_POST['mpersone'];
		$location = $_POST['location'];
		$address = $_POST['address'];
		$note = $_POST['note'];
		$dte =$_POST['dte'];
		
		
		   
	//$insert = mysqli_query($con,"insert into sh_meeting(`c_name`, `Name`, `ename`, `phnumber`, `mpersone`, `location`,`address`,`note`,`dte`,`email`)values('$c_name','$name','$ename','$phnumber','$mpersone','$location','$address','$note','$dte','$rohit')");
  	$insert=	mysqli_query($con,"UPDATE `sh_meeting` SET `email`='$rohit',`Name`='$name',`phnumber`='$phnumber',`address`='$address',`location`='$location',`note`='$note',`dte`='$dte',`mpersone`='$mpersone',`ename`= '$ename' WHERE id='$id'");


	$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject =  'Edited  Meeting Notification';
$body = '<html><body style="background-color: #999;"><div class="col-lg-4 col-xlg-3" style="width:90%;margin:0 auto;">
		
				<div class="card" style="border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;padding: 20px;width: 100%;float: left;">
				<center>
					<a href="namasteji.in"><img class="card-img-top" src="http://parking.namasteji.co.in/images/img16766logo.png" alt="Card image cap" style="width: 150px;border-top-left-radius: calc(.25rem - 1px);border-top-right-radius: calc(.25rem - 1px);"></a>
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
												<td class="center" style="border: 1px solid;text-align: center;">Phone Number</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $phnumber  . '</td>
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
												<td class="center" style="border: 1px solid;text-align: center;">Name Of Meeting Person Name </td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $name  .'</td>
											</tr>
											
												<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Meeting With </td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $ename  .'</td>
											</tr>
	                                        
	                                        	<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Meeting Purpose </td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $mpersone  .'</td>
											</tr>
	                                        
										
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Meeting Note</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.  $note  .'</td>
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
                    <h3 class="text-themecolor">Edit Meeting</h3>
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
                                <h4 class="card-title">Edit  Meeting Info</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" >
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Name Of Meeting Person: </label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Name Of Meeting Person" name="Name"    value="<?php echo $row['name']  ?>"     required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
									  <div class="form-group row">
											<label class="col-md-4 col-form-label">Select Date:</label>
											<div class="col-md-5">
											<input type="date" class="form-control" name="dte" value="<?php echo $row['dte']  ?>" >
										</div>
										</div>
								
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Meeting Person:</label>
												<div class="col-md-5">
												<select   name="ename" id="i1" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Meeting Person</option>
											<?php
											$resultab=mysqli_query($con,"select * from  meeting ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['name']; ?>"><?php echo $contactab['name']; ?></option>
											<?php } ?>
											</select>
											 
											</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Phone Number:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Phone Number" name="phnumber"  value="<?php echo $row['phnumber']  ?>" required data-validation-required-message="This field is required">
											</div>
										</div>
											
											<div class="form-group row">
												<label class="col-md-4 col-form-label"> Email Id:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Email Id" name="email" value="<?php echo $row['email']  ?>" required data-validation-required-message="This field is required">
											</div>
										</div>
									
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Meeting Purpose:</label>
													<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Meeting Purpose" name="mpersone"  value="<?php echo $row['mpersone']  ?>"  required data-validation-required-message="This field is required">
											</div>
										</div>
                                    
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Address:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Enter Address" name="address"  value="<?php echo $row['address']  ?>" required data-validation-required-message="This field is required">
											</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Location:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Enter Location" name="location" value="<?php echo $row['location']  ?>" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Note: </label>
												<div class="col-md-5">
												<input type="textarea" id="firstName" class="form-control" placeholder="Note.." name="note" value="<?php echo $row['note']  ?>" required data-validation-required-message="This field is required">
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
