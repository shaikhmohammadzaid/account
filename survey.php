<?php include('header.php'); ?>
<?php include('sidebar.php'); 

?>
<?php 
error_reporting(0);
?>

<?php


	if(isset($_POST['submit'])){
		
	  $c_nameeee =  $_SESSION['c_id'];
			$name= $_POST['name'];
				$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
	$e_mail = $_POST['e_mail'];
	$date = date('Y-m-d');
		  $mobile_number =   $_POST['mobile_number'];
		  	  $m1 =   $_POST['1'];
		  	  	  $m2 =   $_POST['2'];	 
		  	  	  $website =   $_POST['website'];
		  	  	  $whlr_av2 =   $_POST['whlr_av2'];
		  	  	  	  $whlr_av3 =   $_POST['whlr_av3'];
		  	  	  	  $whlr_av4 =   $_POST['whlr_av4'];	
		  	  	  	  $module =   $_POST['module'];
		  	  	  	  $whlr4 =   $_POST['whlr4'];
		  	  	  	  	  $whlr3 =   $_POST['whlr3'];
		  	  	  	  	  $whlr2 =   $_POST['whlr2'];	 
		  	  	  	  	  $holiday_collection =   $_POST['holiday_collection'];
		  	  	  	  	  	  $today_collection =   $_POST['today_collection'];
		  	  	  	  	  	  	  $pre_lease =   $_POST['pre_lease'];
		  	  	  	  	  	  	  	  $mon_rent =   $_POST['mon_rent'];
		  	  	  	  	  	  	  	   $deposit =   $_POST['deposit'];
		  	  	  	  	  	  	  	   
		  	  	  	  			  	  	  	  	  $count2 =   $_POST['count2'];
		  	  	  	  	  	  $count3 =   $_POST['count3'];
		  	  	  	  	  	  	  $count4 =   $_POST['count4'];
		  	  	  	  	  	  	  	  $total3=   $_POST['total3'];
		  	  	  	  	  	  	  	   $total2 =   $_POST['total2'];
		  	  	  	  	  	  	  	   		  	  	  	  	  $total4 =   $_POST['total4'];
		  	  	  	  	  	  $ntax =   $_POST['ntax'];
		  	  	  	  	  	  	  $stime =   $_POST['stime'];
		  	  	  	  	  	  	  	  $etime =   $_POST['etime'];
		  	  	  	  	  	  	  	   $lbill =   $_POST['lbill'];
		  	  	  	  	  	  	  	    $hk =   $_POST['hk'];
		  	  	  	  	  	  	  	   
		  	  	  	  	  	  	  	   
		  	  	  	  	  	  	  	    $ypass3 =   $_POST['ypass3'];
		  	  	  	  	  	  $ypass2=   $_POST['ypass2'];
		  	  	  	  	  	  	  $ypass4 =   $_POST['ypass4'];
		  	  	  	  	  	  	  	  $mpass3 =   $_POST['mpass3'];
		  	  	  	  	  	  	  	   $mpass4 =   $_POST['mpass4'];
		  	  	  	  	  	  	  	    $mpass2 =   $_POST['mpass2'];
		  	  	  	  	  	  	  	    $spass =   $_POST['spass'];
		  	  	  	  	  	  	  	      $ftotal =   $_POST['ftotal'];
		  	  	  	  	  	  	  	      $xtotal =   $_POST['xtotal'];
		  	  	  	  	  	  	  	   
	$insert=mysqli_query($con,"insert into survey (`c_name`,`name`,`contact_number`,`address`,`e_mail`,`mobile_number`,`m1`,`m2`,`website`,`whlr_av2`,`whlr_av3`,`whlr_av4`,`module`,`whlr4`,`whlr3`,`whlr2`,`holiday_collection`,`today_collection`,`pre_lease`,`mon_rent`,`deposit`,`date`,`count2`,`count3`,`count4`,`total2`,`total3`,`total4`,`tax`,`stime`,`etime`,`lbill`,`hk`,`ypass2`,`ypass3`,`ypass4`,`mpass2`,`mpass3`,`mpass4`,`spass`,`ftotal`,`xtotal`)values('$c_nameeee','$name','$contact_number','$address','$e_mail','$mobile_number','$m1','$m2','$website','$whlr_av2','$whlr_av3','$whlr_av4','$module','$whlr4','$whlr3','$whlr2','$holiday_collection','$today_collection','$pre_lease','$mon_rent','$deposit','$date','$count2','$count3','$count4','$total2','$total3','$total4','$ntax','$stime','$etime','$lbill','$hk','$ypass2','$ypass3','$ypass4','$mpass2','$mpass3','$mpass4','$spass','$famount','$xtotal')");
		if($insert){
			$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		}
	}



?>
        <div class="page-wrapper">
         
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Survey</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">Survey</li>
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
                                <h4 class="m-b-0 text-white">Survey</h4>
                            </div>
                            	<?php echo $msg; ?>
                            <div class="card-body">
                               <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title">General/contact Information</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mall/building name</label>
                                                    <input type="text" id="firstName" class="form-control"  placeholder="Mall/building nam" name="name" required data-validation-required-message="This field is required">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Contact number</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Contact number" name="contact_number" >
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                   <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Address" name="address" required data-validation-required-message="This field is required"></textarea>
                                                </div>
                                            </div>
                                            
                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">E-mail Address</label>
                                                    <input type="text" class="form-control" placeholder="E-mail Address" name="e_mail" >
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="text" id="mobile" class="form-control" placeholder="Mobile Number" name="mobile_number"  pattern="^\d{10}$"  required>
                                                    </div>
                                                    	<span id="message"></span>
                                            </div>
											 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number(optional)</label>
                                                    <input type="text" id="lastName" class="form-control" placeholder="Mobile Number" name="1">
                                                     </div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number(optional)</label>
                                                    <input type="text" id="lastName" class="form-control" placeholder="Mobile Number" name="2">
                                                     </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">website</label>
                                                    <input type="text" id="lastName" class="form-control" placeholder="Website" name="website">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                         
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                           <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>-->
                                            <!--/span-->
                                          <!--  <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Membership</label>
                                                    <div class="m-b-10">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label">Free</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label">Paid</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40">Vehicles Zone</h3>
                                        <hr>
                                        <div class="row">
                                              <div class="col-md-6">
                                                  
                                                  <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_21" onclick="weehlr()" class="filled-in chk-col-green" value="1" name="whlr_av2"  />
                                    <label for="md_checkbox_21">2 Wheeler Available</label>
                                    </div>
                                                <!--<div class="form-group">
                                                    <label class="control-label">2 wheeler available</label>
                                                    <input type="text" id="lastName" class="form-control" >
                                                    </div>-->
                                            </div>
                                              <div class="col-md-6" id="2count" style="display:none">
                                                <div class="form-group">
                                                    <label>Per Day 2 Wheeler Count</label>
                                                    <input type="text" id="count2"  class="form-control"  onkeyup="add2()" placeholder="Per Day 2 Wheeler Count" name="count2">
                                                </div>
                                            </div>
                                           <div class="col-md-6" id="2charge" style="display:none">
                                                <div class="form-group">
                                                    <label>2 Wheeler Charge</label>
                                                    <input type="text"  id="charge2" class="form-control" onkeyup="add2()" placeholder="2 wheeler Charge" name="whlr2">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6" id="2total" style="display:none">
                                                <div class="form-group">
                                                    <label>2 Wheeler Per Day Amount</label>
                                                    <input type="text" id="total2" class="form-control"  placeholder="Total Amount" name="total2" readonly>
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="col-md-6" id="mpass2" style="display:none">
                                                <div class="form-group">
                                                    <label>2 wheeler Monthly pass amount </label>
                                                    <input type="text" id="mpas2" class="form-control"  placeholder="Monthly" name="mpass2" >
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6" id="ypass2" style="display:none">
                                                <div class="form-group">
                                                    <label>2 wheeler yearly pass amount </label>
                                                    <input type="text" id="ypas2" class="form-control"  placeholder="Yearly" name="ypass2" >
                                                </div>
                                            </div>
                                      
                                           <div class="col-md-6">
                                                  
                                                  <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_22" onclick="weehlr3()" class="filled-in chk-col-green" value="1" name="whlr_av3"  />
                                    <label for="md_checkbox_22">3 Wheeler Available</label>
                                    </div>
                                                <!--<div class="form-group">
                                                    <label class="control-label">2 wheeler available</label>
                                                    <input type="text" id="lastName" class="form-control" >
                                                    </div>-->
                                            </div>
                                            <div class="col-md-6" id="3count" style="display:none">
                                                <div class="form-group">
                                                    <label>Per Day 3 Wheeler Count</label>
                                                    <input type="text"  id="count3" class="form-control" onkeyup="add3()" placeholder="Per Day 3 Wheeler Count" name="count3">
                                                </div>
                                            </div>
                                              <div class="col-md-6" id="3charge" style="display:none">
                                                <div class="form-group">
                                                    <label>3 Wheeler Charge</label>
                                                    <input type="text" id="charge3" class="form-control" onkeyup="add3()" placeholder="3 Wheeler Charge" name="whlr3">
                                                </div>
                                            </div>
                                             <div class="col-md-6" id="3total" style="display:none">
                                                <div class="form-group">
                                                    <label>3 Wheeler Per Day Amount</label>
                                                    <input type="text" id="total3" class="form-control"  placeholder="Total Amount" name="total3" readonly>
                                                </div>
                                            </div>
                                             
                                             <div class="col-md-6" id="mpass3" style="display:none">
                                                <div class="form-group">
                                                    <label>3 wheeler Monthly pass amount </label>
                                                    <input type="text" id="mpas3" class="form-control"  placeholder="Monthly" name="mpass3" >
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6" id="ypass3" style="display:none">
                                                <div class="form-group">
                                                    <label>3 wheeler Yearly pass amount </label>
                                                    <input type="text" id="ypas3" class="form-control"  placeholder="Yearly" name="ypass3" >
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                  
                                                  <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_23" onclick="weehlr4()" class="filled-in chk-col-green" value="1" name="whlr_av4"  />
                                    <label for="md_checkbox_23">4 Wheeler Available</label>
                                    </div>
                                                <!--<div class="form-group">
                                                    <label class="control-label">2 wheeler available</label>
                                                    <input type="text" id="lastName" class="form-control" >
                                                    </div>-->
                                            </div>
                                            <div class="col-md-6" id="4count" style="display:none">
                                                <div class="form-group">
                                                    <label>Per Day 4 Wheeler Count</label>
                                                    <input type="text"  id="count4" class="form-control" onkeyup="add4()" placeholder="Per Day 4 Wheeler Count" name="count4">
                                                </div>
                                            </div>
                                             <div class="col-md-6" id="4charge" style="display:none">
                                                <div class="form-group">
                                                    <label class="control-label">4 Wheeler Charge</label>
                                                    <input type="text" id="charge4" class="form-control" onkeyup="add4()" placeholder="4 wheeler Charge" name="whlr4" >
                                                    </div>
                                            </div>
                                            <div class="col-md-6" id="4total" style="display:none">
                                                <div class="form-group">
                                                    <label>4 Wheeler Per Day Amount</label>
                                                    <input type="text" id="total4" class="form-control"  placeholder="Total Amount" name="total4" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6" id="mpass4" style="display:none">
                                                <div class="form-group">
                                                    <label>4 wheeler Monthly pass amount </label>
                                                    <input type="text" id="mpas4" class="form-control"  placeholder="Monthly" name="mpass4" >
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6" id="ypass4" style="display:none">
                                                <div class="form-group">
                                                    <label>4 wheeler Yearly pass amount </label>
                                                    <input type="text" id="ypas4" class="form-control"  placeholder="Yearly" name="ypass4" >
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>IF shop Pass Avalibale(Enter Amount)</label>
                                                    <input type="text" id="spass" class="form-control"  placeholder="Shop Pass" name="spass" >
                                                </div>
                                            </div>
                                            
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Present System</label>
                                                    <input type="text" class="form-control" placeholder="Present System" name="module">
                                                </div>
                                            </div>
                                            <!--/span-->
                                          
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                       <!-- 
                                         <h3 class="box-title m-t-40">Parking Charge</h3>
                                        <hr>-->
                                        <div class="row">
                                             
                                        
                                      
                                         
                                            
                                           
                                            
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Holiday Colletion</label>
                                                    <input type="text" class="form-control"  placeholder="Holiday Colletion" name="holiday_collection">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Per day Collection</label>
                                                    <input type="text" class="form-control"  placeholder="Per day Collection" name="today_collection">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-6">
                                                  
                                                  <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-green" onclick="myFunction()" value="1" name="pre_lease" />
                                    <label for="md_checkbox_24">IF on Lease</label>
                                    </div>
                                                <!--<div class="form-group">
                                                    <label class="control-label">2 wheeler available</label>
                                                    <input type="text" id="lastName" class="form-control" >
                                                    </div>-->
                                            </div>
                                             <div class="col-md-6" id="text" style="display:none">
                                                <div class="form-group">
                                                    <label>Montly Rent</label>
                                                    <input type="text" class="form-control" placeholder="Montly Rent" name="mon_rent">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6" id="text1" style="display:none">
                                                <div class="form-group">
                                                    <label>Deposit</label>
                                                    <input type="text" class="form-control" placeholder="Deposit" name="deposit">
                                                </div>
                                            </div>
                                            <!--/span-->
                                          
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Final Total</label>
                                                    <input type="text" class="form-control" id="ftotal" placeholder="Final Total" name="ftotal" readonly>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                         <h3 class="box-title m-t-40">Expenses Zone</h3>
                                        <hr>
                                        <div class="row">
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                    <label>Tax</label>
                                                  <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_30" onclick="ytax()" class="filled-in chk-col-green" value="1" name="tax"  />
                                    <label for="md_checkbox_30">Click To Paid Namasteji</label>
                                    </div>
                                    </div>
                                                <!--<div class="form-group">
                                                    <label class="control-label">2 wheeler available</label>
                                                    <input type="text" id="lastName" class="form-control" >
                                                    </div>-->
                                            </div>
                                            
                                        
                                              <div class="col-md-6" id="ntax" style="display:none">
                                                <div class="form-group">
                                                    <label>Tax Amount</label>
                                                    <input type="text"  id="ttax"  class="form-control" onkeyup="ex()"  placeholder="Tax Amount" name="ntax">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                       <input type="date" class="form-control" name="stime"  >
                                                </div>
                                            </div>
                                               <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                       <input type="date" class="form-control" name="etime" >
                                                </div>
                                            </div>
                                         <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label>Light Bill Amount</label>
                                                       <input type="text" id="lbill" class="form-control" onkeyup="ex()"  name="lbill" placeholder="Light Bill Amount" >
                                                </div>
                                            </div>
                                            
                                              <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label>House Keeping</label>
                                                       <input type="text" id="hk" class="form-control" onkeyup="ex()"  name="hk" placeholder="House Keeping" >
                                                </div>
                                            </div>
                                            
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Expance Final Total</label>
                                                    <input type="text" class="form-control" id="xtotal" placeholder="Final Total" name="xtotal" readonly>
                                                </div>
                                            </div>
                                       
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" onclick="check()" class="btn btn-info">Submit</button>
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


</script>
          <?php include('footer.php'); ?>