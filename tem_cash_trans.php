<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>

 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Temporary Cash Transaction List</h3>
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
                                <h4 class="card-title">
                                   All Cash transaction </h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Company Name</th>
                                                      <th>Barcode</th>
                                                 <th>Type</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Voucher no</th>
                                                <th>payment Method</th>
                                                <th>Date</th>
                                            	<th>Actions</th>
                                                
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $no=0;
                                                  
                                                    $result=mysqli_query($con,"select * from cash_voucher1 where ptype = 'cash'  ORDER BY id DESC");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                        
                                                        
                                                         $pid=$contact['pname'];
                                 $resultas=mysqli_query($con,"select * from tem_emp2 WHERE id='$pid'");
                                $contactas=mysqli_fetch_array($resultas);
                                  $bank= $contact['bank'];
                               
                               
                                                 
                                 
                                
                                                    $no=$no+1;
                                                ?>
                                            <tr>
                                                <td class="center"><?php echo $no;?></td>
                                                
                                                <td class="center"> <?php $tt=$contact['c_name'];
                                                $ff=mysqli_query($con,"select * from company where c_id='$tt' ");
                                                $yy=mysqli_fetch_array($ff);
                                                echo $yy['username'];
                                                
                                                ?>
                                                 
                                                  </td>
                                                  <td class="center"> <?php     
                                                $zaid=$contact['barcode'];
                                             ?>
                                             <img src="barcode/<?php echo $zaid ?>.gif" alt="Smiley face" height="42" width="42">
                                         </td>
                                                <td class="center"><?php echo $contactas['vendor_for']; ?></td>
                                                <td class="center"><?php echo $contactas['v_name']; ?></td>
                                               
                                                <td class="center"><?php echo $contact['amount'];?></td>
                                                 <td class="center"><?php echo $contact['voucher_no'];?></td>
                                                <td class="center"><?php echo $contact['ptype'];?></td>
                                                <td class="center"><?php echo $contact['select_date'];?></td>
                                               <td class="center">
												    
												    	 <a class="btn btn-info" href="vou_cash1.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>Recipt</a>
													</td>
                                            </tr>
                                            <?php } ?>
                                            
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