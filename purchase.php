<?php include('header.php'); ?>
<?php include('sidebar.php'); 

?>


<?php 
if(isset($_POST['submit'])){
	$v_name=$_POST['v_name'];
	$p_no=$_POST['p_no'];
	$address=$_POST['address'];
	$e_mail=$_POST['e_mail'];
	$item_name = $_POST['item_name'];	
	$item_c = $_POST['item_c'];
		$item_r= $_POST['item_r'];	
	$item_amount = $_POST['item_amount'];
		$inquiry_date = $_POST['inquiry_date'];	
	$inquiry_by = $_POST['inquiry_by'];
	
	$dte=date('Y-m-d');

	 $c_name = 	$_SESSION['c_id'];
 $id=$_SESSION['id'];
	$insert=	mysqli_query($con,"insert into `purchase`(`v_name`,`p_no`,`address`,`e_mail`,`item_name`,`item_c`,`item_r`,`item_amount`,`inquiry_date`,`inquiry_by`) values ('$v_name','$p_no','$address','$e_mail','$item_name','$item_c','$item_r','$item_amount','$inquiry_date','$inquiry_by')");
	if($insert){	
	    
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
                    <h3 class="text-themecolor">Purchase</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">purchase Managment</li>
                        <li class="breadcrumb-item active">purchase</li>
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
                                <h4 class="card-title">purchase</h4>
								<?php echo $msg; ?>
                                <form class="form-horizontal" novalidate method="post" enctype="multipart/form-data">
									
									
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Vendor Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Add Vendor Name" name="v_name" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">phone Number</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="phone Number" name="p_no" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Address</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Address" name="address" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">E-mail</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="E-mail" name="e_mail" required data-validation-required-message="This field is required">
											</div>
										</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Item Name</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Add Item Name" name="item_name" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Item rate</label>
												<div class="col-md-5">
												<input type="text" id="rate" class="form-control" placeholder="Item rate" onkeyup="add()" name="item_r" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Item quantity</label>
												<div class="col-md-5">
												<input type="text" id="que" class="form-control" placeholder="Item quantity" onkeyup="add()" name="item_c" required data-validation-required-message="This field is required">
											</div>
										</div>
										
											
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Item final Amount</label>
												<div class="col-md-5">
												<input type="text" id="final" class="form-control" placeholder="Item final Amount" name="item_amount" required data-validation-required-message="This field is required" readonly>
											</div>
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Inquiry Date</label>
												<div class="col-md-5">
												<input type="date" id="firstName" class="form-control" placeholder="Inquiry Date" name="inquiry_date" required data-validation-required-message="This field is required">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-md-4 col-form-label">Inquiry by</label>
												<div class="col-md-5">
												<input type="text" id="firstName" class="form-control" placeholder="Inquiry by" name="inquiry_by" required data-validation-required-message="This field is required">
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
                                <h4 class="card-title">All Purchase List</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Item Name</th>
												<th>Item Contity</th>
												<th>Item rate</th>
												<th>Item final Amount</th>
												<th>Inquiry Date</th>
												
												<th>Inquiry by</th>
												<th>Status</th>
											</tr>
											</thead>
										
										<tbody>
											<?php
													$no=0;
													
													$result=mysqli_query($con,"select * from purchase ");
													while($contacta = mysqli_fetch_array($result))
														//echo"<script>alert('$contacta')</script>";
													
													{
														
													$no=$no+1;
												?>
											<tr>
												<td class="center"><?php echo $no;?></td>
												
												<td class="center"><?php echo $contacta['item_name'];?></td>
												<td class="center"><?php echo $contacta['item_c'];?></td>
												<td class="center"><?php echo $contacta['item_r'];?></td>
												<td class="center"><?php echo $contacta['item_amount'];?></td>
												<td class="center"><?php echo $contacta['inquiry_date'];?></td>
												<td class="center"><?php echo $contacta['inquiry_by'];?></td>
												
												<td class="center" style="display: inline-flex;">
												  
												    <?php
                                                           												    
												   $st=  $contacta['status'];
												    if($st == '1') {
												    echo 'Approved';
												    } 
												    else { echo 'Not Approved';
												    }
												    ?>
												    
												 </td>
													 
											</tr>
											<?php
													}
												?>
											   </tbody>
                                    </table>
                                      <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
function add() {
  var x =parseFloat(document.getElementById("que").value);
  var y = parseFloat(document.getElementById("rate").value);
 
       document.getElementById("final").value = x * y;
  

    

}
</script>

<?php include('footer.php'); ?>