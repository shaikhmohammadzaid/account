<?php
 include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 

error_reporting(0);

 $c_name =  $_SESSION['c_id'];
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  




 <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Upload Statement </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Upload Statement</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
			
	
			
			 <div class="col-md-12">
                
 
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="importData.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
				<select name="bank">
					<option value="">Select Bank Name</option>
					<?php
					$resultab=mysqli_query($con,"SELECT * FROM bank where c_name = '$c_name' ORDER BY id DESC");
					//$query = $db->query("SELECT * FROM bank where c_name = '$c_name' ORDER BY id DESC");
                    while($contactab=mysqli_fetch_array($resultab))
					{
					?>
					<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['bank_name']; ?></option>
					<?php
					}
					?>
				</select>
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        </div>
    </div>

                </div>












<?php include('footer.php'); ?>