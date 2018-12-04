<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>

<style>
h4.card-title {
    line-height: 40px;
    font-size: 27px;
    text-transform: uppercase;
    margin-bottom: 40px;
    color: #3953a4;
    text-align: center;
}
input {
    overflow: visible;
    width: 100%;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    min-height: 38px;
    background-clip: padding-box;
}
.dataTables_filter input{
    width:auto;
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example23 .filters td').each( function () {
        var title = $('#example23 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text"/>' );
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


 <script src="jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
 
 
 
$(document).ready(function(){
    $(".btn-modal").click(function(){
       
       
        var id=$(this).data('id'); 
    
       console.log(id);
      
       if(id){   $.ajax({
             type:'POST',
            url: "purchase_ajax.php",
           data: 'id='+id,
        success: function(result){
            
    alert("Sussecfully Approved.");
      location.reload(true);
      
        }});
        
       }
    });
});


</script>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Purchase List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Purchase</li>
                        <li class="breadcrumb-item active">Purchase List</li>
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
                                <h4 class="card-title">All Purchase List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Vendor Name</th>
												<th>phone Number</th>
												
												<th>E-mail</th>
												<th>Item Name</th>
												<th>Item quantity</th>
												<th>Item rate</th>
												<th>Item final Amount</th>
												<th>Inquiry Date</th>
												<th>Inquiry by</th>
												<th>Address</th>
												<th>Status</th>
												<th>action</th>
											
											</tr>
											</thead>
											 <thead class="filters">
                                                 <tr>
                                                     	<td>No</td>
                                                    <td>Vender Name</td>
												<td>phon Number</td>
												<td>E-mail</td>
												<td>Item Name</td>
													<td>Item quantity</td>
													<td>Item rate</td>
												<td>Item final Amount</td>
												<td>Inquiry Date</td>
												<td>Inquiry by</td>
												<td>Address</td>
											    <td>Status</td> 
											    <td>action</td>

                                                     </tr>
											</thead>
											<tbody>
											<?php
													$no=0;
													
													$result=mysqli_query($con,"select * from purchase ");
													while($contacta = mysqli_fetch_array($result))
														//echo"<script>alert('$contacta')</script>";
													{
													$no=$no+1;
													$status=$row['status'];
												?>
											<tr>
										     	<td class="center"><?php echo $no;?></td>
										     	<td class="center"><?php echo $contacta['v_name'];?></td>
												<td class="center"><?php echo $contacta['p_no'];?></td>
											
												<td class="center"><?php echo $contacta['e_mail'];?></td>
												<td class="center"><?php echo $contacta['item_name'];?></td>
												<td class="center"><?php echo $contacta['item_c'];?></td>
												<td class="center"><?php echo $contacta['item_r'];?></td>
												<td class="center"><?php echo $contacta['item_amount'];?></td>
												<td class="center"><?php echo $contacta['inquiry_date'];?></td>
												<td class="center"><?php echo $contacta['inquiry_by'];?></td>
													<td class="center"><?php echo $contacta['address'];?></td>
												<td><?php $stats=$contacta['status'];
                                                            if($stats=="0"){
                                             ?>
                                                 <span style="color: green">Disapprove</span>
                                                 <?php } if($stats=="1")  { ?>
                                                <span style="color: red">Approve</span>
                                                <?php } ?>
                                              </td>
                                              	<td>
                                              	    <?php if($stats=="0")  { ?>
                                              	    <button type="button" id="button1" class="btn btn-info btn-lg btn-modal" data-id="<?php echo $contacta['id']; ?>">Approve </button>
                                              	      <?php } ?>
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