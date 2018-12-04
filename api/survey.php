<?php include('../config.php'); ?>
<?php error_reporting(0); ?>
<?php
$response = array();
$data = json_decode(file_get_contents('php://input'), true);

	
		
	  $c_nameeee =  $_GET['c_id'];
			$name= $data['name'];
				$contact_number = $data['contact_number'];
$address = $data['address'];
	$e_mail = $data['e_mail'];
	$date = date('Y-m-d');
		  $mobile_number =   $data['mobile_number'];
		  	  $m1 =   $data['1'];
		  	  	  $m2 =   $data['2'];	 
		  	  	  $website =   $data['website'];
		  	  	  $whlr_av2 =   $data['whlr_av2'];
		  	  	  	  $whlr_av3 =   $data['whlr_av3'];
		  	  	  	  $whlr_av4 =   $data['whlr_av4'];	
		  	  	  	  $module =   $data['module'];
		  	  	  	  $whlr4 =   $data['whlr4'];
		  	  	  	  	  $whlr3 =   $data['whlr3'];
		  	  	  	  	  $whlr2 =   $data['whlr2'];	 
		  	  	  	  	  $holiday_collection =   $data['holiday_collection'];
		  	  	  	  	  	  $today_collection =   $data['today_collection'];
		  	  	  	  	  	  	  $pre_lease =   $data['pre_lease'];
		  	  	  	  	  	  	  	  $mon_rent =   $data['mon_rent'];
		  	  	  	  	  	  	  	   $deposit =   $data['deposit'];
		  	  	  	  	  	  	  	   
		  	  	  	  			  	  	  	  	  $count2 =   $data['count2'];
		  	  	  	  	  	  $count3 =   $data['count3'];
		  	  	  	  	  	  	  $count4 =   $data['count4'];
		  	  	  	  	  	  	  	  $total3=   $data['total3'];
		  	  	  	  	  	  	  	   $total2 =   $data['total2'];
		  	  	  	  	  	  	  	   		  	  	  	  	  $total4 =   $data['total4'];
		  	  	  	  	  	  $ntax =   $data['ntax'];
		  	  	  	  	  	  	  $stime =   $data['stime'];
		  	  	  	  	  	  	  	  $etime =   $data['etime'];
		  	  	  	  	  	  	  	   $lbill =   $data['lbill'];
		  	  	  	  	  	  	  	    $hk =   $data['hk'];
		  	  	  	  	  	  	  	   
		  	  	  	  	  	  	  	   
		  	  	  	  	  	  	  	    $ypass3 =   $data['ypass3'];
		  	  	  	  	  	  $ypass2=   $data['ypass2'];
		  	  	  	  	  	  	  $ypass4 =   $data['ypass4'];
		  	  	  	  	  	  	  	  $mpass3 =   $data['mpass3'];
		  	  	  	  	  	  	  	   $mpass4 =   $data['mpass4'];
		  	  	  	  	  	  	  	    $mpass2 =   $data['mpass2'];
		  	  	  	  	  	  	  	    $spass =   $data['spass'];
		  	  	  	  	  	  	  	      $ftotal =   $data['ftotal'];
		  	  	  	  	  	  	  	      $xtotal =   $data['xtotal'];
		  	  	  	  	  	  	  	   
	$insert=mysqli_query($con,"insert into survey (`c_name`,`name`,`contact_number`,`address`,`e_mail`,`mobile_number`,`m1`,`m2`,`website`,`whlr_av2`,`whlr_av3`,`whlr_av4`,`module`,`whlr4`,`whlr3`,`whlr2`,`holiday_collection`,`today_collection`,`pre_lease`,`mon_rent`,`deposit`,`date`,`count2`,`count3`,`count4`,`total2`,`total3`,`total4`,`tax`,`stime`,`etime`,`lbill`,`hk`,`ypass2`,`ypass3`,`ypass4`,`mpass2`,`mpass3`,`mpass4`,`spass`,`ftotal`,`xtotal`)values('$c_nameeee','$name','$contact_number','$address','$e_mail','$mobile_number','$m1','$m2','$website','$whlr_av2','$whlr_av3','$whlr_av4','$module','$whlr4','$whlr3','$whlr2','$holiday_collection','$today_collection','$pre_lease','$mon_rent','$deposit','$date','$count2','$count3','$count4','$total2','$total3','$total4','$ntax','$stime','$etime','$lbill','$hk','$ypass2','$ypass3','$ypass4','$mpass2','$mpass3','$mpass4','$spass','$famount','$xtotal')");
		if($insert){
			$response['message'] = "Successfully Added ! "; 
                                  
                                    echo json_encode($response);
		}
	



?>
       