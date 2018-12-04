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

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Tander List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Tander Managment</li>
                        <li class="breadcrumb-item active">Tandert List</li>
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
                                <h4 class="card-title">All Tander List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>File Name</th>
													<th>Document Type</th>
													<th>Document</th>
											
											
												<th>Location</th>
											</tr>
											</thead>
											 <thead class="filters">
                                                 <tr>
                                                     	<td>No</td>
												<td>File Name</td>
													<td>Document Type</td>
													<td>Document</td>
												<td>Location</td>
											

                                                     </tr>
											</thead>
											<tbody>
											<?php
													$no=0;
													 $pid=$_GET['cid'];
													$result=mysqli_query($con,"select * from tander_attceh where c_id='$pid' ORDER BY id DESC");
													while($contact=mysqli_fetch_array($result))
													{														
													$no=$no+1;
													$cid=$contact['c_id'];
													$resultab=mysqli_query($con,"select * from tander where id='$cid'");
													$contactab=mysqli_fetch_array($resultab);
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												
												<td class="center"><?php echo $contactab['subject'];?></td>
													<td class="center"><?php echo $contact['file_type'];?></td>
													<td class="center"> <?php     
                                                $zaid=$contact['profile'];
                                             ?> <a  href="images/<?php echo $zaid ?>" ><?php echo $contact['profile'];?></a></td>
												<td class="center"><?php echo $contactab['location'];?></td>
											
											
												
												
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