<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
include 'barcode1.php';
error_reporting(0);
?>
<?php 
$c_id = $_SESSION['c_id'];
$uuid=$_GET['id'];
if($uuid !== ""){
$result=mysqli_query($con,"select * from vendor_registration where id = '$uuid' ORDER BY id DESC");
                                                    $contact=mysqli_fetch_array($result);
                                                    $wwname=$contact['v_name'];
}
if(isset($_POST['submit'])){
	$v_for = $_POST['reg_for'];
	$c_id = $_SESSION['c_id'];
	$pname = $_POST['name'];
	$sname = $_POST['sname'];
	$amount = $_POST['c_amount'];
	$category=$_POST['cat'];
	$ptype=$_POST['ptype'];
	$voucher_no=$_POST['v_no'];
	$cheque_no=$_POST['cheque_no'];
	$bank=$_POST['bank'];
	$account_no=$_POST['acc_no'];
	$ifsc=$_POST['ifsc'];
	$mobile_no=$_POST['mobile_no'];
	$dte=date('Y-m-d');
	$time=date('H:i:s');
	$month=$_POST['month'];
	$invoice=$_POST['invoice'];
	$issu_date=$_POST['issu_date'];
	$clear_date=$_POST['clear_date'];
	$select_date=$_POST['select_date'];

	$type = $_POST['type'];
	$sub = $_POST['sub'];
	$d_name = $_POST['d_name'];
	$od = $_POST['od'];
	$pname=$_POST['vname'];
	
	  $file=$_FILES['profile']['name'];
            $type=$_FILES['profile']['type'];
            $size=$_FILES['profile']['size'];
            $temp=$_FILES['profile']['tmp_name'];
            $RandomNo = mt_rand(1, 99999);
            $nam='img'.$RandomNo.$file;
            $lfile=str_replace(' ','_',$nam);
          
            move_uploaded_file($temp,"cashvou/".$lfile);
            $save="img/".$lfile;

  $code=uniqid();
                $bc = new Barcode39($code);
                // set text size
                $bc->barcode_text_size = 1;

                // display new barcode
             echo   $bc->draw('barcode/'.$code.'.gif');
	
	$insert7=	mysqlI_query($con,"insert into cash_voucher2(`v_for`,`c_name`,`pname`, `amount`, `category`,`dte`,`time`,`ptype`,`voucher_no`,`check_no`,`bank`,`account_no`,`ifsc`,`mobile_no`,`month`,`issu_date`,`clear_date`,`invoice`,`select_date`,`d_name`,`od`,`type`,`p_mode`,`sname`,`bank1`,`cheque_no`,`barcode`,`profile`)values('$v_for','$c_id','$pname','$amount','$category','$dte','$time','$ptype','$voucher_no','$cheque_no','$bank','$account_no','$ifsc','$mobile_no','$month','$issu_date','$clear_date','$invoice','$select_date','$d_name','$od','$sub','$type','$sname','$bank','$cheque_no','$code','$lfile')");
	if($insert7){
	    
	    $mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'MAKE TRANSACTION'.$sname;
$pdfimage = 'pdfimage';
$body = "MAKE TRANSACTION :   ". $sname    . " On  Date is  " .$dte;
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
	    $insert=  mysqlI_query($con,"UPDATE `chaquebook` SET   `status`='1'  WHERE  `qrcode` = '$cheque_no' AND `bank_id`='$bank'  ");
	
		$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
	
			
		 
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
span.select2.select2-container.select2-container--default.select2-container--below {
    width: 100% !important;
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
                                <form class="m-t-40"  method="post" enctype="multipart/form-data">
								
										<div class="row">
									<div class="col-md-6" >
									    
									    
									  <div class="form-group">
											<label class="control-label">Select Date</label>
											<input type="date" class="form-control" name="select_date"  required data-validation-required-message="This field is required">
										</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Name</label>
											<input type="text"  class="form-control " placeholder="Enter Name" <?php if($uuid !== ""){ ?>   value="<?php  echo $wwname; ?>" <?php } ?> name="sname" required data-validation-required-message="This field is required">
											   
										</div>
										</div>
									
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Amount</label>
												<input type="text" id="camount" class="form-control price" placeholder="Enter Amount" name="c_amount" required data-validation-required-message="This field is required">
											    <span class="m_n" style="color:red;">  </span>
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
											    <?php
											    $r=mysqli_query($con,"select * from cash_voucher2 ORDER BY id DESC LIMIT 0,1");
                                                    $rs=mysqli_fetch_array($r);
                                                     $rss=++$rs['voucher_no']; ?>
												<label class="control-label">Voucher Number</label>
												<input type="text" class="form-control" placeholder="Voucher Number" readonly value="<?php echo $rss;  ?>" name="v_no">											
											
											</div>
										</div>
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Type</label>
												<select id="" name="type"  class="form-control" data-rel="chosen" required >
												<option value="">Select  Type</option>
												<option value="receipt">Receipt</option>
												<option value="payment">Payment</option>
												
												</select>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Payment Type</label>
												<select id="ptype" name="ptype"  class="form-control" data-rel="chosen"  required >
												<option value="">Select Payment Type</option>
												<option value="cash">Cash</option>
												<option value="cheque">bank</option>
												<option value="other">Other</option>
											
												
												</select>
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
												<label class="control-label">Select Sub Category</label>
												<select name="cat"  class="select2 form-control custom-select" data-rel="chosen" id="cat" required data-validation-required-message="This field is required" >
												<option value="">Select Category</option>
												
													<?php
											$resultab=mysqli_query($con,"select * from sub_ct ");
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
										
									
										
											<div class="col-md-6" style="display:none;" id="cheque2">
											<div class="form-group">
												<label class="control-label">Select Bank</label>
												<select name="bank" id="country" class="form-control" data-rel="chosen" >
												<option value="">Select Bank</option>
												
													<?php
											$resultab=mysqli_query($con,"select * from bank where `c_name` = '$c_id' ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $bid=$contactab['id']; ?>"><?php echo $contactab['bank_name']; ?></option>
											
											<?php } ?>
											
												</select>
											</div>
										</div>
										
										<div class="col-md-6" style="display:none;" id="cheque1">
											
												<h5 class="m-t-30" style="margin-top:5px;">Select Cheque</h5>
												<select name="cheque_no" id="state" class="select2 form-control custom-select" data-rel="chosen" style="width: 100%; height:36px;"  >
											 <option value="">Select Bank first</option>
												
												
												</select>
											
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
							    
										<div class="col-md-6" >
									  <div class="form-group">
										<label class="control-label">Description</label>
										  <textarea rows="4" cols="50" class="form-control" placeholder="Description" name="d_name" required data-validation-required-message="This field is required" ></textarea>
										    </div>
									        	</div>
					
									
										
											</div>
									
										
								
									  
									  	
									
									
											
										<div class="row">
										    	<div class="col-md-6" style="display:none;" id="profile">
											<div class="form-group">
												<label class="control-label">Attach File</label>
											   <input class="form-control" name="profile" type="file" id="imgInp">
											</div>
										</div>
										  
										<div class="col-md-6" style="display:none;" id="ot1">
											<div class="form-group">
												<label class="control-label">Other Detail</label>
												<input type="text" class="form-control" placeholder="Enter Other Detail" name="od">
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
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
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
        
        	var data1 = { 'main_id': perID};
		
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
    $('#per').on('change', function() {
     
	  if ( this.value == 'Rental Purchase')
      {
		  
        $("#ren").show();
		 
        
      }
      else
      {
        $("#ren").hide();
       
	
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
		  
       
		
		 $("#tem").show();
       
        
      }
      else
      {
       
       
	 $("#tem").hide();
      }
	  
	  
    });
});

$(document).ready(function(){
    $('#ptype').on('change', function() {
     
	  if ( this.value == 'cash')
      {
		  
        $("#cash").show();
           $("#rv").hide();
        
		 
        
      }
      else
      {
        $("#cash").hide();
           $("#rv").show();
       
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
     
	  if ( this.value == 'other')
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

$(document).ready(function(){
    $('#ptype').on('change', function() {
     
	  if ( this.value == 'cash')
      {
		  
        $("#cs").show();
		 
        
      }
      else
      {
        $("#cs").hide();
       
	
      }
	  
	  
    });
});


$(document).ready(function(){
    $('#per').on('change', function() {
     
	  if ( this.value != '')
      {
		  
        $("#businessas").show();
		 
        
      }
      else
      {
        $("#businessas").hide();
       
	
      }
	  
	  
    });
});

$(document).ready(function () {
    $(".m_n").hide();
  //called when key is pressed in textbox
  $(".price").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $(".m_n").html("Enter only Amount").show();
               return false;
    }
    else{ $('.m_n').hide(); }
   });
});



</script>

	<?php include('footer.php'); ?>