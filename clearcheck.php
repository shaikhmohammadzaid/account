<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php error_reporting(0);?>
<style>
h4.card-title {
    text-transform: uppercase;
    text-align: center;
    color: #3953a4;
    font-size: 25px;
    margin-bottom: 40px;
}
form label {
    font-weight: 400;
    text-transform: uppercase;
    padding-left: 10px;
    font-size: 15px;
}
.text-xs-right {
    text-align: center;
}
label.col-md-4.col-form-label {
    text-align: right;
}
.text-xs-right {
    text-align: center;
    margin-bottom: 30px;
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
                    <h3 class="text-themecolor">Clear Cheque Report </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"> Clear Cheque Report</li>
                        <li class="breadcrumb-item active">Clear Cheque Report</li>
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
				
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Clear Cheque Report</h4>
							
                                <form action ='com_clearcheck_list.php' class="m-t-40"  target="_blank" novalidate method="post" enctype="multipart/form-data">
									
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Date</label>
												<div class="col-md-5">
												<input type="date"  class="form-control" name="date" required="" data-validation-required-message="This field is required">
											</div>
										</div>
									</div>
					
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" class="btn btn-info">Submit </button>
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
