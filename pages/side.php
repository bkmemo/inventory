
 
       <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<?php
		$query0="select * from profile";
		$query=mysqli_query($con,$query0);
		while($a=mysqli_fetch_assoc($query)){
			$company_logo=$a['company_logo'];
		}?>
                <a class="navbar-brand"  align="right" href="index.php"><font size="+2" color="black"><img src="../images/<?php echo $company_logo ?>" height="50"/></font></a>
                
            </div><br>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
			<li><a href="#"><i class=""></i>Logged in as <strong><?php echo "&nbsp;&nbsp;".$_SESSION['username']; ?></strong></a></li>
            	<li class="dropdown">
				
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class=""></i>Logged in as</a></li>
                        <li><a href="#"><i class="fa fa-user fa-fw"></i></a></li>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>-->
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if($_SESSION['username'] == 'admin'){ ?>
                        <li><a href="index.php"><i class="fa  fa-home fa-fw"></i> Dashboard</a></li>
						<li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						<li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                        <li><a href="add_brand_phone.php"><i class="fa fa-book fa-fw"></i> Manage Category</a></li>
                        <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Manage Models</a></li>
                        <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                        <li><a href="add_topup_phones.php"><i class="fa fa-phone fa-fw"></i> Top-Up Phones</a></li>
						<li><a href="incure_expenses.php"><i class="fa fa-money fa-fw"></i> Incured Expenses</a></li>
                        
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_staff.php"><i class="fa fa-user fa-fw"></i> Manage Users</a></li>
							     <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Manage Suppliers</a></li>
						         <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Manage Customers</a></li>
						        <!-- <li><a href="customer_contacts.php"><i class="fa fa-user fa-fw"></i> Customw Contacts</a></li> -->
						         
                            </ul>
                        </li>
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li><a href="reports.php"><i class="fa fa-bar-chart-o fa-fw"></i> Sales Reports</a></li>    
                            <li><a href="purchase_report.php"><i class="fa fa-bar-chart-o fa-fw"></i> Purchases Reports</a></li>
                            <li><a href="expenses_history.php"><i class="fa fa-bar-chart-o fa-fw"></i> Expenses Reports</a></li>
                            <li><a href="profit_loss_report.php"><i class="fa fa-book fa-fw"></i> Proft & Loss Report</a></li>
							<li><a href="stock_take_report.php"><i class="fa fa-money fa-fw"></i> Stock Take Report</a></li>
                            <li><a href="stock_value.php"><i class="fa fa-bar-chart-o fa-fw"></i> Stock Value</a></li>
                      
                            </ul>
                        </li>
						<li><a href="edit_profile.php"><i class="fa fa-money fa-fw"></i> Business Profile</a></li>
						<li><a href="#"><i class="fa fa-money fa-fw"></i> Delete Sales Details</a></li>
						<li><a href="upload_receipts.php"><i class="fa fa-money fa-fw"></i> Receipts</a></li>
						<li><a href="backup.php" class="btn btn-success"><i class="fa fa-bar-chart-o fa-fw"></i> Backup Database</a></li>
						<li><a href="send_sms.php"><i class="fa fa-money fa-fw"></i> Bulky SMS</a></li>
						
						
						
						<?php } else if($_SESSION['username'] == 'ibrahim'){ ?>
						
						<li><a href="index.php"><i class="fa  fa-home fa-fw"></i> Dashboard</a></li>
						<li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						<li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                        <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Manage Models</a></li>
                        <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                        <li><a href="add_income.php"><i class="fa fa-money fa-fw"></i> Income Earned</a></li>
						<li><a href="incure_expenses.php"><i class="fa fa-money fa-fw"></i> Incured Expenses</a></li>
                        
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_staff.php"><i class="fa fa-user fa-fw"></i> Manage Users</a></li>
							     <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Manage Suppliers</a></li>
						         <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Manage Customers</a></li>
						         <li><a href="customer_contacts.php"><i class="fa fa-user fa-fw"></i> Cust Contacts</a></li>
						         
                            </ul>
                        </li>
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li><a href="reports.php"><i class="fa fa-bar-chart-o fa-fw"></i> Sales Reports</a></li>    
                            <li><a href="purchase_report.php"><i class="fa fa-bar-chart-o fa-fw"></i> Purchases Reports</a></li>
                            <li><a href="expenses_history.php"><i class="fa fa-bar-chart-o fa-fw"></i> Expenses Reports</a></li>
                            <li><a href="profit_loss_report.php"><i class="fa fa-book fa-fw"></i> Proft & Loss Report</a></li>
							<li><a href="stock_take_report.php"><i class="fa fa-money fa-fw"></i> Stock Take Report</a></li>
                            <li><a href="system_report.php"><i class="fa fa-bar-chart-o fa-fw"></i> User Activities</a></li>
                            </ul>
                        </li>
						<li><a href="edit_profile.php"><i class="fa fa-money fa-fw"></i> Business Profile</a></li>
						<li><a href="#"><i class="fa fa-money fa-fw"></i> Delete Sales Details</a></li>
						<li><a href="upload_receipts.php"><i class="fa fa-money fa-fw"></i> Receipts</a></li>
						<li><a href="backup.php" class="btn btn-success"><i class="fa fa-bar-chart-o fa-fw"></i> Backup Database</a></li>
						<li><a href="send_sms.php"><i class="fa fa-money fa-fw"></i> Bulky SMS</a></li>
						
						<?php } else if($_SESSION['username'] == 'thirdadmin'){ ?>
						<li><a href="index.php"><i class="fa  fa-home fa-fw"></i> Dashboard</a></li>
						<li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						<li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                        <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Manage Models</a></li>
                        <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                        <li><a href="add_income.php"><i class="fa fa-money fa-fw"></i> Income Earned</a></li>
						<li><a href="incure_expenses.php"><i class="fa fa-money fa-fw"></i> Incured Expenses</a></li>
                        
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_staff.php"><i class="fa fa-user fa-fw"></i> Manage Users</a></li>
							     <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Manage Suppliers</a></li>
						         <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Manage Customers</a></li>
						         <li><a href="customer_contacts.php"><i class="fa fa-user fa-fw"></i> Cust Contacts</a></li>
						         
                            </ul>
                        </li>
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li><a href="reports.php"><i class="fa fa-bar-chart-o fa-fw"></i> Sales Reports</a></li>    
                            <li><a href="purchase_report.php"><i class="fa fa-bar-chart-o fa-fw"></i> Purchases Reports</a></li>
                            <li><a href="expenses_history.php"><i class="fa fa-bar-chart-o fa-fw"></i> Expenses Reports</a></li>
                            <li><a href="profit_loss_report.php"><i class="fa fa-book fa-fw"></i> Proft & Loss Report</a></li>
							<li><a href="stock_take_report.php"><i class="fa fa-money fa-fw"></i> Stock Take Report</a></li>
                            <li><a href="system_report.php"><i class="fa fa-bar-chart-o fa-fw"></i> User Activities</a></li>
                            </ul>
                        </li>
						<li><a href="edit_profile.php"><i class="fa fa-money fa-fw"></i> Business Profile</a></li>
						<li><a href="#"><i class="fa fa-money fa-fw"></i> Delete Sales Details</a></li>
						<li><a href="upload_receipts.php"><i class="fa fa-money fa-fw"></i> Receipts</a></li>
						<li><a href="backup.php" class="btn btn-success"><i class="fa fa-bar-chart-o fa-fw"></i> Backup Database</a></li>
						<li><a href="send_sms.php"><i class="fa fa-money fa-fw"></i> Bulky SMS</a></li>
						
						
                        	<?php } else if($_SESSION['username'] == 'Linda'){ ?>
                         <li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						 <li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                         <li><a href="add_expenses.php"><i class="fa fa-bar-chart-o fa-fw"></i> Company Expenses</a></li>
                         <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                         <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Add Items</a></li>
								 <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Add Suppliers</a></li>
								 <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Add Customers</a></li>
								 <li><a href="edit_staff.php?id=2"><i class="fa fa-user fa-fw"></i> Edit User</a></li>

                            </ul>
                        </li>
						
						<?php } else if($_SESSION['username'] == 'Miriam'){ ?>
                         <li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						 <li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                         <li><a href="add_expenses.php"><i class="fa fa-bar-chart-o fa-fw"></i> Company Expenses</a></li>
                         <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                         <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Add Items</a></li>
								 <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Add Suppliers</a></li>
								 <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Add Customers</a></li>
								 <li><a href="edit_staff.php?id=5"><i class="fa fa-user fa-fw"></i> Edit User</a></li>
                            </ul>
                        </li>
						<?php } else if($_SESSION['username'] == 'Sophia'){ ?>
                         <li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						 <li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                         <li><a href="add_expenses.php"><i class="fa fa-bar-chart-o fa-fw"></i> Company Expenses</a></li>
                         <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                         <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Add Items</a></li>
								 <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Add Suppliers</a></li>
								 <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Add Customers</a></li>
								 <li><a href="edit_staff.php?id=4"><i class="fa fa-user fa-fw"></i> Edit User</a></li>
                            </ul>
                        </li>
						<?php } else if($_SESSION['username'] == 'Systemadmin'){ ?>
                         <li><a href="select_supplier.php"><i class="fa fa-money fa-fw"></i> Purchases</a></li>
						 <li><a href="select_customer.php"><i class="fa fa-money fa-fw"></i> Sales</a></li>
                         <li><a href="add_expenses.php"><i class="fa fa-bar-chart-o fa-fw"></i> Company Expenses</a></li>
                         <li><a href="add_new_phone.php"><i class="fa fa-phone fa-fw"></i> Manage Phones</a></li>
                         <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								 <li><a href="add_item.php"><i class="fa fa-book fa-fw"></i> Add Items</a></li>
								 <li><a href="add_supplier.php"><i class="fa fa-user fa-fw"></i> Add Suppliers</a></li>
								 <li><a href="add_customer.php"><i class="fa fa-user fa-fw"></i> Add Customers</a></li>
								 <li><a href="edit_staff.php?id=3"><i class="fa fa-user fa-fw"></i> Edit User</a></li>
                            </ul>
                        </li>
						<?php }else{ ?>
                         <li><a href="view_receipts.php"><i class="fa fa-money fa-fw"></i> Receipts</a></li>
					<?php }?>
                    </ul>
                            <!-- /.nav-second-level -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->           				
             
				
					
					</nav>	