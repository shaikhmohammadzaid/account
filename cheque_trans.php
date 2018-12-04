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
  
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example23 .filters td').each( function () {
        var title = $('#example23 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" />' );
    } );
 
    // DataTable
    var table = $('#example23').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', $('.filters td')[colIdx] ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>

<style>
input {
    overflow: visible;
    width: 100%;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    min-height: 38px;
    background-clip: padding-box;
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
		

		
		 $insert=  mysqlI_query($con,"UPDATE `cash_voucher` SET  `final_clear_date`='$final_clear_date', `cheque_status`='1'  WHERE id='$chk_id'  ");
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
                                                <th>Employee Name</th>
                                                <th>Cheque Number</th>
                                                <th>Amount</th>
                                                <th>Bank</th>
                                                <th>Month </th>
                                                <th>Issue Date</th>
                                                <th>Clear Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                             <thead class="filters">
                                            <tr>
                                                <td>No</td>
                                                <td>Barcode</td>
                                                <td>Employee Name</td>
                                                <td>Cheque Number</td>
                                                <td>Amount</td>
                                                <td>Bank</td>
                                                <td>Month </td>
                                                <td>Issue Date</td>
                                                <td>Clear Date</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $no=0;
                                                  
                                                    $result=mysqli_query($con,"select * from cash_voucher where ptype = 'cheque'  ORDER BY id DESC");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                        
                                                        
                                                         $uuuid=$contact['pname'];
                                 $resultas=mysqli_query($con,"select * from vendor_registration WHERE id='$uuuid'");
                                $contactas=mysqli_fetch_array($resultas);
                                
                               $bank= $contact['bank'];
                               
                                 $resulta1=mysqli_query($con,"select * from bank WHERE id='$bank'");
                                $contacta1=mysqli_fetch_array($resulta1);
                                
                                                    $no=$no+1;
                                                ?>
                                            <tr>
                                                <td class="center"><?php echo $no;?></td>
                                               <td class="center"> <?php     
                                                $zaid=$contact['barcode'];
                                             ?>
                                             <img src="barcode/<?php echo $zaid ?>.gif" alt="Smiley face" height="42" width="42">
                                         </td>
                                                <td class="center"><?php echo $contactas['v_name']; ?></td>
                                                <td class="center"><?php echo $contact['check_no'];?></td>
                                                <td class="center"><?php echo $contact['amount'];?></td>
                                                 <td class="center"><?php echo $contacta1['bank_name'];?></td>
                                                <td class="center"><?php echo $contact['month'];?></td>
                                                <td class="center"><?php echo $contact['issu_date'];?></td>
                                                <td class="center"><?php echo $contact['clear_date'];?></td>
                                                
                                                 <td class="center"> <?php $cheque=$contact['cheque_status'];
                                                    
                                                    if($cheque=='0'){
                                                    ?>
                                                    
                                                 Cheque Pending 
                                                    
                                                    <?php } if($cheque=='1'){ ?>
                                                    
                                                Cheque Clear 
                                                   <?php } ?>
                                                    
                                                    </td>
                                                <td class="center">
                                                    
                                                    <?php $cheque=$contact['cheque_status'];
                                                    
                                                    if($cheque=='0'){
                                                    ?>
                                                    
                                                   <a type="button" class="btn btn-primary btn-modal" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal">
  click To clear
  </a>
                                                    
                                                    <?php } ?>
                                                    
                                                    
                                               
                                            </tr>
                                            <?php
                                                    }
                                                ?>
                                               </tbody>
                                    </table>
                                    
                                    
                                    <div class="tab-content">
                    
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">FOR CHEQUE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                                             
                                             
                                             

									  <div class="form-group row">
											<label class="control-label"> Date</label>
											<input type="date" class="form-control" name="final_clear_date" >
												
										</div>
										<div class="form-group row">
											<label class="control-label"></label>
											
												<input type="hidden" class="form-control" name="id" id="idd" >
										</div>
										</div>
                                             <div class="form-group row">
                                               
                                                <div class="col-md-4">
                                                   <input type="submit"  class="btn btn-success" name="submit" value="submit"> </div>
                                                        <div class="form-group row">
                                                  
                                                    </div>
                                            </div> 
                </form>
        </div>
        
            </div>
    </div>
  </div>
                                    
                                    
                                    
                                    
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