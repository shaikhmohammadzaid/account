<?php
    include('config.php');
	
	if(($_POST['bulk_delete_submitabc'])){
		$idArr = implode(',', $_POST['checked_id']);
		
        $st_for = $_POST['st_for'];
        $st_for_rm = $_POST['st_for_rm'];
        $sluserall = $_POST['sluserall'];
        $main_ct = $_POST['main_ct'];
        $sub_ct = $_POST['sub_ct'];
		
        
		$chkid = $_POST['checked_id'];
		foreach($chkid as $id)
		{
			$sl=mysqli_query($con,"UPDATE `statement` SET `st_for`='$st_for',`st_for_rm`='$st_for_rm',`vid`='$sluserall',`main_ct`='$main_ct',`sub_ct`='$sub_ct',`status_hd`='1' WHERE id='$id'");
		}
		
	   if($sl)
	   {
			echo "<script type='text/javascript'>";
			echo "window.location='show_vender?id=$sluserall'";
			echo "</script>";
	   }
    }

?>