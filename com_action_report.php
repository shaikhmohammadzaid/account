<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php error_reporting(0);?>
<style>
h4.card-title {
    text-transform: uppercase;
    text-align: center;
    color: #3953a4;
    font-size: 25px;
    margin-bottom: 40px;
}
form label {
    font-weight: 400;
    text-transform: uppercase;
    padding-left: 10px;
    font-size: 15px;
}
.text-xs-right {
    text-align: center;
}
label.col-md-4.col-form-label {
    text-align: right;
}
.text-xs-right {
    text-align: center;
    margin-bottom: 30px;
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
                    <h3 class="text-themecolor">Accounting Reports</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Accounting Reports</li>
                        <li class="breadcrumb-item active">Accounting Reports</li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Accounting Reports</h4>
							
                                <form action ='com_category_report.php' class="m-t-40" novalidate method="post" enctype="multipart/form-data">
								
								            <!--	<div class="form-group row">
												<label class="col-md-4 col-form-label">Bank</label>
												<div class="col-md-5">
												<select name="bid"  class="form-control">
											<option value="">Select Bank</option>
											<?php
											$resultab11=mysqli_query($con,"select * from bank ");
											while($contactab11=mysqli_fetch_array($resultab11))
											{
											?>
											<option value="<?php echo $contactab11['id']; ?>"><?php echo $contactab11['bank_name']; ?></option>
											<?php } ?>
											</select>
											</div>
										
										</div>-->
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Category</label>
												<div class="col-md-5">
												<select id="per" name="sub_ct"  class="form-control">
											<option value="">Select Sub Category</option>
											<?php
											$resultab=mysqli_query($con,"select * from sub_ct ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['id']; ?>"><?php echo $contactab['sub_nm']; ?></option>
											<?php } ?>
											</select>
											</div>
										
										</div>
										
										
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Sub Category</label>
												<div class="col-md-5">
													<select id="country" name="main_ct"  class="form-control">
											<option value="">Select Main Category</option>
											
											</select>
											</div>
										
										</div>
										
									</div>
					
                                    <div class="text-xs-right">
                                        <button type="submit" name="submit" class="btn btn-info">Submit </button>
                                    </div>
                                </form>
                            </div>
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

<script>
$(document).ready(function(){
    $('#per').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_ida='+countryID,
                success:function(html){
                    $('#country').html(html);
                }
            }); 
        }else{
            $('#country').html('');
        }
    });
    
});
</script>
		
         <?php include('footer.php'); ?>
