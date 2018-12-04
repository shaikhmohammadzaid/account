<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);

	if(isset($_POST['submit'])){
		
		
		$task = $_POST['task'];
			$role = $_POST['role'];
			
			  $date =date('Y-m-d');
  
  
   	$id=$_SESSION['id'];
		//comment  code for send task to all emloyee of designation 
     $insert=mysqli_query($con,"insert into task_list (`task`) values('$task')");
			if($insert)
	 {
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'TASK'.$task;
$pdfimage = 'pdfimage';
$body = "TASK :   ". $task    . " On  Date is  " .$date;
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
	/*	
		$results1=mysqli_query($con,"select * from admin where user_role ='$role'");
		
		 	while($contact11=mysqli_fetch_array($results1)){
													    
													       $uid = $contact11['id'];
							
                            
													   
  
  $insert=mysqli_query($con,"INSERT INTO `task`(`work`,`user`,`date`,`work_sender`,`edate`,`email`,`role`,`emprole`,`status`) VALUES ('$task','$uid','$date','$id','$edate','$email','$role','$emprole','$status2')");
  
  
   
				}*/
				
		
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
                    <h3 class="text-themecolor">Task Category</h3>
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
                                <h4 class="card-title">Add Task</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
									
										<!--	<div class="form-group row">
												<label class="col-md-4 col-form-label" id="role">Department</label>
												<div class="col-md-5" >
												
											<select id="prole" name="role"  class="form-control" data-rel="chosen">
												<option value="">Select Department</option>
											<?php
											$resultab=mysqli_query($con,"select * from emp_main");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['main_nm']; ?></option>
											<?php } ?>
												
												</select>
											</div>
										</div>-->
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Task:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Enter Task" name="task" required data-validation-required-message="This field is required">
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
                                <h4 class="card-title">Task List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												
                                                                                                <th>Task</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
													$no=0;
													$result=mysqli_query($con,"select * from task_list  ORDER BY id DESC");
													while($contact=mysqli_fetch_array($result))
													{
													
														$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
											
												<td class="center"><?php echo $contact['task'];?></td>
												<td class="center">
													 <a class="btn btn-info" href="task_edit.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
													<a class="btn btn-info" href="task_edit.php?id=<?php echo $contact['id'] ?>&delete=delete">
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

         <?php include('footer.php'); ?>
