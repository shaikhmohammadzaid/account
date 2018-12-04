<?php include('header.php'); ?>
<?php include('sidebar.php'); 
error_reporting(0);
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Transaction List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active">Transaction List</li>
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
                                <h4 class="card-title">All Transaction List(
								<?php
								$pid=$_GET['id'];
								$resultas=mysqli_query($con,"select * from vendor_registration WHERE id='$pid'");
								$contactas=mysqli_fetch_array($resultas);
								echo $contactas['v_name'];
								?>
								)</h4>
                                <div class="table-responsive m-t-40">
									<form name="form" action="assign_st.php" method="POST" onsubmit="return deleteConfirm();"/>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
										<!--	<td colspan="2" align="center" style="display:none;"> 
											<select id="for_list" name="st_for"  class="form-control cities" onchange="showfield(this.options[this.selectedIndex].value)">
											<option value="">Select For List</option>
											<option value="salary">Salary</option>
											<option value="expense">Expense</option>
											<option value="loan">Loan</option>
											</select>
											</td>-->
											<td colspan="3" align="center"> 
											<select id="per" name="trader"  class="form-control">
											<option value="">Select Trader Type </option>
											<?php
											$resultab=mysqli_query($con,"select * from vendor_registration ORDER BY id ASC");
											while($contactab=mysqli_fetch_array($resultab))
											{
											?>
											<option value="<?php echo $contactab['vendor_for']; ?>"></option>
											<?php } ?>
											</select>
											</td>
											<td colspan="2" align="center"> 
											<select id="country" name="main_ct"  class="form-control">
											<option value="">Select Main Category</option>
											
											</select>
											</td>
											<td align="left" style="display:none;"> 
											<div id="remark"></div> 
											</td>
											<td  colspan="2" align="center"> 
											<button type="submit" class="btn btn-space btn-danger active" name="bulk_delete_submitabc" value="multiple Delete"/><i class="fa fa-pencil"></i>  Assign List </button>
											</td>
											</tr>
											<tr>
												<th><strong>Select All <input type="checkbox" name="select_all" id="select_all" value="" style="position: relative;left: 0;opacity: 1;"/> </strong> </th>
												<th>No</th>
												<th>Value Date</th>
												<th>Transaction Date</th>
												<th>Cheque No</th>
												<th>Remark</th>
												<th>Withdraw Amount</th>
												<th>Deposit Amount</th>
												<th>Balance</th>
											</tr>
											</thead>
											<tbody>
											<?php
													$pid=$_GET['id'];
													$no=0;
													$tm=0;
													$tma=0;
													$sum = 0;

													$resulta=mysqli_query($con,"select * from vendor_registration WHERE id='$pid' ORDER BY id DESC");
													while($contacta=mysqli_fetch_array($resulta))
													{
														$stid=explode(",",$contacta['stid']);
														foreach($stid as $myid)
														{
														$result=mysqli_query($con,"select * from statement WHERE id='$myid' AND status_hd='0'");
														$contact=mysqli_fetch_array($result);
														$no=$no+1;
														$balance=$contact['balance'];
														$dep_amt=$contact['dep_amt'];
												?>
											<tr>
												<td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $contact['id']; ?>" style="position: relative;left: 0;opacity: 1;"/>
												<input type="hidden" name="sluserall" value="<?php echo $_GET['id']; ?>"/></td>
												<td class="center"><?php echo $no;?></td>
												<td class="center"><?php echo $contact['value_date'];?></td>
												<td class="center"><?php echo $contact['transaction_date'];?></td>
												<td class="center"><?php echo $contact['cheque_no'];?></td>
												<td class="center"><?php echo $contact['remark'];?></td>
												<td class="center"><?php echo $contact['with_amt'];?></td>
												<td class="center"><?php echo $contact['dep_amt'];?></td>
												<td class="center"><?php echo $contact['balance'];?></td>
											</tr>
											<?php
											
													}
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function showfield(name){
  if(name=='expense')document.getElementById('remark').innerHTML='<input type="text" name="st_for_rm" class="form-control"  placeholder="Enter Remark" />';
  else document.getElementById('remark').innerHTML='';
}
</script>
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