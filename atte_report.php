<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>



<?php
 error_reporting(0);
 $adate=date('Y-m-d');
 $month = date('n');
 $year = date('Y');
 $day = date('j');
 $inc = $day+1; 
if(isset($_POST['submit'])){
    
$month=$_POST['month'];
$year=$_POST['year'];
    
}
?>
<style>
label.col-md-4.col-form-label {
    text-align: right;
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

 
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
			
			   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Employee attandance REport</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" enctype="multipart/form-data">
								
									
											<div class="form-group row">
											<label class="col-md-4 col-form-label">Select Month</label>
											<div class="col-md-5">
											<select   name="month"  class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Month</option>
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">Sepetember</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
											
											</select>
											</div>
										</div>
										
											<div class="form-group row">
											<label class="col-md-4 col-form-label">Select Year</label>
											<div class="col-md-5">
											<select  name="year"  class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Year</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											
											
											</select>
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
            
            
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body"> 
                                <h4 class="card-title">All Employee List</h4>
                               <div class="table-responsive m-t-40">
									<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									 
										<thead>
				
											<tr>
												
												<th>Name</th>
												
												<?php
												 $number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // 31
                                                  For($x=1;$x<=$number;$x++)
	                                                {?>
	                                           	<th><?php echo $x;   ?></th>
                                                     <?php   }    ?>  
                                                <th>Total</th>

												
											</tr>
											</thead>
											
											<tbody>
											<tr>
											
											    <?php
											    	$resulta=mysqli_query($con,"select * from vendor_registration WHERE vendor_for = 'employee' ORDER BY id DESC");
													while($contacta=mysqli_fetch_array($resulta))
													{
													
													
												$uid=$contacta['id'];
                                                	$nm	=$contacta['v_name'];
	   											?>
 
											
											
												<td class="center"><?php echo $contacta['v_name'];?></td>
										
						    
						

													<?php
													 $number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // 31
                               
											  For($x=01;$x<=$number;$x++)
	             {
	                 	$uid=$contacta['id'];
	                 	$resulta1=mysqli_query($con,"select * from attendance WHERE userid ='$uid' and month='$month' and year='$year' AND day='$x'  ORDER BY id DESC");
												$contacta1=mysqli_fetch_array($resulta1);
	?>
												<td class="center"><?php echo $contacta1['present']; ?></td>
											
												<?php } ?>
 	<?php 
													 $number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // 31
                               
										
													$uid=$contacta['id'];
												
													$res=mysqli_query($con,"select SUM(present) AS value_sum FROM attendance  where  userid ='$uid' and month='$month' and year='$year'  ORDER BY id DESC");
													$row =mysqli_fetch_assoc($res); 
						                	 $sum = $row['value_sum'];
							                  $t1 = $sum/2;
							 
						?>	<td class="center"><?php echo $t1 = $sum/2;  ?></td>
											</tr>
											 
											   
											   <?php 
			
											   } ?>
											   </tbody>
											   
											   
											     <?php 
						 $insert=mysqli_query($con,"UPDATE att_total SET emp_name='$nm', date='$adate', month='$month', year='$year',day='$day',total = '$t1' WHERE userid ='$uid'  ");          
                        ?>
                                    </table>
                                    </div>
                                    <?php 
                                	$re=mysqli_query($con,"select * from att_total ");
                                     while($co=mysqli_fetch_array($re))
													{

												$d=$co['day'];
												$m=$co['month'];
												$y=$co['year'];

	   											}?>
                                   
								
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
            </div>
 
       
 <?php include('footer.php'); ?>