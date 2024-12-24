<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection setup
$host = 'localhost';
$db = 'stock';
$username = 'root';
$password = '';
$port = '3306'; // Specify your port here

$dsn = "mysql:host=$host;port=$port;dbname=$db";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the date range from the request
    $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : date("Y-m-01");
    $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : date("Y-m-d");

    // Fetch daily stock values for the specified date range
    $query = '
        SELECT dsv.ITEM_ID, i.ITEM_NAME, SUM(dsv.stock_value) as stock_value, SUM(dsv.quantity) as quantity
        FROM daily_stock_values dsv
        JOIN items i ON dsv.ITEM_ID = i.ITEM_ID
        WHERE dsv.date BETWEEN :start_date AND :end_date
        GROUP BY dsv.ITEM_ID
    ';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['start_date' => $startDate, 'end_date' => $endDate]);
    $stockValues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($stockValues);

} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
