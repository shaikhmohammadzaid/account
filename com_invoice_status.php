<?php
include('config.php');

if(isset($_GET['id']))
{
$status1=$_GET['id'];
$select=mysqli_query($con,"select * from invoice where id='$status1'");
while($row=mysqli_fetch_object($select))
{
$status_var=$row->invoice_status;


if($status_var=='0')
{
$status_state=1;
}

$update=mysqli_query($con,"update invoice set invoice_status='$status_state' where id='$status1' ");
if($update)
{

header("Location:com_product.php");


}
}
}
?>