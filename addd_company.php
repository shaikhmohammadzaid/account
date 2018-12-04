<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
?>


<?php 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
if(isset($_POST['submit'])){
	
	$c_name1 = $_POST['c_name'];	
	$fnumber = $_POST['fnumber'];
	$cat = $_POST['cat'];
	$lcnum = $_POST['lcnum'];
	$blockno = $_POST['blockno'];
	
	$dte=date('Y-m-d');
	$time=date('H:i:s');
	 $c_name = 	$_SESSION['c_id'];
 $id=$_SESSION['id'];
		$insert=mysqlI_query($con,"insert into company_file(`cname`,`date`,`time`,`fnumber`,`c_name`,`user_id`,`cat`,`lcnum`,`blockno`)values('$c_name','$dte','$time','$fnumber','$c_name1','$id','$cat','$lcnum','$blockno')");
		if($insert)
	 {
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'ADD NEW FILE'.$c_name1;
$pdfimage = 'pdfimage';
$body = "ADD NEW FILE :   ". $c_name1    . " On  Date is  " .$dte;
//$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

$mail->addAttachment("images/".$nam);		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($zemail);

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
	
	
		$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
	 }
	
}

if(isset($_POST['submit1'])){
  $pid=$_POST['id'];
   $c_name = 	$_SESSION['c_id'];
 $id=$_SESSION['id'];
  
  $file_type=$_POST['file_type'];
  $file_num=$_POST['file_num'];
  
                        $file=$_FILES['profile']['name'];
                        $type=$_FILES['profile']['type'];
                        $size=$_FILES['profile']['size'];
                
                        
                      
                        $temp=$_FILES['profile']['tmp_name'];
                        // $RandomNo = mt_rand(1, 99999);
                        $nam=$file;
                      
                    
                        move_uploaded_file($temp,"images/".$nam);
                        $save="img/".$lfile;	
		
    $insert=  mysqli_query($con,"INSERT INTO `filestore`(`c_id`,`file_type`,`filenumber`,`profile`,`c_name`,`user_id`)  values ('$pid','$file_type','$file_num','$file','$c_name','$id')");
  
    	if($insert)
	 {
	    $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'ADD NEW FILE'.$c_name;
$pdfimage = 'pdfimage';
$body = "ADD NEW FILE :   ". $c_name    . " On  Date is  " .$dte;
//$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

$mail->addAttachment("images/".$nam);		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($zemail);

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
	
	
		$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
	 }
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
                    <h3 class="text-themecolor">Add File</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Files</li>
                        <li class="breadcrumb-item active">Add File</li>
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
                                <h4 class="card-title">Add New File</h4>
								<?php echo $msg; ?>
                                <form class="form-horizontal" novalidate method="post" enctype="multipart/form-data">
									
										<div class="form-group row">
										    	<div class="col-md-4">
												<label class="col-form-label">Select File Category</label>
												<select name="cat"  class="select2 form-control custom-select" data-rel="chosen" id="cat" >
												<option value="">Select File Category</option>
												
													<?php
											$resultab=mysqli_query($con,"select * from file_category ");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['main_nm']; ?></option>
											<?php } ?>
												
												
												</select>
										
										</div>
										</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label">File Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="File Name" name="c_name" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">File Number</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="File Number" name="fnumber" required data-validation-required-message="This field is required">
											</div>
										</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Locker No</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Locker No" name="lcnum" required data-validation-required-message="This field is required">
											</div>
										</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Locker Block No</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Locker Block No" name="blockno" required data-validation-required-message="This field is required">
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
                                <h4 class="card-title">All Company List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Get Document</th>
												<th>Company  Name</th>
												<th>File Name</th>
											
												<th>File Number</th>
												<th>Category</th>
												<th>Locker No</th>
												<th>Locker Block No</th>
												<th>Date</th>
												<th>Time</th>
												
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php
													$no=0;
													
												
													
													$result=mysqli_query($con,"select * from company_file ");
													while($contacta = mysqli_fetch_array($result))
														//echo"<script>alert('$contacta')</script>";
													
													{
														
													$no=$no+1;
													
														$c = $contacta['cat'];
                                                        	$c1 = $contacta['cname'];
                                                         													
														$result1 = mysqli_query($con,"select * from file_category where id = '$c' ");
													
													            $rohit = mysqli_fetch_array($result1);
													            
													            $result12 = mysqli_query($con,"select * from company where c_id = '$c1' ");
													
													            $rohit2 = mysqli_fetch_array($result12);
													
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><a href="file_list1?cid=<?php echo $contacta['cid'];?>"><?php echo $contacta['cname'];?></a></td>
													<td class="center"><?php echo $rohit2['c_name'];?></td>
														<td class="center"><?php echo $contacta['c_name'];?></td>
												<td class="center"><?php echo $contacta['fnumber'];?></td>
													<td class="center"><?php echo $rohit['main_nm'];?></td>
														<td class="center"><?php echo $contacta['lcnum'];?></td>
															<td class="center"><?php echo $contacta['blockno'];?></td>
												<td class="center"><?php echo $contacta['date'];?></td>
												<td class="center"><?php echo $contacta['time'];?></td>
												
												<td class="center" style="display: inline-flex;">
												   <!-- <div class="preview"><a href="ediit_company?id=<?php echo $contacta['cid'];?>"> <i class="icon-pencil"></i></a> </div>-->
												    <a type="button" class="btn btn-primary btn-modal" data-id="<?php echo $contacta['cid']; ?>" data-toggle="modal" data-target="#responsive-modal">
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
                                                        <label for="recipient-name" class="control-label">File Type:</label>
                                                        <input type="text" class="form-control" name="file_type" id="recipient-name">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="message-text" class="control-label">File Attech:</label>
                                                        	<input type="file" name="profile">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">File Number:</label>
                                                          <input type="text" class="form-control" name="file_num" id="recipient-name">
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