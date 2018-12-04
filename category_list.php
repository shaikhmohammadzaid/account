<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Category List</h3>
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
                                <h4 class="card-title">All Category List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Sub Category Name</th>
												<th>Main Category Name</th>
												<th>Statement</th>
											</tr>
											</thead>
											<tbody>
											<?php
													$no=0;
													$resulta=mysqli_query($con,"select * from sub_ct ORDER BY id DESC");
													while($contacta=mysqli_fetch_array($resulta))
													{
														$no=$no+1;
														
														$main_id=$contacta['main_id'];
														$resultab=mysqli_query($con,"select * from main_ct where id='$main_id'");
													    $contactab=mysqli_fetch_array($resultab);
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contacta['sub_nm'];?></td>
												<td class="center"><?php echo $contactab['main_nm'];?></td>
												<td class="center"><a href="cat_statement.php?id=<?php echo $contacta['id'];?>" class="btn btn-success">Statement</a></td>
											</tr>
											<?php 
													}
												?>
											   </tbody>
                                    </table>
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

 <?php include('footer.php'); ?>