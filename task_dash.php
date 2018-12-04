<?php include('header.php'); ?>
<?php include('sidebar.php');
  $c_name = 	$_SESSION['c_id'];

?>
<style>
h3.card-title {
    font-size: 16px;
    font-family: sans-serif;
}
h3.card-title a {
    color: black;
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
                    <h3 class="text-themecolor">Dashboard</h3>
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
                <div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="all_tasks">Total Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"> <?php	
									    
									      $result=mysqli_query($con,"select * from task where c_name='$c_name'");
                               echo $row = mysqli_num_rows($result); ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-tasks" style="font-size:24px;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
				
				<div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="today_task">Today Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"><?php	
									      $today=date("Y-m-d");
									      $result=mysqli_query($con,"select * from task where c_name='$c_name' and date='$today'");
                               echo $row = mysqli_num_rows($result);  ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-calendar-check-o" style="font-size:24px;color:#55ce63;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
				
				<div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="yesterdays">Previous Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"><?php $today=date("Y-m-d");
	$pr=date('Y-m-d',strtotime("-1 days"));
			
			$result=mysqli_query($con,"select * from task where c_name='$c_name' and date='$pr' ORDER BY id DESC");
                               echo $row = mysqli_num_rows($result);   ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-arrow-left" style="font-size:24px;color:#ffbc34;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
				
				<div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="tomorrows">Upcoming Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"> <?php $today=date("Y-m-d");
									$pr1=date('Y-m-d',strtotime("+1 days"));			
									$result=mysqli_query($con,"select * from task where c_name='$c_name' and date='$pr1' ORDER BY id DESC");
                               echo $row = mysqli_num_rows($result);   ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-arrow-right" style="font-size:24px;color:#f62d51;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
				
				<div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="active_task">Active Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"> <?php			
								$result=mysqli_query($con,"select * from task where c_name='$c_name' and status ='1' ORDER BY id DESC");
                               echo $row = mysqli_num_rows($result);   ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-spinner" style="font-size:24px;color:#e83e8c;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
				
				<div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="pending_task">Pending Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"> <?php			
					$result=mysqli_query($con,"select * from task where c_name='$c_name' and status ='2' ORDER BY id DESC");
                               echo $row = mysqli_num_rows($result);   ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-fire" style="font-size:24px;color:#17a2b8;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
				
				<div class="col-md-3">
                <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="com_task">Complete Tasks</a></h3>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"> <?php			
							$result=mysqli_query($con,"select * from task where c_name='$c_name' and status ='3' ORDER BY id DESC");
                               echo $row = mysqli_num_rows($result);   ?></h4>
							   </div>
                                    <div class="ml-auto">
                                        <i class="fa fa-battery-full" style="font-size:24px;color:#55ce63;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
				</div>
                        
                       
                       
                    </div>
                    
                    </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
             
                
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
		<?php include('footer.php'); ?>