<?php include('header.php'); ?>
<?php include('sidebar.php'); 


?>
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
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <!-- Row -->
                
                 <div class="row">
							
							<div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-inverse card-megna">
                            <div class="box text-center">
                                <a href="tander"><h1 class="font-light text-white"> <?php $result = mysqli_query($con,"SELECT * FROM tander"); 
                                    echo $row = mysqli_num_rows($result); 
                                        ?></h1></a>
                                <h6 class="text-white">Total Tanders</h6>
                            </div>
                        </div>
                    </div>
                    	<div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php $result = mysqli_query($con,"SELECT * FROM tander_attceh"); 
                                    echo $row = mysqli_num_rows($result); 
                                        ?></h1>
                                <h6 class="text-white">Documents Of Tander</h6>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
		<?php include('footer.php'); ?>