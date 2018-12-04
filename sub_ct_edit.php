<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);
$id=$_GET['id'];
$sl=mysqli_query($con,"SELECT * FROM `sub_ct` WHERE id='$id'");
$rowa=mysqli_fetch_array($sl);

	if(isset($_POST['submit'])){
		
		$main_id = $_POST['main_id'];
		$sub_nm = $_POST['sub_nm'];
		
		mysqli_query($con,"UPDATE `sub_ct` SET `main_id`='$main_id',`sub_nm`='$sub_nm' WHERE id='$id'");
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
			
			echo"<script>window.location.href='sub_ct.php'</script>";	
	}
	
	if($_REQUEST['delete'])
	{
		$id=$_GET['id'];
		
		mysqli_query($con,"DELETE FROM `sub_ct` WHERE id='$id'");
			
		echo"<script>window.location.href='sub_ct.php'</script>";	
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
                    <h3 class="text-themecolor">Update Main Category</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Main Category</li>
                        <li class="breadcrumb-item active">Update Main Category</li>
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
                                <h4 class="card-title">Update Sub Category</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Sub Category Name</label>
												<select name="main_id" class="form-control">
													<option value="">Select Main Category</option>
													<?php
													$sl=mysqli_query($con,"SELECT * FROM `main_ct`");
													while($row=mysqli_fetch_array($sl))
													{
													?>
													<option value="<?php echo $row['id']; ?>" <?php  if($row['id']==$rowa['main_id']) echo "selected='selected'"; ?>><?php echo $row['main_nm']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Sub Category Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="Sub Category Name" name="sub_nm" required data-validation-required-message="This field is required" value="<?php echo $rowa['sub_nm']; ?>">
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
