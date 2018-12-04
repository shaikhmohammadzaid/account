<style>
span.hide-menu {
    FONT-SIZE: 14px;
    color: black;
}
.sidebar-nav>ul>li>a i {
    width: 27px;
    font-size: 16px;
    display: inline-block;
    vertical-align: middle;
    color: #99abb4;
}
</style>

			 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                   <a href="index.php"> <div class="profile-img"> <img src="assets/images/users/<?php echo $rowad['img']; ?>" alt="user" />  </a>
                        <!-- this is blinking heartbit-->
                        
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?php
                        
                        if($company['username']=='')
                        {
                        echo $rowad['username'];
                        }
                         else
                        {
                        echo $company['username'];
                        }
                        ?></h5>
                       
                        <a href="logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                       
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
        
                <nav class="sidebar-nav">
                    
                 <!--   this Sidebaar For Company only -->
                     <?php if($company['c_id'] != ''){ ?>
                     <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        
						<li> <a class=" waves-effect waves-dark" href="index" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">DASHBOARD </span></a>
                        </li>
                        
                        	<li> <a class=" waves-effect waves-dark" href="task_dash.php" aria-expanded="false"><i class="fa fa-spinner" style="color:#e83e8c;"></i><span class="hide-menu">TASK DASHBOARD </span></a>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">TRADER DETAILS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="com_vendor_registration">New Registration </a></li>
								 <li><a href="com_vendor_list">Vendor List </a></li>
								 <li><a href="com_product">Create Invoice </a></li>
                                  <li><a href="com_employee_list">Employee List </a></li>
                                  <li><a href="com_emp_salary">Employee Salary </a></li>
                                      <li><a href="com_google_api.php">Petrol Expence</a></li>
                                                 
								</ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">CASH VOUCHER</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_cash_voucher1.php">Make Transaction</a></li>
                               
                                <li><a href="com_cash_trans1.php">Cash Transaction</a></li> 
                                
                                <li><a href="com_cheque_list.php">Bank Transaction</a></li> 
                                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                       
                        
                        
                        
                        
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">PAST EMPLOYEES</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="com_tem_emp">Employees List </a></li>
								 <li><a href="com_tem_cash_voucher"> Transactions </a></li>
								 <li><a href="com_tem_cash_trans">Cash Transaction </a></li>
                                  <li><a href="com_tem_cheque_trans">Cheque Transaction </a></li>
                                  
                                                 
								</ul>
                        </li>
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file"></i><span class="hide-menu">REPORT</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="action_outstading_check.php">OutStanding Cheque</a></li>
                                      <li><a href="clearcheck.php">Clear Cheque</a></li>
                                       <li><a href="action_pur">Purchase Report </a></li> 
                                        <li><a href="com_gstrefund.php">Gst Amount Report</a></li>   
                                         <li><a href="maketransaction_report.php">Make Transaction Report</a></li>
                               
                                <li><a href="cash_transation.php">Cash Transaction Report</a></li> 
                                
                                <li><a href="cheque_trans_report.php">Bank Transaction Report</a></li> 
							</ul>
                        </li>
                        
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calculator"></i><span class="hide-menu">ACCOUNT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_bank">Add Bank </a></li>
                                <li><a href="com_bank_list">Bank List </a></li>
                                 <li><a href="com_upload">Upload Statement </a></li>
							<!--	<?php
								$result=mysqli_query($con,"select DISTINCT bank_name from bank ORDER BY id DESC");
								while($contact=mysqli_fetch_array($result))
								{
								?>
								<li><a href="bank_list.php?id=<?php echo $contact['bank_name'];?>" ><?php echo $contact['bank_name'];?></a></li>
								<?php
								}
								?>-->
								<li><a href="com_action_report">Report</a></li>
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">CATEGORY </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="main_ct.php">Main Category </a></li>
                                <li><a href="sub_ct.php">Sub Category </a></li>                
                                <li><a href="category_list.php">All Category List</a></li>  
                                
								</ul>
                        </li>
					
                        
                        
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">TRANSACTIONS </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_cash_voucher.php">Make Transaction</a></li>
                                <li><a href="com_cheque_trans.php">Cheque Transaction</a></li>
                                <li><a href="com_cash_trans.php">Cash Transaction</a></li>                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">RECRUITMENT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_interview.php">New Candidate</a> </a></li>
                                <li><a href="com_interview_list">Candidate List</a></li>  
                                <li><a href="com_upload_file">Upload Csv</a></li>  
                                     
								</ul>
                        </li>
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">ATTANDANCE </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_user_list">Make attandance</a> </a></li>
                                <li><a href="com_atte_report">Attandance Report</a></a></li>  
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-tasks"></i><span class="hide-menu">TASK MANAGEMENT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="task">Add Task</a> </a></li>
                                <li><a href="taskreg">Assign Task</a></a></li>  
                                  <li><a href="all_task">All Task List</a></li> 
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                        
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-phone-square"></i><span class="hide-menu">PHONEBOOK</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_phonebook">Add Phonebook</a> </a></li>
                                <li><a href="com_phonebook_list">Your Phonebook</a></a></li>  
                                  
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-meetup"></i><span class="hide-menu">MEETING INFO</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_meeting.php">Add Meeting</a> </a></li>
                                <li><a href="com_meeting_list.php">Meeting List</a></a></li>  
                                  
                               
                                            
								</ul>
                        </li>
                        
                        
                         
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Document Managment</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="doc_dash.php">Document Dashboard</a></li>
                                 <li><a href="addd_company.php">All File</a></li>
                                  <li><a href="file_category.php">File Category</a></li>
								 <li><a href="file_list">File List</a></li>
							
                               
                                  
                                                 
								</ul>
                        </li>
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">MANAGE TENDER</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="tander_dash.php">Tender Dashboard</a></li>
                                 <li><a href="tander.php">All Tender</a></li>
								 <li><a href="tander_list">Tender List</a></li>
							
                               
                                  
                                                 
								</ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">COMPOSE LETTER</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app_letter.php">Letter</a></li>
							</ul>
                        </li>
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Sales Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="sales_module.php">Sales</a></li>
                               
                              
                                 <li><a href="pdf_make1.php">Assign Client</a></li> 
                                <li><a href="latter_send.php">Send Proposal</a></li> 
                                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">SURVEY</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="survey.php">Survey inquiry</a></li>
                                 <li><a href="survey_list.php">Survey List</a></li>
								 
							
                               
                                  
                                                 
								</ul>
                        </li>
                        
                        
                    </ul>
                    <?php } ?>
                  <!--  End OF Company Side Baar-->
                  
                <!--  start Admin Side Baar-->
                    <?php if($rowad['id'] !== '' && $rowad['user_role'] == 'admin'){ ?>
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        
                        
                   
						<li> <a class=" waves-effect waves-dark" href="index" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">DASHBOARD</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="company" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">CREATE COMPANY</span></a>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">TRADER DETAILS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="vendor_registration">New Registration </a></li>
								 <li><a href="vendor_list">Vendor List </a></li>
								 <li><a href="product">Create Invoice </a></li>
                                  <li><a href="employee_list">Employee List </a></li>
                                  <li><a href="emp_salary">Employee Salary </a></li>
                                  <li><a href="google_api.php">Petrol Expence</a></li>
                                                 
								</ul>
                        </li>
                       
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">CASH VOUCHER</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="cash_voucher1.php">Make Transaction</a></li>
                               
                                <li><a href="cash_trans1.php">Cash Transaction</a></li> 
                                
                              <li><a href="cheque_tranc.php">Cheque Transaction </a></li>        
								</ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">PAST EMPLOYEES</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="tem_emp">Employees List </a></li>
								 <li><a href="tem_company_list"> Transactions </a></li>
								 <li><a href="tem_cash_trans">Cash Transaction </a></li>
                                  <li><a href="tem_cheque_trans">Cheque Transaction </a></li>
                                  
                                                 
								</ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calculator"></i><span class="hide-menu">ACCOUNT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="bank">Add Bank </a></li>
                                <li><a href="bank_list">Bank List </a></li>
							<!--	<?php
								$result=mysqli_query($con,"select DISTINCT bank_name from bank ORDER BY id DESC");
								while($contact=mysqli_fetch_array($result))
								{
								?>
								<li><a href="bank_list.php?id=<?php echo $contact['bank_name'];?>" ><?php echo $contact['bank_name'];?></a></li>
								<?php
								}
								?>-->
									<li><a href="action_report">Report</a></li>
									  <li><a href="upload">Upload Statement </a></li>
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">CATEGORY </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="main_ct.php">Main Category </a></li>
                                <li><a href="sub_ct.php">Sub Category </a></li>                
                                <li><a href="category_list.php">All Category List</a></li>                
								</ul>
                        </li>
					
                        
                        
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">TRANSACTIONS </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="company_list.php">Make Transaction</a></li>
                                <li><a href="cheque_trans.php">Cheque Transaction</a></li>
                                <li><a href="cash_trans.php">Cash Transaction</a></li>                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">RECRUITMENT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="interview.php">New Candidate</a> </a></li>
                                <li><a href="interview_list">Candidate List</a></li>  
                                <li><a href="upload_file">Upload Csv File</a></li>  
                                   <li><a href="info_cad">Candidate List</a></li>                  
								</ul>
                        </li>
                        
                        	 <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">DESIGNATION </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="emp_main.php">Main Designation </a></li>
                                <!--<li><a href="emp_cat.php">Sub Designation </a></li>     -->           
                                         
								</ul>
                        </li>
                         
                         
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">ATTANDANCE </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="user_list">Make attandance</a> </a></li>
                                <li><a href="atte_report">Attandance Report</a></a></li>  
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                      
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-phone-square"></i><span class="hide-menu">PHONEBOOK</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="phonebook">Add Phonebook</a> </a></li>
                                <li><a href="phonebook_list">Your Phonebook</a></a></li>  
                                  
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-meetup"></i><span class="hide-menu">MEETING INFO</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="meeting">Add Meeting</a> </a></li>
                                <li><a href="meeting_list.php">Meeting List</a></a></li>  
                                  
                                         
								</ul>
                        </li>
                        
                        
                        
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">COMPOSE LETTER</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app_letter.php">Letter</a></li>
							</ul>
                        </li>
                        
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Purchase</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="purchase.php">Purchase inquiry</a></li>
                                 <li><a href="purchase_list.php">Approve Purchase</a></li>
								 
							
                               
                                  
                                                 
								</ul>
                        </li>
                        
                        	 <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">Role Authority</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="main_list.php">Manage Role</a></li>
                                <li><a href="emp_main.php">Add Role</a></li>                
                                         
								</ul>
                        </li>
                        
                    </ul>
                      <?php } ?>
                  <!--    End Of Admin Side Baar-->
                  
                  
               <!--   Strat Employee Side Baar -->
                       <?php if($rowad['id'] !== '' && $rowad['user_role'] !== 'admin' && $company['c_id'] == ''){ ?>
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        
						<li> <a class=" waves-effect waves-dark" href="index" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">DASHBOARD </span></a>
                        </li>
                        
                        	<li> <a class=" waves-effect waves-dark" href="emp_task_dash.php" aria-expanded="false"><i class="fa fa-spinner" style="color:#e83e8c;"></i><span class="hide-menu">TASK DASHBOARD </span></a>
                        </li>
                        
                    <?php 
                    
                    $role=$rowad['user_role'];
                    $result1=mysqli_query($con,"select * from emp_main where id='$role'");
                        $contact1=mysqli_fetch_array($result1);
                       ?>
                        
                         <?php if($contact1['traders_detail'] == '1'){ ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">TRADER DETAILS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="com_vendor_registration">New Registration </a></li>
								 <li><a href="com_vendor_list">Vendor List </a></li>
								 <li><a href="com_product">Create Invoice </a></li>
                                  <li><a href="com_employee_list">Employee List </a></li>
                                  <li><a href="com_emp_salary">Employee Salary </a></li>
                                      <li><a href="com_google_api.php">Petrol Expence</a></li>
                                                 
								</ul>
                        </li>
                        <?php } ?>
                         <?php if($contact1['cash_vou'] == '1'){ ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">CASH VOUCHER</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_cash_voucher1.php">Make Transaction</a></li>
                               
                                <li><a href="com_cash_trans1.php">Cash Transaction</a></li> 
                                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                        <?php } ?>
                         <?php if($contact1['past_emp'] == '1'){ ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">PAST EMPLOYEES</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="com_tem_emp">Employees List </a></li>
								 <li><a href="com_tem_cash_voucher"> Transactions </a></li>
								 <li><a href="com_tem_cash_trans">Cash Transaction </a></li>
                                  <li><a href="com_tem_cheque_trans">Cheque Transaction </a></li>
                                  
                                                 
								</ul>
                        </li>
                        <?php } ?>
                        <?php if($contact1['account'] == '1'){ ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calculator"></i><span class="hide-menu">ACCOUNT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_bank">Add Bank </a></li>
                                <li><a href="com_bank_list">Bank List </a></li>
                                 <li><a href="com_upload">Upload Statement </a></li>
							<!--	<?php
								$result=mysqli_query($con,"select DISTINCT bank_name from bank ORDER BY id DESC");
								while($contact=mysqli_fetch_array($result))
								{
								?>
								<li><a href="bank_list.php?id=<?php echo $contact['bank_name'];?>" ><?php echo $contact['bank_name'];?></a></li>
								<?php
								}
								?>-->
								<li><a href="com_action_report">Report</a></li>
                            </ul>
                        </li>
                            <?php } ?>
                               <?php if($contact1['acc_category'] == '1'){ ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">CATEGORY </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="main_ct.php">Main Category </a></li>
                                <li><a href="sub_ct.php">Sub Category </a></li>                
                                <li><a href="category_list.php">All Category List</a></li>                
								</ul>
                        </li>
					   <?php } ?>
                               <?php if($contact1['tranjection'] == '1'){ ?>
                        
                        
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">TRANSACTIONS </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_cash_voucher.php">Make Transaction</a></li>
                                <li><a href="com_cheque_trans.php">Cheque Transaction</a></li>
                                <li><a href="com_cash_trans.php">Cash Transaction</a></li>                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                         <?php } ?>
                          <?php if($contact1['requirment'] == '1'){ ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">RECRUITMENT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_interview.php">New Candidate</a> </a></li>
                                <li><a href="com_interview_list">Candidate List</a></li>  
                                <li><a href="com_upload_file">Upload Csv</a></li>  
                                     
								</ul>
                        </li>
                           <?php } ?>
                               <?php if($contact1['attendence'] == '1'){ ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">ATTANDANCE </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_user_list">Make attandance</a> </a></li>
                                <li><a href="com_atte_report">Attandance Report</a></a></li>  
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                           <?php } ?>
                               <?php if($contact1['document'] == '1'){ ?>
                               
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Document Managment</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="emp_doc_dash.php">Document Dashbored</a></li>
                                 <li><a href="emp_addd_company.php">All File</a></li>
								 <li><a href="emp_file_list">File List</a></li>
							
                               
                                  
                                                 
								</ul>
                        </li>
                        
                             <?php } ?>
                               <?php if($contact1['tender'] == '1'){ ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">MANAGE TENDER </span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="emp_tander_dash">Tender Dashboard</a></li>
                                 <li><a href="emp_tander">All Tender</a></li>
								 <li><a href="emp_tander_list">Tender List</a></li>
							
                               
                                  
                                                 
								</ul>
                        </li>
                        
                        <?php } ?>
                          <?php if($contact1['phon_book'] == '1'){ ?>
                          
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-phone-square"></i><span class="hide-menu">PHONEBOOK</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_phonebook">Add Phonebook</a> </a></li>
                                <li><a href="com_phonebook_list">Your Phonebook</a></a></li>  
                                  
                                 <!--<li><a href="selected_list">Selected Candidate List</a></li>  
                                  <li><a href="rejected_list">Rejected Candidate List</a></li> -->            
								</ul>
                        </li>
                           <?php } ?>
                               <?php if($contact1['meeting'] == '1'){ ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-meetup"></i><span class="hide-menu">MEETING INFO</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="com_meeting.php">Add Meeting</a> </a></li>
                                <li><a href="com_meeting_list.php">Meeting List</a></a></li>  
                                  
                               
                                            
								</ul>
                        </li>
                           <?php } ?>
                               <?php if($contact1['sales_module'] == '1'){ ?>
                           
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Sales Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="sales_module.php">Sales</a></li>
                               
                              
                                 <li><a href="pdf_make1.php">Assign Client</a></li> 
                                <li><a href="latter_send.php">Send Proposal</a></li> 
                                
                              <!--  <li><a href="category_list.php">All Category List</a></li>   -->             
								</ul>
                        </li>
                             <?php } ?>
                               <?php if($contact1['pur_module'] == '1'){ ?>
                            
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Purchase</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="purchase.php">Purchase inquiry</a></li>
                                 <li><a href="purchase_list.php">Approve Purchase</a></li>
								 
							
                               
                                  
                                                 
								</ul>
                        </li>
                           <?php } ?>
                            <?php if($contact1['survey'] == '1'){ ?>
                            
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">SURVEY</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="survey.php">Survey inquiry</a></li>
                                 <li><a href="survey_list.php">Survey List</a></li>
								 
							
                               
                                  
                                                 
								</ul>
                        </li>
                           <?php } ?>
                              
                                <?php if($contact1['otherexpn'] == '1'){ ?>
                            
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-inr"></i><span class="hide-menu">Other Expenses</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="com_other_exp.php">Other Expenses</a></li>
               
                                                 
							</ul>
                        </li>
                           <?php } ?>
                              
                              
                        <?php if($contact1['cheque'] == '1'){ ?>
                            
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-inr"></i><span class="hide-menu">REPORT</span></a>
                            <ul aria-expanded="false" class="collapse">
                                	 <li><a href="action_outstading_check.php">OutStanding Cheque</a></li>
                                      <li><a href="clearcheck.php">Clear Cheque</a></li>
                                       <li><a href="action_pur">Purchase Report </a></li>
                                        <li><a href="com_gstrefund.php">Gst Amount Report </a></li>   
                                         <li><a href="maketransaction_report.php">Make Transaction Report</a></li>
                               
                                <li><a href="cash_transation.php">Cash Transaction Report</a></li> 
                                
                                <li><a href="cheque_trans_report.php">Bank Transaction Report</a></li> 
							</ul>
                        </li>
                           <?php } ?>
                       
                                 
                              
                              
                        
                          
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-tasks"></i><span class="hide-menu">TASK MANAGEMENT </span></a>
                            <ul aria-expanded="false" class="collapse">
                                  
                                 <li><a href="emp_task">My Tasks</a></li>  
                                <!--  <li><a href="rejected_list">Rejected Candidate List</a></li>  -->         
								</ul>
                        </li>
                        
                        
                    </ul>
                      <?php } ?>
                     <!-- End Employee Side Baar -->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->