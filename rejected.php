<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('config.php'); 



$id1=$_GET['id'];


//echo"<script>alert('".$id."')</script>";
$insert=mysqli_query($con,"UPDATE `interview` SET `status`='2' WHERE id='$id1'");





 
if($insert)
{

echo '<script>alert("Candidate was Rejected")</script>';
echo '<script>window.location.href = "com_interview_list";</script>';
}
?>