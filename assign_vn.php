<?php
    include('config.php');
	
	if(($_POST['bulk_delete_submitabc'])){
		
		$chkma = $_POST['checked_id'];
		
        $sluser = $_POST['sluser'];
        $sluserall = $_POST['sluserall'];
        
          $main_ct = $_POST['main_ct'];
        $sub_ct = $_POST['sub_ct'];
		
        if($sluserall=="")
		{
			$aa=mysqli_query($con,"SELECT * FROM `vendor_registration` where id='$sluser'");
			$rowaaa=mysqli_fetch_array($aa);
			$splsp=explode(" ",$rowaaa['stid']);
			$both=array_merge($chkma,$splsp);
		
			$idArr=implode(",",$both);
			
		$sl=mysqli_query($con,"UPDATE `vendor_registration` SET `stid`='$idArr',`status`='1'  WHERE id='$sluser'");
		}
		else
		{
			$aa=mysqli_query($con,"SELECT * FROM `vendor_registration` where id='$sluserall'");
			$rowaaa=mysqli_fetch_array($aa);
			$splsp=explode(" ",$rowaaa['stid']);
			$both=array_merge($chkma,$splsp);
		
			$idArr=implode(",",$both);
			
		$sl=mysqli_query($con,"UPDATE `vendor_registration` SET `stid`='$idArr' WHERE id='$sluserall'");
		}
		
		$chkid = $_POST['checked_id'];
		foreach($chkid as $id)
		{
			mysqli_query($con,"UPDATE `statement` SET `status`='1',`main_ct`='$main_ct',`sub_ct`='$sub_ct'     WHERE id=".$id);
		}
		
	   if($sl)
	   {
		  if($sluserall=="")
			{
				echo "<script type='text/javascript'>";
				echo "window.location='show_vender?id=$sluser'";
				echo "</script>";
			}
			else
			{
				echo "<script type='text/javascript'>";
				echo "window.location='show_vender?id=$sluserall'";
				echo "</script>";
			}
	   }
    }

?>