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
					<div class="panel panel-default">
                        <div class="panel-heading">
                          Dashbord
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
			<div class="row">
			 <div class="col-lg-12">
			         <?php
		   date_default_timezone_set('Africa/Kampala');
	   	   $date1 = date('Y-m-d');
		   $date2 = $date1;
		   $groupby = "Invoice No";
		   if(isset($_POST['search'])){
		   		$date1 = $_POST['search_value1'];
				$date1 = strtotime( $date1 );
				$date1 = date( 'Y-m-d', $date1 );
				
				$date2 = $_POST['search_value2'];
				$date2 = strtotime( $date2 );
				$date2 = date( 'Y-m-d', $date2 );
				
				$groupby = $_POST['groupby'];
		   }
	   ?>
			<form  method="post" action="profit_loss_report.php"  role="form">
           <table width="100%">
           		<tr>
                   <th>From</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="dopDate" class="form-control" name="search_value1" value="<?php echo $date1; ?>"  /></th>
                    <th>To</th>
                    <th>
					<input type="hidden" name="groupby" value="<?php echo $groupby; ?>"  />
					<input style="text-align:center; width:40%;" type="text" id="to_date" class="form-control" name="search_value2" value="<?php echo $date2; ?>"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Generate Report" class="btn btn-primary"></th>
                </tr>
           </table>
           </form>
		   
		   </div><br><br><br><br>
		   </div>
				<div class="row">
				<div class="row">
                <div class="col-lg-12">	
                <div class="col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
							
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
								<?php
									include_once "connect.php"; 
			    $date1 = date('Y-m-d');
				$date2 = $date1;
				$total_purchases=0;
				if(isset($_POST['search'])){
					$date1 = $_POST['search_value1'];
					$date1 = strtotime( $date1 );
					$date1 = date( 'Y-m-d', $date1 );
				
					$date2 = $_POST['search_value2'];
					$date2 = strtotime( $date2 );
					$date2 = date( 'Y-m-d', $date2 );
											$query16="SELECT * 
															FROM purchased_items
															INNER JOIN purchased_items_details 
																ON purchased_items.PURCHASE_ID = purchased_items_details.PURCHASE_ID
															INNER JOIN suppliers 
																ON purchased_items.SUPPLIER_ID = suppliers.supplier_id
															WHERE purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2'
															AND suppliers.supplier_type = 'Local Supplier'";
											$query_run19=mysqli_query($con, $query16)or die(mysqli_error($con));
											
											while ($row = mysqli_fetch_array($query_run19)) {
													$qty_purchased = $row["PURCHASED_QUANTITY"]; 	
													$buying_price = $row["BUYING_PRICE"]; 	
													$total_purchase = $qty_purchased * $buying_price;
													$total_purchases =$total_purchases+ $total_purchase;             
											}
											}
											 
								?>								
								<div><h4>Total Purchases From Local Supplier<br> <?php echo "$date1" ?> to <?php echo "$date2" ?></h4></div>
                                    <div><h3><?php echo number_format($total_purchases) ?></h3></div>
                                    
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
			<div class="col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
							
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php
									include_once "connect.php"; 
			    $date1 = date('Y-m-d');
				$date2 = $date1;
				$total_purchases=0;
				if(isset($_POST['search'])){
					$date1 = $_POST['search_value1'];
					$date1 = strtotime( $date1 );
					$date1 = date( 'Y-m-d', $date1 );
				
					$date2 = $_POST['search_value2'];
					$date2 = strtotime( $date2 );
					$date2 = date( 'Y-m-d', $date2 );
											$query16="SELECT * 
															FROM purchased_items
															INNER JOIN purchased_items_details 
																ON purchased_items.PURCHASE_ID = purchased_items_details.PURCHASE_ID
															INNER JOIN suppliers 
																ON purchased_items.SUPPLIER_ID = suppliers.supplier_id
															WHERE purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2'
															AND suppliers.supplier_type = 'International Supplier'";
											$query_run19=mysqli_query($con, $query16)or die(mysqli_error($con));
											
											while ($row = mysqli_fetch_array($query_run19)) {
													$qty_purchased = $row["PURCHASED_QUANTITY"]; 	
													$buying_price = $row["BUYING_PRICE"]; 	
													$total_purchase = $qty_purchased * $buying_price;
													$total_purchases =$total_purchases+ $total_purchase;             
											}
											}
											 
								?>								
								<div><h4>Total Purchases From International Supplier<br> <?php echo "$date1" ?> to <?php echo "$date2" ?></h4></div>
                                    <div><h3><?php echo number_format($total_purchases) ?></h3></div>
                                    
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
                <div class="col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
											<?php
												include_once "connect.php";
														$date1 = date('Y-m-d');
														$date2 = $date1;
														$total_retails=0;
														if(isset($_POST['search'])){
															$date1 = $_POST['search_value1'];
															$date1 = strtotime( $date1 );
															$date1 = date( 'Y-m-d', $date1 );
														
															$date2 = $_POST['search_value2'];
															$date2 = strtotime( $date2 );
															$date2 = date( 'Y-m-d', $date2 );												
															$query0="select * from sales inner join sales_details on sales.SALES_ID=sales_details.SALES_ID where sales.DATE_OF_SALE BETWEEN '$date1' AND '$date2'";
															$query_run0=mysqli_query($con, $query0)or die(mysqli_error($con));
															
															while ($row = mysqli_fetch_array($query_run0)) {
																	$qty_sold = $row["QUANTITY_SOLD"]; 	
																	$selling_price = $row["SELLING_PRICE"]; 	
																	$total_Sales = $qty_sold * $selling_price;
																	$total_retails =$total_retails+ $total_Sales;             
															}
														}
											?>								
								<div><h4>Total Sales from <br> <?php echo "$date1" ?> to <?php echo "$date2" ?></h4></div>
                                    <div><h3><?php echo number_format($total_retails); ?></h3></div>
                                    
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
                </div>
                </div>
               <div class="row">
                <div class="col-lg-12">					
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
											<?php
												include_once "connect.php"; 
														$date1 = date('Y-m-d');
														$date2 = $date1;
														$total_expenditure=0;
														$operation_date=date('Y-m-d');
														if(isset($_POST['search'])){
															$date1 = $_POST['search_value1'];
															$date1 = strtotime( $date1 );
															$date1 = date( 'Y-m-d', $date1 );
														
															$date2 = $_POST['search_value2'];
															$date2 = strtotime( $date2 );
															$date2 = date( 'Y-m-d', $date2 );												
														
														$query56="select * from expenses_incured  where  DATE BETWEEN '$date1' AND '$date2'";
														$query_run65=mysqli_query($con, $query56)or die(mysqli_error($con));
														
														while ($row = mysqli_fetch_array($query_run65)) {
																$amount_spent = $row["AMOUNT_SPENT"]; 	
																$total_expenditure =$total_expenditure+ $amount_spent;             
														}
														}
											?>									
								<div><h4>Total Expenditure From <br> <?php echo "$date1" ?> to <?php echo "$date2" ?></h4></div>
                                    <div><h3><?php echo number_format($total_expenditure); ?></h3></div>
                                    
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
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
											<?php
												include_once "connect.php"; 
														$date1 = date('Y-m-d');
														$date2 = $date1;
														$total_earned_income=0;
														$operation_date=date('Y-m-d');
														if(isset($_POST['search'])){
															$date1 = $_POST['search_value1'];
															$date1 = strtotime( $date1 );
															$date1 = date( 'Y-m-d', $date1 );
														
															$date2 = $_POST['search_value2'];
															$date2 = strtotime( $date2 );
															$date2 = date( 'Y-m-d', $date2 );												
														
														$query57="select * from income  where  income_date BETWEEN '$date1' AND '$date2'";
														$query_run67=mysqli_query($con, $query57)or die(mysqli_error($con));
														
														while ($row = mysqli_fetch_array($query_run67)) {
																$amount_earned = $row["amount_earned"]; 	
																$total_earned_income =$total_earned_income+ $amount_earned;             
														}
														}
											?>									
								<div><h4>Income Earned<br> <?php echo "$date1" ?> to <?php echo "$date2" ?></h4></div>
                                    <div><h3><?php echo number_format($total_earned_income); ?></h3></div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="add_income.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>	
                <div class="col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
											<?php
												$daily_statement2 = $total_retails + $total_earned_income - $total_expenditure;
														 
											?>									
								<div><h4>Profit / Loss  <br><?php echo $operation_date ?></h4></div>
                                    <div><h3><?php echo number_format($daily_statement2); ?></h3></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>		
<div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								
								<?php
										$query="select * from user";
										$query = mysqli_query($con,"select * from purchased_items_details  inner join purchased_items inner  join item_stock inner join items on purchased_items_details.PURCHASE_ID = purchased_items.PURCHASE_ID && purchased_items_details.ITEM_ID = items.ITEM_ID && item_stock.ITEM_ID=items.ITEM_ID where  purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2'") or die(mysqli_error($con));
										$total_quantity=0;
										$stock_value=0;
										while ($row = mysqli_fetch_array($query)) {
										 $quantity=$row["QUANTITY"];   
										 $BUYING_PRICE=$row["BUYING_PRICE"];   
										 $total_quantity=$total_quantity+$quantity;
										 $stock_value = $total_quantity*$BUYING_PRICE;
										}
									?>										
								<div><h4>Operation Date: <?php echo $operation_date ?></h4></div>
								<div><h4>Total Quantiy Available:  <?php echo $total_quantity ?></h4></div>
                                    <div><h3>Total Stock Value: <?php echo number_format($stock_value); ?></h3></div>
                                    
                                </div>
								 <!-- Start fetching and displaying stock data -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "
                                        SELECT 
                                            DATE_FORMAT(DATE_OF_PURCHASE, '%Y-%m') AS month,
                                            SUM($stock_value) AS total_stock_value
                                        FROM purchased_items
                                        GROUP BY DATE_FORMAT(DATE_OF_PURCHASE, '%Y-%m')
                                        ORDER BY DATE_FORMAT(DATE_OF_PURCHASE, '%Y-%m')
                                    ";

                                    $result = mysqli_query($con, $query);

                                    $months = [];
                                    $values = [];

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $months[] = $row['month'];
                                        $values[] = $row['total_stock_value'];
                                    }

                                    $months_json = json_encode($months);
                                    $values_json = json_encode($values);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <canvas id="stockChart" width="400" height="200"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var months = <?php echo $months_json; ?>;
                        var values = <?php echo $values_json; ?>;

                        var ctx = document.getElementById('stockChart').getContext('2d');
                        var stockChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: months,
                                datasets: [{
                                    label: 'Monthly Stock Value',
                                    data: values,
                                    backgroundColor: 'white', // Light green background color
									borderColor: 'rgba(75, 192, 192, 1)', // Darker green border color
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
                            </div>
                        </div>
                    </div>
                </div>				
                </div>				
                </div>

						<div class="row">
						<div class="col-md-12">
						<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
						<script type="text/javascript">
						  google.charts.load('current', {'packages':['bar']});
						  google.charts.setOnLoadCallback(drawChart);

						  function drawChart() {
							var data = google.visualization.arrayToDataTable([
							  ['Year', 'Sales', 'Expenses', 'Profit', 'Income'],
							  
							  <?php echo "['2023',$total_retails,$total_expenditure,$daily_statement2,$total_earned_income],"; ?>
							  //['2014', 1000, 400, 200],
							 // ['2015', 1170, 460, 250],
							 // ['2016', 660, 1120, 300],
							//  ['2017', 1030, 540, 350]
							]);

							var options = {
							  chart: {
								title: 'Company Performance',
								subtitle: 'Sales, Expenses, and Profit: 2023',
							  }
							};

							var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

							chart.draw(data, google.charts.Bar.convertOptions(options));
						  }
						</script>
							<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
						</div>
						</div>




				
                    </div>		
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    </div>

    <!-- /#wrapper -->

<?php   include ("../pages/footer.php");?>