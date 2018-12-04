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
                    <h3 class="text-themecolor">Bank List</h3>
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
                                <h4 class="card-title">All Bank List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Bank Name</th>
												<th>Contact Number</th>
												<th>Account_Number</th>
												<th>Account_Type</th>
												<th>Location</th>
												<th>Address</th>
												<th>Branch_Name</th>
												<th>IFSC Code</th>
												<th>Micr Code</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
													$id=$_GET['id'];
													 $c_id = $_SESSION['c_id'];
													$no=0;
													if($id)
													{
														$bank_name=$_GET['id'];
													
														$result=mysqli_query($con,"select * from bank WHERE bank_name LIKE '%$bank_name%' and c_name='$c_id' ORDER BY id DESC");
													}
													else
													{
														$result=mysqli_query($con,"select * from bank  WHERE c_name='$c_id'  ORDER BY id DESC");
													}
													while($contact=mysqli_fetch_array($result))
													{
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contact['bank_name'];?></td>
												<td class="center"><?php echo $contact['contact_number'];?></td>
												<td class="center"><?php echo $contact['ac_number'];?></td>
												<td class="center"><?php echo $contact['ac_type'];?></td>
												<td class="center"><?php echo $contact['location'];?></td>
												<td class="center"><?php echo $contact['address'];?></td>
												<td class="center"><?php echo $contact['branch_nm'];?></td>
												<td class="center"><?php echo $contact['ifsc'];?></td>
												<td class="center"><?php echo $contact['micr_code'];?></td>
												<td class="center">
												    
												    	 <a class="btn btn-info" href="addchaquebook.php?id=<?php echo $_GET['id'] ?>&pid=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
													Add Chaque Book 
													</a>
													 <a class="btn btn-info" href="statement.php?id=<?php echo $_GET['id'] ?>&pid=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Statement
													</a>
													 <a class="btn btn-info" href="tem_statement.php?id=<?php echo $_GET['id'] ?>&pid=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
													temporary Statement
													</a>
<a class="btn btn-info" href="statement2.php?id=<?php echo $_GET['id'] ?>&pid=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Statement All List
													</a>
													<a class="btn btn-info" href="bank_edit.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
												</td>
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