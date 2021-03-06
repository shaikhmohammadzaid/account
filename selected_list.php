<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>
<style>

button, input, optgroup, select, textarea {
     margin: none !important; 
     font-family: none !important; 
    font-size: none !important; 
     line-height: none !important; 
}
</style>
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Selected Candidate List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Recruitment</li>
                        <li class="breadcrumb-item active">Selected Candidate List</li>
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
                                <h4 class="card-title">Selected Candidate List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        
                                        
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Candidate Type</th>
                                                <th>Candidate Name</th>
                                                  <th>Father Name</th>
                                                <th>Applying Post</th>
                                                <th>Qualification</th>
                                                <th>marks</th>
                                                <th>Experience</th>
                                                  <th>Previous Company</th>
                                                  <th>Accepted salary</th>
                                                <th>gender</th>
                                                <th>city</th>
                                                <th>phone</th>
                                                <th>Applying Date</th>
                                                <th>Status</th>
                                               
                                                
                                            </tr>
                                            </thead>
                                            <thead class="filters">
                                                 <tr>
                                           <td>No</td>
                                              <td >Candidate Type</td>
                                            <td >Candidate Name</td>
                                            <td >Father Name</td>
                                            <td >Applying Post</td>
                                            <td >Qualification</td>
                                            <td>marks</td>
                                             <td>Experience</td>
                                             <td>Previous Company</td>
                                              <td>Accepted salary</td>
                                              <td>gender</td>
                                              <td>city</td>
                                            <td>phone</td>
                                            <td >Applying Date</td>
                                            <td >Status</td>
											
                                                 </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $no=0;
                                                    
                                                    $result=mysqli_query($con,"select * from interview where status='1' ORDER BY id DESC");
                                                    while($contact=mysqli_fetch_array($result))
                                                    {
                                                        
                                                    $no=$no+1;
                                                ?>
                                            <tr>
                                               <td class="center"><?php echo $no;?></td>
                                                <td class="center"><?php echo $contact['type'];?></td>
                                                <td class="center"><?php echo $contact['c_name'];?></td>
                                                <td class="center"><?php echo $contact['f_name'];?></td>
                                                <td class="center"><?php echo $contact['post'];?></td>
                                                <td class="center"><?php echo $contact['qualification'];?></td>
                                                <td class="center"><?php echo $contact['marks'];?></td>
                                                <td class="center"><?php echo $contact['experience'];?></td>
                                                <td class="center"><?php echo $contact['p_company'];?></td>
                                                <td class="center"><?php echo $contact['asalary'];?></td>
                                                 <td class="center"><?php echo $contact['gender'];?></td>
                                                 <td class="center"><?php echo $contact['city'];?></td>
                                                <td class="center"><?php echo $contact['phone'];?></td>
                                                 <td class="center"><?php echo $contact['created _date'];?></td>
                                                 <td class="center">	<?php $stats=$contact['status'];
 if($stats==0)  { ?>
                                                <span style="color: blue">No Action Perform</span>
                                                 <?php } if($stats==1)  { ?>
 <span style="color: green">Selected</span>
 <?php } if($stats==2)  {?>
  <span style="color: red">Rejected</span>
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
            <script> 
   function clickAndDisable(link) {
     // disable subsequent clicks
     link.onclick = function(event) {
        event.preventDefault();
     }
   }   
</script>
 <?php include('footer.php'); ?>