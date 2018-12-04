<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);
$id=$_GET['id'];
$sl=mysqli_query($con,"SELECT * FROM `task_list` WHERE id='$id'");
$rowa=mysqli_fetch_array($sl);

	if(isset($_POST['submit'])){
		
		$task= $_POST['task'];
		$sub_nm = $_POST['sub_nm'];
		
		mysqli_query($con,"UPDATE `task_list` SET `task`='$task' WHERE id='$id'");
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
			
			echo"<script>window.location.href='task.php'</script>";	
	}
	
	if($_REQUEST['delete'])
	{
		$id=$_GET['id'];
		
		mysqli_query($con,"DELETE FROM `task_list` WHERE id='$id'");
			
		echo"<script>window.location.href='task.php'</script>";	
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
                    <h3 class="text-themecolor">Update Task</h3>
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
                                <h4 class="card-title">Update Task</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
									
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Update Task</label>
													<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Enter Task" name="task" required data-validation-required-message="This field is required" value="<?php echo $rowa['task']; ?>">
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
