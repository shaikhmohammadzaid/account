<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
  $c_nameeee =  $_SESSION['c_id'];
?>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example23 .filters td').each( function () {
        var title = $('#example23 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" style="width: 70%;" />' );
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
.dataTables_filter input {
    width: auto;
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
                    <h3 class="text-themecolor">Candidate List</h3>
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
                                <h4 class="card-title">All Candidate List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                  <th>Company Name</th>
                                                <th>Contact Name</th>
                                                <th>Contact Number</th>
                                                <th>Secondary Number</th>
                                               
                                                <th>Email ID</th>
                                                  <th>Address</th>
                                              
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                             <thead class="filters">
                                                 <tr>
                                             <td>No</td>
                                              <td>Company Name</td>
                                             <td>Contact Name</td>
                                              <td>Contact Number</td>
                                              <td>Secondary Number</td>
                                            <td>Email ID</td>
                                            <td >Address</td>
                                           
                                            <td>Action</td>
                                            
											
                                                 </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $no=0;
                                                    $result=mysqli_query($con,"select * from phonebook where c_id='$c_nameeee'  ORDER BY id DESC");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                    $no=$no+1;
                                                ?>
                                            <tr>
                                                <td class="center"><?php echo $no;?></td>
                                                   <td class="center"> 
                                                <?php $tt=$contact['c_id'];
                                                $ff=mysqli_query($con,"select * from company where c_id='$tt' ");
                                                $yy=mysqli_fetch_array($ff);
                                                 $o=$yy['username'];
                                                echo $o;
                                                ?></td>
                                                
                                                <td class="center"><?php echo $contact['cname'];?></td>
                                                <td class="center"><?php echo $contact['num'];?></td>
                                                <td class="center"><?php echo $contact['snum'];?></td>
                                                <td class="center"><?php echo $contact['email'];?></td>
                                                <td class="center"><?php echo $contact['address'];?></td>
                                              
                                         <td class="center">
                                           
                                  <a class="btn btn-success" href="phonebook_edit.php?id=<?php echo $contact['id'];?>">
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