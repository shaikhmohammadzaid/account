<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
error_reporting(0);
?>

<?php 
if(isset($_POST['submit'])){
    $c_name = $_POST['id'];
	$vendor_for = $_POST['vendor_for'];
	$v_name = $_POST['v_name'];
	$state = $_POST['state'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$mobile_number=$_POST['mobile_number'];
	$email=$_POST['email'];
	$contact_person=$_POST['contact_person'];


$idate=date('Y-m-d');

	$password = md5($_POST['password']);
		$username=$_POST['username'];
		$role=$_POST['role'];
			$emprole=$_POST['emprole'];
	
	
	
	
	
		//echo"<script>alert('img')</script>";
	$sluga=$_POST['bank_nm'];
	for($ia=0;$ia < count($sluga);$ia++)
	{
		$vala[$ia]=$_POST['bank_nm'][$ia].",".$_POST['acc_number'][$ia].",".$_POST['ifsc'][$ia].",".$_POST['misc'][$ia];
	}
	$img= serialize($vala);
	
	
	if(empty($v_name)){
		$msg="<p class='alert alert-success alert-rounded'>Fields Empty</p>";
	}else {
	$insert=	mysqlI_query($con,"insert into vendor_registration(`c_name`,`vendor_for`,`v_name`, `state`, `city`, `address`, `mobile_number`, `email`, `contact_person`, `bank_name`,`gst_number`)values('$c_name','$vendor_for','$v_name','$state','$city','$address','$mobile_number','$email','$contact_person','$img','$gst')");
	$lastid=mysqli_insert_id($con);

	

	$insert=	mysqlI_query($con,"insert into admin(`c_name`,`username`,`password`,`user_role`,`date`,`uid`,`emprole`,`email`)values('$c_name','$username','$password','$role','$idate','$lastid','$emprole','$email')");
	if($insert){
	
		$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
	}
	}
}
?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add Employee/Vendor</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Employee/Vendor</li>
                        <li class="breadcrumb-item active">Add Employee/Vendor</li>
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
                                <h4 class="card-title">Employee/Vendor Registration</h4>
								<?php echo $msg; ?>
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									<div class="row">
									    
									    <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select Company</label>
													<select name="id"  class="form-control" data-rel="chosen">
												<option value="">Select Company</option>
											<?php
											$resultab=mysqli_query($con,"select * from company");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['c_id']; ?>"><?php echo $contactab['c_name']; ?></option>
											<?php } ?>
												
												</select>

												
											</div>
										</div>
									    
									    
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select Type</label>
												<select id="type" name="vendor_for"  class="form-control" data-rel="chosen">
												<option  value="">Select Type</option>
												<option  value="vendor">Vendor</option>
												<option  value="employee">Employee</option>
												</select>
											</div>
										</div>
									
								
									 
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="Name" name="v_name" required data-validation-required-message="This field is required">
											</div>
										</div>
											</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select State</label>
												
												
												 <select id="listBox" name="state" class="form-control" onchange='selct_district(this.value)'></select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select City</label>
												
												
												<select id='secondlist' class="form-control" name="city"></select>
											</div>
										</div>
										
											<div class="col-md-4"  id="gst">
											<div class="form-group">
												<label class="control-label">GST Number</label>
												<input type="text" class="form-control" placeholder="Enter GST" name="gst" >
											</div>
										</div>
										
											<div class="col-md-4" id="role" style="display:none;" >
											<div class="form-group">
												<label class="control-label">Employee category</label>
											<select id="prole" name="role"  class="form-control" data-rel="chosen">
												<option value="">Select Category</option>
											<?php
											$resultab=mysqli_query($con,"select * from emp_main");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['main_nm']; ?></option>
											<?php } ?>
												
												</select>
											</div>
										</div>
										
											<div class="col-md-4" id="emprole" style="display:none;" >
											<div class="form-group">
												<label class="control-label">Employee Designation</label>
												<select name="emprole" id="emproles" class="form-control" data-rel="chosen" >
											 <option value="">Select Category first</option>
												
												
												</select>
											</div>
										</div>
										
											<div class="col-md-4" style="display:none;"  id="user">
											<div class="form-group">
												<label class="control-label">User Name</label>
												<input type="text" class="form-control" placeholder="Enter UserName" name="username" >
											</div>
										</div>
										
										
											<div class="col-md-4" style="display:none;"  id="password">
											<div class="form-group">
												<label class="control-label">Password</label>
												<input type="password" class="form-control" placeholder="Enter Password" name="password" >
											</div>
										</div>
										
                                    </div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Mobile No</label>
												<input type="text" id="mobile" class="form-control" placeholder="Mobile No"  pattern="^\d{10}$" name="mobile_number"  required>
											</div>
											<span id="message"></span>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Email id</label>
												<input type="email" id="firstName" class="form-control" placeholder="Email id" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Contact Person</label>
												<input type="text" id="firstName" class="form-control" placeholder="Contact Person" name="contact_person">
											</div>
										</div>
                                    </div>
									<div class="field_wrappera">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Bank Name</label>
												<input type="text" id="firstName" class="form-control" placeholder="Bank Name" name="bank_nm[]" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Account Number</label>
												<input type="text" id="firstName" class="form-control" placeholder="Account Number" name="acc_number[]" >
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">IFSC Code</label>
												<input type="text" id="firstName" class="form-control" placeholder="IFSC Code" name="ifsc[]" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">MICR Code</label>
												<input type="text" id="firstName" class="form-control" placeholder="MICR Code" name="misc[]">
											</div>
										</div>
										<a href="javascript:void(0);" class="add_buttona" title="Add field"><img src="add-icon.png" style="display: inline-block;"/></a>
                                    </div>
                                    </div>
									
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" onclick="check()" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
        <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;" href="http://www.hscripts.com"></a>
      </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<script src="jquery.min.js" type="text/javascript"></script>
 <script language="Javascript" src="jquery.js"></script>
    <script type="text/JavaScript" src='state.js'></script>
    	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
			<script src="jquery.min.js" type="text/javascript"></script>
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function check()
{

    var pass1 = document.getElementById('mobile');


    var message = document.getElementById('message');

   var goodColor = "red";
    var badColor = "red";

    if(mobile.value.length!=10){

        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 10 digits, match requested format!"
    }}
</script>
<script>
$(document).ready(function(){
    $('#type').on('change', function() {
     
	  if ( this.value == 'vendor')
      {
		  
       
		
		 $("#gst").show();
       
        
      }
      else
      {
       
       
	 $("#gst").hide();
	 
      }
	  
	  
    });
    
      $('#type').on('change', function() {
     
	  if ( this.value == 'employee')
      {
		  
       
		
		 $("#role").show();
          $("#user").show();
           $("#password").show();          
      }
      else
      {
       
       
	 $("#role").hide();
	  $("#user").hide();
	   $("#password").hide();
	 
      }
	  
	  
    });
    
     $('#prole').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#emprole").show();
                 
      }
      else
      {
       
       
	 $("#emprole").hide();
	
	 
      }
	  
	  
    });
});

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#prole').on('change',function(){
        var proleID = $(this).val();
        if(proleID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'prole_id='+proleID,
                success:function(html){
                    $('#emproles').html(html);
                   
                }
            }); 
        }
        else{
            $('#emproles').html('<option value="">Select Category first</option>');
            
        }
    });
});
</script>
<script type="text/javascript">

$(document).ready(function(){
	var maxFielda = 10; //Input fields increment limitation
	var addButtona = $('.add_buttona'); //Add button selector
	var wrappera = $('.field_wrappera'); //Input field wrapper
	var fieldHTMLa = '<div class="row"><div class="col-md-3"><div class="form-group"><label class="control-label">Bank Name</label><input type="text" id="firstName" class="form-control" placeholder="Bank Name" name="bank_nm[]" required data-validation-required-message="This field is required"></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">Account Number</label><input type="text" id="firstName" class="form-control" placeholder="Account Number" name="acc_number[]" required data-validation-required-message="This field is required"></div></div><div class="col-md-2"><div class="form-group"><label class="control-label">IFSC Code</label><input type="text" id="firstName" class="form-control" placeholder="IFSC Code" name="ifsc[]" required data-validation-required-message="This field is required"></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">MICR Code</label><input type="text" id="firstName" class="form-control" placeholder="MICR Code" name="misc[]" required data-validation-required-message="This field is required"></div></div><a href="javascript:void(0);" class="remove_buttona" title="Remove field" style="display: inline-block;"><img src="remove-icon.png" /></a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButtona).click(function(){ //Once add button is clicked
		if(x < maxFielda){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrappera).append(fieldHTMLa); // Add field html
		}
	});
	$(wrappera).on('click', '.remove_buttona', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>
         <?php include('footer.php'); ?>
