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

    // Get the current date
    $currentDate = date("Y-m-d");

    // Fetch items and their stock values
    $items_query = '
        SELECT 
            i.ITEM_ID, 
            i.ITEM_NAME, 
            SUM(pd.BUYING_PRICE * pd.PURCHASED_QUANTITY) AS stock_value, 
            SUM(pd.PURCHASED_QUANTITY) AS quantity
        FROM 
            items i
        JOIN 
            phones p ON i.ITEM_ID = p.ITEM_ID
        JOIN 
            purchased_items_details_phones pdp ON p.phone_id = pdp.phone_id
        JOIN 
            purchased_items_details pd ON pdp.purchased_items_details_id = pd.PURCHASED_ITEM_DETAILS_ID
        JOIN 
            purchased_items s ON pd.PURCHASE_ID = s.PURCHASE_ID
        WHERE 
            p.phone_status = "OnSale" 
            AND s.DATE_OF_PURCHASE = :currentDate
        GROUP BY 
            i.ITEM_ID
    ';
    $stmt = $pdo->prepare($items_query);
    $stmt->execute(['currentDate' => $currentDate]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Insert daily stock values into the table
    foreach ($items as $item) {
        $insert_query = '
            INSERT INTO daily_stock_values (item_id, date, stock_value, quantity)
            VALUES (:item_id, :date, :stock_value, :quantity)
            ON DUPLICATE KEY UPDATE
            stock_value = VALUES(stock_value), quantity = VALUES(quantity)
        ';
        $insert_stmt = $pdo->prepare($insert_query);
        $insert_stmt->execute([
            'item_id' => $item['ITEM_ID'],
            'date' => $currentDate,
            'stock_value' => $item['stock_value'],
            'quantity' => $item['quantity']
        ]);
    }

    echo "Daily stock values updated successfully.";

} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
