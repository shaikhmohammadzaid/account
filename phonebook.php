<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);

	if(isset($_POST['submit'])){
		
		$cname = $_POST['cname'];
			$num= $_POST['num'];
				$snum = $_POST['snum'];
					$email = $_POST['email'];
						$address = $_POST['address'];
							$date = date('Y-m-d');
		  $c_nameeee =   $_POST['c_id'];
	$insert=mysqli_query($con,"insert into phonebook (`c_id`,`cname`,`num`,`snum`,`email`,`address`,`date`)values('$c_nameeee','$cname','$num','$snum','$email','$address','$date')");
		if($insert){
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
                    <h3 class="text-themecolor">Add Phonebook</h3>
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
                                <h4 class="card-title">Add Phonebook</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
									 
									 
									
									    
									    	<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Company:</label>
												<div class="col-md-5">
																								<select name="c_id"  class="form-control" data-rel="chosen">
												<option value="">Select Company</option>
											<?php
											$resultab=mysqli_query($con,"select * from company");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['c_id']; ?>"><?php echo $contactab['c_name']; ?></option>
											<?php } ?>
												
												</select>	</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Contact Name:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Contact Name" name="cname" required data-validation-required-message="This field is required">
											</div>
										</div>
										
									<!--	<input name="mobile"  id="mobile" type="number" required onkeyup="check(); return false;" ><span id="message"></span>-->
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Mobile Number:</label>
												<div class="col-md-5">
												<input type="number" id="mobile"  class="form-control" placeholder="Mobile Number" pattern="^\d{10}$" name="num"  required>
									
											</div>
												<span id="message"></span>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Secondary Number(optional):</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Secondry Number"  name="snum"  >
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Email Id:</label>
												<div class="col-md-5">
												<input type="email" id="firstName" class="form-control" placeholder="Email Id" name="email" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label"> Address:</label>
												<div class="col-md-5">
												<input type="textarea" id="firstName" class="form-control" placeholder="Address" name="address" >
											</div>
										</div>
										
                                    </div>
                                    <div class="text-xs-right">
                                        
                                        <button type="submit" name="submit" onclick="check()" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function check()
{

    var pass1 = document.getElementById('mobile');


    var message = document.getElementById('message');

  
    var badColor = "red";

    if(mobile.value.length!=10){

        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Required 10 digits!"
    }}
</script>
         <?php include('footer.php'); ?>
