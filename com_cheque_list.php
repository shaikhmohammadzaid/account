<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>

 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
      $(document).on('click','.btn-modal',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#idd').val(id);
          $('#myModal').model('show');
      })
  </script>
    <script>
    
      $(document).on('click','.btn-modal1',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#iddv').val(id);
          $('#myModal1').model('show');
      })
  </script>
  
  <style>
  h5#exampleModalLabel1 {
    font-size: 18px;
}
label {
    display: block;
    margin-bottom: .5rem;
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
                    <h3 class="text-themecolor">Cheque Transaction List</h3>
                </div>
                
               
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                  <?php  
                if(isset($_POST['submit'])){
                    
	$final_clear_date = $_POST['final_clear_date'];

    $chk_id= $_POST['id'];
		

		
		 $insert=  mysqlI_query($con,"UPDATE `cash_voucher2` SET  `final_clear_date`='$final_clear_date', `cheque_status`='1'  WHERE id='$chk_id'  ");
		 if($insert){
		     
		     header("Refresh:0");
	$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		 }
}

if(isset($_POST['submit1'])){
                    
	$frd_date = $_POST['frd_date'];

    $chk_id= $_POST['id'];
		

		
		 $insert=  mysqlI_query($con,"UPDATE `cash_voucher2` SET  `clear_date`='$frd_date', `cheque_status`='2'  WHERE id='$chk_id'  ");
		 if($insert){
		     
		     header("Refresh:0");
	$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		 }
}
?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
             
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                   All Cheque transaction </h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                  <th>Barcode</th>
                                                 <th>Date</th>
                                                <th>Voucher no</th>
                                                <th>Cheque no</th>
                                                <th>Amount</th>                                                
                                                <th>payment Method</th>
                                                <th>Transaction Detail</th>
                                                <th>Transaction Main Detail</th>
                                                <th>Description</th>
                                                <th> Status</th>
                                                <th>Issue Date</th>
                                                <th>Cheque Date</th>
                                            	<th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											
                                            <?php
                                                    $no=0;
                                                  	 $c_id = $_SESSION['c_id'];
                                                    $result=mysqli_query($con,"select * from cash_voucher2 where ptype = 'cheque' and c_name='$c_id'  ORDER BY id DESC");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                        
                                                        
                                                       $category= $contact['category'];
                                                        
                                                         $type= $contact['type'];
                                                         
                                                        $bank= $contact['bank'];
                               
                                                            $result1=mysqli_query($con,"select * from sub_ct where id = '$category' ");
                                                            $contacts=mysqli_fetch_array($result1);
                                                            
                                                            $result12=mysqli_query($con,"select * from main_ct where id = '$type' ");
                                                            $contacts2=mysqli_fetch_array($result12);
                                
                                                    $no=$no+1;
                                

                                                ?>
                                            <tr>
                                              <td class="center"><?php echo $no;?></td>
                                               <td class="center"> <?php     
                                                $zaid=$contact['barcode'];
                                             ?>
                                             <img src="barcode/<?php echo $zaid ?>.gif" alt="Smiley face" height="42" width="42">
                                         </td>
                                                 <td class="center"><?php echo $contact['select_date'];?></td>
                                                <td class="center"><?php echo $contact['voucher_no'];?></td>
                                                <td class="center"><?php echo $contact['check_no'];?></td>
                                               
                                                <td class="center"><?php echo $contact['amount'];?></td>
                                                 
                                                <td class="center"><?php echo $contact['ptype'];?></td>
                                                <td class="center"><?php echo $contacts['sub_nm'];?></td>
                                                  <td class="center"><?php echo $contacts2['main_nm'];?></td>
                                                 <td class="center"><?php echo $contact['d_name'];?></td>
                                                
                                                 <td class="center"> <?php $cheque=$contact['cheque_status'];
                                                    
                                                    if($cheque=='0'){
                                                    ?>
                                                    
                                                 Cheque Pending 
                                                    
                                                    <?php } if($cheque=='1'){ ?>
                                                 <span style="color: green">   
                                                Cheque Clear 
                                                </span>
                                                   <?php } if($cheque=='2'){ ?>
                                                  <span style="color: blue">  
                                                Cheque foreword 
                                                </span>
                                                   <?php } if($cheque=='3'){ ?>
                                                    <span style="color: red">
                                                Cheque Stop </>
                                                   <?php } ?>
                                                    
                                                    </td>
                                                     <td class="center"><?php echo $contact['issu_date'];?></td>
                                                <td class="center"><?php echo $contact['clear_date'];?></td>
                                                    
                                                     <td class="center">
												    
												    	 <a class="btn btn-info" href="vou_cash2.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>Receipt</a>
														
														 <a class="btn btn-info" href="edit_com_cashva.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>Edit</a>
														
									<div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-settings font-18 "></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> 
                                      <?php $cheque=$contact['cheque_status'];
                                                    
                                      if($cheque !='1'){
                                  ?>
									 <a  class="dropdown-item btn-modal" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal">Click To Clear</a>
									 
									 <a  class="dropdown-item btn-modal1" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal1">Click To Foreward</a>
								
								 <?php $cheque=$contact['cheque_status'];
                                                    
                                      if($cheque !='3'){
                                  ?>
									<a class="dropdown-item btn-modal2"href="stop3?id=<?php echo $contact['id'] ?>">Click Stop</a>
									 <?php } ?>
									 <?php } ?>
									</div>
                                </div>
								
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Cheque Clear Date</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">  
													<div class="form-group">
													<label class="control-label">Select Date:</label>
													<input type="date" class="form-control" name="final_clear_date">												
													</div>
													<div class="form-group">
													<label class="control-label"></label>											
													<input type="hidden" class="form-control" name="id" id="idd" >
													</div>
											</div>
                                            <div class="form-group">                                               
                                                <div class="col-md-4">
                                                   <input type="submit"  class="btn btn-primary" name="submit" value="submit"> 
												</div>                                                      
                                            </div> 
												</form>
                                            </div>                                           
                                        </div>
                                    </div>
									
									<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Cheque Forward Date</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">  
													<div class="form-group">
													<label class="control-label">Select Date:</label>
													<input type="date" class="form-control" name="frd_date">												
													</div>
													<div class="form-group">
													<label class="control-label"></label>											
													<input type="hidden" class="form-control" name="id" id="iddv" >
													</div>
											</div>
                                            <div class="form-group">                                               
                                                <div class="col-md-4">
                                                   <input type="submit"  class="btn btn-primary" name="submit1" value="submit"> 
												</div>                                                      
                                            </div> 
												</form>
                                            </div>                                           
                                        </div>
                                    </div>
                                
                                
									</td>
                                                    
                                   <!--<td class="center">                                                    
                                  <?php $cheque=$contact['cheque_status'];
                                                    
                                      if($cheque=='0'){
                                  ?>
                                                    
                                <a type="button" class="btn btn-primary btn-modal" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal">  click To clear  </a>
                                                    
                                                    <?php } ?>
                                                    
                                                    
                                               </td>-->
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