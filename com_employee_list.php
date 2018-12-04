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
                    <h3 class="text-themecolor">Employee List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active">Employee List</li>
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
                                <h4 class="card-title">All Employee List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Employee Name</th>
                                                 <th>Designation</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $no=0;
                                                     $c_id = $_SESSION['c_id'];
                                                    $result=mysqli_query($con,"select * from vendor_registration where vendor_for = 'employee'  and c_name='$c_id' ORDER BY id DESC");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                        
                                                    $no=$no+1;
                                                    
                                                     $status=$contact['status'];
                                                ?>
                                            <tr>
                                                <td class="center"><?php echo $no;?></td>
                                                <td class="center"><?php echo $contact['v_name'];?>  <?php echo $contact['lname'];?></td>
                                                   <td class="center"><?php  $tid =$contact['id'];
                                                   
                                                      $result1=mysqli_query($con,"select * from admin where id = '$tid'");
                                                   
                                                   $contact1=mysqli_fetch_array($result1);
                                                   
                                                   	$user_role=$contact1['user_role'];
                                                   	
                                                   	$result2=mysqli_query($con,"select * from emp_main where id = '$user_role'");
                                                   
                                                   $contact2=mysqli_fetch_array($result2);
                                                   
                                                   echo	$des=$contact2['main_nm'];
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   ?></td>
                                                <td class="center"><?php echo $contact['state'];?></td>
                                                <td class="center"><?php echo $contact['city'];?></td>
                                                <td class="center"><?php echo $contact['mobile_number'];?></td>
                                                <td class="center"><?php echo $contact['email'];?></td>
                                                <td class="center"><a class="btn btn-info" href="show_vender.php?id=<?php echo $contact['id'] ?>">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Statement
                                                    </a>
                                                    <a class="btn btn-info" href="edit.php?id=<?php echo $contact['id'] ?>">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    
                                                     <a class="btn btn-info" href="emp_cheque.php?id=<?php echo $contact['id'] ?>">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Cheque Status
                                                    </a>
                                                    <a class="btn btn-info" href="com_cash_voucher1.php?id=<?php echo $contact['id'] ?>">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                      Temporary Transactions
                                                    </a>
                                                    	<?php
if(($status)=='0')

{
?>
<a class="btn btn-success" href="active.php?status=<?php echo $contact['id'];?>" 
  onclick="return confirm('Activate');"> <i class="glyphicon glyphicon-edit icon-white"></i>
												Approve	  </a>
<?php
}
if(($status)=='1')

{
?>
<a class="btn btn-success" href="active.php?status=<?php echo $contact['id'];?>" 
  onclick="return confirm('De-activate');">Disapprove </a>
<?php
}
?>
                                                    
                                                    
                                                    
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