<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
 $adate=date('Y-m-d');
 
$time =  date("H:i");
?>


<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">


  <script src="jquery.min.js" type="text/javascript"></script>
<script>
 function show(str){
                document.getElementById('remarks').style.display ='';
            }
 function show2(str){
                document.getElementById('remarks').style.display = 'none';
            }
</script> 
<?php
if(isset($_POST['submit'])){
  
  $emp_name = $_POST['emp_name'];
  $date = $_POST['date'];
   $userid = $_GET['id'];
  $ap_ps = $_POST['ap_ps'];
  $remark = $_POST['remark'];
  // $time =  date("H:i");
   $time = $_POST['etime'];
    //$month = date('n');
     //$year = date('Y');
     
     // $day = date('j');
   

$day = date('j', strtotime($date));
$month = date('n', strtotime($date));
$year = date('Y', strtotime($date));
 echo"<script>alert('".$month."')</script>";
  
  $insert=mysqli_query($con,"INSERT INTO `attendance`(`emp_name`, `date`, `ap_ps`, `remark`, `time`,`outdate`, `outtime`,`userid`,`present`,`month`,`year`,`day`,`status`) VALUES ('$emp_name','$date','$ap_ps','$remark','$time','0','0','$userid','0','$month','$year','$day','1')");
  
 
  
}
 if($insert)
    {
         // header("Location:user_list.php");
         
         
        	echo"<script>window.location.href='user_list.php'</script>";	
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
            	<?php echo $msg; ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Employee Attendance</h3>
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
                                 <h4 class="card-title">MAKE ATTANDANCE</h4>
                                 <?php echo $_GET['msg']; ?>
                                 
                                 <form  role="form"  method ="POST">
                               
                                   
                                      	
											<div class="form-group row">
											     <?php
                                               $i=$_GET['id'];   
                                               $result=mysqli_query($con,"select * from  vendor_registration where id='$i'");
                                                $contact=mysqli_fetch_array($result);
                                                     
                                                             $work=$contact['v_name'];
                                                    
      
                                            ?>
												<label class="col-md-4 col-form-label">Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" value = "<?php  echo   $work; ?>"  class="form-control" placeholder="Name" name="emp_name">
											</div>
										</div>
									
								<!--	<div class="col-md-4">
										<div class="form-group">
										    <label class="m-t-20">In Time</label>
											<input class="form-control" id="timepicker" placeholder="Check time" name="etime">
										</div>
									</div>-->
									
								
											<div class="form-group row">
												<label class="col-md-4 col-form-label">In Time </label>
												<div class="col-md-5">
										            <input type="text" id="firstName" class="form-control" value="<?php  echo $time?>" placeholder="In Time" name="etime" >
											</div>
										</div>
									
										
										<div class="form-group row">
											<label class="col-md-4 col-form-label">Select Date</label>
											<div class="col-md-5">
											<input type="date" class="form-control" name="date"  value ="<?php echo $adate;?>"  required="" data-validation-required-message="This field is required">
										</div>
									</div>
                                   
                                      
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Attendance</label>
												<div class="col-md-5">
											<div class="demo-radio-button" >
											
												
												 <input type="radio" name="ap_ps" onchange="show2()" id="radio_1" value="Present"><label for="radio_1">Present</label>
                        <input type="radio" name="ap_ps" onchange="show()" id="radio_2" value="Absent"><label for="radio_2">Absent</label> </div>
												</div>
											</div>
										</div>
									
										
											<div class="form-group row"  id="remarks">
												<label class="col-md-4 col-form-label">Remark </label>
												<div class="col-md-5">
											<input type="text" id="firstName" class="form-control" placeholder="Remark" name="remark">
											</div>
										</div>
								
										<div class="form-group row">
										    	<div class="col-md-12">
											<center>
											<input type="submit" class="btn btn-success" name="submit" value="submit" style="margin-top: 30px;"></center>
										</div>
									</div>
									
										
										
										
                                    </div>
                               </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        
   
   

 <?php include('footer.php'); ?>