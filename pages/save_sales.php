<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once "connect.php";
include_once 'log.php';
include "functions.php";
$con = db_connect();

if (!isset($_SESSION['username'])) {
    header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to login page
    exit();
}

$response = array('success' => false, 'message' => '');

if (isset($_POST['save'])) {
    $username = mysqli_real_escape_string($con, $_SESSION['username']);
    $SOLD_BY = mysqli_real_escape_string($con, $_POST['SOLD_BY']);
    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $customer = mysqli_real_escape_string($con, $_POST['customer']);
    $amount_paid = mysqli_real_escape_string($con, $_POST['amount_paid']);
    $customer_telephone = mysqli_real_escape_string($con, $_POST['customer_telephone']);
    $date_of_sale = date('Y-m-d H:i:s', strtotime($_POST['date_of_sale']));

    $proceed = false;

    // Insert into sales
    $result = mysqli_query($con, "INSERT INTO sales (`USER_ID`, `CUSTOMER_ID`, `DATE_OF_SALE`, `SOLD_BY`)
    VALUES (
        (SELECT id FROM user WHERE username='$username'), 
        (SELECT customer_id FROM customer WHERE customer_name='$customer_name'), 
        '$date_of_sale', 
        '$SOLD_BY'
    )");

    if ($result) {
        $sale_id = mysqli_insert_id($con); // Get the last inserted SALE_ID
        $row = 1;
        $phone_ids = array(); // Array to track inserted phone_ids

        // Loop through items and insert them into sales_details
        for ($i = 0; $i < count($_POST['item_name']); $i++) {
            $item_name = mysqli_real_escape_string($con, $_POST['item_name'][$i]);
            $quantity = mysqli_real_escape_string($con, $_POST['quantity'][$i]);
            $price = mysqli_real_escape_string($con, $_POST['price'][$i]);
            $amount = mysqli_real_escape_string($con, $_POST['amount'][$i]);

            $result = mysqli_query($con, "SELECT * FROM sales_details WHERE SALES_ID='$sale_id' AND ITEM_ID=(SELECT ITEM_ID FROM items WHERE ITEM_NAME='$item_name')");
            
            if ($result) {
                $count = mysqli_num_rows($result);
                if ($count <= 0) {
                    // Insert into sales_details
                    $result = mysqli_query($con, "INSERT INTO sales_details (`SALES_ID`, `ITEM_ID`, `QUANTITY_SOLD`, `SELLING_PRICE`)
                    VALUES ('$sale_id', (SELECT ITEM_ID FROM items WHERE ITEM_NAME='$item_name'), '$quantity', '$price')");

                    if ($result) {
                        // Check stock availability
                        $query_run = mysqli_query($con, "SELECT * FROM item_stock WHERE ITEM_ID=(SELECT ITEM_ID FROM items WHERE ITEM_NAME='$item_name')");
                        if (mysqli_num_rows($query_run) > 0) {
                            $result1 = mysqli_fetch_assoc($query_run);
                            $available_quantity = $result1['QUANTITY'];
                            $new_quantity = $available_quantity - $quantity;

                            // Update item stock
                            $result = mysqli_query($con, "UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=(SELECT ITEM_ID FROM items WHERE ITEM_NAME='$item_name')");
                            if ($result) {
                                // Handle serial numbers and phones
                                foreach ($_POST['serial_' . $row] as $serial) {
											$serial = mysqli_real_escape_string($con, $serial); // Escape serial for safety

											// Check if the serial number exists in the phones table
											$phone_check = mysqli_query($con, "SELECT phone_id FROM phones WHERE serial_number='$serial'");
											if (mysqli_num_rows($phone_check) > 0) {
												$phone_id_row = mysqli_fetch_assoc($phone_check);
												$phone_id = $phone_id_row['phone_id'];

												// Check if the phone_id already exists in the salesdetails_phones table
												$check_phone_in_salesdetails = mysqli_query($con, "SELECT * FROM salesdetails_phones WHERE phone_id='$phone_id'");
												if (mysqli_num_rows($check_phone_in_salesdetails) == 0) {
													// Insert the phone_id if it's not already present
													$result = mysqli_query($con, "INSERT INTO salesdetails_phones (`sales_details_id`, `phone_id`)
													VALUES ((SELECT MAX(SALE_DETAILS_ID) FROM sales_details WHERE SALES_ID='$sale_id'), '$phone_id')");

													if (!$result) {
														$_SESSION['response'] = 'Failed to insert into salesdetails_phones: ' . mysqli_error($con);
													}
												} else {
													// Phone_id already exists in salesdetails_phones, so we skip the insertion
													$_SESSION['response'] = "Phone with serial number $serial already exists in salesdetails_phones.";
												}

												// Update the phone details only if it wasn't already inserted
												$resultt = mysqli_query($con, "UPDATE phones SET 
													PDATE_OF_SALE='$date_of_sale', 
													customer_name='$customer', 
													customer_phone='$customer_telephone', 
													phone_status='Sold' 
												WHERE serial_number='$serial'");

												if (!$resultt) {
													$_SESSION['response'] = 'Phone update failed: ' . mysqli_error($con);
												}
											} else {
												$_SESSION['response'] = "Phone with serial number $serial not found.";
											}
										}


                                $proceed = true;
                                $response['message'] = "Submitted Successfully";
                            } else {
                                $response['message'] = 'Item stock update failed: ' . mysqli_error($con);
                            }
                        } else {
                            $response['message'] = "Item stock not found.";
                        }
                    } else {
                        $response['message'] = 'Failed to insert into sales_details: ' . mysqli_error($con);
                    }
                }
            } else {
                $response['message'] = 'Failed to check sales_details: ' . mysqli_error($con);
            }
            $row++;
        }

        // Proceed with payment insertion if all went well
        if ($proceed) {
            if ($amount_paid > 0) {
                $result = mysqli_query($con, "INSERT INTO payments_received (`SALES_ID`, `AMOUNT_PAID`, `DATE_OF_PAYMENT`)
                VALUES ('$sale_id', '$amount_paid', '$date_of_sale')");
                if (!$result) {
                    $response['message'] = 'Payment insertion failed: ' . mysqli_error($con);
                }
            }

            $response['success'] = true;
            header("Location: add_sales.php");
            exit();
        }
    } else {
        $response['message'] = 'Sales insertion failed: ' . mysqli_error($con);
    }
} else {
    $response['message'] = 'Invalid form data.';
    header("Location: add_sales.php");
    exit();
}
?>
