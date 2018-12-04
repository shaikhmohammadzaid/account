<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);
?>

<?php 
if(isset($_POST['submit'])){
	$c_name1 = $_SESSION['c_id'];
	$c_name = $_POST['c_name'];
	$f_name = $_POST['f_name'];
		$gender=$_POST['gender'];
		$qualification=$_POST['qualification'];
			$marks=$_POST['marks'];
		$clg_name=$_POST['clg_name'];
			$address=$_POST['address'];
		$email=$_POST['email'];
		$contact_person=$_POST['contact_person'];
		
	$state = $_POST['state'];
	$city=$_POST['city'];


	$phone=$_POST['phone'];
	$sphone=$_POST['sphone'];
		$post=$_POST['post'];
		
		
		
		
			$experience=$_POST['experience'];


	$p_company=$_POST['p_company'];
	$reason=$_POST['reason'];
		$asalary=$_POST['asalary'];
			$type=$_POST['type'];
	


$idate=date('Y-m-d');



	
	

	
	
	
	$insert=	mysqlI_query($con,"insert into interview(`c_id`,`c_name`,`f_name`, `gender`, `qualification`, `marks`, `clg_name`, `address`, `email`, `contact_person`,`state`,`city`,`phone`,`sphone`,`created _date`,`post`,`experience`,`p_company`,`reason`,`asalary`,`type`)values('$c_name1','$c_name','$f_name','$gender','$qualification','$marks','$clg_name','$address','$email','$contact_person','$state','$city','$phone','$sphone','$idate','$post','$experience','$p_company','$reason','$asalary','$type')");
if($insert){
	
	
	$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'INTERVIEW REGISTRATION FORM'.$c_name;
$pdfimage = 'pdfimage';
$body = "INTERVIEW REGISTRATION FORM :   ". $c_name    . " On  Date is  " .$idate;
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Interview Registration Form</h3>
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
                                <h4 class="card-title">Interview Registration Form</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									<div class="row">
									
								
								
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Candidate Type</label>
												
												
												 <select id="candidate" name="type" class="form-control" data-rel="chosen" >
												     <option  value="">Select one</option>
												<option  value="Fresher">Fresher</option>
													<option  value="Experience">Experience</option>
												
												 </select>
											</div>
										</div>
									 
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Candidate Name*</label>
												<input type="text" id="firstName" class="form-control" placeholder="Candidate Name" name="c_name" required data-validation-required-message="This field is required">
											</div>
										</div>
											<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Father Name*</label>
												<input type="text" id="firstName" class="form-control" placeholder="Father Name" name="f_name" required data-validation-required-message="This field is required">
											</div>
										</div>
											
								
										</div>
										<div class="row">
									        <div class="col-md-4" style="display:none;" id="ex">
											<div class="form-group">
												<label class="control-label">Experience</label>
												<input type="text" id="ex" class="form-control" placeholder="Experience" name="experience" >
											</div>
										</div>
									
											    <div class="col-md-4" style="display:none;" id="pre" >
											<div class="form-group">
												<label class="control-label">Previous Company</label>
												<input type="text" id="pre" class="form-control" placeholder="Previous Company" name="p_company" >
											</div>
										</div>
											<div class="col-md-4" style="display:none;" id="reason">
											<div class="form-group">
												<label class="control-label">Reason Of Resign</label>
												<input type="text" id="reason" class="form-control" placeholder="Reason Of Resign" name="reason">
											</div>
										</div>
										</div>
											<div class="row">
											    
											    
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Gender</label>
												
												
												 <select id="gender" name="gender" class="form-control" data-rel="chosen" >
												     <option  value="">Select one</option>
												<option  value="male">Male</option>
													<option  value="female">Female</option>
													<option  value="other">Other</option>
												 </select>
											</div>
										</div>
										
											    <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Qualification</label>
												<input type="text" id="firstName" class="form-control" placeholder="Qualification" name="qualification" >
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">College Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="College Name" name="clg_name" >
											</div>
										</div>
										</div>
									<div class="row">
									    
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">% Of marks</label>
												<input type="text" id="firstName" class="form-control" placeholder="% of marks" name="marks" >
											</div>
										</div>
										
									    <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" id="firstName" class="form-control" placeholder="Address" name="address" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select State</label>
												
												
												 <select id="listBox" name="state" class="form-control" onchange='selct_district(this.value)'></select>
											</div>
										</div>
										</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select City</label>
												
												
												<select id='secondlist' class="form-control" name="city"></select>
											</div>
										</div>
										
										 	    
										  <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Phone Number</label>
												<input type="text" id="firstName" class="form-control" placeholder="Phone Number" name="phone" >
											</div>
										</div>
										
										
										 <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Phone Number(secondary)</label>
												<input type="text" id="firstName" class="form-control" placeholder="Phone Number" name="sphone" >
											</div>
										</div>
		
									    	</div>
									<div class="row">
									        <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Post*</label>
												<input type="text" id="firstName" class="form-control" placeholder="Post" name="post" required data-validation-required-message="This field is required">
											</div>
										</div>
									
											    <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Email id</label>
												<input type="email" id="firstName" class="form-control" placeholder="Email id" name="email" >
											</div>
										</div>
											<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Contact Person</label>
												<input type="text" id="firstName" class="form-control" placeholder="Contact Person" name="contact_person">
											</div>
										</div>
										</div>
										<div class="row">
											<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Expected salary</label>
												<input type="text" id="firstName" class="form-control" placeholder="Expected salary" name="asalary">
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
                 <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
        <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;" href="http://www.hscripts.com"></a>
      </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<script src="jquery.min.js" type="text/javascript"></script>
 <script language="Javascript" src="jquery.js"></script>
    <script type="text/JavaScript" src='state.js'></script>
    	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#candidate').on('change', function() {
     
	  if ( this.value == 'Experience')
      {
		  
       
		
		 $("#ex").show();
		 $("#pre").show();
		 $("#reason").show();
       
        
      }
      else
      {
       
       
	 $("#ex").hide();
	 $("#pre").hide();
	 $("#reason").hide();
	 
      }
	  
	  
    });
    
     
    
    
    
});

</script>

         <?php include('footer.php'); ?>
