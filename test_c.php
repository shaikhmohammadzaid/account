<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php



// reading json file
$json = file_get_contents('test.php');

//converting json object to php associative array
$data = json_decode($json, true);

// processing the array of objects
foreach ($data as $user) {
    $no = $user['no'];
    $user_nm = $user['user_nm'];
    $amount = $user['amount'];
    $pay_time= $user['pay_time'];

    // preparing statement for insert query
   
    $st =	mysqli_query($con,"insert into testt (`no`,`user_nm`,`amount`,`pay_time`)values('$no','$user_nm','$amount','$pay_time')");
		

    // bind variables to insert query params
  
}

?>