<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);

	if(isset($_POST['submit'])){
		
		$main_id = $_POST['main_id'];
		$sub_nm = $_POST['sub_nm'];
		
		$insert=mysqli_query($con,"insert into sub_ct (`main_id`,`sub_nm`)values('$main_id','$sub_nm')");
			if($insert)
	 {
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'NEW SUB CATEGORY'.$sub_nm;
$pdfimage = 'pdfimage';
$body = "NEW SUB CATEGORY :   ". $sub_nm ;
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
                    <h3 class="text-themecolor">Sub Category</h3>
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
                                <h4 class="card-title">Add Sub Category</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
									
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Main Category:</label>
												<div class="col-md-5">
												<select name="main_id" class="form-control">
													<option value="">Select Main Category</option>
													<?php
													$sl=mysqli_query($con,"SELECT * FROM `main_ct`");
													while($row=mysqli_fetch_array($sl))
													{
													?>
													<option value="<?php echo $row['id']; ?>"><?php echo $row['main_nm']; ?></option>
													<?php } ?>
												</select>
											</div>
									</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Sub Category:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Sub Category Name" name="sub_nm" required data-validation-required-message="This field is required">
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
                                <h4 class="card-title">All Main Category List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Main category Name</th>
                                                                                                <th>Sub category Name</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
													$no=0;
													$result=mysqli_query($con,"select * from sub_ct  ORDER BY id DESC");
													while($contact=mysqli_fetch_array($result))
													{
														$main_id=$contact['main_id'];
														$sla=mysqli_query($con,"SELECT * FROM `main_ct` WHERE id='$main_id'");
													    $rowa=mysqli_fetch_array($sla);
														$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $rowa['main_nm'];?></td>
												<td class="center"><?php echo $contact['sub_nm'];?></td>
												<td class="center">
													 <a class="btn btn-info" href="sub_ct_edit.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
													<a class="btn btn-info" href="sub_ct_edit.php?id=<?php echo $contact['id'] ?>&delete=delete">
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
