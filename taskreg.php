<?php include('header.php'); ?>
<?php include('sidebar.php'); 
require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php");  
?>
<?php 
error_reporting(0);
?>
<script>
$('#example23').dataTable( {
  "pageLength": 50
} );
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
      $(document).on('click','.btn-modal',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#idd').val(id);
          $('#myModal').model('show');
      })
  </script>
    <script>
    
      $(document).on('click','.btn-modal1',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#iddv').val(id);
          $('#myModal1').model('show');
      })
  </script>
  <script>
    
      $(document).on('click','.btn-modal11',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#iddv1').val(id);
          $('#myModal11').model('show');
      })
  </script>
 <script>
    
      $(document).on('click','.btn-modal12',function(){
          
          var id=$(this).data('id');
          console.log(id);
          
          $('#iddv2').val(id);
          $('#myModal12').model('show');
      })
  </script>
  
<?php  
 if(isset($_POST['submit5'])){
                    
	$comment = $_POST['comment'];

    $chk_id= $_POST['id'];
		

		
		  $insert=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment', `status`='1'  WHERE id='$chk_id'  ");
		 if($insert){
		     
		     header("Refresh:0");
	$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		 }
}
if(isset($_POST['submit1'])){
                    
	$comment1 = $_POST['comment'];

    $chk_id1= $_POST['id'];
		

		
		  $insert=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment1', `status`='2'  WHERE id='$chk_id1'  ");
		 if($insert){
		     
		     header("Refresh:0");
	$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		 }
}
if(isset($_POST['submit3'])){
                    
	$comment1 = $_POST['comment'];

    $chk_id1= $_POST['id'];
		
 $date =date('Y-m-d');
		
		  $insert=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment1', `status`='3', `c_date` = '$date'     WHERE id='$chk_id1'  ");
		 if($insert){
		     
		     header("Refresh:0");
	$msg="<p class='alert alert-success alert-rounded'>Successfully Registered ! </p>";
		 }
}
?>





<style>
 ._jw-tpk-container {
    position: absolute;
    width: 250px;
    height: 220px !important;
    padding: 0;
    background: #fff;
    font-family: inherit;
    /* font-weight: 400; */
    /* overflow: hidden; */
    border-radius: 3px;
    box-sizing: border-box;
    max-width: 250px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1rem;
    font-size: 1rem;
}
label.col-md-4.col-form-label {
    text-align: right;
}
</style>

	
 
<?php 
error_reporting(0);
?>

<?php
if(isset($_POST['submit'])){
   $c_name = 	$_SESSION['c_id'];
  $work = $_POST['work'];
  $date =date('Y-m-d');
   $edate = $_POST['edate'];
   $userid = $_GET['id'];
   	$id=$_SESSION['id'];
   	$role = $_POST['role'];
   	$emprole = $_POST['emprole'];
   	$status2 = $_POST['status'];
   	$users = $_POST['user'];
   $user = implode(',', $_POST['user']);
  
   	$pieces = explode(",", $user);
   	
   	
   	
   	
   	
   	
				        $file=$_FILES['profile']['name'];
                        $type=$_FILES['profile']['type'];
                        $size=$_FILES['profile']['size'];
                        $temp=$_FILES['profile']['tmp_name'];
                        // $RandomNo = mt_rand(1, 99999);
                        $nam=$file;
                      
                    
                        move_uploaded_file($temp,"images/".$nam);
                        $save="img/".$lfile;	
                        
					 foreach ($pieces as $value) 
					 {
                            "$value <br>";
    
 $results=mysqli_query($con,"select * from admin where id ='$value'");
												
													    $contacts=mysqli_fetch_array($results);
													    
													       $zemail = $contacts['email'];
  
  $insert=mysqli_query($con,"INSERT INTO `task`(`work`, `user`,`date`,`work_sender`,`edate`,`email`,`role`,`emprole`,`status`,`c_name`,`profile`) VALUES ('$work','$value','$date','$id','$edate','$zemail','$role','$emprole','$status2','$c_name','$file')");
  
  
$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject = 'Task Notification';
$pdfimage = 'pdfimage';
$body = '<html><head><style>  body {
                  background-color: #999;
            }</style></head><body style="background-color: #999;"><div class="col-lg-4 col-xlg-3" style="width:90%;margin:0 auto;">
			<!-- Column -->
				<div class="card" style="border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;padding: 20px;width: 100%;float: left;">
				<center>
					<a href="namasteji.in"><img class="card-img-top" src="http://parking.namasteji.co.in/images/img16766logo.png" alt="Card image cap" style="width: 150px;border-top-left-radius: calc(.25rem - 1px);border-top-right-radius: calc(.25rem - 1px);"></a>
				</center>
				<h4 class="card-title" style = "color:black";>Today Task</h4>
					<div class="card-body little-profile" style="width:100%;float:left;">
					<div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" style="border: 1px solid;">
										
										<tbody>
											
											<tr>
											    <td class="center" style="border: 1px solid;text-align: center;">Today Task Is</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.$work.'</td>
											</tr>
											<tr>
												<td class="center" style="border: 1px solid;text-align: center;">Date</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $date  . '</td>
											</tr>
											<tr>
											<td class="center" style="border: 1px solid;text-align: center;">Attachment</td>
												<td class="center" style="border: 1px solid;text-align: center;">'.   $file  . '</td>
											</tr>
											
										
											
                                        </tbody>
                                    </table>
                                </div>
	</div>
	</div>
</div></body></html>';




//$body = "Your Task Is :   ". $work    . " On  Date is  " .$date;
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
   
				}
  if($insert)
  {
    $msg="<p class='alert alert-success alert-rounded'>Successfully Added ! </p>";
  }
  
}
 if($insert)
    {
          header("Location: taskreg.php");    
        
    }
  



?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Employee Task Management</h3>
                </div>
               
                
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Assign Task</h4>
								<?php echo $msg; ?>
								
                                <form class="m-t-40" novalidate method="post" enctype="multipart/form-data">
									
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Employee category</label>
												<div class="col-md-5" >
												
											<select id="prole" name="role"  class="form-control" data-rel="chosen">
												<option value="">Select Category</option>
											<?php
											$resultab=mysqli_query($con,"select * from emp_main");
											while($contactab=mysqli_fetch_array($resultab))
											
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['main_nm']; ?></option>
											<?php } ?>
												
												</select>
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label" id="emprole">Employee Designation</label>
												<div class="col-md-5" >
										
												<select name="emprole" id="emproles" class="form-control" data-rel="chosen" >
											 <option value="">Select Category first</option>
												
												
												</select>
											
										</div>
										</div>
										
											
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Select Employee</label>
												<div class="col-md-5" >
											 <select class="select2 m-b-10 select2-multiple" id="user"  name="user[]" style="width: 100%" multiple="multiple" data-placeholder="Choose" required>
													<option value="">Select Operator</option>
												
												</select>
											</div>
											<span style="color:red" id="demo"></span>
										</div>
							
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Task</label>
												<div class="col-md-5" >
												<select id="new" name="work"  class="select2 form-control custom-select" style="width: 100%; height:36px;" data-rel="chosen" required>
												<option value="">Select Task</option>
											<?php
											$resultab=mysqli_query($con,"select * from task_list");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['task']; ?>"><?php echo $contactab['task']; ?></option>
											<?php } ?>
												
												</select>
											</div>
												<span style="color:red" id="demo1"></span>
										</div>
										
										
										
										
										
										
										
									
												<!--<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Start Date</label>
												<input type="date" class="form-control" name="date"  value="<?php
						echo date('Y-m-d');?>"  data-validation-required-message="This field is required" readonly>
											</div>
										</div>-->
											</div>
									<!--	<div class="row">
											<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">End Date</label>
												<input type="date" class="form-control" name="edate" data-validation-required-message="This field is required" >
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Start Date</label>
											 <input type="text" id="time" class="form-control"   placeholder="Time" autocomplete="off">
											</div>
										</div>
										</div>-->
                                       <div class="form-group row">
												<label class="col-md-4 col-form-label">Attachment</label>
												<div class="col-md-5" >
											<input type="file" name="profile">
											</div>
												<span style="color:red" id="demo1"></span>
										</div>
                                       <input type="hidden"  name="status" value="0">
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" onclick="myFunction()" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
            	 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Employee Task List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Employee Names</th>
												
												<th>Task Name</th>
													<th>Allocated Name</th>
														<th>Start Date</th>
														<th>Completion Date</th>
														<th>Attachment</th>
													
														<th>status</th>
														<th>Action</th>
														
														<!--<th>Action</th>-->
													
											
											</tr>
										</thead>
										<tbody>
											<?php
												  $c_name = 	$_SESSION['c_id'];
													
														
														$result=mysqli_query($con,"select * from task where c_name='$c_name' ORDER BY id DESC");
												
													
												   
													while($contact=mysqli_fetch_array($result))
													{
													  $nm = $contact['user'];
													   
													$pieces = explode(",", $nm);
													  
												        foreach ($pieces as $value) {
                                                          "$value <br>";
													 
													$name1 = $contacts['user_role'];
														$name12 = $contacts['emprole'];
													 
												       $work_sender = $contact['work_sender'];
													  
													  $results=mysqli_query($con,"select * from admin where id = '$value'");
												
													    $contacts=mysqli_fetch_array($results);
													    
													      
													  $results11=mysqli_query($con,"select * from emp_main where id = '$name1'");
												
													    $contacts1=mysqli_fetch_array($results11);
													    
													    
													      $results112=mysqli_query($con,"select * from emp_cat where main_id = '$name12'");
												
													    $contacts12=mysqli_fetch_array($results112);
													    
													    $sub = $contacts12['sub_nm'];
													    
													     $results112r=mysqli_query($con,"select * from company where id = '$work_sender'");
												
													    $contacts12r=mysqli_fetch_array($results112r);
													    
													    
													    
													       $name = $contacts['username'];
													       
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
										
											 	
											
												<td class="center"><?php echo  $name;   ?>( <?php echo $sub ;  ?> )</td>
												
												<td class="center"><?php echo $contact['work'];?></td>
												<td class="center"><?php echo $contacts12r['c_name'];?></td>
												<td class="center"><?php echo $contact['date'];?></td>
												<td class="center"><?php echo $contact['c_date'];?></td>
												<td class="center"> <?php     
                                                $zaid=$contact['profile'];
                                             ?> <a  href="images/<?php echo $zaid ?>" ><?php echo $contact['profile'];?></a></td>
												
												<td class="center"><?php  $rr=$contact['status'];
												 if($rr==''){
                                                    ?>
                                                    <?php } if($rr=='1'){ ?>
                                                 <span style="color: green">   
                                                active 
                                                </span>
                                                   <?php } if($rr=='2'){ ?>
                                                  <span style="color: blue">  
                                                pending
                                                </span>
                                                   <?php } if($rr=='3'){ ?>
                                                    <span style="color: red">
                                                complete </>
                                                   <?php } if($rr=='0'){ ?>
                                                    <span style="color:red">no action perform</span>
                                                   <?php } ?>
												</td>
												<td>
												    <?php  if($rr=='3'){   }else{?>
												    <a class="btn btn-info" href="emplo_task_edit2.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
													<?php } ?>
                                     <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-settings font-18 "></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> 
                                      <?php  $rr=$contact['status'];
                                                    
                                      if($rr !='3'){
                                  ?>
									 <a  class="dropdown-item btn-modal" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal">Click To Active</a>
									 
									 <a  class="dropdown-item btn-modal1" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal1">Click To Pending</a>
								
									 <a  class="dropdown-item btn-modal12" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal12">Click To complete</a>

								 <?php $rr=$contact['status'];
                                                    
                                      if(rr !='0'){
                                  ?>
									
									 <?php } ?>
									 <?php } ?>
									</div>
                                </div>
                                                    </td>
													<?php $rr=$contact['status'];
                                                    
                                      if($rr=='3'){
                                  ?>
                                                    
                                <!--<a type="button" class="btn btn-primary btn-modal" data-id="<?php echo $contact['id']; ?>" data-toggle="modal" data-target="#myModal">  click To clear  </a>-->
                                                    
                                                    <?php } ?>
											<!--	<td class="center">
													<a class="btn btn-info" href="bank_edit.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
												</td>-->
											</tr>
											<?php
												        }      
													}
												?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           <div class="tab-content">
  <!-- Modal -->
  
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Comform Active task ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                                             
                                             
                                             

									  <div class="form-group row">
											<!--<center><label class="control-label">active</label></center>-->
											<input type="hidden" class="form-control" name="comment" >
												
										</div>
										<div class="form-group row">
											<label class="control-label"></label>
											
												<input type="hidden" class="form-control" name="id" id="idd" >
										</div>
										</div>
                                             <div class="form-group row">
                                               
                                                <div class="col-md-4">
                                                   <input type="submit"  class="btn btn-success" name="submit5" value="submit"> </div>
                                                        <div class="form-group row">
                                                  
                                                    </div>
                                            </div> 
                </form>
        </div>
        
            </div>
    </div>
    <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Comform panding task ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                                             
                                             
                                             

									  <div class="form-group row">
											<!--<label class="control-label">panding</label>-->
											<input type="hidden" class="form-control" name="comment" >
												
										</div>
										<div class="form-group row">
											<label class="control-label"></label>
											
												<input type="hidden" class="form-control" name="id" id="iddv" >
										</div>
										</div>
                                             <div class="form-group row">
                                               
                                                <div class="col-md-4">
                                                   <input type="submit"  class="btn btn-success" name="submit1" value="submit"> </div>
                                                        <div class="form-group row">
                                                  
                                                    </div>
                                            </div> 
                </form>
        </div>
        
            </div>
    </div>
    
     <div class="modal" id="myModal12">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Comform complete task ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                                             
                                             
                                             

									  <div class="form-group row">
											<!--<label class="control-label">complete</label>-->
											<input type="hidden" class="form-control" name="comment" >
												
										</div>
										<div class="form-group row">
											<label class="control-label"></label>
											
												<input type="hidden" class="form-control" name="id" id="iddv2" >
										</div>
										</div>
                                             <div class="form-group row">
                                               
                                                <div class="col-md-4">
                                                   <input type="submit"  class="btn btn-success" name="submit3" value="submit"> </div>
                                                        <div class="form-group row">
                                                  
                                                    </div>
                                            </div> 
                </form>
        </div>
        
            </div>
    </div>
    
    
    
    
    
    
    
  </form>
  
                                </div> 
                        </div>
                    </div>
                </div>
                
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
             <script src="jquery.min.js" type="text/javascript"></script>
              <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

         <?php include('footer.php'); ?>
       <script>
function myFunction() {
    var inpObj = document.getElementById("user");
      var inpnew = document.getElementById("new");
    if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = "Please Select Employee";
    } 
    
    if (!inpnew.checkValidity()) {
        document.getElementById("demo1").innerHTML = "Please Select Task";
    } 
} 
</script>
         <script>
          var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});

var input = document.getElementById('time');

timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
       </script>     
            

  	

         
       
 
		
			
<script>
$(document).ready(function(){
    $('#type').on('change', function() {
     
	  if ( this.value == 'vendor')
      {
		  
       
		
		 $("#gst").show();
       
        
      }
      else
      {
       
       
	 $("#gst").hide();
	 
      }
	  
	  
    });
    
      $('#type').on('change', function() {
     
	  if ( this.value == 'employee')
      {
		  
       
		
		 $("#role").show();
          $("#user").show();
           $("#password").show();          
      }
      else
      {
       
       
	 $("#role").hide();
	  $("#user").hide();
	   $("#password").hide();
	 
      }
	  
	  
    });
    
     $('#prole').on('change', function() {
     
	  if ( this.value != '')
      {
		  
       
		
		 $("#emprole").show();
                 
      }
      else
      {
       
       
	 $("#emprole").hide();
	
	 
      }
	  
	  
    });
});

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#prole').on('change',function(){
        var proleID = $(this).val();
        
        if(proleID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'prole_id='+proleID,
                success:function(html){
                    $('#emproles').html(html);
                   
                }
            }); 
        }
        else{
            $('#emproles').html('<option value="">Select Category first</option>');
            
        }
    });
});

$(document).ready(function(){
    $('#emproles').on('change',function(){
        var emproles = $(this).val();
        
           var c_id = "<?php echo  $c_name = $_SESSION['c_id']; ?>"; 
        
        	var data = { 'emproles_id': emproles , 'c_id': c_id};
        if(emproles){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:data,
                success:function(html){
                    $('#user').html(html);
                   
                }
            }); 
        }
        else{
            $('#user').html('<option value="">Select Role first</option>');
            
        }
    });
});
</script> 
         
   
 
              