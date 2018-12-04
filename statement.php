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
                    <h3 class="text-themecolor">Statement List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Bank</li>
                        <li class="breadcrumb-item active">Statement List</li>
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
                                <h4 class="card-title">All Bank List</h4>
                                <div class="table-responsive m-t-40">
									<form name="form" action="assign_vn.php" method="POST" onsubmit="return deleteConfirm();"/>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
										<tr>
										<!--  <td colspan="2" align="center"> 
										<select id="selectError1" name="sluser"  class="form-control" data-rel="chosen">
										<option  value="">Vendor List</option>
										<?php
										$pid=$_GET['pid'];
											$result1=mysqli_query($con,"select * from vendor_registration WHERE status='0'");
											while($contact1=mysqli_fetch_array($result1))
											{
										?>	
										<option  value="<?php echo $contact1['id'] ?>"><?php echo $contact1['v_name']  ?></option>
										<?php
											}
										?>
										</select>
										</td>  -->
										    
										    
									
										<td colspan="2" align="center"> 
										<select id="selectError1" name="sluserall"  class="form-control" data-rel="chosen">
										<option  value="">All Vendor List</option>
										<?php
											$result1=mysqli_query($con,"select * from vendor_registration");
											while($contact1=mysqli_fetch_array($result1))
											{
										?>	
										<option  value="<?php echo $contact1['id'] ?>"><?php echo $contact1['v_name']  ?></option>
										<?php
											}
										?>
										</select>
										</td>
										
										<td colspan="2" align="center"> 
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
											</td>
											<td colspan="2" align="center"> 
											<select id="country" name="main_ct"  class="form-control">
											<option value="">Select Main Category</option>
											
											</select>
											</td>
										
										
										
										
										<td  colspan="2" align="center"> 
										<button type="submit" class="btn btn-space btn-danger active" name="bulk_delete_submitabc" value="multiple Delete"/><i class="fa fa-trash-o"></i>  Assign User </button>
										</td>
										
										
										</tr>
										<tr>
											<th><strong>Select All <input type="checkbox" name="select_all" id="select_all" value="" style="position: relative;left: 0;opacity: 1;"/> </strong> </th>
											<th>No</th>
											<th>Value Date</th>
											<th>Transaction Date</th>
											<th>Cheque No/Reference No</th>
											<th>Remark</th>
											<th>Withdraw Amount</th>
											<th>Deposit Amount</th>
											<th>Balance</th>
										</tr>
										</thead>
										<tbody>
										<?php
												$pid=$_GET['pid'];
												$no=0;
												$result=mysqli_query($con,"select * from statement WHERE bid='$pid' AND status='0' ORDER BY id ASC");
												while($contact=mysqli_fetch_array($result))
												{
												$no=$no+1;
											?>
										<tr>
										    <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $contact['id']; ?>" style="position: relative;left: 0;opacity: 1;"/>
											</td>
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