<?php
//Include database configuration file
include('config.php');

if(isset($_POST["country_ida"]) && !empty($_POST["country_ida"])){
	
    //Get all City data
    $query = mysqli_query($con,"SELECT * FROM sub_ct WHERE id = '".$_POST['country_ida']."'");
    
    //Count total number of rows
    $rowCount = mysqli_num_rows($query);
    
    //Display City list
    if($rowCount > 0){
        while($row = mysqli_fetch_array($query)){ 
		
		$main_id=$row['main_id'];
		$querya = mysqli_query($con,"SELECT * FROM main_ct WHERE id = '$main_id'");
		$rowa = mysqli_fetch_array($querya);
		
		echo '<option value="'.$rowa['id'].'">'.$rowa['main_nm'].'</option>';
		
        }
    }else{
		echo '';
    }
}


elseif(!empty($_POST["country_id"])){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM chaquebook WHERE bank_id = '".$_POST['country_id']."' and status='0'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
        echo '<option value="">Select Cheque Number</option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['qrcode'].'">'.$row1['qrcode'].'</option>';
        }
    }else{
        echo '<option value="">Cheque Is not available</option>';
    }
}

elseif(!empty($_POST["prole_id"])){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM emp_cat WHERE main_id = '".$_POST['prole_id']."' ");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
        echo '<option value="">Select Designation </option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['id'].'">'.$row1['sub_nm'].'</option>';
        }
    }else{
        echo '<option value="">Designation Is Not Avalible</option>';
    }
}

elseif(!empty($_POST["emproles_id"])){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM admin WHERE emprole = '".$_POST['emproles_id']."' and c_name= '".$_POST['c_id']."'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
        echo '<option value="">Select Employee </option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['id'].'">'.$row1['username'].'</option>';
        }
    }else{
        echo '<option value="">Employee Is Not Avalible</option>';
    }
}
elseif(!empty($_POST["gst_id"])){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM vendor_registration WHERE id = '".$_POST['gst_id']."'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
      
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['gst_number'].'">'.$row1['gst_number'].'</option>';
        }
    }else{
        echo '<option value="">GST Number Is not available</option>';
    }
}

elseif(!empty($_POST["emp_id"])){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM emp_salary WHERE emp_id = '".$_POST['emp_id']."' and salary !='0'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
        echo '<option value="">Pending Month</option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['month'].'">'.$row1['month'].'</option>';
        }
    }else{
        echo '<option value="">Month Is not available</option>';
    }
}
elseif(!empty($_POST["com_id"])  && !empty($_POST["per_id"]) ){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM vendor_registration WHERE vendor_for = '".$_POST['per_id']."' and c_name = '".$_POST['com_id']."'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
       echo '<option value="">Select User</option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['id'].'">'.$row1['v_name'].'</option>';
        }
    }else{
        echo '<option value="">No User Found</option>';
    }
}
elseif(!empty($_POST["comid"])  && !empty($_POST["perid"]) ){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM tem_emp2 WHERE vendor_for = '".$_POST['perid']."' and c_name = '".$_POST['comid']."'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
       echo '<option value="">Select User</option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['id'].'">'.$row1['v_name'].'</option>';
        }
    }else{
        echo '<option value="">No User Found</option>';
    }
}

elseif(!empty($_POST["empid"])  && !empty($_POST["u_id"]) ){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM emp_salary WHERE  emp_id = '".$_POST['u_id']."' and month = '".$_POST['empid']."' and salary !='0'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
      
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['salary'].'">'.$row1['salary'].'</option>';
        }
    }else{
        echo '<option value="">No Record Found</option>';
    }
}

elseif(!empty($_POST["empp_ID"])  && !empty($_POST["uiiid"]) ){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM emp_salary WHERE  emp_id = '".$_POST['uiiid']."' and month = '".$_POST['empp_ID']."' and salary !='0'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
      
        while($row1 = mysqli_fetch_array($query1)){ 
            echo $row1['id'];
        }
    }
    else{
        echo 'No Record Found';
    }
}

elseif(!empty($_POST["invoice_id"])  && !empty($_POST["ven_id"]) ){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM invoice WHERE  vname = '".$_POST['ven_id']."' and invoice_no = '".$_POST['invoice_id']."'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
      
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['final'].'">'.$row1['final'].'</option>';
        }
    }else{
        echo '<option value="">No Record Found</option>';
    }
}


elseif(!empty($_POST["vender_id"])){
    //Fetch all state data
    
    
     $query1 = mysqli_query($con,"SELECT * FROM invoice WHERE vname = '".$_POST['vender_id']."'");

    $rowCount1 = mysqli_num_rows($query1);
    //Count total number of rows
  
    
    //State option list
    if($rowCount1 > 0){
        echo '<option value="">Pending Invoice</option>';
        while($row1 = mysqli_fetch_array($query1)){ 
            echo '<option value="'.$row1['invoice_no'].'">'.$row1['invoice_no'].'</option>';
        }
    }else{
        echo '<option value="">Invoice not available</option>';
    }
}
elseif(!empty($_POST["main_id"])){
$queryaaaaax =	mysqli_query($con,"SELECT * FROM  sub_ct WHERE id = '".$_POST['main_id']."'");
$rowax1111 = mysqli_fetch_array($queryaaaaax);
$new_id=$rowax1111['main_id'];
    
    $queryax = mysqli_query($con,"SELECT * FROM  main_ct WHERE id = '".$new_id."'");
    
    
    $rowCountax = mysqli_num_rows($queryax);
    
   
    if($rowCountax > 0){
        while($rowax = mysqli_fetch_array($queryax)){ 
		
		echo '<option value="'.$rowax['id'].'">'.$rowax['main_nm'].'</option>';
		
        }
    }else{
		echo '';
    }
}
elseif(!empty($_POST["rb"])){

    
    
    	$resultab=mysqli_query($con,"select * from bank where `c_name` = '".$_POST["rb"]."'");
    
    $rowCountax = mysqli_num_rows($resultab);
    
   
    if($rowCountax > 0){
        while($rowax = mysqli_fetch_array($resultab)){ 
		
		echo '<option value="'.$rowax['id'].'">'.$rowax['bank_name'].'</option>';
		
        }
    }else{
		echo '';
    }
}

elseif(!empty($_POST["id"])){
    
    $date = date('Y-m-d');
     $query1 = mysqli_query($con,"SELECT * FROM task WHERE user = '".$_POST['id']."' AND date = '".$date."' ");

    $rowCountax = mysqli_num_rows($query1);
      if($rowCountax > 0){
    echo '<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	    <thead><tr><th>Date</th><th>Works</th><th>Work Sender</th></tr></thead><tbody><tr>';
	    
           while($rowax = mysqli_fetch_array($query1)){ 
		
		   	$query2 = mysqli_query($con,"select * from company where id = '".$rowax['work_sender']."'");
		    $rowax2 = mysqli_fetch_array($query2);
	    echo '<tr>';
		echo '<td class="center">'.$rowax['date'].'</td>';
		echo '<td class="center">'.$rowax['work'].'</td>';
		echo '<td class="center">'.$rowax2['username'].'</td>';
	     echo '</tr>';     
		
        }
         echo '</tbody></table>';
      }else{
		echo '';
      }
}


?>