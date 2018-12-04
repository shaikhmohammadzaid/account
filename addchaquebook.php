<?php include('header.php'); ?>
<?php include('sidebar.php'); 
$uid=$_GET['pid'];
?>

<?php 
$r=mysqli_query($con,"select * from chaquebook   ORDER BY id DESC LIMIT 0,1 ");
$rs=mysqli_fetch_array($r); 
if(isset($_POST['submit'])){
	
	$code = $_POST['dataContent'];
	$dataContent1 = $_POST['dataContent1'];
	
	$resultab=mysqli_query($con,"select * from chaquebook WHERE qrcode='$code' AND qrcode='$dataContent1' ");
	$refb=mysqli_num_rows($resultab);
	
	if($refb > 0)
	{
		echo"<script>alert('Already Register')</script>";
		
	}
	else
	{

    $dataContent = $_POST['dataContent'];
	$dataContent1 = $_POST['dataContent1'];


   
     $r=mysqli_query($con,"select * from chaquebook  ORDER BY id DESC LIMIT  0,1 ");
	$rs=mysqli_fetch_array($r); 
    // generating the QR code
     $no1 =$rs['card_ref']+1;
	For($i=$dataContent;$i<=$dataContent1;$i++)
	{
	    
	     $no=$no1++;
		 
	     $image_name1 = $i;
		 $image_name = $i.'.png';
	
		//sleep(1);
			$insert=mysqli_query($con,"INSERT INTO `chaquebook`(`qrcode`, `card_ref`, `status`, `qrcat` , `bank_id`) VALUES ('$image_name1','$no','0','mht','$uid')");

    // displaying the QR code on the web page
    //echo '<img class="img-thumbnail" src="'.$image_location.$image_name.'" />';
    }
  
  
    echo '<script>window.location.href = "addchaquebook";</script>';
	}
}
?>

<style>
.card-body h1 {
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
</style>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add New Cheque Book</h3>
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
		       <h1>Add New Cheque Book</h1>
		       
		        <form class="form-horizontal" method="POST" id="form">
		            <div class="form-group row">
		            	<label class="col-md-4 col-form-label">Cheque number From: </label>
		            	<div class="col-md-5">
		            	<input class="form-control col-xs-12" name="dataContent" id="dataContent" type="text"  required="required">
		            </div>
		            </div>
					
					<div class="form-group row">
		            	<label class="col-md-4 col-form-label">Cheque Number To: </label>
		            	<div class="col-md-5">
		            	<input class="form-control col-xs-12" name="dataContent1" id="dataContent1" type="text" value="" required="required">
		            </div>
		            </div>


		            <div class="form-group">
		            	<div class="col-md-12">
		                <center>
		            	<input type="submit" name="submit" id="submit" class="btn btn-success" ></center>
		            </div>
		        </form>
	    	</div>

	    	
    	</div><!-- .row -->
    </div>
    </div>
    </div>
                         <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Yours Cheque Book</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr no</th>
												
												<th>Cheque No</th>
												<th>Ref No</th>
												<th>Bank name</th>
												<th>Status</th>
												</th>
												
											</tr>
										</thead>
										<tbody>
										    <?php
										     $no=0;
												$codesl=mysqli_query($con,"SELECT * FROM `chaquebook` ");
			                                   while($contact=mysqli_fetch_array($codesl))
													{
											  $bank_id  = $contact['bank_id'];
                                                   $codes2=mysqli_query($con,"SELECT * FROM `bank` where id='$bank_id' ");
                                                   $contact2=mysqli_fetch_array($codes2);
                                                   $no=$no+1;
											?>
										
											
											<tr>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contact['qrcode'];?></td>
												<td class="center"><?php echo $contact['card_ref'];?></td>
													<td class="center"><?php echo $contact2['bank_name'];?></td>
															<td class="center"><?php $stt= $contact['status'];
															      if($stt=='1'){
															          echo "Used";
															      }
															      
															        if($stt=='0'){
															          echo "Fresh";
															      }
															     
															
															?></td>
												
											
												
											</tr>
											<?php
													}
												?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


 <?php include('footer.php'); ?>