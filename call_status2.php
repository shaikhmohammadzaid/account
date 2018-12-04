<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);

	if(isset($_POST['submit']))
	{
	    $id = $_GET['id'];
		$cstatus = $_POST['cstatus'];
		$d_name = $_POST['d_name'];
			$in_time = date('Y-m-d h:i:sa');
		$select_date = $_POST['select_date'];
	
		
		
	$insert=mysqli_query($con,"UPDATE `interview` SET `cstatus`='$cstatus',`call_date`='$in_time',`d_name`='$d_name',`inter_date`='$select_date' WHERE id='$id'");

		if($insert){
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Updated ! </p>";
			
				echo '<script>window.location.href = "com_interview_list";</script>';
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
                    <h3 class="text-themecolor">Calling Status</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Calling Status</li>
                        <li class="breadcrumb-item active">Calling Status</li>
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
                                <h4 class="card-title">Add Calling Status</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" >
									
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Enter Calling Status:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Enter Calling Status" name="cstatus" required data-validation-required-message="This field is required">
											</div>
										</div>
								   
									  <div class="form-group row">
											<label class="col-md-4 col-form-label">Interview Date:</label>
											<div class="col-md-5">
											<input type="date" class="form-control" name="select_date" >
										</div>
								  </div>
								  
								  	
									 <div class="form-group row">
										<label class="col-md-4 col-form-label">Description:</label>
										<div class="col-md-5">
										  <textarea rows="4" cols="50" class="form-control" placeholder="Description" name="d_name" ></textarea>
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
