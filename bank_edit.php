<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);

$i=$_REQUEST['id'];											

$result=mysqli_query($con,"select * from bank where id='$i'");
$row=mysqli_fetch_array($result);

	if(isset($_POST['submit'])){
		$bank_name = $_POST['bank_name'];
		$contact_number = $_POST['contact_number'];
		$ac_number = $_POST['ac_number'];
		$ac_type = $_POST['ac_type'];
		$location = $_POST['location'];
		$address = $_POST['address'];
		$branch_nm = $_POST['branch_nm'];
		$ifsc = $_POST['ifsc'];
		$micr_code = $_POST['micr_code'];
		
		if(empty($bank_name) or empty($ac_number)){
			$msg="<p>Fields Empty</p>";
		}else {
		mysqli_query($con,"UPDATE `bank` SET `bank_name`= '$bank_name',`contact_number`= '$contact_number',`ac_number`='$ac_number',`ac_type`= '$ac_type',`location`='$location',`address`='$address', `branch_nm`='$branch_nm',`ifsc`='$ifsc',`micr_code`='$micr_code' WHERE id='$i'");
			$msg="<p class='alert alert-success alert-rounded'>Successfully Updated ! </p>";
			echo '<script>window.location.href = "bank_list.php";</script>';
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
                    <h3 class="text-themecolor">Bank Edit</h3>
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
                                <h4 class="card-title">Update Bank Info</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Bank Name</label>
												<input type="text" id="firstName" class="form-control" name="bank_name" required data-validation-required-message="This field is required" value="<?php echo $row['bank_name']; ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Account Number</label>
												<input type="text" id="firstName" class="form-control" name="ac_number" required data-validation-required-message="This field is required" value="<?php echo $row['ac_number']; ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Account Type</label>
												<input type="text" id="firstName" class="form-control" name="ac_type" required data-validation-required-message="This field is required" value="<?php echo $row['ac_type']; ?>">
											</div>
										</div>
                                    </div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Branch Name</label>
												<input type="text" id="firstName" class="form-control" name="branch_nm" required data-validation-required-message="This field is required" value="<?php echo $row['branch_nm']; ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">IFSC Code</label>
												<input type="text" id="firstName" class="form-control" name="ifsc" required data-validation-required-message="This field is required" value="<?php echo $row['ifsc']; ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">MICR No</label>
												<input type="text" id="firstName" class="form-control" name="micr_code" required data-validation-required-message="This field is required" value="<?php echo $row['micr_code']; ?>">
											</div>
										</div>
                                    </div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" id="firstName" class="form-control" name="address" required data-validation-required-message="This field is required" value="<?php echo $row['address']; ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Location</label>
												<input type="text" id="firstName" class="form-control" name="location" required data-validation-required-message="This field is required" value="<?php echo $row['location']; ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Contact Number</label>
												<input type="text" id="firstName" class="form-control" name="contact_number" required data-validation-required-message="This field is required" value="<?php echo $row['contact_number']; ?>">
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
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

         <?php include('footer.php'); ?>
