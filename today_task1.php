<?php include('header.php'); ?>
<?php include('sidebar.php'); 
$id=$_SESSION['id'];
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
		

		
		  $insert=  mysqlI_query($con,"UPDATE `task` SET  `comment`='$comment1', `status`='3'  WHERE id='$chk_id1'  ");
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

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Today Task List</h3>
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
                                <h4 class="card-title">Today Task List</h4>
                                 
                                <div class="table-responsive m-t-40" >
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												<th>Employee Names</th>
												<th>Task Name</th>
													<th>Company Name</th>
														<th>Start Date</th>
														<th>End Date</th>
														<tH>Upload</tH>
														<th>status</th>
														<th>Action</th>
														
														<!--<th>Action</th>-->
													
											
											</tr>
										</thead>
										<tbody>
											<?php
												  $c_name = 	$_SESSION['c_id'];
														$today=date("Y-m-d");
														
														$result=mysqli_query($con,"select * from task where c_name='$c_name' and date='$today' and user='$id' ORDER BY id DESC");
												
													
												   
													while($contact=mysqli_fetch_array($result))
													{
													  $nm = $contact['user'];
													   
												 $sender=$contact['work_sender'];
													  
												       
													  $results=mysqli_query($con,"select * from admin where id = '$nm'");
												
													    $contacts=mysqli_fetch_array($results);
													    
													       $name = $contacts['username'];
													       
													         $results1=mysqli_query($con,"select * from company where id ='$sender'");
												
													    $contacts1=mysqli_fetch_array($results1);
													    
													       $name1 = $contacts1['c_name'];
													       
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												
												
											
												<td class="center"><?php echo  $name ?></td>
												<td class="center"><?php echo $contact['work'];?></td>
												<td class="center"><?php echo $name1;?></td>
												<td class="center"><?php echo $contact['date'];?></td>
												<td class="center"><?php echo $contact['edate'];?></td>
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
												    <a class="btn btn-info" href="emplo_task_edit2.php?id=<?php echo $contact['id'] ?>">
														<i class="glyphicon glyphicon-edit icon-white"></i>
														Edit
													</a>
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
         
   
 
              