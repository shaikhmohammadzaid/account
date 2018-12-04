<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);
?>
<?php 
if(isset($_POST['submit'])){
    
    $pname=$_POST['ename'];
	$month = $_POST['month'];
		$years = $_POST['years'];
	$pday = $_POST['emp_id'];
      $day = $_POST['day'];
	$total=$_POST['total'];
	
	$date = date('Y-m-d');
	

		$insert=mysqli_query($con,"insert into emp_salary(`emp_id`,`month`, `pdays`, `salary`,`currentdate`,`total_day`)values('$pname','$month','$pday','$total','$date','$day')");
		if($insert)
	 {
	   $id=$_POST['id'];  
	   $re=mysqli_query($con,"select * from admin where username='$id'");
	   $se=mysqli_fetch_array($re);
	   $rt=$se['username'];
	     
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'EMPLOYEE SALARY'.$rt;
$pdfimage = 'pdfimage';
$body = "EMPLOYEE  :   ".$rt    ."Amount : ".$total  ." On  Date is  " .$date;
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
		
		
		 $result=mysqli_query($con,"select * from att_total where userid='$pname' and month='$month' and year='$years' ORDER BY id DESC");
                                                    $contact=mysqli_fetch_array($result);
	
}
?>
 <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Employee Salary</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Employee Salary</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
			
			   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Employee Salary</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Employee</label>
												<select   name="ename"  class="select2 form-control custom-select" style="width: 100%; height:36px;" id="empID">
											<option value="">Select Employee</option>
											<?php
											 $c_id = $_SESSION['c_id'];
											$resultab=mysqli_query($con,"select * from vendor_registration WHERE vendor_for='employee'  and c_name='$c_id' ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['v_name']; ?></option>
											<?php } ?>
											</select>
											</div>
										</div>
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Years</label>
												<select   name="years" id="year"  class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Years</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
										
											
											</select>
											</div>
										</div>
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Month</label>
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
										
									
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Per Day Salary</label>
												<input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Enter Amount"  required data-validation-required-message="This field is required" readonly >
											</div>
										</div>
										
										
								
										
											<div class="col-md-6" >
											<div class="form-group">
												<label class="control-label">Day</label>
												<!--<select name="day" id="day" class="form-control" data-rel="chosen" readonly>
											 <option value="">Select Month first</option>
												
												
												</select>-->
													<input type="text" name="day" id="day" class="form-control" placeholder="Enter Day"  required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Total Salary</label>
												<input type="text" name="total" id="c" class="form-control" placeholder="Enter Amount"  required data-validation-required-message="This field is required" readonly>
											</div>
										</div>
										
								
									</div>
									 
									
								
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			
			
			 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Employee Salary List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Employee Name</th>
												<th>Month</th>
												<th>Per Day Salary</th>
												<th>Total Salary</th>
												<th>Salary's Date</th>
												<th>Total Present Day</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
													
														
														$result=mysqli_query($con,"select * from emp_salary   ORDER BY id DESC");
												
													
												   
													while($contact=mysqli_fetch_array($result))
													{
													  $nm = $contact['emp_id'];
													  
													  $results=mysqli_query($con,"select * from vendor_registration where id= '$nm' ");
												
													    $contacts=mysqli_fetch_array($results);
													    
													       $nm = $contacts['v_name'];
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												
												
												<td class="center"><?php echo $nm  ?></td>
												<td class="center"><?php echo $contact['month'];?></td>
												<td class="center"><?php echo $contact['pdays'];?></td>
												<td class="center"><?php echo $contact['salary'];?></td>
												<td class="center"><?php echo $contact['currentdate'];?></td>
												<td class="center"><?php echo $contact['total_day'];?></td>
												
												<td class="center">
													<a class="btn btn-info" href="bank_edit.php?id=<?php echo $contact['id'] ?>">
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
                </div>
			<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
			<script src="jquery.min.js" type="text/javascript"></script>
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
$('#empID').change(function(){
  
    var empId=$(this).val();
    $.post('sa.php',{empId:empId},function(data){
       
    $('#emp_id').val(data);
 });
});
});




$(document).ready(function(){
    $('#month').on('change',function(){
        var month = $(this).val();
        var emppid = document.getElementById('empID').value;
        var year = document.getElementById('year').value;
        
        	var data1 = { 'month': month , 'emppid': emppid , 'year': year  };
		
        if(month){
            $.ajax({
                type:'POST',
                url:'sa.php',
                data:data1,
                success:function(html){
                    $('#day').html(html);
                    add()
                   // $('#day').val(data);
                }
            }); 
        }
        else{
           $('#day').html('<option value="">Select months first</option>');
           //$('#day').val(data);
            
        }
    });
});



function add() {
  var x = document.getElementById("emp_id").value;
  console.log(x);
  var y = document.getElementById("day").value;
  document.getElementById("c").value = x * y  ;
}
</script>

	<?php include('footer.php'); ?>