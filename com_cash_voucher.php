<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
include 'barcode1.php';
error_reporting(0);
?>
<?php 

$c_id=$_SESSION['c_id'];
$r=mysqli_query($con,"select * from cash_voucher ORDER BY id DESC LIMIT 0,1");
$rs=mysqli_fetch_array($r);
if(isset($_POST['submit'])){
    
    
    $c_id = $_SESSION['c_id'];
	$v_for = $_POST['reg_for'];
	$pname = $_POST['name'];
	$amount = $_POST['c_amount'];
	$category=$_POST['cat'];
	$sub = $_POST['sub'];
	$ptype=$_POST['ptype'];
	$voucher_no=$_POST['v_no'];
	$cheque_no=$_POST['cheque_no'];
	$bank=$_POST['bank'];
	$account_no=$_POST['acc_no'];
	$ifsc=$_POST['ifsc'];
	$mobile_no=$_POST['mobile_no'];
	$dte=$_POST['dte'];
	$dte=date('Y-m-d');
	$time=date('H:i:s');
	$month=$_POST['month'];
	
	$invoice1=$_POST['invoice'];
		$primary = $_POST['primary'];
		if($primary == ''){
		    
		    	$invoice=$_POST['invoice'];
		}
			if($invoice1 == ''){
		    
		    	$invoice= $_POST['primary'];
		}

	$issu_date=$_POST['issu_date'];
	$clear_date=$_POST['clear_date'];
	  $file=$_FILES['profile']['name'];
            $type=$_FILES['profile']['type'];
            $size=$_FILES['profile']['size'];
            $temp=$_FILES['profile']['tmp_name'];
            $RandomNo = mt_rand(1, 99999);
            $nam='img'.$RandomNo.$file;
            $lfile=str_replace(' ','_',$nam);
          
            move_uploaded_file($temp,"cashvou/".$lfile);
            $save="img/".$lfile;
	
	$pname1=$_POST['vname'];
	if($pname1==""){
		$pname=$_POST['ename'];
		
	}
	
	$pname2=$_POST['ename'];
	
	if($pname2==""){
		
		$pname=$_POST['vname'];
	}
	
	$code=uniqid();
                $bc = new Barcode39($code);
                // set text size
                $bc->barcode_text_size = 1;

                // display new barcode
             echo   $bc->draw('barcode/'.$code.'.gif');
	
	$insert7=	mysqlI_query($con,"insert into cash_voucher(`c_name`,`v_for`,`pname`, `amount`, `category`,`dte`,`time`,`ptype`,`voucher_no`,`check_no`,`bank`,`account_no`,`ifsc`,`mobile_no`,`month`,`issu_date`,`clear_date`,`invoice`,`barcode`,`profile`,`main_c`)values('$c_id','$v_for','$pname','$amount','$category','$dte','$time','$ptype','$voucher_no','$cheque_no','$bank','$account_no','$ifsc','$mobile_no','$month','$issu_date','$clear_date','$invoice','$code','$lfile','$sub')");
	if($insert7){
	
	
	$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'MAKE TRANSACTION'.$ptype;
$pdfimage = 'pdfimage';
$body = "MAKE TRANSACTION :   ". $ptype    . " On  Date is  " .$dte;
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
		
	$pname2=$_POST['ename'];
		$month=$_POST['month'];
	$pname=$_POST['vname'];
	 	$invoice=$_POST['invoice'];
	 	$payment_c=$_POST['payment_c'];
	 	$payment_c1=$_POST['payment_c1'];
	 		$amount = $_POST['c_amount'];
	 
	$salary= $payment_c-$amount;
		$final= $payment_c1-$amount;
			$cheque_no=$_POST['cheque_no'];
		 $insert=  mysqlI_query($con,"UPDATE `emp_salary` SET `salary`='$salary' WHERE emp_id='$pname2' and month='$month' ");
		  $insert=  mysqlI_query($con,"UPDATE `invoice` SET `final`='$final' WHERE vname='$pname' and invoice_no='$invoice' ");
		 
		 	 $insert=  mysqlI_query($con,"UPDATE `chaquebook` SET `status`='1' WHERE qrcode='$cheque_no'");
		 
	}
	
}
?>
<style>
.card-body h4 {
    line-height: 35px;
    font-size: 25px;
    text-transform: uppercase;
    margin-bottom: 40px;
    color: #3953a4;
    text-align: center;
}
.text-xs-right {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>
 <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Make Transactions</h3>
                </div>
                
            </div>
            
            <div class="container-fluid">
			
			   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Make Transaction</h4>
								<?php echo $msg; ?>
								 <a href="vendor_registration" target="_blank" button type="submit" class="btn btn-info" style="
    float: right;
    margin-top: -74px;
    height:50px;
">Create Vendor</button></a>
                                <form class="m-t-40"  method="post" enctype="multipart/form-data">
									<div class="row">
									    
									     	
									   
									    
									    
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Trader Type</label>
												<select id="per" name="reg_for"  class="form-control" data-rel="chosen" >
												<option value="">Select Trader Type</option>
												<option value="vendor">Vendor</option>
												<option value="employee">Employee</option>
												
												</select>
											</div>
										</div>
										
										<div class="col-md-6" style="display:none;" id="businessas" >
										   
											<div class="form-group">
												<label class="control-label">Select Vendor</label>
												<select  name="vname"   id="i11" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Vendor</option>
											<?php
											
											$resultab=mysqli_query($con,"select * from vendor_registration WHERE vendor_for='vendor' and c_name='$c_id' ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['v_name']; ?></option>
											<?php } ?>
											</select>
											
											</div>
										</div>
									
										<div class="col-md-6"  style='display:none;' id='businessa' >
										   
											<div class="form-group">
												<label class="control-label">Select Employee</label>
												<select   name="ename" id="i1" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Employee</option>
											<?php
											$resultab=mysqli_query($con,"select * from vendor_registration WHERE vendor_for='employee' and c_name='$c_id' ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['v_name']; ?></option>
											<?php } ?>
											</select>
											 
											</div>
										</div>
											
											
										    	<div class="col-md-6" >
									  <div class="form-group">
											<label class="control-label">Select Date</label>
											<input type="date" class="form-control" name="dte" >
										</div>
										</div>
										
											<div class="col-md-6" style="display:none;" id="gst">
											<div class="form-group">
												<label class="control-label">GST Number</label>
												<select name="gst" id="gst1" class="form-control" data-rel="chosen" >
											 <option value="">Select GST Number/option>
												
												
												</select>
											</div>
										</div>
										
											<div class="col-md-6" style="display:none;" id="i3">
											<div class="form-group">
												<label class="control-label">Pending Month</label>
												<select name="month" id="i2" class="form-control" data-rel="chosen" >
											 <option value="">Select Employee first</option>
												
												
												</select>
											</div>
										</div>
										
										<div class="col-md-6" style="display:none;" id="i31">
											<div class="form-group">
												<label class="control-label">Invoice</label>
												<select name="invoice" id="i21" class="form-control" data-rel="chosen" <?php if($v_for == 'vendor'){ ?> required data-validation-required-message="This field is required" <?php } ?>  >
											 <option value="">Select Vendor first</option>
												
												
												</select>
											</div>
										</div>
										
										
										<div class="col-md-6" style="display:none;" id="i4">
											<div class="form-group">
												<label class="control-label">Payment</label>
											<select name="payment_c" id="c" class="form-control" data-rel="chosen" >
											 <option value="">Select Payment</option>
												
												<input type="hidden" name="primary" id="primary">
												</select>
											</div>
										</div>
										
											<div class="col-md-6" style="display:none;" id="i41">
											<div class="form-group">
												<label class="control-label">Payment</label>
											<select name="payment_c1" id="c1" class="form-control payment_c1" data-rel="chosen" >
											 <option value="">Select payment1</option>
													
												</select>
											</div>
										</div>
										
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Amount</label>
											
									<!--		add Class c_amount To start Validation-->
											
												<input type="text"  class="form-control"  placeholder="Enter Amount" name="c_amount" required data-validation-required-message="This field is required">
											 <label class="erroramount"></label>
											
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Category</label>
												<select name="cat"  class="select2 form-control custom-select" data-rel="chosen" id = "cat" >
												<option value="">Select Category</option>
												
													<?php
											$resultab=mysqli_query($con,"select * from sub_ct ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['sub_nm']; ?></option>
											<?php } ?>
												
												
												</select>
											</div>
										</div>
										
											<div class="col-md-6"   >
										    
										    <div class="form-group">
												<label class="control-label">Select main Category</label>
												<select name="sub" id="vname" class="form-control" data-rel="chosen" required data-validation-required-message="This field is required" >
											 <option value="">Select main Category</option>
												
												
												</select>
											</div>
									
										</div>
										
										
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Payment Type</label>
												<select id="ptype" name="ptype"  class="select2 form-control custom-select" data-rel="chosen" >
												<option value="">Select Payment Type</option>
												<option value="cash">Cash</option>
												<option value="cheque">Cheque</option>
												<option value="online">Online_Transfer</option>
												<option value="paytm">Paytm</option>
												
												</select>
											</div>
										</div>
										
											<div class="col-md-6" style="display:none;" id="profile">
											<div class="form-group">
												<label class="control-label">Attach File</label>
											   <input class="form-control" name="profile" type="file" id="imgInp">
											</div>
										</div>
										
										<div class="col-md-6" >
											<div class="form-group">
												<label class="control-label">Voucher Number</label>
												<input type="text" class="form-control" placeholder="Voucher Number" readonly value="<?php echo ++$rs['voucher_no']; ?>" name="v_no">											
											
											</div>
										</div>
										
											<div class="col-md-6" style="display:none;" id="cheque2">
											<div class="form-group">
												<label class="control-label">Select Bank</label>
												<select name="bank" id="country" class="select2 form-control custom-select" data-rel="chosen" style="width: 100%; height:36px;"  >
												<option value="">Select Bank</option>
												
													<?php
											$resultab=mysqli_query($con,"select * from bank where c_name='$c_id' ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $bid=$contactab['id']; ?>"><?php echo $contactab['bank_name']; ?></option>
											
											<?php } ?>
											
												</select>
											</div>
										</div>
										
										
										
											<div class="col-md-6" style="display:none;" id="cheque1">
											<div class="form-group">
												<label class="control-label">Select Chaque</label>
												<select name="cheque_no" id="state" class="select2 form-control custom-select " data-rel="chosen" style="width: 100%; height:36px;"  >
											 <option value="">Select Bank first</option>
												
												
												</select>
											</div>
										</div>
									  
									  
									  
									  
									  	<div class="col-md-6" style="display:none;" id="idate">
									  <div class="form-group">
											<label class="control-label">Issue Date</label>
											<input type="date" class="form-control" name="issu_date" >
										</div>
										</div>
										
										
										<div class="col-md-6" style="display:none;" id="cdate">
									  <div class="form-group">
											<label class="control-label">Check On Date</label>
											<input type="date" class="form-control" name="clear_date" >
										</div>
										</div>
									
										<div class="col-md-6" style="display:none;" id="ot">
											<div class="form-group">
												<label class="control-label">Account Number</label>
												<input type="text" class="form-control" placeholder="Enter Account Number" name="acc_no">
											</div>
										</div>
										<div class="col-md-6" style="display:none;" id="ot1">
											<div class="form-group">
												<label class="control-label">IFSC Code</label>
												<input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc">
											</div>
										</div>
										<div class="col-md-6" style="display:none;" id="paytm">
											<div class="form-group">
												<label class="control-label">Paytm Mobile Number</label>
												<input type="text" class="form-control" placeholder="Enter mobile Number" name="mobile_no">
											</div>
										</div>
									</div>
									 
									
								
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" id="pay1" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
			<script src="jquery.min.js" type="text/javascript"></script>
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    $('#cat').on('change',function(){
        var perID = $(this).val();
        //var com = document.getElementById('cs').value;
        
        	var data1 = {'main_id': perID};
		
        if(perID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:data1,
                success:function(html){
                    $('#vname').html(html);
                    
                   
                }
            }); 
        }
        else{
            $('#vname').html('<option value="">Select Trader Type First</option>');
            
        }
    });
});




$('.c_amount').keyup(function(){
    
    var c_amount=$('.c_amount').val();
  
    var payment_c1=$('.payment_c1').val();
    
    
   if(payment_c1 < c_amount)
   {
       alert("Note Accepted amount");
     

   }
   else
   {
     
   }
});
    
    
</script>





<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                   
                }
            }); 
        }
        else{
            $('#state').html('<option value="">Select Bank first</option>');
            
        }
    });
});



$(document).ready(function(){
    $('#i1').on('change',function(){
        var empID = $(this).val();
        if(empID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'emp_id='+empID,
                success:function(html){
                    $('#i2').html(html);
                   
                }
            }); 
        }
        else{
            $('#i2').html('<option value="">Select Employee first</option>');
            
        }
    });
});

$(document).ready(function(){
    $('#i11').on('change',function(){
        var gstid = $(this).val();
        if(gstid){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'gst_id='+ gstid,
                success:function(html){
                    $('#gst1').html(html);
                   
                }
            }); 
        }
        else{
            $('#gst1').html('<option value="">Select Vendor first</option>');
            
        }
    });
});

$(document).ready(function(){
    $('#i11').on('change',function(){
        var venderID = $(this).val();
        if(venderID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'vender_id='+venderID,
                success:function(html){
                    $('#i21').html(html);
                   
                }
            }); 
        }
        else{
            $('#i21').html('<option value="">Select Vendor first1</option>');
            
        }
    });
});


$(document).ready(function(){
    $('#i21').on('change',function(){
        var invoice = $(this).val();
        var venid = document.getElementById('i11').value;
        
        	var data1 = { 'invoice_id': invoice , 'ven_id': venid};
		
        if(invoice){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:data1,
                success:function(html){
                    $('#c1').html(html);
                    
                   
                }
            }); 
        }
        else{
            $('#c1').html('<option value="">Select Invoice first</option>');
            
        }
    });
});

$(document).ready(function(){
    $('#i2').on('change',function(){
        var emp_ID = $(this).val();
        var uid = document.getElementById('i1').value;
        
        	var data = { 'empid': emp_ID , 'u_id': uid};
		
        if(emp_ID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:data,
                success:function(html){
                    $('#c').html(html);
                    
                   
                }
            }); 
        }
        else{
            $('#c').html('<option value="">Select Month first</option>');
            
        }
    });
});


$(document).ready(function(){
    $('#i2').on('change',function(){
        var empp_ID = $(this).val();
        var uiiid = document.getElementById('i1').value;
        
        	var data = { 'empp_ID': empp_ID , 'uiiid': uiiid};
		
        if(empp_ID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:data,
                success:function(html){
                    $('#primary').val(html);
                    
                   
                }
            }); 
        }
        
    });
});



$(document).ready(function(){
    $('#per').on('change', function() {
     
	  if ( this.value == 'vendor')
      {
		  
        $("#businessas").show();
		 
        
      }
      else
      {
        $("#businessas").hide();
       
	
      }
	  
	  
    });
});


$(document).ready(function(){
    $('#i3').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#i4").show();
       
        
      }
      else
      {
       
       
	 $("#i4").hide();
	 
      }
	  
	  
    });
});


$(document).ready(function(){
    $('#i31').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#i41").show();
       
        
      }
      else
      {
       
       
	 $("#i41").hide();
	 
      }
	  
	  
    });
});


$(document).ready(function(){
    $('#i1').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#i3").show();
		 
       
        
      }
      else
      {
       
       
	 $("#i3").hide();
	
      }
	  
	  
    });
});

$(document).ready(function(){
    $('#i11').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#i31").show();
        $("#gst").show();
        
      }
      else
      {
       
       
	 $("#i31").hide();
	   $("#gst").hide();
      }
	  
	  
    });
});


$(document).ready(function(){
    $('#state').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#idate").show();
		 	 $("#cdate").show();
       
        
      }
      else
      {
       
       
	 $("#idate").hide();
	 $("#cdate").hide();
      }
	  
	  
    });
});


$(document).ready(function(){
    $('#per').on('change', function() {
     
	  if ( this.value == 'employee')
      {
		  
       
		
		 $("#businessa").show();
       
        
      }
      else
      {
       
       
	 $("#businessa").hide();
      }
	  
	  
    });
});

$(document).ready(function(){
    $('#ptype').on('change', function() {
     
	  if ( this.value == 'cash')
      {
		  
        $("#cash").show();
		 
        
      }
      else
      {
        $("#cash").hide();
       
	
      }
	  
	  
    });
});

$(document).ready(function(){
    $('#ptype').on('change', function() {
     
	  if ( this.value == 'cheque')
      {
		  
       $("#cheque1").show();
		$("#cheque2").show();
			$("#profile").show(); 
        
      }
      else
      {
       $("#cheque1").hide();
		$("#cheque2").hide();
       	$("#profile").hide();
	
      }
	  
	  
    });
});




$(document).ready(function(){
    $('#ptype').on('change', function() {
     
	  if ( this.value == 'online')
      {
		  
        $("#ot").show();
		$("#ot1").show();
		 
        
      }
      else
      {
        $("#ot").hide();
		$("#ot1").hide();
       
	
      }
	  
	  
    });
});

$(document).ready(function(){
    $('#ptype').on('change', function() {
     
	  if ( this.value == 'paytm')
      {
		  
        $("#paytm").show();
		
		 
        
      }
      else
      {
        $("#paytm").hide();
		
       
	
      }
	  
	  
    });
});
</script>




	<?php include('footer.php'); ?>