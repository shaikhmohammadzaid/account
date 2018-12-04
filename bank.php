<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);

	if(isset($_POST['submit']))
	{
	    $c_name = $_POST['id'];
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
		}else 
		{
		   
	$insert = mysqli_query($con,"insert into bank(`c_name`, `bank_name`, `contact_number`, `ac_number`, `ac_type`, `location`,`address`,`branch_nm`,`ifsc`,`micr_code`)values('$c_name','$bank_name','$contact_number','$ac_number','$ac_type','$location','$address','$branch_nm','$ifsc','$micr_code')");
	
		if($insert){
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		}
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
                    <h3 class="text-themecolor">Add Bank</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active">Add Bank</li>
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
                                <h4 class="card-title">Add Bank</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" >
									 <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select Company</label>
													<select name="id"  class="form-control" data-rel="chosen">
												<option value="">Select Category</option>
											<?php
											$resultab=mysqli_query($con,"select * from company");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['c_id']; ?>"><?php echo $contactab['c_name']; ?></option>
											<?php } ?>
												
												</select>

												
											</div>
										</div>
									     
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Bank Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Bank Name" name="bank_name" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Account Number</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Account Number" name="ac_number" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Account Type</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Account Type" name="ac_type" required data-validation-required-message="This field is required">
											</div>
										</div>
                                    </div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Branch Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Branch Name" name="branch_nm" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">IFSC Code</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter IFSC Code" name="ifsc" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">MICR No</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter MICR No" name="micr_code" required data-validation-required-message="This field is required">
											</div>
										</div>
                                    </div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Address" name="address" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Location</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Location" name="location" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Contact Number</label>
												<input type="text" id="firstName" class="form-control" placeholder="Enter Contact Number" name="contact_number" required data-validation-required-message="This field is required">
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
