<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
?>
  <?php   include ("../pages/header.php");?>

<body>

    <div id="wrapper">

  <?php   include ("../pages/side.php");?>       

        <div id="page-wrapper">
                    
<div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <h4>System Report</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>							
            <div class="row">
				<div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
											<?php
												include_once "connect.php"; 
														$operation_date=date('Y-m-d');
														$query0="select * from sales inner join sales_details on sales.SALES_ID=sales_details.SALES_ID where sales.DATE_OF_SALE ='$operation_date'";
														$query_run0=mysqli_query($con, $query0)or die(mysqli_error($con));
														$total_retails=0;
														while ($row = mysqli_fetch_array($query_run0)) {
																$qty_sold = $row["QUANTITY_SOLD"]; 	
																$selling_price = $row["SELLING_PRICE"]; 	
																$total_Sales = $qty_sold * $selling_price;
																$total_retails =$total_retails+ $total_Sales;             
														}
														 
											?>								
								<div><h4>Total Sales <br><?php echo "$operation_date" ?></h4></div>
								<div class="large"><font size="+2"><?php echo number_format($total_retails); ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="reports.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>			
                <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
								<?php
									include_once "connect.php"; 
											$operation_date=date('Y-m-d');
											$query16="select * from purchased_items inner join purchased_items_details on purchased_items. 	PURCHASE_ID=purchased_items_details.PURCHASE_ID where purchased_items.DATE_OF_PURCHASE ='$operation_date'";
											$query_run19=mysqli_query($con, $query16)or die(mysqli_error($con));
											$total_purchases=0;
											while ($row = mysqli_fetch_array($query_run19)) {
													$qty_purchased = $row["PURCHASED_QUANTITY"]; 	
													$buying_price = $row["BUYING_PRICE"]; 	
													$total_purchase = $qty_purchased * $buying_price;
													$total_purchases =$total_purchases+ $total_purchase;             
											}
											 
								?>								
								<div><h4>Total Purchases <br><?php echo "$operation_date" ?></h4></div>
								<div class="large"><font size="+2"><?php echo number_format($total_purchases); ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="purchase_report.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>			
			    <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
								<?php
									include_once "connect.php"; 
											$operation_date=date('Y-m-d');
											$query56="select * from income  where  income_date ='$operation_date'";
											$query_run19=mysqli_query($con, $query56)or die(mysqli_error($con));
											$total_earned_income=0;
											while ($row = mysqli_fetch_array($query_run19)) {
													$AMOUNT_EARNED = $row["amount_earned"]; 	
													$total_earned_income =$total_earned_income+ $AMOUNT_EARNED;            
											}
											 
								?>								
								<div><h4>Total Income <br><?php echo "$operation_date" ?></h4></div>
								<div class="large"><font size="+2"><?php echo number_format($total_earned_income); ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="add_expenses.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>	
                
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
											<?php
												include_once "connect.php"; 
														$operation_date=date('Y-m-d');
														$query56="select * from expenses_incured  where  DATE ='$operation_date'";
														$query_run65=mysqli_query($con, $query56)or die(mysqli_error($con));
														$total_expenditure=0;
														while ($row = mysqli_fetch_array($query_run65)) {
																$amount_spent = $row["AMOUNT_SPENT"]; 	
																$total_expenditure =$total_expenditure+ $amount_spent;             
														}
														 
											?>									
								<div><h4>Total Expenses <?php echo "$operation_date" ?></h4></div>
								<div class="large"><font size="+2"><?php echo number_format($total_expenditure); ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="expenses_history.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>	
                </div><div class="row">	
				
				
				<div class="col-md-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
											<?php
												$daily_statement =($total_retails + $total_earned_income) - ($total_expenditure)
														 
											?>									
								<div><h4>Profit / Loss <br><?php echo "$operation_date" ?></h4></div>
                                    <div class="large"><font size="+2"><?php echo number_format($daily_statement); ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
						<a href="profit_loss_report.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mobile fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from user";
										$query = mysqli_query($con,"select * from item_stock inner join items on item_stock.ITEM_ID=items.ITEM_ID") or die(mysqli_error($con));
										$total_quantity=0;
										while ($row = mysqli_fetch_array($query)) {
										 $quantity=$row["QUANTITY"];   
										 $total_quantity=$total_quantity+$quantity;
										}
									?>		
								<div><h4>Available Stock<br>(Onsale)</h4></div>			
								<div class="large"><font size="+2"><?php echo $total_quantity; ?> </font></div>
								
                                    
                                </div>
                            </div>
                        </div>
						<a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div></div>
					  <div class="col-md-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mobile fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from phones";
										$query_run=mysqli_query($con,$query);
										$rows=mysqli_num_rows($query_run);
									?>							
								<div><h4>Phones<br>(Onsale & Sold):</h4></div>
								<div class="large"><font size="+2"><?php echo $rows; ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
						<a href="add_new_phone.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div></div>
					<div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mobile fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from items";
										$query_run=mysqli_query($con,$query);
										$rows=mysqli_num_rows($query_run);
									?>							
								<div><h4> Model Names</h4></div>
								<div class="large"><font size="+2"><?php echo $rows; ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
						<a href="add_item.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                     </div>	
					</div>					 
                    
					<div class="row">
					<div class="col-md-3">
					    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from brands";
										$query_run=mysqli_query($con,$query);
										$rows55=mysqli_num_rows($query_run);
									?>	
								<div><h4>Brands:</h4></div>	
								<div class="large"><font size="+2"><?php echo $rows55; ?> </font></div>
								
                                    
                                </div>
                            </div>
                        </div>
						<a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                      </div>
                      </div>
					<div class="col-md-3">
					    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from customer";
										$query_run=mysqli_query($con,$query);
										$rows44=mysqli_num_rows($query_run);
									?>	
								<div><h4>Customers:</h4></div>		
								<div class="large"><font size="+2"><?php echo $rows44; ?></font></div>
								
                                    
                                </div>
                            </div>
                        </div>
						<a href="add_customer.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div></div>
					<div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from suppliers";
										$query_run=mysqli_query($con,$query);
										$rows1=mysqli_num_rows($query_run);
									?>		
								<div><h4>Suppliers:</h4></div>			
								<div class="large"><font size="+2"><?php echo $rows1; ?></font></div>
                                    
                                </div>
                            </div>
                        </div>
						<a href="add_supplier.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div></div>
					
					<div class="col-md-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
								<?php
										$query="select * from user";
										$query_run=mysqli_query($con,$query);
										$rows3=mysqli_num_rows($query_run);
									?>		
								<div><h4>Users:</h4></div>
								<div class="large"><font size="+2"><?php echo $rows3; ?></font></div>
								
                                    
                                </div>
                            </div>
                        </div>
						<a href="add_staff.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
						</div>
						</div>
						<div class="row">
                        <div class="hero-unit-table"> 
							 <div class="charts_container">
                                <div class="chart_container">
                                     <div class="alert alert-info">Table Showing The Available Stock</div>  
                                    <?php
											$query = mysqli_query($con,"select * from item_stock inner join items on item_stock.ITEM_ID=items.ITEM_ID") or die(mysqli_error($con));
									?>									
										<div class="table-responsive">  
										 <table id="employee_data5" class="table table-striped table-bordered">  
											  <thead> 											
											       <tr bgcolor="#eee"><td>ITEM NAME</td><td>QUANTITY</td><td>STOCK TAKE</td></tr>
											  </thead>
									<?php		
											while ($row = mysqli_fetch_array($query)) {
												
												
												
												echo '<tr><td><span class="bold">'.$row["ITEM_NAME"].'</span></td>';
												if($row['QUANTITY']<=0){ 
													echo '<td><span class="bold blink">'.$row["QUANTITY"].'</span></td>';
												}
												else{
													echo '<td><span class="bold">'.$row["QUANTITY"].'</span></td>';
												}
												echo '<td><form method="post" action="stock_taking.php">
												<input type="hidden" value='.$row["ITEM_ID"].' name="item_id"/>
												<input type="submit" class="btn btn-danger" value="Stock take" /></form></td></tr>';
											} 
											
										?>
									</table>

                                </div>
                                </div>
								
                            </div>

							</div>	
                        </div>
<br>
                    </div>
                    </div>
<?php   include ("../pages/footer.php");?>

