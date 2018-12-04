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
                    <h3 class="text-themecolor">Survey List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active">Survey List</li>
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
                                <h4 class="card-title">All Survey List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <!--<th>Mall / building name</th>-->
                                                <th>Mall / building name</th>
												<th>Contact number</th>
												<th>Address</th>
												
												<th>E-mail Address </th>
												<th>Mobile Number </th>
												<th>Mobile Number(optional)</th>
												<th>Mobile Number(optional)</th>
												<th>website</th>
												<?php $status2= $contact['whlr_av2'];
                                                if($status2!==1){
                                                ?>
												<th>2 Wheeler Available</th>
												<th>2 wheeler Charge </th>
												<th>2 wheeler Count</th>
												<th>2 wheeler Total</th>
											<?php } $status1= $contact['whlr_av3'];
                                                if($status1!==1){
                                                ?>	<th>3 Wheeler Available</th>
												<th>3 wheeler Charge </th>
												<th>3 wheeler Count</th>
												<th>3 wheeler Total</th>
												<?php } 
												 $status4= $contact['whlr_av4'];
                                                if($status4!==1){
												?>
												<th>4 Wheeler Available</th>
												<th>4 wheeler Charge </th>
												<th>4 Wheeler Count</th>
												<th>4 Wheeler Total</th>
												<?php } ?>
												<th>Present Module</th>
												
											
												
												<th>Holiday Colletion </th>
												<th>Per day Collection </th>
												<th>Montly Rent Montly Rent</th>
											    <th>Deposit</th>
											    <th>Tax Amount</th>
											    <th>start date</th>
											    <th>end date</th>
											    <th>Light Bill Amount</th>
												<th>House Keeping</th>
												
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $no=0;
                                                    $c_id = $_SESSION['c_id'];
                                                    $result=mysqli_query($con,"select * from survey");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                        
                                                    $no=$no+1;
                                                ?>
                                            <tr>
                                                <td class="center"><?php echo $no;?></td>
                                                <!--<td class="center"><?php echo $contact['c_name'];?></td>-->
                                                <td class="center"><?php echo $contact['name'];?></td>
                                                <td class="center"><?php echo $contact['contact_number'];?></td>
                                                <td class="center"><?php echo $contact['address'];?></td>
                                                <td class="center"><?php echo $contact['e_mail'];?></td>
												
												<td class="center"><?php echo $contact['mobile_number'];?></td>
                                                <td class="center"><?php echo $contact['m1'];?></td>
                                                <td class="center"><?php echo $contact['m2'];?></td>
                                               
                                                <td class="center"><?php echo $contact['website'];?></td>
                                               <?php $status2= $contact['whlr_av2'];
                                                if($status2!==1){
                                                ?> 
                                                <td class="center"><?php  $status=$contact['whlr_av2'];
                                                if($status==1) { ?>
                                               <span>Available</span>
                                                <?php } if($status=='')
                                                {
                                                ?>
                                                <span>No Available</span>
                                                <?php } 
                                                ?>
                                                
                                            </td>
                                            <td class="center"><?php echo $contact['whlr2'];?>
                                                </td>
                                                <td class="center"><?php echo $contact['count2'];?>
                                                </td>
                                                <td class="center"><?php echo $contact['total2'];?>
                                                </td><?php } $status21= $contact['whlr_av3'];
                                                if($status21!==1){ ?>
                                                <td class="center"><?php $status1= $contact['whlr_av3'];
                                                if($status1==1){
                                                ?>
                                                <span>Available</span>
                                                <?php } if($status1=='') { ?>
                                                <span>No Available</span>
                                                <?php } ?>
                                                </td>
                                                <td class="center"><?php echo $contact['whlr3'];?></td>
                                                <td class="center"><?php echo $contact['count3'];?>
                                                </td>
                                                <td class="center"><?php echo $contact['total3'];?>
                                                </td><?php } $status23= $contact['whlr_av3'];
                                                if($status23!==1){ ?>
                                                <?php } ?>
                                                <td class="center"><?php $status2=$contact['whlr_av4'];
                                                if($status2==1){
                                                
                                                ?>
                                                 <span>Available</span>
                                                <?php } if($status2=='') { ?>
                                                <span>No Available</span>
                                                <?php } ?>
                                                </td>
												 <td class="center"><?php echo $contact['whlr4'];?></td>
												 <td class="center"><?php echo $contact['count4'];?>
                                                </td>
                                                <td class="center"><?php echo $contact['total4'];?>
                                                </td>
												<td class="center"><?php echo $contact['module'];?></td>
                                                
                                               
                                                
                                                
												<td class="center"><?php echo $contact['holiday_collection'];?></td>
												<td class="center"><?php echo $contact['today_collection'];?></td>
												<td class="center"><?php echo $contact['mon_rent'];?></td>
                                                
                                                <td class="center"><?php echo $contact['deposit'];?></td>
                                                <td class="center"><?php echo $contact['tax'];?></td>
                                                <td class="center"><?php echo $contact['stime'];?></td>
                                                <td class="center"><?php echo $contact['etime'];?></td>
                                                <td class="center"><?php echo $contact['lbill'];?></td>
                                                <td class="center"><?php echo $contact['hk'];?></td>
												
                                                
                                                    
                                                    
                                                
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