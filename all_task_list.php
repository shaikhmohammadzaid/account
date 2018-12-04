<?php include('header.php'); ?>
<?php include('sidebar.php'); 
$id=$_SESSION['id'];
  $c_name = $_SESSION['c_id'];
?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">All Task List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Task List</li>
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
    <!-- /////////////////////////////////////////////////////////// -->
            <?php   
            $status=0;
            $resultab=mysqli_query($con,"select * from task where `user` = '".$_SESSION["id"]."' AND `status` = '".$status."'");
    
              $rowCountax = mysqli_num_rows($resultab);
    
    ?>        
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #ff0000" >
                <div class="panel-title">

                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Today Task (<?php echo $rowCountax; ?>) </h6>
                </div>
              </div>
              <?php  
              if($rowCountax > 0){
             while($rowax = mysqli_fetch_array($resultab)){?>
             
              <div class="panel-body" style=" margin-top: 15px; border: 1px solid;padding: 10px; box-shadow: 5px 10px #888888;">
                <h4><b><?php echo $rowax['work']; ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5">
                  <label class="label label-inverse"><?php echo $rowax['date']; ?></label>
                   
                  
                  <div>
                    <label class="label label-inverse">Start <?php echo $rowax['time']; ?> - </label>
                  </div>
                  
                </div>
              </div>
            <?php } 
          }         ?>
            </div>

<!-- /////////////////////////////////////////////////////////// -->

             <?php   
            $status1=1;
            $resultab1=mysqli_query($con,"select * from task where `user` = '".$_SESSION["id"]."' AND `status` = '".$status1."'");
    
              $rowCountax1 = mysqli_num_rows($resultab1);
    
          ?>      
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #999F88" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Active Task (<?php echo $rowCountax1; ?>)</h6>
                </div>
              </div>
              <?php  
              if($rowCountax1 > 0){
             while($rowax1 = mysqli_fetch_array($resultab1)){?>
             
              <div class="panel-body" style=" margin-top: 15px; border: 1px solid;padding: 10px; box-shadow: 5px 10px #888888;">
                <h4><b><?php echo $rowax1['work']; ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5">
                  <label class="label label-inverse"><?php echo $rowax1['date']; ?></label>
                   
                  
                  <div>
                    <label class="label label-inverse">Start <?php echo $rowax1['time']; ?> - </label>
                  </div>
                  
                </div>
              </div>
            <?php } 
          }         ?>
            </div>

<!-- /////////////////////////////////////////////////////////// -->
             <?php   
            $status2=2;
            $resultab2=mysqli_query($con,"select * from task where `user` = '".$_SESSION["id"]."' AND `status` = '".$status2."'");
    
              $rowCountax2 = mysqli_num_rows($resultab2);
    
          ?>      
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #0099CC" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Pandding (<?php echo $rowCountax2; ?>)</h6>
                </div>
              </div>
              <?php  
              if($rowCountax2 > 0){
             while($rowax2 = mysqli_fetch_array($resultab2)){?>
             
              <div class="panel-body" style=" margin-top: 15px; border: 1px solid;padding: 10px; box-shadow: 5px 10px #888888;">
                <h4><b><?php echo $rowax2['work']; ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5">
                  <label class="label label-inverse"><?php echo $rowax2['date']; ?></label>
                   
                  
                  <div>
                    <label class="label label-inverse">Start <?php echo $rowax2['time']; ?> - </label>
                  </div>
                  
                </div>
              </div>
            <?php } 
          }         ?>
            </div>
<!-- /////////////////////////////////////////////////////////// --> 
 <?php   
            $status3=3;
            $resultab3=mysqli_query($con,"select * from task where `user` = '".$_SESSION["id"]."' AND `status` = '".$status3."'");
    
              $rowCountax3 = mysqli_num_rows($resultab3);
    
          ?>      
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #0099CC" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Completed (<?php echo $rowCountax3; ?>)</h6>
                </div>
              </div>
              <?php  
              if($rowCountax3 > 0){
             while($rowax3 = mysqli_fetch_array($resultab3)){?>
             
              <div class="panel-body" style=" margin-top: 15px; border: 1px solid;padding: 10px; box-shadow: 5px 10px #888888;">
                <h4><b><?php echo $rowax3['work']; ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5">
                  <label class="label label-inverse"><?php echo $rowax3['date']; ?></label>
                   
                  
                  <div>
                    <label class="label label-inverse">Start <?php echo $rowax3['time']; ?> - </label>
                  </div>
                  
                </div>
              </div>
            <?php } 
          }         ?>
            </div>          
        
                 
                </div>    
            </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
             
                
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        <?php include('footer.php'); ?>