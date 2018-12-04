<?php
    include('config.php');
	
	if(($_POST['bulk_delete_submitabc'])){
		
		$chkma = $_POST['checked_id'];
		
        $sluser = $_POST['sluser'];
        $sluserall = $_POST['sluserall'];
		
        if($sluserall=="")
		{
			$aa=mysqli_query($con,"SELECT * FROM `tem_emp2` where id='$sluser'");
			$rowaaa=mysqli_fetch_array($aa);
			$splsp=explode(" ",$rowaaa['stid']);
			$both=array_merge($chkma,$splsp);
		
			$idArr=implode(",",$both);
			
		$sl=mysqli_query($con,"UPDATE `tem_emp2` SET `stid`='$idArr',`status`='1'  WHERE id='$sluser'");
		}
		else
		{
			$aa=mysqli_query($con,"SELECT * FROM `tem_emp2` where id='$sluserall'");
			$rowaaa=mysqli_fetch_array($aa);
			$splsp=explode(" ",$rowaaa['stid']);
			$both=array_merge($chkma,$splsp);
		
			$idArr=implode(",",$both);
			
		$sl=mysqli_query($con,"UPDATE `tem_emp2` SET `stid`='$idArr' WHERE id='$sluserall'");
		}
		
		$chkid = $_POST['checked_id'];
		foreach($chkid as $id)
		{
			mysqli_query($con,"UPDATE `statement` SET `status`='1'  WHERE id=".$id);
		}
		
	   if($sl)
	   {
		  if($sluserall=="")
			{
				echo "<script type='text/javascript'>";
				echo "window.location='tem_show_vender?id=$sluser'";
				echo "</script>";
			}
			else
			{
				echo "<script type='text/javascript'>";
				echo "window.location='tem_show_vender?id=$sluserall'";
				echo "</script>";
			}
	   }
    }

?>