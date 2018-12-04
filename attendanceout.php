<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
 $adate=date('Y-m-d');
?>

<?php

$time =  date("H:i:sa");

if(isset($_POST['submit']))
{
  
  $id = $_GET['id'];
   $status = $_GET['status'];
  $emp_name = $_POST['emp_name'];
  $date = $_POST['date'];
  $ap_ps = $_POST['ap_ps'];
  $remark = $_POST['remark'];
  // $time =  date("H:i");
  $time = $_POST['etime'];
  
   
   
  // echo"<script>alert('".$time."')</script>";
 
   
 $result1=mysqli_query($con,"select * from attendance where userid = '$id' ");
         $contact=mysqli_fetch_array($result1);
         $stime=$contact['time'];
         $status=$contact['status'];
         
         $sstime1 = explode(':',$time);
         	$sstime21=$sstime1[0]; 
         
          $sstime = explode(':',$stime);
          
          	$sstime211=$sstime[0]; 
        
          $finalqq = date('H:i', strtotime($time));
    $final2q = date('H:i', strtotime($stime));
        
         $final = $sstime21 - $sstime211;
 
       echo"<script>alert('".$final."')</script>";
        
			
  
      
      
  
  if($final >= '5' )
  {
        
       
        
                         
      //$insert1=mysqli_query($con,"UPDATE attendance SET total='$final', status ='0'  WHERE userid='$id' and  status='1'    ");
      
      $insert=mysqli_query($con,"UPDATE attendance SET  total='$final', outdate='$date', outtime='$time', present='2', status ='0'  WHERE userid = '$id' and status='1'  ");
      
       
  }
  else{
      
      
      //$insert1=mysqli_query($con,"UPDATE attendance SET total='$final',status ='0'  WHERE userid='$id' , status='1'   ");
      
       $insert=mysqli_query($con,"UPDATE attendance SET  total='$final' , outdate='$date', outtime='$time', present='1' , status ='0'  WHERE userid='$id' AND  status='1'   ");
       
     
      
  }
  
                                
 
    
    
    if($insert)
    {
         // header("Location: user_list.php");    
         
         echo"<script> alert('sussecesfully Done')</script>";
         
          	echo"<script>window.location.href='user_list.php'</script>";	
        
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
                                 <h4 class="card-title">Punch out</h4>
                                 <form  role="form"  method ="POST">
                                
                                   
                                      	
											<div class="form-group row">
											     <?php
                                               $i = $_GET['id'];   
                                               $result=mysqli_query($con,"select * from  attendance  where userid ='$i'");
                                                $contact=mysqli_fetch_array($result);
                                                     
                                                             $work=$contact['emp_name'];
                                                    
      
                                            ?>
												<label class="col-md-4 col-form-label">Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" value = "<?php  echo  $work; ?>"  class="form-control" placeholder="Name" name="emp_name">
											</div>
										</div>
									
									<!--<div class="col-md-4">
										<div class="form-group">
										    <label class="m-t-20">In Time</label>
											<input class="form-control" id="timepicker" placeholder="Check time" name="etime">
										</div>
									</div>-->
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Out Time </label>
												<div class="col-md-5">
											<input type="text" id="firstName" class="form-control" value="<?php  echo $time;    ?>"  placeholder="Remark" name="etime" >
											</div>
										</div>
									
										
										<div class="form-group row">
											<label class="col-md-4 col-form-label"> Date</label>
											<div class="col-md-5">
											<input type="date" class="form-control" name="date"  value ="<?php echo $adate;  ?>"  required="" data-validation-required-message="This field is required" >
										</div>
									</div>
									
									<!--	<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Remark </label>
											<input type="text" id="firstName" class="form-control" placeholder="Remark" name="remark">
											</div>
										</div>-->
									
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