<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>

<?php 



$id1=$_GET['id'];


//echo"<script>alert('".$id."')</script>";
$insert=  mysqlI_query($con,"UPDATE `cash_voucher` SET  `cas_status`='1'  WHERE id='$id1'  ");




 
if($insert)
{

echo '<script>alert("Successfully Paid")</script>';
echo '<script>window.location.href = "com_cash_trans.php";</script>';
}
?>