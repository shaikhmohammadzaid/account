<?php include('config.php');

$rr=mysqli_query($con,"SELECT * FROM purchase");


while($contacta = mysqli_fetch_array($rr))
{
   $rt[]=$contacta;
}
	echo json_encode($rt);


?>