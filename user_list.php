<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
 $adate=date('Y-m-d');

?>
										
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
                                <h4 class="card-title">All Employee List</h4>
                                <div class="table-responsive m-t-40">
									<form name="form"  method="POST" />
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Post</th>
												<th>Branch</th>
												<th>Salary</th>
												<th>Action</th>
											
											</tr>
											</thead>
											<tbody>
											<?php
													$resulta=mysqli_query($con,"select * from vendor_registration WHERE vendor_for = 'employee' ORDER BY id DESC");
													while($contacta=mysqli_fetch_array($resulta))
													{
													
											            	$id =  $contacta['id'];
													
												
													
												?>
											<tr>
												<td class="center"><?php echo  $contacta['id'];?> </td>
												<td class="center"><?php echo $contacta['v_name'];?></td>
											
												<td class="center"><?php echo $contacta[''];?></td>
												<td class="center"><?php echo $contacta['city'];?></td>
												<td class="center"><?php echo $contacta['msalary'];?></td>
												
					
												
												<td class="center">
												    
												    
												   
                           
								
									
									
								
									
									<?php 
									
									$adate=date('Y-m-d');
									$uid= $contacta['id'];
										$re = mysqli_query($con,"select * from attendance where userid = '$uid' AND status ='1'  ");
										$cons=mysqli_fetch_array($re);
											$co=mysqli_num_rows($re);
										
									if($co == '0' ){ ?>
									    
									    
									    <a class="btn btn-info"  href="attendace.php?id=<?php echo $contacta['id'] ?>">
                                      <i class="glyphicon glyphicon-edit icon-white"></i>
                         Punch In
                                  </a>
									    
								<?php	}	?>			
												
								<?php				
                                        $now= $cons['date'];
                                        $outdate= $cons['outdate'];
                                    	$present =    $cons['present'];
                                       	$status =  $cons['status'];
									
									?>
										<?php	if($status == '0' && $outdate != '0' ){ ?>	
									
									  <a class="btn btn-info"  href="attendace.php?id=<?php echo $contacta['id'] ?>">
                                      <i class="glyphicon glyphicon-edit icon-white"></i>
                         Punch In
                                  </a>
									<?php } 
								  if($status == 1 && $outdate == 0 ){ ?>	
									
                 
  
                       <a   class="btn btn-info"   href="attendanceout.php?id=<?php echo $contacta['id'] ?>&status=<?php echo $status ?>" >
                         <i class="glyphicon glyphicon-edit icon-white   "  ></i>
              Punch Out
            </a>
    
  <?php }  ?>
    
                              	</td>                
                                                
                              
                                
                                  
                        
                                                
						
											</tr>
											 
											<?php
													}
													
													
													
												?>
											   </tbody>
											   
											   
											   
											   
                                    </table>
									</form>
                                </div>
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
            
            <?php
$number = cal_days_in_month(CAL_GREGORIAN, 9, 2018); // 31
echo "There were {$number} days in August 2018";
?>

 <?php include('footer.php'); ?>