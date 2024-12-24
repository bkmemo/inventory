<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "connect.php";

$con = db_connect();

$query = "
    SELECT 
        DATE_FORMAT(DATE_OF_PURCHASE, '2023-09') AS month,
        SUM(stock_value) AS total_stock_value
    FROM purchased_items
    GROUP BY DATE_FORMAT(DATE_OF_PURCHASE, '2024-09')
    ORDER BY DATE_FORMAT(DATE_OF_PURCHASE, '2024-09')
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
<!DOCTYPE html>
<html>
<head>
    <title>Monthly Stock Value</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="stockChart" width="400" height="200"></canvas>

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
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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

</body>
</html>
