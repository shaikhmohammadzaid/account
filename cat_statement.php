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
                    <h3 class="text-themecolor">Transaction List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active">Transaction List</li>
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
                                <h4 class="card-title">All Transaction List(
								<?php
								$pid=$_GET['id'];
								$resultas=mysqli_query($con,"select * from sub_ct WHERE id='$pid'");
								$contactas=mysqli_fetch_array($resultas);
								echo $contactas['sub_nm'];
								?>
								)</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Vender Name</th>
												<th>Value Date</th>
												<th>Transaction Date</th>
												<th>Cheque No</th>
												<th>Remark</th>
												<th>Withdraw Amount</th>
												<th>Deposit Amount</th>
												<th>Balance</th>
											</tr>
											</thead>
											<tbody>
											<?php
													$pid=$_GET['id'];
													$no=0;
													$tm=0;
													$tma=0;
													$result=mysqli_query($con,"select * from statement WHERE sub_ct='$pid' ORDER BY id DESC");
													while($contact=mysqli_fetch_array($result))
													{
														$no=$no+1;
														$with_amt=$contact['with_amt'];
														$dep_amt=$contact['dep_amt'];
														$vid=$contact['vid'];
														
														$resulta=mysqli_query($con,"select * from vendor_registration WHERE id='$vid'");
														$contacta=mysqli_fetch_array($resulta);
														
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contacta['v_name'];?></td>
												<td class="center"><?php echo $contact['value_date'];?></td>
												<td class="center"><?php echo $contact['transaction_date'];?></td>
												<td class="center"><?php echo $contact['cheque_no'];?></td>
												<td class="center"><?php echo $contact['remark'];?></td>
												<td class="center"><?php echo $contact['with_amt'];?></td>
												<td class="center"><?php echo $contact['dep_amt'];?></td>
												<td class="center"><?php echo $contact['balance'];?></td>
											</tr>
											
											<?php $tm=$tm+$with_amt;?>
											<?php $tma=$tma+$dep_amt;?>
											<?php
													}
												?>
											   </tbody>
											   <tr>
													<td class="center" colspan="6">Total</td>
													<td class="center"><?php echo $tm=$tm+$with_amt-$with_amt;?></td>
													<td class="center"><?php echo $tma=$tma+$dep_amt-$dep_amt;?></td>
													<td class="center"></td>
												</tr>
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