<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>

<?php 



$id1=$_GET['id'];


//echo"<script>alert('".$id."')</script>";
$insert=  mysqlI_query($con,"UPDATE `cash_voucher2` SET  `cheque_status`='3'  WHERE id='$id1'  ");




 
if($insert)
{

echo '<script>alert("Successfully Stop Cheque")</script>';
echo '<script>window.location.href = "com_cheque_list";</script>';
}
?>