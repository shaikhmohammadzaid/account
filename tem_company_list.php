<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Company</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Company list</li>
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
                
                 <?php
                    	$resultab=mysqli_query($con,"select * from company");
											while($contactab=mysqli_fetch_array($resultab)){
                    ?>
                <a href="tem_cash_voucher.php?id=<?php echo $contactab['c_id'] ?>">
                <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        
                                        <h3 class="text-muted"><?php echo $contactab['c_name'] ?></h3></div>
										
                                    <!-- Column -->
									<div class="row" style="margin-top:15px;">
                                    <div class="col text-right align-self-center" style="padding-left:28px;">
                                        <div data-label="30%" class="css-bar m-b-0 css-bar-danger css-bar-20"></div></a>
									 
 </h1>
                                    </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php
											}
                    ?>
                    
                    </div>
                    </div>
             
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
		<?php include('footer.php'); ?>