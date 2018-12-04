<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
error_reporting(0);
?>
<?php 
$r=mysqli_query($con,"select * from invoice ORDER BY id DESC LIMIT 0,1");
$rs=mysqli_fetch_array($r);
if(isset($_POST['submit'])){
    
   $invoice_no= $_POST['invoice_no'];
    $vname=$_POST['vname'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
      $address = $_POST['address'];
 $tax = $_POST['tax']; 
  $total = $_POST['total'];
  $final = $_POST['final'];
  $sgst = $_POST['sgst'];
  $cgst = $_POST['cgst'];
  $gstamt = $_POST['gstamt'];
	
	 $sgstam = $_POST['sgstam'];
  
  
  $cgstam = $_POST['cgstam'];
  
  $rfinal = $_POST['rfinal'];
	
	$date = date('Y-m-d');
	
	
		$sluga=$_POST['name'];
		
	for($ia=0;$ia < count($sluga); $ia++)
	{
		$vala[$ia]=$_POST['name'][$ia].",".$_POST['quantity'][$ia].",".$_POST['rate'][$ia].",".$_POST['amount'][$ia];
	}
	
	$img= serialize($vala);

		$insert=mysqli_query($con,"insert into invoice (`pname`,`vname`,`email`,`phone_number`,`address`,`date`,`tax`,`total`,`final`,`invoice_no`,`sgst`,`cgst`,`gstamt`,`sgstam`,`cgstam`,`rfinal`)values('$img','$vname','$email','$phone_number','$address','$date','$tax','$total','$final','$invoice_no','$sgst','$cgst','$gstamt','$sgstam','$cgstam','$rfinal')");
		if($insert)
	 {
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'NEW PRODUCTS'.$invoice_no;
$pdfimage = 'pdfimage';
$body = "NEW PRODUCTS :   ". $invoice_no    . " On  Date is  " .$idate;
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
 <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Product</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
			
			   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Products</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40"  method="post" enctype="multipart/form-data"  >
									<div class="row">
										
										
										
									
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Select Vendor</label>
												<select   name="vname"  class="select2 form-control custom-select" style="width: 100%; height:36px;" id="venID">
											<option value="">Select Vendor</option>
											<?php
											 $c_id = $_SESSION['c_id'];
											$resultab=mysqli_query($con,"select * from vendor_registration WHERE vendor_for='vendor'  and c_name='$c_id' ORDER BY id ASC");
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
												<label class="control-label">Email</label>
												<input type="text" name="email" id="ven_id" class="form-control" placeholder=""  readonly >
											
											</div>
										</div>
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Mobile Number</label>
													<input type="text" name="phone_number" id="phn_id" class="form-control" placeholder=""  readonly >
											</div>
										</div>
										
										
										<div class="col-md-6">
										  <div class="form-group">
                                        <label  class="control-label">Address</label>
                                        <textarea class="form-control" rows="3" name="address" id="address" placeholder="" readonly ></textarea>
                                    </div>
                                    	</div>
                                    	
                                    	
										
                                    				<div class="field_wrappera">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Product Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="Product Name" name="name[]" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Qty</label>
												<input type="text" id="qty" class="form-control" onkeyup="add()" placeholder="Enter Quantity" name="quantity[]" >
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">Rate</label>
												<input type="text" id="rate" class="form-control" onkeyup="add()" placeholder="Enter Rate" name="rate[]" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Amount</label>
												<input type="text" id="amount" class="form-control total" onkeyup="zz()" placeholder="Amount" readonly name="amount[]"  >
											</div>
										</div>
										<a href="javascript:void(0);" class="add_buttona" title="Add field"><img src="add-icon.png" style="display: inline-block;"/></a>
                                    </div>
                                    </div>
                                    
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Grand Total</label>
													<input type="text" name="total" id="total" onkeyup="now()" class="form-control" placeholder="" readonly  >
											</div>
										</div>
										
										
										
										
										
											<div class="col-md-6"  >
											<div class="form-group">
												<label class="control-label">SGST Tax</label>
													<input type="text" name="sgst" onkeyup="now()" id="tax1" class="form-control" >
											</div>
										</div>
										
										
											<div class="col-md-6" style="display:none;">
											<div class="form-group">
												<label class="control-label">SGST amt</label>
													<input type="text" name="sgstam" onkeyup="now()" id="f" class="form-control" >
											</div>
										</div>
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">CGST Tax</label>
													<input type="text" name="cgst" onkeyup="now()" id="tax2" class="form-control" >
											</div>
										</div>
										
											<div class="col-md-6" style="display:none;">
											<div class="form-group">
												<label class="control-label">CGST amt</label>
													<input type="text" name="cgstam" onkeyup="now()" id="f1" class="form-control" >
											</div>
										</div>
										
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">GST Amount</label>
													<input type="text" name="gstamt" onkeyup="now()"  id="final1" class="form-control" readonly >
											</div>
										</div>
									
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Final Amount</label>
													<input type="text" name="final" id="final"  class="form-control" placeholder="" readonly  >
											</div>
										</div>
										
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Final Amount</label>
													<input type="text" name="rfinal" id="rfinal"  class="form-control" placeholder="" readonly  >
											</div>
										</div>
     
                                    	<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Invoice Number</label>
													<input type="text" name="invoice_no" id="invoice_no" class="form-control" value="<?php echo ++$rs['invoice_no']; ?>" placeholder="" readonly  >
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
			
			 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Product List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Invoice Number</th>
												<th>Vendor Name</th>
												<th>Vendor Phone Number</th>
												<th>Amount</th>
												<th>Action</th>
											
											</tr>
										</thead>
										<tbody>
											<?php
												
													
														
														$result=mysqli_query($con,"select * from invoice  ORDER BY id DESC");
												
													
												   
													while($contact=mysqli_fetch_array($result))
													{
													    
													     $nm1 = $contact['vname'];
													  
													  $results=mysqli_query($con,"select * from vendor_registration where id= '$nm1' ");
												
													    $contacts=mysqli_fetch_array($results);
													    
													       $nm = $contacts['v_name'];
													       
													        $st = $contact['invoice_status'];
													  
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												
												
											
												<td class="center"><?php echo $contact['invoice_no'];?></td>
												<td class="center"><?php echo $nm;?></td>
												<td class="center"><?php echo $contact['phone_number'];?></td>
												<td class="center"><?php echo $contact['final'];?></td>
												<td class="center">
													<a class="btn btn-info" href="invoice.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Invoice 
													</a>
													<?php   
													if($st == '0')
													
													{
													?>
													
													 <a href="com_invoice_status.php?id=<?php echo $contact['id'];?>" class="btn btn-success">Clear Bill</a>
													<?php } 
													
													else{ 
													
													
													} ?>
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
                
           <script src="jquery.min.js" type="text/javascript"></script>
            <script language="Javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxFielda = 25; //Input fields increment limitation
	var addButtona = $('.add_buttona'); //Add button selector
	var wrappera = $('.field_wrappera'); //Input field wrapper
		var x = 1;
	//New input field html 
 //Initial field counter is 1
	$(addButtona).click(function(){ //Once add button is clicked
		if(x < maxFielda){ //Check maximum number of input fields
			x++; //Increment field counter
			
			$(wrappera).append('<div class="row"><div class="col-md-3"><div class="form-group"><label class="control-label">Product Name</label><input type="text" id="firstName" class="form-control" placeholder="Product Name" name="name[]" ></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">Qty</label><input type="text" id="qty'+x+'" onkeyup="add'+x+'()" class="form-control" placeholder="Enter quantity" name="quantity[]"></div></div><div class="col-md-2"><div class="form-group"><label class="control-label">Rate</label><input type="text" id="rate'+x+'" onkeyup="add'+x+'()" class="form-control" placeholder="Enter Rate" name="rate[]"></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">Amount</label><input type="text" id="amount'+x+'" class="form-control total" placeholder="Enter Amount" onchange="zz()" name="amount[]" readonly ></div></div></div>'); // Add field html
		}
	});
	$(wrappera).on('click', '.remove_buttona', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>

			<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
			
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    
   
    
$('#venID').change(function(){
  
    var venID=$(this).val();
    $.post('sa.php',{venID:venID},function(data){
       
    $('#ven_id').val(data);
 });
});

$('#venID').change(function(){
  
    var phnID=$(this).val();
    $.post('sa.php',{phnID:phnID},function(data){
       
    $('#phn_id').val(data);
 });
});

$('#venID').change(function(){
  
    var addID=$(this).val();
    $.post('sa.php',{addID:addID},function(data){
       
    $('#address').val(data);
 });
});
});

function now() {

        
         var x =  parseFloat(document.getElementById("total").value);
  var r =  parseFloat(document.getElementById("tax1").value);
  
   var r2 =  parseFloat(document.getElementById("tax2").value);
  
 
  
   var c1 =  parseFloat((x*r)/100);
   
    var c2 =  parseFloat((x*r2)/100);
    
  var c3  = c1 + c2;
    
  var x1 = x + c1 + c2;
  
  var x2 = x1 - x ;
  
  document.getElementById("final").value = x1;
  
  document.getElementById("rfinal").value = x1;
  
   document.getElementById("final1").value = x2;
   
    document.getElementById("f").value = c1;
   
   document.getElementById("f1").value = c2;
   
}


function zz() {

    
   
        
         var x1 =  document.getElementById("amount").value;
         
          document.getElementById("total").value = x1
          
    
 
  //var y1 =  document.getElementById("amount2").value);
  
  
 // console.log(y1);
  
/*  var y2 =  parseFloat(document.getElementById("amount3").value)
  var y3 =  parseFloat(document.getElementById("amount4").value)
  var y4 =  parseFloat(document.getElementById("amount5").value)
  var y5 =  parseFloat(document.getElementById("amount6").value)
  var y6 =  parseFloat(document.getElementById("amount7").value)
  var y7 =  parseFloat(document.getElementById("amount8").value)
  var y8=  parseFloat(document.getElementById("amount9").value)
  var y9=  parseFloat(document.getElementById("amount10").value)*/


}
function zz() {

    
   
        
         var x1 =  document.getElementById("amount").value;
         
         
          document.getElementById("total").value = x1;
          
    
 
  //var y1 =  document.getElementById("amount2").value);
  
  
 // console.log(y1);
  
/*  var y2 =  parseFloat(document.getElementById("amount3").value)
  var y3 =  parseFloat(document.getElementById("amount4").value)
  var y4 =  parseFloat(document.getElementById("amount5").value)
  var y5 =  parseFloat(document.getElementById("amount6").value)
  var y6 =  parseFloat(document.getElementById("amount7").value)
  var y7 =  parseFloat(document.getElementById("amount8").value)
  var y8=  parseFloat(document.getElementById("amount9").value)
  var y9=  parseFloat(document.getElementById("amount10").value)*/


}

function zz1() {

    
   
        
         var x1 = parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         
          document.getElementById("total").value = x1 + x2;
          
    
 
  //var y1 =  document.getElementById("amount2").value);
  
  
 // console.log(y1);
  
/*  var y2 =  parseFloat(document.getElementById("amount3").value)
  var y3 =  parseFloat(document.getElementById("amount4").value)
  var y4 =  parseFloat(document.getElementById("amount5").value)
  var y5 =  parseFloat(document.getElementById("amount6").value)
  var y6 =  parseFloat(document.getElementById("amount7").value)
  var y7 =  parseFloat(document.getElementById("amount8").value)
  var y8=  parseFloat(document.getElementById("amount9").value)
  var y9=  parseFloat(document.getElementById("amount10").value)*/


}

function zz2() {

    
   
        
         var x1 = parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 = parseFloat( document.getElementById("amount3").value);
          document.getElementById("total").value = x1 + x2 + x3;
          
    
 
 

}

function zz3() {

    
   
        
         var x1 = parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 = parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4;
          
    
 
 

}
function zz4() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 = parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 = parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5;
         
    
 
 

}
function zz5() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 = parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 = parseFloat(document.getElementById("amount5").value);
            var x6 = parseFloat(document.getElementById("amount6").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6;
          
    
 
 

}
function zz6() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 = parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7;
          
    
 
 

}
function zz7() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8;
          
    
 
 

}

function zz8() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 = parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9;
         
    
 
 

}

function zz9() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10;
          
    
 
 

}
function zz10() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11;
          
    
 
 

}

function zz11() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 +x12;
          
    
 
 

}
function zz12() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13;
          
    
 
 

}

function zz13() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14;
          
    
 
 

}
function zz14() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15;
          
    
 
 

}

function zz15() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 ;
          
    
 
 

}
function zz16() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17;
          
    
 
 

}
function zz17() {

    
   
        
         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 ;
          
    
 
 

}
function zz18() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19;
          

}
function zz19() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20;
          

}

function zz20() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
                       var x21 =  parseFloat(document.getElementById("amount21").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20 + x21;
          

}
function zz21() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
                       var x21 =  parseFloat(document.getElementById("amount21").value);
                        var x22 =  parseFloat(document.getElementById("amount22").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20 + x21 + x22 ;
          

}
function zz22() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
                       var x21 =  parseFloat(document.getElementById("amount21").value);
                        var x22 =  parseFloat(document.getElementById("amount22").value);
                         var x23 =  parseFloat(document.getElementById("amount23").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20 + x21 + x22 + x23;
          

}
function zz23() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
                       var x21 =  parseFloat(document.getElementById("amount21").value);
                        var x22 =  parseFloat(document.getElementById("amount22").value);
                         var x23 =  parseFloat(document.getElementById("amount23").value);
                         var x24 =  parseFloat(document.getElementById("amount24").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20 + x21 + x22 + x23 + x24;
          

}

function zz24() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
                       var x21 =  parseFloat(document.getElementById("amount21").value);
                        var x22 =  parseFloat(document.getElementById("amount22").value);
                         var x23 =  parseFloat(document.getElementById("amount23").value);
                         var x24 =  parseFloat(document.getElementById("amount24").value);
                         var x25 =  parseFloat(document.getElementById("amount25").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20 + x21 + x22 + x23 + x24 + x25;
          

}
function zz25() {

         var x1 =  parseFloat(document.getElementById("amount").value);
          var x2 =  parseFloat(document.getElementById("amount2").value);
         var x3 =  parseFloat(document.getElementById("amount3").value);
          var x4 =  parseFloat(document.getElementById("amount4").value);
           var x5 =  parseFloat(document.getElementById("amount5").value);
            var x6 =  parseFloat(document.getElementById("amount6").value);
             var x7 =  parseFloat(document.getElementById("amount7").value);
              var x8 =  parseFloat(document.getElementById("amount8").value);
              var x9 =  parseFloat(document.getElementById("amount9").value);
               var x10 =  parseFloat(document.getElementById("amount10").value);
               var x11 =  parseFloat(document.getElementById("amount11").value);
                var x12 =  parseFloat(document.getElementById("amount12").value);
                 var x13 =  parseFloat(document.getElementById("amount13").value);
                  var x14 =  parseFloat(document.getElementById("amount14").value);
                   var x15 =  parseFloat(document.getElementById("amount15").value);
                   var x16 =  parseFloat(document.getElementById("amount16").value);
                   var x17 =  parseFloat(document.getElementById("amount17").value);
                    var x18 =  parseFloat(document.getElementById("amount18").value);
                     var x19 =  parseFloat(document.getElementById("amount19").value);
                      var x20 =  parseFloat(document.getElementById("amount20").value);
                       var x21 =  parseFloat(document.getElementById("amount21").value);
                        var x22 =  parseFloat(document.getElementById("amount22").value);
                         var x23 =  parseFloat(document.getElementById("amount23").value);
                         var x24 =  parseFloat(document.getElementById("amount24").value);
                         var x25 =  parseFloat(document.getElementById("amount25").value);
                          var x26 =  parseFloat(document.getElementById("amount26").value);
          document.getElementById("total").value = x1 + x2 + x3 + x4 + x5 + x6 + x7 + x8 + x9 + x10 + x11 + x12 + x13 + x14 + x15 + x16 + x17 + x18 + x19 + x20 + x21 + x22 + x23 + x24 + x25 + x26;
          

}













function add() {
  var x =parseFloat(document.getElementById("qty").value);
  var y = parseFloat(document.getElementById("rate").value);
  document.getElementById("amount").value = x * y;
  
   zz();
}

function add2() {
    
    
  var x = parseFloat(document.getElementById("qty2").value);
  var y = parseFloat(document.getElementById("rate2").value);
  document.getElementById("amount2").value = x * y;
zz1();
}

function add3() {
    
    
  var x = parseFloat(document.getElementById("qty3").value);
  var y = parseFloat(document.getElementById("rate3").value);
  document.getElementById("amount3").value = x * y;
zz2();
}

function add4() {
    
    
  var x = parseFloat(document.getElementById("qty4").value);
  var y = parseFloat(document.getElementById("rate4").value);
  document.getElementById("amount4").value = x * y;
zz3();
}


function add5() {
    
    
  var x = parseFloat(document.getElementById("qty5").value);
  var y = parseFloat(document.getElementById("rate5").value);
  document.getElementById("amount5").value = x * y;
zz4();
}


function add6() {
    
    
  var x = parseFloat(document.getElementById("qty6").value);
  var y = parseFloat(document.getElementById("rate6").value);
  document.getElementById("amount6").value = x * y;
zz5();
}


function add7() {
    
    
  var x = parseFloat(document.getElementById("qty7").value);
  var y = parseFloat(document.getElementById("rate7").value);
  document.getElementById("amount7").value = x * y;
zz6();
}


function add8() {
    
    
  var x = parseFloat(document.getElementById("qty8").value);
  var y = parseFloat(document.getElementById("rate8").value);
  document.getElementById("amount8").value = x * y;
zz7();
}


function add9() {
    
    
  var x = parseFloat(document.getElementById("qty9").value);
  var y = parseFloat(document.getElementById("rate9").value);
  document.getElementById("amount9").value = x * y;
zz8();
}



function add10() {
    
    
  var x = parseFloat(document.getElementById("qty10").value);
  var y = parseFloat(document.getElementById("rate10").value);
  document.getElementById("amount10").value = x * y;
zz9();
}
function add11() {
    
    
  var x = parseFloat(document.getElementById("qty11").value);
  var y = parseFloat(document.getElementById("rate11").value);
  document.getElementById("amount11").value = x * y;
zz10();
}
function add12() {
    
    
  var x = parseFloat(document.getElementById("qty12").value);
  var y = parseFloat(document.getElementById("rate12").value);
  document.getElementById("amount12").value = x * y;
zz11();
}

function add13() {
    
    
  var x = parseFloat(document.getElementById("qty13").value);
  var y = parseFloat(document.getElementById("rate13").value);
  document.getElementById("amount13").value = x * y;
zz12();
}

function add14() {
    
    
  var x = parseFloat(document.getElementById("qty14").value);
  var y = parseFloat(document.getElementById("rate14").value);
  document.getElementById("amount14").value = x * y;
zz13();
}

function add15() {
    
    
  var x = parseFloat(document.getElementById("qty15").value);
  var y = parseFloat(document.getElementById("rate15").value);
  document.getElementById("amount15").value = x * y;
zz14();
}
function add16() {
    
    
  var x = parseFloat(document.getElementById("qty16").value);
  var y = parseFloat(document.getElementById("rate16").value);
  document.getElementById("amount16").value = x * y;
zz15();
}

function add17() {
    
    
  var x = parseFloat(document.getElementById("qty17").value);
  var y = parseFloat(document.getElementById("rate17").value);
  document.getElementById("amount17").value = x * y;
zz16();
}

function add18() {
    
    
  var x = parseFloat(document.getElementById("qty18").value);
  var y = parseFloat(document.getElementById("rate18").value);
  document.getElementById("amount18").value = x * y;
zz17();
}

function add19() {
    
    
  var x = parseFloat(document.getElementById("qty19").value);
  var y = parseFloat(document.getElementById("rate19").value);
  document.getElementById("amount19").value = x * y;
zz18();
}
function add20() {
    
    
  var x = parseFloat(document.getElementById("qty20").value);
  var y = parseFloat(document.getElementById("rate20").value);
  document.getElementById("amount20").value = x * y;
zz19();
}

function add21() {
    
    
  var x = parseFloat(document.getElementById("qty21").value);
  var y = parseFloat(document.getElementById("rate21").value);
  document.getElementById("amount21").value = x * y;
zz20();
}
function add22() {
    
    
  var x = parseFloat(document.getElementById("qty22").value);
  var y = parseFloat(document.getElementById("rate22").value);
  document.getElementById("amount22").value = x * y;
zz21();
}
function add23() {
    
    
  var x = parseFloat(document.getElementById("qty23").value);
  var y = parseFloat(document.getElementById("rate23").value);
  document.getElementById("amount23").value = x * y;
zz22();
}
function add24() {
    
    
  var x = parseFloat(document.getElementById("qty24").value);
  var y = parseFloat(document.getElementById("rate24").value);
  document.getElementById("amount24").value = x * y;
zz23();
}
function add25() {
    
    
  var x = parseFloat(document.getElementById("qty25").value);
  var y = parseFloat(document.getElementById("rate25").value);
  document.getElementById("amount25").value = x * y;
zz24();
}


</script>

	<?php include('footer.php'); ?>