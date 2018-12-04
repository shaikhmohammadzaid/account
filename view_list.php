<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
$id=$_GET['id'];
	$result=mysqli_query($con,"select * from emp_main where id='$id'");
	$contact=mysqli_fetch_array($result);
	
	$contact['main_nm'];
	
	
?>
<?php
if(isset($_POST['submit']))
{
$traders_detail=$_POST['traders_detail'];
$cash_vou=$_POST['cash_vou'];
$past_emp=$_POST['past_emp'];
$acc_category=$_POST['acc_category'];
$tranjection=$_POST['tranjection'];
$requirment=$_POST['requirment'];
$attendence=$_POST['attendence'];
$document=$_POST['document'];
$phon_book=$_POST['phon_book'];
$tender=$_POST['tender'];
$account=$_POST['account'];
$meeting=$_POST['meeting'];
$sales_module=$_POST['sales_module'];
$pur_module=$_POST['pur_module'];
$survey=$_POST['survey'];
$otherexpn = $_POST['otherexpn'];
$cheque = $_POST['cheque'];

    
    		$query =  mysqli_query($con,"UPDATE `emp_main` set traders_detail='$traders_detail',cash_vou='$cash_vou',past_emp='$past_emp',acc_category='$acc_category',tranjection='$tranjection',requirment='$requirment',attendence='$attendence',document='$document',phon_book='$phon_book',tender='$tender',account='$account',meeting='$meeting',sales_module='$sales_module',pur_module='$pur_module',survey='$survey',otherexpn='$otherexpn',cheque='$cheque' where id='$id'");
             if($query){
                 
                 	$result=mysqli_query($con,"select * from emp_main where id='$id'");
	$contact=mysqli_fetch_array($result);
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
input {
    overflow: visible;
    width: 100%;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    min-height: 38px;
    background-clip: padding-box;
}
.dataTables_filter input{
    width:auto;
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example23 .filters td').each( function () {
        var title = $('#example23 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text"/>' );
    } );
 
    // DataTable
    var table = $('#example23').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', $('.filters td')[colIdx] ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>

      
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add Bank</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active">Add Bank</li>
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
                                <h4 class="card-title">Authority for <?php echo	$contact['main_nm']; ?></h4>
								<?php echo $msg; ?>
								<form method="post">
                          <div class="demo-checkbox">
                                    <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-green" value="1" name="traders_detail" <?php if($contact['traders_detail']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_21">Traders Detail</label>
                                    <input type="checkbox" id="md_checkbox_22" class="filled-in chk-col-green" value="1" name="cash_vou" <?php if($contact['cash_vou']=='1') { ?>checked<?php } ?>   />
                                    <label for="md_checkbox_22">Cash Voucher</label>
                                    <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-green" value="1" name="past_emp" <?php if($contact['past_emp']=='1') { ?>checked<?php } ?>  />
                                    <label for="md_checkbox_23">Past Employee</label>
                                    <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-green" value="1" name="acc_category" <?php if($contact['acc_category']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_24">Account Category</label>
                                    <input type="checkbox" id="md_checkbox_25" class="filled-in chk-col-green" value="1" name="tranjection" <?php if($contact['tranjection']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_25">Transaction</label>
                                    <input type="checkbox" id="md_checkbox_26" class="filled-in chk-col-green" value="1" name="requirment" <?php if($contact['requirment']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_26">Recruitment</label>
                                    <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-green" value="1" name="attendence" <?php if($contact['attendence']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_27">Attendence</label>
                                    <input type="checkbox" id="md_checkbox_28" class="filled-in chk-col-green" value="1" name="document" <?php if($contact['document']=='1') { ?>checked<?php } ?>/>
                                    <label for="md_checkbox_28">Document</label>
                                    <input type="checkbox" id="md_checkbox_29" class="filled-in chk-col-green" value="1" name="phon_book" <?php if($contact['phon_book']=='1') { ?>checked<?php } ?>/>
                                    <label for="md_checkbox_29">Phone Book</label>
                                    <input type="checkbox" id="md_checkbox_30" class="filled-in chk-col-green" value="1" name="tender" <?php if($contact['tender']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_30">Tender</label>
                                    <input type="checkbox" id="md_checkbox_31" class="filled-in chk-col-green" value="1" name="account" <?php if($contact['account']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_31">Account</label>
                                    <input type="checkbox" id="md_checkbox_32" class="filled-in chk-col-green" value="1" name="meeting" <?php if($contact['meeting']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_32">Meeting</label>
                                    <input type="checkbox" id="md_checkbox_33" class="filled-in chk-col-green" value="1" name="sales_module" <?php if($contact['sales_module']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_33">Sales Module</label>
                                    <input type="checkbox" id="md_checkbox_34" class="filled-in chk-col-green" value="1" name="pur_module" <?php if($contact['pur_module']=='1') { ?>checked<?php } ?> />
                                    <label for="md_checkbox_34">Purchase Module</label>
                                    <input type="checkbox" id="md_checkbox_35" class="filled-in chk-col-green" value="1" name="survey" <?php if($contact['survey']=='1') { ?>checked<?php } ?> />
                                    
                                 

                                    <label for="md_checkbox_35">Survey Module</label>
                                <input type="checkbox" id="md_checkbox_36" class="filled-in chk-col-green" value="1" name="otherexpn" <?php if($contact['otherexpn']=='1') { ?>checked<?php } ?> />
                                     <label for="md_checkbox_36">Other Expenses</label>
                                     <input type="checkbox" id="md_checkbox_37" class="filled-in chk-col-green" value="1" name="cheque" <?php if($contact['cheque']=='1') { ?>checked<?php } ?> />
                                     <label for="md_checkbox_37"> Report</label>
                                    
                                </div>
                                
                                	<center>
                                        <button type="submit" name="submit" class="btn btn-info">Update</button></center>
                                
                                
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
 <?php include('footer.php'); ?>