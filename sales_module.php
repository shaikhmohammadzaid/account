<?php include('header.php'); ?>
<?php include('sidebar.php'); 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");
?>
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function deleteConfirm(){
    var result = confirm("Are you sure to Assign?");
    if(result){
        return true;
    }else{
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>

												

<?php 
if(isset($_POST['submit'])){
    $add_c=$_POST['add_c'];
	$c_name=$_POST['c_name'];
	$e_mail=$_POST['e_mail'];
	$p_no=$_POST['p_no'];
	$c_per=$_POST['c_per'];
	
	
	$dte=date('Y-m-d');

	 $c_name1 = $_SESSION['c_id'];
     $id=$_SESSION['id'];
	$insert=	mysqli_query($con,"insert into `sales_module`(`add_c`,`c_name`,`e_mail`,`p_no`,`c_per`,`date`,`c_id`) values ('$add_c','$c_name','$e_mail','$p_no','$c_per','$dte','$c_name1')");
	if($insert){
	    
	    
	     $idate=date('Y-m-d'); 
$mail = new PHPMailer();
$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$zemail="rami.maulik100100@gmail.com";
$message = '';
$subject = 'SALES'.$c_name;
$pdfimage = 'pdfimage';
$body = "SALES :   ". $c_name    . " On  Date is  " .$dte;
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
                    <h3 class="text-themecolor">Sales Module</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Sales Module</li>
                        <li class="breadcrumb-item active">Sales</li>
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
                                <h4 class="card-title">Sales</h4>
								<?php echo $msg; ?>
                                <form class="form-horizontal" novalidate method="post" enctype="multipart/form-data">
									
									
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Add client</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Add client" name="add_c" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">company Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Company Name" name="c_name" required data-validation-required-message="This field is required">
											</div>
										</div>
										
										<div class="form-group row">
												<label class="col-md-4 col-form-label">E-mail</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="E-mail" name="e_mail" required data-validation-required-message="This field is required">
											</div>
										</div>
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Phone Number</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Phone Number" name="p_no" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Contact Person</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Contact Person" name="c_per" required data-validation-required-message="This field is required">
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
                                <h4 class="card-title">All Sales List</h4>
                                <div class="table-responsive m-t-40">
                                   							<form name="form" action="zaid.php" method="POST" onsubmit="return deleteConfirm();"/>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>

								
											<tr>
												<th>No</th>
												<th>Add client</th>
												<th>company Name</th>
												<th>E-mail</th>
												<th>Phone Number</th>
												<th>Contact Person</th>
											</tr>
											</thead>
										
										<tbody>
											<?php
													$no=0;
													
													$result=mysqli_query($con,"select * from sales_module");
													while($contacta = mysqli_fetch_array($result))
														//echo"<script>alert('$contacta')</script>";
													
													{
														
													$no=$no+1;
												?>
												
											<tr>

												<td class="center"><?php echo $no;?></td>
												
												<td class="center"><?php echo $contacta['add_c'];?></td>
												<td class="center"><?php echo $contacta['c_name'];?></td>
												<td class="center"><?php echo $contacta['e_mail'];?></td>
												<td class="center"><?php echo $contacta['p_no'];?></td>
												<td class="center"><?php echo $contacta['c_per'];?></td>
												
												
											
													 
											</tr>
										
											<?php
													}
												?>
											   </tbody>
                                    </table>
                                      	</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

<?php include('footer.php'); ?>