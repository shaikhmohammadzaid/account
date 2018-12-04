<?php include('header.php'); ?>
<?php include('sidebar.php'); 

?>
<?php 
error_reporting(0);
?>

<?php


	if(isset($_POST['submit'])){
		
	  $c_id =  $_SESSION['id'];
	  $month= $_POST['month'];
	  $traveltype = $_POST['traveltype'];
      $fromplace = $_POST['fromplace'];
	  $toplace = $_POST['toplace'];
	  $date = date('Y-m-d');
	  $travelamount =   $_POST['travelamount'];
	  $hotel =   $_POST['hotel'];
	  $hotelnam =   $_POST['hotelnam'];
	  $sday =   $_POST['sday'];
	  $hotelamt =   $_POST['hotelamt'];	
	  $otherexp =   $_POST['otherexp'];
	  $othedetail =   $_POST['othedetail'];
	  $otheramt =   $_POST['otheramt'];
	  $ftotal =   $_POST['ftotal'];	 
		  	  	  	  	 
   $code=uniqid();
   
  $errors= array();
   foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
   {
	$file_name = $key.$_FILES['files']['name'][$key];
	$file_size =$_FILES['files']['size'][$key];
	$file_tmp =$_FILES['files']['tmp_name'][$key];
	$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152)
        {
          $errors[]='File size must be less than 2 MB';
        }		
        	$insert=mysqli_query($con,"insert into other_expn(`c_id`,`month`,`traveltype`,`fromplace`,`toplace`,`date`,`travelamount`,`hotel`,`hotelnam`,`sday`,`hotelamt`,`otherexp`,`othedetail`,`otheramt`,`ftotal`,`statement`,`invoice`)values('$c_id','$month','$traveltype','$fromplace','$toplace','$date','$travelamount','$hotel','$hotelnam','$sday','$hotelamt','$otherexp','$othedetail','$otheramt','$ftotal','$file_name','$code')");

        $desired_dir="user_data";
        if(empty($errors)==true)
        {
          if(is_dir($desired_dir)==false)
          {
            mkdir("$desired_dir", 0700);		// Create directory if it does not exist
          }
          if(is_dir("$desired_dir/".$file_name)==false)
          {
              move_uploaded_file($file_tmp,"user_data/".$file_name);
          }
          else
          {
         //rename the file if another one exist
              $new_dir="user_data/".$file_name.time();
               rename($file_tmp,$new_dir) ;				
           }
          			
        }
        else
        {
           print_r($errors);
        }
    }
		  	  	 // echo"<script>alert('$file_name')</script>";	  	 
		  	  	  	  	  	  	  	   
		
		
		
		if($insert){
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		}
	}
?>
        <div class="page-wrapper">
         
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Other Expenses</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Other Expenses</li>
                        <li class="breadcrumb-item active">Other Expenses</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
      
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Other Expenses</h4>
                            </div>
                            	<?php echo $msg; ?>
                            <div class="card-body">
                               <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title">General Information</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                           
                                           <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select Type</label>
												<select   name="month" id="type" class="form-control" data-rel="chosen" required data-validation-required-message="This field is required" >
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
												</select>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select Type</label>
												<select  name="traveltype"  class="form-control" data-rel="chosen" required data-validation-required-message="This field is required">
											     <option value="">Travel Types</option>
											<option value="bus">Bus</option>
											<option value="train">Train</option>
											<option value="cab">booking Cab</option>
											<option value="other">other</option>
												</select>
											</div>
										</div>
	
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">From Place</label>
                                                    <input type="text" id="mobile" class="form-control" placeholder="From Place" name="fromplace"    required>
                                                    </div>
                                                    	<span id="message"></span>
                                            </div>
											 <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">To place</label>
                                                    <input type="text" id="lastName" class="form-control" placeholder="to Place" name="toplace">
                                                     </div>
                                            </div>
                                            
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                    <label> Amount</label>
                                                    <input type="text" id="total2"  onkeyup="now()"  class="form-control"  placeholder="Total Travel  Amount" name="travelamount" >
                                                </div>
                                            </div>
           
                                        </div>
                                       
                                        <h3 class="box-title m-t-40">Other Expenses</h3>
                                        <hr>
                                        <div class="row">
                                              <div class="col-md-6">
                                                  
                                                  <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_21" onclick="weehlr()" class="filled-in chk-col-green" value="1" name="hotel"  />
                                    <label for="md_checkbox_21">Hotel Expenses </label>
                                    </div>
                                                
                                            </div>
                                              <div class="col-md-6" id="2count" style="display:none">
                                                <div class="form-group">
                                                    <label>Hotel Name</label>
                                                    <input type="text" id="count2"  class="form-control"  placeholder="Hotel Name" name="hotelnam">
                                                </div>
                                            </div>
                                           <div class="col-md-6" id="2charge" style="display:none">
                                                <div class="form-group">
                                                    <label>Stay In Day</label>
                                                    <input type="text"  id="charge2" class="form-control"  placeholder="Stay In Day" name="sday">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6" id="2total" style="display:none">
                                                <div class="form-group">
                                                    <label> Amount</label>
                                                    <input type="text" id="a"  onkeyup="now()" class="form-control"  placeholder="Total Amount" name="hotelamt" >
                                                </div>
                                            </div>
     
                                           <div class="col-md-6">
                                                  
                                    <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_22" onclick="weehlr3()" class="filled-in chk-col-green" value="1" name="otherexp"/>
                                    <label for="md_checkbox_22">Other Expenses</label>
                                    </div>
                                               
                                            </div>
                                            <div class="col-md-6" id="3count" style="display:none">
                                                <div class="form-group">
                                                    <label>Other Expenses</label>
                                                    <input type="text"  id="count3" class="form-control"  placeholder="Other Expenses" name="othedetail">
                                                </div>
                                            </div>
                                             
                                            <div class="col-md-6" id="3charge" style="display:none">
                                                <div class="form-group">
                                                    <label>Other Expenses Amount </label>
                                                    <input type="text" id="b"   onkeyup="now()"  class="form-control"  placeholder="Other Expenses Amount" name="otheramt">
                                                </div>
                                            </div>
                 
                                     
                                        </div>
                                     
                                        <div class="row">
         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Final Total</label>
                                                    <input type="text" class="form-control" id="ftotal" onkeyup="now()" placeholder="Final Total" name="ftotal" readonly>
                                                </div>
                                            </div>
                                            
                                  <div class="field_wrappera">
								
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Upload Bill</label>
												<input type="file" id="firstName" class="form-control" placeholder="Upload Bill" name="files[]" multiple="">
											</div>

										</div>

                                 </div>
                                            
                                        </div>
                                        
                                
                                    <div class="form-actions">
                                        <button type="submit" name="submit"  class="btn btn-info">Submit</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
         
                
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                
                <script src="jquery.min.js" type="text/javascript"></script>
 <script language="Javascript" src="jquery.js"></script>
    <script type="text/JavaScript" src='state.js'></script>
    	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
			<script src="jquery.min.js" type="text/javascript"></script>
			 <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){
	var maxFielda = 10; //Input fields increment limitation
	var addButtona = $('.add_buttona'); //Add button selector
	var wrappera = $('.field_wrappera'); //Input field wrapper
	var fieldHTMLa = '<div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label">Bank Name</label><input type="file" id="firstName" class="form-control" placeholder="Bank Name" name="files[]"  multiple="" required data-validation-required-message="This field is required"></div></div><a href="javascript:void(0);" class="remove_buttona" title="Remove field" style="display: inline-block;"><img src="remove-icon.png" /></a></div>'; //New input field html 
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
<script>

function check()
{

    var pass1 = document.getElementById('mobile');


    var message = document.getElementById('message');

  
    var badColor = "red";

    if(mobile.value.length!=10){

        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Required 10 digits!"
    }}
</script>
         <script>
function myFunction() {
    var checkBox = document.getElementById("md_checkbox_24");
    var text = document.getElementById("text");
      var text1 = document.getElementById("text1");
    if (checkBox.checked == true){
        text.style.display = "block";
        text1.style.display = "block";
    } else {
       text.style.display = "none";
              text1.style.display = "none";
    }
}


function ytax() {
    var checkBox = document.getElementById("md_checkbox_30");
    var text = document.getElementById("ntax");
    
    if (checkBox.checked == true){
        text.style.display = "block";
      
    } else {
       text.style.display = "none";
            
    }
}


function weehlr() {
    
  
    var checkBox = document.getElementById("md_checkbox_21");
    var count2 = document.getElementById("2count");
      var charge2 = document.getElementById("2charge");
      var total2 = document.getElementById("2total");
         var ypass2 = document.getElementById("ypass2");
      var mpass2 = document.getElementById("mpass2");
    if (checkBox.checked == true){
        count2.style.display = "block";
        charge2.style.display = "block";
        total2.style.display = "block";
        ypass2.style.display = "block";
        mpass2.style.display = "block";
    } else {
       count2.style.display = "none";
              charge2.style.display = "none";
                total2.style.display = "none";
                 ypass2.style.display = "none";
                mpass2.style.display = "none";
    }
}


function weehlr3() {
    var checkBox = document.getElementById("md_checkbox_22");
    var count3 = document.getElementById("3count");
      var charge3 = document.getElementById("3charge");
      var total3 = document.getElementById("3total");
        var ypass3 = document.getElementById("ypass3");
      var mpass3 = document.getElementById("mpass3");
    if (checkBox.checked == true){
        count3.style.display = "block";
        charge3.style.display = "block";
        total3.style.display = "block";
            ypass3.style.display = "block";
        mpass3.style.display = "block";
    } else {
       count3.style.display = "none";
              charge3.style.display = "none";
                total3.style.display = "none";
                  ypass3.style.display = "none";
                mpass3.style.display = "none";
    }
}



function weehlr4() {
    var checkBox = document.getElementById("md_checkbox_23");
    var count4 = document.getElementById("4count");
      var charge4 = document.getElementById("4charge");
      var total4 = document.getElementById("4total");
       var ypass4 = document.getElementById("ypass4");
      var mpass4 = document.getElementById("mpass4");
    if (checkBox.checked == true){
        count4.style.display = "block";
        charge4.style.display = "block";
        total4.style.display = "block";
            ypass4.style.display = "block";
        mpass4.style.display = "block";
    } else {
       count4.style.display = "none";
              charge4.style.display = "none";
                total4.style.display = "none";
                  ypass4.style.display = "none";
                mpass4.style.display = "none";
    }
}

function add4() {
 
  var count4= document.getElementById("count4").value;
   var charge4 = document.getElementById("charge4").value;
   
   var final4 = count4 * charge4;
   
  document.getElementById("total4").value = final4 ;
  fadd();
}

function add2() {
 
  var count2= document.getElementById("count2").value;
   var charge2 = document.getElementById("charge2").value;
   
   var final2 = count2 * charge2;
   
  document.getElementById("total2").value = final2 ;
  fadd();
}

function add3() {
 
  var count3= document.getElementById("count3").value;
   var charge3 = document.getElementById("charge3").value;
   
   var final3 = count3 * charge3;
   
  document.getElementById("total3").value = final3 ;
  fadd();
}

function ex() {
 
  var count7= parseFloat(document.getElementById("ttax").value);
   var charge9 = parseFloat(document.getElementById("lbill").value);
      var charge10 = parseFloat(document.getElementById("hk").value);
      
   var final4 = count7 + charge9 + charge10;
   
  document.getElementById("xtotal").value = final4 ;
 
}


function fadd() {
 
  var total2= parseFloat(document.getElementById("total2").value);
   var total3 =parseFloat(document.getElementById("total3").value);
    var total4 =parseFloat(document.getElementById("total4").value);
   
   var final4= total2 + total3 + total4 ;
   
  document.getElementById("ftotal").value = final4 ;
}

function now() {

    
   
        
  var x =  parseFloat(document.getElementById("a").value);
  var y =  parseFloat(document.getElementById("total2").value); 
   var z =  parseFloat(document.getElementById("b").value);
  
  
  
  var final4q = x + y + z ;
   
  document.getElementById("ftotal").value = final4q ;
    
 
 

}

</script>

          <?php include('footer.php'); ?>