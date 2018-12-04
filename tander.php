<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");  
$c_name = 	$_SESSION['c_id'];
 $id=$_SESSION['id'];
$result=mysqli_query($con,"select * from company where  c_id='$c_name' ORDER BY id DESC");
$contact=mysqli_fetch_array($result);
	$c_mail=$contact['c_mail'];
?>


<?php 
if(isset($_POST['submit'])){
	
	$subject = $_POST['subject'];	
	$location = $_POST['location'];
		$des= $_POST['des'];	
	$amount = $_POST['amount'];
		$start_date = $_POST['sdate'];	
	$end_date = $_POST['edate'];
	$dte=date('Y-m-d');

	 $c_name = 	$_SESSION['c_id'];
 $id=$_SESSION['id'];
	$insert=	mysqli_query($con,"insert into `tander`(`subject`,`location`,`des`,`amount`,`start_date`,`end_date`,`cur_date`,`c_name`,`user_id`) values ('$subject','$location','$des','$amount','$start_date','$end_date','$dte','$c_name','$id')");
	if($insert){	
	    
	    $msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
	    
	    $mail = new PHPMailer();
	
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject = 'Tender Notification';
$pdfimage = 'pdfimage';
$body = '<html><body style="background-color: #999;"><div class="col-lg-4 col-xlg-3" style="width:90%;margin:0 auto;">
		
				<div class="card" style="border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;padding: 20px;width: 100%;float: left;">
				<center>
					<a href="namasteji.in"><img class="card-img-top" src="http://parking.namasteji.co.in/images/img16766logo.png" alt="Card image cap" style="width: 150px;border-top-left-radius: calc(.25rem - 1px);border-top-right-radius: calc(.25rem - 1px);"></a>
				</center>
					<div class="card-body little-profile" style="width:100%;float:left;">
					<h4 class="card-title" style = "color:black";>Tender Information</h4>
					<div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" style="border: 1px solid;">
										<tbody>
											<tr>
											    <td class="center" style="border: 1px solid;text-align: center;">Tender Name</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.$subject.'</td>
											</tr>
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Location</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $location  . '</td>
											</tr>
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Tender Bid Amount</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $amount  . '</td>
											</tr>
												<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Start Date</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.  $start_date   . '</td>
											</tr>
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;">End Date</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $end_date  .'</td>
											</tr>
												<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Tender About</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $des  .'</td>
											</tr>
										
										
											
                                        </tbody>
                                    </table>
                                </div>
	</div>
	</div>
</div></body></html>';

$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($c_mail);

$mail->AddReplyTo($email);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->WordWrap = 120;
if(!$mail->Send()) 
{
  echo 'Message was not sent.';
 echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else {

 echo 'mail send ok';
}
	}
	
}

if(isset($_POST['submit1'])){
  $pid=$_POST['id'];
   $c_name = 	$_SESSION['c_id'];
 $id=$_SESSION['id'];
  
  $file_type=$_POST['file_type'];

  
                        $file=$_FILES['profile']['name'];
                        $type=$_FILES['profile']['type'];
                        $size=$_FILES['profile']['size'];
                
                        
                      
                        $temp=$_FILES['profile']['tmp_name'];
                        // $RandomNo = mt_rand(1, 99999);
                        $nam=$file;
                      
                    
                        move_uploaded_file($temp,"images/".$nam);
                        $save="img/".$lfile;	
		
    $insert=  mysqli_query($con,"INSERT INTO `tander_attceh`(`c_id`,`file_type`,`profile`,`c_name`,`user_id`)  values ('$pid','$file_type','$file','$c_name','$id')");
  
    
}
?>



<style>
h4.card-title {
    line-height: 40px;
    font-size: 27px;
    text-transform: uppercase;
    margin-bottom: 40px;
    color: #3953a4;
    text-align: center;
}
.form-horizontal label {
    margin-bottom: 0px;
    text-align: right;
}
.preview {
    margin-right: 20px;
    margin-top: 8px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
      $(document).on('click','.btn-modal',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#idd').val(id);
          $('#responsive-modal').model('show');
      })
  </script>
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <!-- Page wrapper  -->
 <script>
 $(function(){
    $('#form1').submit(function(){
        var isOk = true;
        $('input[type=file][max-size]').each(function(){
            if(typeof this.files[0] !== 'undefined'){
                var maxSize = parseInt($(this).attr('max-size'),10),
                size = this.files[0].fileSize;
                isOk = maxSize > size;
                return isOk;
            }
        });
        document.write('<br> validation:'+isOk);
        return isOk;
    });
});
    
</script>        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add Tander</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Tanders Managment</li>
                        <li class="breadcrumb-item active">Add Tander</li>
                    </ol>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
			<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add TENDER </h4>
								<?php echo $msg; ?>
                                <form class="form-horizontal" novalidate method="post" enctype="multipart/form-data">
									
									
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Tender Title</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Add Tender Title" name="subject" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Location</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Location" name="location" required data-validation-required-message="This field is required">
											</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Tender For</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Tender Description" name="des" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Tender Bid Amount</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Bid Amount" name="amount" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Start Date</label>
												<div class="col-md-5">
												<input type="date" id="firstName" class="form-control" placeholder="Start Date" name="sdate" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">End Date</label>
												<div class="col-md-5">
												<input type="date" id="firstName" class="form-control" placeholder="End Date" name="edate" required data-validation-required-message="This field is required">
											</div>
										</div>

									<div class="text-xs-right">
									<div class="col-md-12">
									<center>
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button></center>
                                    </div>
									</div>
                                    
									
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				
				   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Tander List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Tander Name</th>
												<th>Location</th>
												<th>Amount</th>
												<th>Start Date</th>
												<th>End Date</th>
												
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php
													$no=0;
													
													$result=mysqli_query($con,"select * from tander ");
													while($contacta = mysqli_fetch_array($result))
														//echo"<script>alert('$contacta')</script>";
													
													{
														
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><a href="tander_list1?cid=<?php echo $contacta['id'];?>"><?php echo $contacta['subject'];?></a></td>
												<td class="center"><?php echo $contacta['location'];?></td>
												<td class="center"><?php echo $contacta['amount'];?></td>
												<td class="center"><?php echo $contacta['start_date'];?></td>
													<td class="center"><?php echo $contacta['end_date'];?></td>
												<td class="center" style="display: inline-flex;">
												  <!--  <div class="preview"><a href="edit_tander?id=<?php echo $contacta['id'];?>"> <i class="icon-pencil"></i></a> </div>-->
												    <a type="button" class="btn btn-primary btn-modal" data-id="<?php echo $contacta['id']; ?>" data-toggle="modal" data-target="#responsive-modal">
														<i class="glyphicon glyphicon-edit icon-white" ></i>
													<span style="color: #ffffff">	Add Documents <span>
													</a></td>
													 
											</tr>
											<?php
													}
												?>
											   </tbody>
                                    </table>
                                      <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Documents</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form novalidate method="post" enctype="multipart/form-data" >
                                                    	<div class="form-group row">
										
											
												<input type="hidden" class="form-control" name="id" id="idd" >
										</div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">File Name:</label>
                                                        <input type="text" class="form-control" name="file_type" id="recipient-name">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="message-text" class="control-label">File Attech:</label>
                                                        	<input type="file" name="profile">
                                                    </div>
                                                  
                                               
                                            </div>
                                            <div class="modal-footer">
                                                 <input type="submit"  class="btn btn-success" name="submit1" value="submit">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                             
                                            </div>
                                             </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include('footer.php'); ?>