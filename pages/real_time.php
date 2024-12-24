<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
    error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	 if(isset($_POST['submit'])){
            require_once 'bulk/sms.php';
            $livesms = new SMS();
            @$phone=$_POST['customer_phone'];
            @$phone=preg_replace('/^0/','+256',$phone);
            @$message=$_POST['message'];
            @$result = $livesms->send($phone, $message);
          }   
          if (@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-primary" role="alert">
            '.@$result['message'].'
            </div>';
          }elseif (!@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-danger" role="alert">
            '.@$result['message'].'
            </div>';
          }
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,700,300italic);
*, *:before, *:after { box-sizing: border-box; }
html { font-size: 100%;  }
body { 
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  background: #d0e6ef; 
  color: #666;
}

.wrapper {
  max-width: 75%;
  margin: auto;
}


h1 { 
  color: #555; 
  margin: 3rem 0 1rem 0; 
  padding: 0;
  font-size: 1.5rem;
}

textarea {
  width: 100%;
  min-height: 100px;
  resize: none;
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 0.5rem;
  color: #666;
  box-shadow: inset 0 0 0.25rem #ddd;
  &:focus {
    outline: none;
    border: 1px solid darken(#ddd, 5%);
    box-shadow: inset 0 0 0.5rem darken(#ddd, 5%);
  }
  &[placeholder] { 
    font-style: italic;
    font-size: 1.875rem;
  }
}

#the-count {
  float: right;
  padding: 0.1rem 0 0 0;
  font-size: 1.875rem;
}

</style>
<?php   include ("../pages/header.php");?> 
<body>

    <div id="wrapper">
<?php   include ("../pages/side.php");?>
        <div id="page-wrapper">
						<div class="row">
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h2>Send Bulky SMS Now To Mobile Shop Customers</h2>
								</div>
								<div class="panel-body"> 
								
							
			<h2>Real-Time Stock Values</h2>
			<div class="row">
			<div class="col-lg-12">
			<div class="col-md-4">
				Start Date:
				<div class="form-group">
					<input type="date" id="startDate" value="<?php echo date('Y-m-01'); ?>" class="form-control" >
				</div>
			</div>
			<div class="col-md-4">
				End Date:
				<div class="form-group">
					<input type="date" id="endDate" value="<?php echo date('Y-m-d'); ?>" class="form-control">
				</div>
			</div>
			<div class="col-md-4"><br>
				<button id="fetchButton" class="btn btn-primary">Fetch Stock Values</button>
				
			</div>
			</div>
			</div>
			<div class="row">
			<canvas id="stockChart" width="400" height="1000"></canvas>
			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
				let stockChart = null;

				function fetchStockValues() {
					const startDate = document.getElementById('startDate').value;
					const endDate = document.getElementById('endDate').value;

					console.log('Fetching stock values for range:', startDate, 'to', endDate); // Debugging log

					$.ajax({
						url: 'fetch_stock_values.php',
						method: 'GET',
						data: { start_date: startDate, end_date: endDate },
						success: function(response) {
							console.log('Response:', response); // Debugging log

							const data = JSON.parse(response);
							const labels = data.map(item => item.ITEM_NAME);
							const stockValues = data.map(item => item.stock_value);
							const quantities = data.map(item => item.quantity);

							// Destroy existing chart if it exists
							if (stockChart) {
								stockChart.destroy();
							}

							const ctx = document.getElementById('stockChart').getContext('2d');
							stockChart = new Chart(ctx, {
								type: 'bar',
								data: {
									labels: labels,
									datasets: [{
										label: 'Stock Value',
										data: stockValues,
										backgroundColor: 'rgba(75, 192, 192, 0.2)',
										borderColor: 'rgba(75, 192, 192, 1)',
										borderWidth: 5
									}]
								},
								options: {
									indexAxis: 'y', // This makes the bar chart horizontal
									scales: {
										x: {
											beginAtZero: true,
											title: {
												display: true,
												text: 'Stock Value'
											}
										},
										y: {
											title: {
												display: true,
												text: 'Items'
											}
										}
									},
									responsive: true,
									plugins: {
										legend: {
											position: 'top',
										},
										tooltip: {
											callbacks: {
												afterLabel: function(context) {
													const index = context.dataIndex;
													const quantity = quantities[index];
													return 'Quantity: ' + quantity;
												}
											}
										},
										title: {
											display: true,
											text: 'Stock Value by Item'
										}
									}
								}
							});
						},
						error: function(error) {
							console.error('Error fetching stock values:', error); // Debugging log
						}
					});
				}

				// Connect button to fetchStockValues function
				document.getElementById('fetchButton').addEventListener('click', fetchStockValues);

				// Fetch stock values initially
				fetchStockValues();

				// Refresh stock values every 5 minutes (300000 milliseconds)
				setInterval(fetchStockValues, 300000);
			</script>
			
			</div>
		</div>
	</div>
</div>
</div>
</div>
    <!-- /#wrapper -->
   <?php   include ("../pages/footer.php");?>  
</body>

</html>