<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);
$id=$_GET['id'];
$sl=mysqli_query($con,"SELECT * FROM `tem_emp2` WHERE id='$id'");
$rowa=mysqli_fetch_array($sl);

	if(isset($_POST['submit'])){
		
		$name= $_POST['name'];
		$designation= $_POST['designation'];
			$type= $_POST['type'];
		
		mysqli_query($con,"UPDATE `tem_emp2` SET `v_name`='$name',`designation`='$designation',`vendor_for`='$type'  WHERE id='$id'");
		
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
			
			echo"<script>window.location.href='tem_emp.php'</script>";	
	}
	
	if($_REQUEST['delete'])
	{
		$id=$_GET['id'];
		
		mysqli_query($con,"DELETE FROM `tem_emp2` WHERE id='$id'");
			
		echo"<script>window.location.href='tem_emp.php'</script>";	
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
                    <h3 class="text-themecolor">Update Temporary Employment</h3>
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
                                <h4 class="card-title">Update Temporary Employment</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									
									     
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Type</label>
												<div class="col-md-5">
												<select id="per" name="type"  class="form-control" data-rel="chosen" >
												<option value="">Select Trader Type</option>
													<option value="<?php echo $rowa['vendor_for'] ?>" selected><?php  echo $rowa['vendor_for'] ?></option>
												<option value="employee">employee</option>
												<option value="Rental Purchase">Rental Purchase</option>
												
												</select>
											</div>
									</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Employee Name" name="name" required data-validation-required-message="This field is required" value="<?php echo $rowa['v_name']; ?>">
											</div>
										</div>
										
											<div class="form-group row" id="des" style="display:none;">
												<label class="col-md-4 col-form-label" >Designation</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Employee Designation"  name="designation"  value="<?php echo $rowa['designation']; ?>">
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
