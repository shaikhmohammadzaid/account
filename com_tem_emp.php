<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);

	if(isset($_POST['submit'])){
		
		
		$name = $_POST['name'];
			$type = $_POST['type'];
		$designation = $_POST['designation'];
		  $c_id = $_SESSION['c_id'];
	$insert=	mysqli_query($con,"insert into  tem_emp2 (`c_name`,`vendor_for`,`v_name`,`designation`)values('$c_id','$type','$name','$designation')");
		if($insert){
		    
		    $mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'TEMPORARY EMPLOYEE'.$name;
$pdfimage = 'pdfimage';
$body = "TEMPORARY EMPLOYEE :   ". $name;
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
                    <h3 class="text-themecolor">Temporary Employee</h3>
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
                                <h4 class="card-title">Add Temporary Employee</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
									 
									 
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Type</label>
													<div class="col-md-5">
												<select id="per" name="type"  class="form-control" data-rel="chosen" >
												<option value="">Select Trader Type</option>
												<option value="employee">temporary employee</option>
												<option value="Rental Purchase">Rental Purchase</option>
												
												</select>
													</div>
											</div>
									
									
											<div class="form-group row" id="empname">
												<label class="col-md-4 col-form-label">Name:</label>
												<div class="col-md-5">
												<input type="text" id="empname" class="form-control" placeholder="Name" name="name" required data-validation-required-message="This field is required">
											</div>
										</div>
										
		
										
											<div class="form-group row" id="des" style="display:none;">
												<label class="col-md-4 col-form-label">Employee Designation :</label>
												<div class="col-md-5">
												<input type="text" id="des" class="form-control" placeholder="Employee Designation" name="designation" >
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
                
               
			    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Temporary Employment List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Type</th>
                                                                                                <th>Name</th>
                                                                                                <th>Designation</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
													$no=0;
													$result=mysqli_query($con,"select * from  tem_emp2  ORDER BY id DESC");
													while($contact=mysqli_fetch_array($result))
													{
												/*	$main_id=$contact['main_id'];
													$result1=mysqli_query($con,"select * from emp_main where id='$main_id'  ORDER BY id DESC");
													$contact1=mysqli_fetch_array($result1);*/
														$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contact['vendor_for'];?></td>
												<td class="center"><?php echo $contact['v_name'];?></td>
												<td class="center"><?php echo $contact['designation'];?></td>
												<td class="center">
												     <a class="btn btn-info" href="tem_show_vender.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
													temporary Statement
													</a>
													
													 <a class="btn btn-info" href="tem_emp_edit.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
													<a class="btn btn-info" href="tem_emp_edit.php?id=<?php echo $contact['id'] ?>&delete=delete">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Delete
													</a>
												</td>
											</tr>
											<?php
													}
												?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			   
            </div>
            
            
            	<script src="jquery.min.js" type="text/javascript"></script>
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#per').on('change', function() {
     
	  if ( this.value == 'employee')
      {
		  
       
		
		
		  $("#des").show();
       
        
      }
      else
      {
       
       
	 
	  $("#des").hide();
	 
      }
	  
	  
    });
    
    
    
    
});

</script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

         <?php include('footer.php'); ?>
