<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$pdo = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
?>        


<?php   include ("../pages/header.php");?> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
		        <div class="panel-body" align="right">
                    <h2>Stock Value</h2>
				</div>	
				<div class="box box-primary">
					<table id="employee_data5" class="table table-striped table-bordered">  
						<thead>
							<tr bgcolor="#eee"><td>Item</td><td>Number</td><td>Stock Value</td></tr>
						</thead>
						<tbody>
					<?php
							// Database connection setup
							$host = 'localhost';
							$db = 'stock';
							$username = 'root';
							$password = '';
							$port = '3306'; // Specify your port here

							$dsn = "mysql:host=$host;port=$port;dbname=$db";

							// Optional PDO options
							$options = [
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
								PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
								PDO::ATTR_EMULATE_PREPARES => false,
							];

							try {
								$pdo = new PDO($dsn, $username, $password, $options);
								echo 'Connection successful';
							} catch (PDOException $e) {
								die('Connection failed: ' . $e->getMessage());
							}
			

$totalStockValue = 0;
$itemStockValues = [];
$monthlyStockValues = [];

try {
    $item_query = 'SELECT ITEM_ID, ITEM_NAME FROM items';
    $item_stmt = $pdo->prepare($item_query);
    $item_stmt->execute();
    $items = $item_stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($items) {
        foreach ($items as $item) {
            $itemStockValue = 0;
            $item_id = $item['ITEM_ID'];
            $item_name = $item['ITEM_NAME'];
            $itemQuantity = 0; // Initialize item quantity

            // Fetch all ITEM phones with phone_status 'OnSale'
            $phones_query = 'SELECT phone_id FROM phones WHERE ITEM_ID = :item_id AND phone_status = "OnSale"';
            $phones_stmt = $pdo->prepare($phones_query);
            $phones_stmt->execute(['item_id' => $item_id]);
            $phones = $phones_stmt->fetchAll();

            if ($phones) {
                $itemQuantity = count($phones); // Calculate quantity
                foreach ($phones as $phone) {
                    $phoneId = $phone['phone_id'];

                    // Fetch purchased_items_details_id from purchased_items_details_phones table
                    $query = 'SELECT purchased_items_details_id FROM purchased_items_details_phones WHERE phone_id = :phone_id';
                    $stmt = $pdo->prepare($query);
                    $stmt->execute(['phone_id' => $phoneId]);
                    $purchasedDetailsIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($purchasedDetailsIds as $details) {
                        $detailsId = $details['purchased_items_details_id'];

                        // Fetch BUYING_PRICE from purchased_items_details table
                        $query = 'SELECT BUYING_PRICE FROM purchased_items_details WHERE PURCHASED_ITEM_DETAILS_ID = :details_id';
                        $stmt = $pdo->prepare($query);
                        $stmt->execute(['details_id' => $detailsId]);
                        $buyingPrice = $stmt->fetch(PDO::FETCH_ASSOC)['BUYING_PRICE'];

                        // Add to total stock value
                        $itemStockValue += $buyingPrice;
                    }
                }
            }

            echo "<tr>";
            echo "<td>" . $item_name . "</td>";
			
												if ($itemQuantity == "0") { 
													echo '<td bgcolor="red"><font color="white" size="+2">'.$itemQuantity.'</font></td>';
												} else{
													echo '<td>'.$itemQuantity.'</td>';
												}
        
											if ($itemStockValue == "0") { 
													echo '<td bgcolor="brown"><font color="white" size="+2">'.$itemStockValue.'</font></td>';
												} else{
													echo '<td>'.$itemStockValue.'</td>';
												}
            echo "</tr>";

            if ($itemStockValue > 0) {
                $itemStockValues[] = [
                    'item_name' => $item_name,
                    'quantity' => $itemQuantity, // Store quantity
                    'stock_value' => $itemStockValue
                ];
            }

            $totalStockValue = $totalStockValue + $itemStockValue;
        }
    }
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}
?>
</tbody>
</table>
<h2>Overall stock value: <?php echo $totalStockValue; ?></h2>




<?php

    // Define the year and month for which to generate the dates
    $year = date("Y"); // Get the current year
    $currentMonth = date("n"); // Get the current month as a number (1-12)

    // Create an array with the last day of each month for the specified year
    $datesArray = [];
    for ($month = 1; $month <= $currentMonth; $month++) {
        $lastDayOfMonth = date("Y-m-t", strtotime("$year-$month-01")); // Get last day of the month
        $datesArray[] = $lastDayOfMonth;
    }

    // Loop through the array of dates and fetch phones bought on or before each date
    $monthStockValues = [];
    foreach ($datesArray as $date) {
        $monthStockValue = 0;
        $monthQuantity = 0; // Initialize month quantity
        $month_query = '
            SELECT p.phone_id, p.phone_status, p.serial_number, pd.BUYING_PRICE, pd.PURCHASED_QUANTITY
            FROM purchased_items_details_phones pdp
            JOIN phones p ON pdp.phone_id = p.phone_id
            JOIN purchased_items pi ON pdp.purchased_items_details_id = pi.PURCHASE_ID
            JOIN purchased_items_details pd ON pd.PURCHASED_ITEM_DETAILS_ID = pdp.purchased_items_details_id
            WHERE pi.DATE_OF_PURCHASE <= :date AND p.phone_status = "OnSale"
        ';

        $month_stmt = $pdo->prepare($month_query);
        $month_stmt->execute(['date' => $date]);
        $phones = $month_stmt->fetchAll();

        if ($phones) {
            foreach ($phones as $phone) {
                $buyingPrice = $phone['BUYING_PRICE'];
                $monthStockValue += $buyingPrice;
                $monthQuantity += $phone['PURCHASED_QUANTITY']; // Add quantity
            }
        }

        $monthStockValues[] = [
            'month' => date("F", strtotime($date)), // Get the month name
            'stock_value' => $monthStockValue,
            'quantity' => $monthQuantity // Store quantity
        ];
    }

    // Prepare data for Chart.js
    $months = array_column($monthStockValues, 'month');
    $stockValues = array_column($monthStockValues, 'stock_value');
    $quantities = array_column($monthStockValues, 'quantity');

?>



    <canvas id="stockValueChart" width="400" height="200"></canvas>

<script>
    const ctx1 = document.getElementById('stockValueChart').getContext('2d');
    const stockValueChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months); ?>, // Months from PHP
            datasets: [{
                label: 'Total Stock Value',
                data: <?php echo json_encode($stockValues); ?>, // Stock values from PHP
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Stock Value'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Months'
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Stock Value for Each Month'
                },
                tooltip: {
                    callbacks: {
                        afterLabel: function(context) {
                            const quantities = <?php echo json_encode($quantities); ?>; // Quantities from PHP
                            const index = context.dataIndex;
                            const quantity = quantities[index];
                            return 'Quantity: ' + quantity;
                        }
                    }
                }
            }
        }
    });
</script>


    <h2>Stock value by item</h2>
<canvas id="stockChart" width="400" height="1000"></canvas>
<script>
    // Prepare data for Chart.js
    const itemData = <?php echo json_encode($itemStockValues); ?>;
    const itemLabels = itemData.map(item => item.item_name);
    const itemStockValues = itemData.map(item => item.stock_value);
    const itemQuantities = itemData.map(item => item.quantity); // Get quantities

    const ctx = document.getElementById('stockChart').getContext('2d');
    const stockChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: itemLabels,
            datasets: [{
                label: 'Stock Value',
                data: itemStockValues,
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
                            const quantity = itemQuantities[index];
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
</script>

				</div> <!-- /.col-lg-12 -->
		   		</div>
	      	</div><!-- /.row -->
	    </div><!-- /#page-wrapper -->
	</div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>
</body>
</html>