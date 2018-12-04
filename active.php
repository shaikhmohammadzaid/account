<?php
include('config.php');
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=mysqli_query($con,"select * from  vendor_registration where id='$status1'");
while($row=mysqli_fetch_object($select))
{
$status_var=$row->status;
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=mysqli_query($con,"update  vendor_registration set status='$status_state' where id='$status1' ");
if($update)
{
header("Location:com_employee_list.php");
}
else
{
echo mysqli_error();
}
}
?>
<?php
}
?>