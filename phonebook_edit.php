<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);
$id=$_GET['id'];
$sl=mysqli_query($con,"SELECT * FROM `phonebook` WHERE id='$id'");
$row=mysqli_fetch_array($sl);

	if(isset($_POST['submit'])){
		
		$cname = $_POST['cname'];
			$num= $_POST['num'];
				$snum = $_POST['snum'];
					$email = $_POST['email'];
						$address = $_POST['address'];
		
	$insert=	mysqli_query($con,"UPDATE `phonebook` SET `cname`='$cname',`num`='$num',`snum`='$snum',`email`='$email',`address`='$address' WHERE id='$id'");
		if($insert){
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
			
			echo"<script>window.location.href='com_phonebook_list.php'</script>";	
		}
	}
	
if($_REQUEST['delete'])
{
	$id=$_GET['id'];
	
	mysqli_query($con,"DELETE FROM `main_ct` WHERE id='$id'");
		
	echo"<script>window.location.href='main_ct.php'</script>";	
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
                    <h3 class="text-themecolor">Update PhoneBook</h3>
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
                                <h4 class="card-title">Update Phonebook</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
							
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Contact Name:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Contact Name" name="cname" value="<?php echo $row['cname']  ?>" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Mobile Number:</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Mobile Number" name="num"  value="<?php echo $row['num']  ?>"  required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Secondary Number(optional):</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Secondry Number" name="snum"  value="<?php echo $row['snum']  ?>" >
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Email Id:</label>
												<div class="col-md-5">
												<input type="email" id="firstName" class="form-control" placeholder="Email Id" name="email"  value="<?php echo $row['email']  ?>" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label"> Address:</label>
												<div class="col-md-5">
												<input type="textarea" id="firstName" class="form-control" placeholder="Address" name="address" value="<?php echo $row['address']  ?>" >
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
