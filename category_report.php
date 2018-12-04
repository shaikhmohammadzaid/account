<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>
<?php



if(isset($_POST['submit']))
{
    
    //$bid=$_POST['bid'];
	$sub_ct=$_POST['sub_ct'];
	$main_ct=$_POST['main_ct'];
}


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
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Bank</li>
                        <li class="breadcrumb-item active">Bank List</li>
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
                                <h4 class="card-title">All Bank List</h4>
                                <div class="table-responsive m-t-40">
								
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
										
										<tr>
											<th>No</th>
											<th>Value Date</th>
											<th>Transaction Date</th>
											<th>Cheque No/Reference No</th>
											<th>Remark</th>
											<th>Withdraw Amount</th>
											<th>Deposit Amount</th>
											<th>Balance</th>
										</tr>
										</thead>
										<tbody>
										<?php
												
												$no=0;
												$result=mysqli_query($con,"select * from statement WHERE sub_ct='$sub_ct' and main_ct='$main_ct' ORDER BY id DESC");
												while($contact=mysqli_fetch_array($result))
												{
												$no=$no+1;
											?>
										<tr>
											<td class="center"><?php echo $no;?></td>
											<td class="center"><?php echo $contact['value_date'];?></td>
											<td class="center"><?php echo $contact['transaction_date'];?></td>
											<td class="center"><?php echo $contact['cheque_no'];?></td>
											<td class="center"><?php echo $contact['remark'];?></td>
											<td class="center"><?php echo $contact['with_amt'];?></td>
											<td class="center"><?php echo $contact['dep_amt'];?></td>
											<td class="center"><?php echo $contact['balance'];?></td>
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