<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);

	if(isset($_POST['submit']))
	{
	  
		$name = $_POST['Name'];
	
		
		
		   
	$insert = mysqli_query($con,"insert into meeting(`Name`)values('$name')");
	
		if($insert){
		
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
                    <h3 class="text-themecolor">Add Meeting Persone </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Meeting Persone</li>
                        <li class="breadcrumb-item active">Add Meeting Persone</li>
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
                                <h4 class="card-title">Add Meeting</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" >
									 <div class="row">
										
									     
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Name Of Meeting Person </label>
												<input type="text" id="firstName" class="form-control" placeholder="Name Of Meeting Person" name="Name" required data-validation-required-message="This field is required">
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
