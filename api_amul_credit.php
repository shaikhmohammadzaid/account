<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>
<?php 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://amul.namasteji.co.in/api/?method=sell",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 60,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  
));

$response = curl_exec($curl);
$err = curl_error($curl);
$resArr = array();
$resArr = json_decode($response);
curl_close($curl);
?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Credit List</h3>
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
                                <h4 class="card-title">Credit List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Day</th>
												<th>OutLet Name</th>
												<th>Contect Number</th>
												<th>Total</th>
											
											</tr>
										</thead>
										<tbody>
										 <?php
										 $no=1;
										 foreach($resArr as $result){ ?>
        <tr>
 			<td><?php echo $no++; ?></td>
            <td><?php echo $result->ordered_datetime; ?></td>
            <td><?php echo $result->outlet_name; ?></td>
            <td><?php echo $result->outlet_contact; ?></td>
            <td><?php echo $result->grandtotal; ?></td>
              
        </tr>
<?php  } ?>
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