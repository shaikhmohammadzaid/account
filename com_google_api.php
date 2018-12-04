<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <title> Directions</title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript">
    var source, destination;
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    google.maps.event.addDomListener(window, 'load', function () {
        debugger;
        new google.maps.places.SearchBox(document.getElementById('txtSource'));
        new google.maps.places.SearchBox(document.getElementById('txtDestination'));
        directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
    });

    function GetRoute() {
        var mumbai = new google.maps.LatLng(18.9750, 72.8258);
        var mapOptions = {
            zoom: 7,
            center: mumbai,
            durationInTraffic: true
        };
        map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('dvPanel'));

        //*********DIRECTIONS AND ROUTE**********************//
        source = document.getElementById("txtSource").value;
        destination = document.getElementById("txtDestination").value;

        var request = {
            origin: source,
            destination: destination,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });

        //*********DISTANCE AND DURATION**********************//
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
            origins: [source],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function (response, status) {
            debugger;
            if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                var distance = response.rows[0].elements[0].distance.text;
                var duration = response.rows[0].elements[0].duration.text;
                var dvDistance = document.getElementById("dvDistance");
                var x= "8";
            var final =  parseFloat(distance) * x;
                
                  $('#new').val(distance);
                  $('#new1').val(duration);
                   $('#rate').val(final);
                dvDistance.innerHTML = "";
                dvDistance.innerHTML += "Distance: " + distance + "<br />";
                dvDistance.innerHTML += "Duration:" + duration;
                 

            } else {
                alert("Unable to find the distance via road.");
            }
        });
    }
</script>
</head>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");

	if(isset($_POST['submit'])){
	
		$ename = $_POST['ename'];
		$month = $_POST['month'];
			$start_point = $_POST['start_point'];
		$end_point = $_POST['end_point'];
			$currentdate = date('Y-m-d');
			$km = $_POST['km'];
		$timing = $_POST['timing'];
			$total_rate = $_POST['total_rate'];
	
		
	$insert=	mysqli_query($con,"insert into emp_petrol (`emp_id`,`month`,`start_point`,`end_point`,`currentdate`,`km`,`timing`,`total_rate`)values('$ename','$month','$start_point','$end_point','$currentdate','$km','$timing','$total_rate')");
	if($insert)
	{
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'DISTANCE CALCULATE'.$ename;
$pdfimage = 'pdfimage';
$body = "DISTANCE CALCULATE  :   ".$ename    ."Amount : ".$total_rate  ." On  Date is  " .$currentdate;
//$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";
$mail->addAttachment("images/".$nam);		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($zemail);

$mail->AddReplyTo($email);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->WordWrap = 120;
if(!$mail->Send()) 
{
  echo 'Message was not sent.';
 echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else {

 echo 'mail send ok';
}
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
	
	    
	}
	}
?>
<style>
    label.col-md-4.col-form-label {
    text-align: right;
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
                    <h3 class="text-themecolor">Sub Category</h3>
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
                                <h4 class="card-title">Distance Calculate</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									 
									 
								
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Employee</label>
													<div class="col-md-5">
												<select   name="ename"  class="select2 form-control custom-select" style="width: 100%; height:36px;" id="empID">
											<option value="">Select Employee</option>
											<?php
												 
									 	$c_name1 = $_SESSION['c_id'];
											$resultab=mysqli_query($con,"select * from vendor_registration WHERE vendor_for='employee' and c_name='$c_name1' ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['v_name']; ?></option>
											<?php } ?>
											</select>
											</div>
											</div>
											
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Month</label>
													<div class="col-md-5">
												<select   name="month" id="month" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Month</option>
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">Sepetember</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
											
											</select>
												</div>
											</div>
									
									
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Start Point:</label>
												<div class="col-md-5">
											<input type="text" id="txtSource" name="start_point" class="form-control" value=""  />
											</div>
									</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">End Point:</label>
												<div class="col-md-5">
											<input type="text" id="txtDestination" name="end_point" class="form-control" value=""  />
											</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Distance:</label>
												<div class="col-md-5">
											<input type="text" class="form-control" name="km" id="new" onclick="GetRoute()" value=""  />
											</div>
										</div>
										
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Duration:</label>
												<div class="col-md-5">
											<input type="text"  class="form-control" name="timing" id="new1" value=""  />
											</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Rate</label>
												<div class="col-md-5">
											<input type="text"  class="form-control" name="total_rate" id="rate" value=""  />
											</div>
										</div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" class="btn btn-info" >Submit</button>
                                    </div>
                                    <div id="dvDistance">
        </div>
        <div id="dvMap" style="width: 1px; height: 1px">
        </div>
          <div id="dvPanel" style="width: 1px; height: 1px">
        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Employee Petrole Expence</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Employee Name</th>
                                                <th>Start Point</th>
                                                <th>End  Point</th>
                                                <th>Distance</th>
                                                <th>Timing</th>
                                                <th>Total Rate</th>
                                                                                                 
												
											</tr>
										</thead>
										<tbody>
											<?php
													$no=0;
														$c_name1 = $_SESSION['c_id'];
														$sla1=mysqli_query($con,"SELECT * FROM `vendor_registration` WHERE c_name='$c_name1'");
													    while($rowa1=mysqli_fetch_array($sla1)){
													        $uid= $rowa1['id'];
													$result=mysqli_query($con,"select * from emp_petrol where emp_id='$uid' ORDER BY id DESC");
													while($contact=mysqli_fetch_array($result))
													{
														$main_id=$contact['emp_id'];
														$sla=mysqli_query($con,"SELECT * FROM `vendor_registration` WHERE id='$main_id'");
													    $rowa=mysqli_fetch_array($sla);
														$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $rowa['v_name'];?></td>
												<td class="center"><?php echo $contact['start_point'];?></td>
												
														<td class="center"><?php echo $contact['end_point'];?></td>
															<td class="center"><?php echo $contact['km'];?></td>
															<td class="center"><?php echo $contact['timing'];?></td>
												<td class="center">
													<?php echo $contact['total_rate'];?>
												</td>
											</tr>
											<?php
													}
													}
												?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			  
			   
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

         <?php include('footer.php'); ?>
