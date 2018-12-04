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
                    <h3 class="text-themecolor">Meeting List</h3>
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
                                <h4 class="card-title">All Meeting List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Name Of Meeting Person </th>
												<th>Contact Number</th>
												<th>Email id</th>
										     	<th>Address</th>
												<th>Location</th>
												<th>Note</th>
												<th>Date</th>
												<th>Meeting With</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
													$no=0;
												
														 $c_id = $_SESSION['c_id'];

														$result=mysqli_query($con,"select * from sh_meeting where  c_name = '$c_id' AND status = '1'  ");
														
											
													while($contact=mysqli_fetch_array($result))
													{
													$no=$no+1;
													
														$cid=$contact['ename'];
														
													$resulta=mysqli_query($con,"select * from meeting WHERE id ='$cid'");
													$contacta=mysqli_fetch_array($resulta);
														
														
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contact['name'];?></td>
												<td class="center"><?php echo $contact['phnumber'];?></td>
													<td class="center"><?php echo $contact['email'];?></td>
												<td class="center"><?php echo $contact['address'];?></td>
												<td class="center"><?php echo $contact['location'];?></td>
												<td class="center"><?php echo $contact['note'];?></td>
												<td class="center"><?php echo $contact['dte'];?></td>
												<td class="center"><?php echo $contact['ename'];?></td>
											
											<td class="center">
											    	 <a class="btn btn-success" href="meeting_point?id=<?php echo $contact['id'];?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Meeting Point 
													</a> 
											<a href="com_edit_meeting?id=<?php echo $contact['id'];?>" class="btn btn-success">Edit</a>
										
											<a href="com_meeting_cncl?id=<?php echo $contact['id'];?>" class="btn btn-success">Cancel</a>
											
											<a href="com_forwoard_meeting?id=<?php echo $contact['id'];?>" class="btn btn-success">forward</a>
											
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