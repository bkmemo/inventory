<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start(); // Use session variable on this page. This function must put on the top of page.
    //include_once "connect.php"; 

    $con = mysqli_connect('localhost', 'root', '', 'stock');
    
    error_reporting(0);
    //include_once 'log.php';
    error_reporting (E_ALL ^ E_NOTICE);

    if (!isset($_SESSION['username'])) { // if session variable "username" does not exist.
        header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to login.php
    }

    if (isset($_POST['purchase_id'])) {
        $purchase_id = $_POST['purchase_id'];
        
        $purchase_query="SELECT * FROM purchased_items WHERE PURCHASE_ID=$purchase_id";
        $purchase_result=mysqli_query($con,$purchase_query);
        $purchase_number_of_results = mysqli_num_rows($purchase_result);
        if($purchase_number_of_results>0){
            //Delete payment made for the purchase
            $delete_purchase_result = mysqli_query($con, "DELETE FROM payments_made WHERE PURCHASE_ID=$purchase_id" );

            //Get purchased_items_details
            $purchased_items_details_results = mysqli_query($con, "SELECT * FROM purchased_items_details WHERE PURCHASE_ID=$purchase_id");
            if (mysqli_num_rows($purchased_items_details_results) > 0) {
                while ($purchased_items_details_result = mysqli_fetch_assoc($purchased_items_details_results)) {

                    $purchased_items_details_id = $purchased_items_details_result['PURCHASED_ITEM_DETAILS_ID'];
                    $item_id = $purchased_items_details_result['ITEM_ID'];
                    $quantity_bought = $purchased_items_details_result['PURCHASED_QUANTITY'];
                    $available_quantity = 0;
                    
                    
                    //Get avaible item quantity
                    $item_stock_query_run = mysqli_query($con, "SELECT * FROM item_stock WHERE ITEM_ID=$item_id");
                    if (mysqli_num_rows($item_stock_query_run) > 0) {
                        while ($item_stock_query_run0 = mysqli_fetch_assoc($item_stock_query_run)) {
                            $available_quantity = $item_stock_query_run0['QUANTITY'];
                        }
                    }

                    $new_quantity = $available_quantity - $quantity_bought;

                    //Update Item Stock
                    $result = mysqli_query($con, "UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=$item_id");

                    //Delete records from purchased_items_details_phones
                    $purchased_items_details_phones_results = mysqli_query($con, "SELECT * FROM purchased_items_details_phones WHERE purchased_items_details_id=$purchased_items_details_id");
                    if (mysqli_num_rows($purchased_items_details_phones_results) > 0) {
                        while ($purchased_items_details_phones_result = mysqli_fetch_assoc($purchased_items_details_phones_results)) {

                            //Delete actual phone
                            $phone_id = $purchased_items_details_phones_result['phone_id'];

                            //delete purchased_items_details_phones
                            $purchased_items_details_phones_result = mysqli_query($con, "DELETE FROM purchased_items_details_phones WHERE phone_id=$phone_id");

                            
                            //echo "  phone_id = ".$phone_id;
                            $delete_purchased_item_details_result = mysqli_query($con, "DELETE FROM phones WHERE phone_id=$phone_id");
                            if($delete_purchased_item_details_result){
                                $_SESSION['response'] = "<strong><font color='red'>foreign key contaratint</font></strong>";
                                //echo "phone deleted";
                            }
                            else{
                                //echo "Error: " . mysqli_error($con);
                                //First delete all sales where the purchase is linked
                                //get sales_details_id
                                $salesdetails_phones_results = mysqli_query($con, "SELECT * FROM salesdetails_phones WHERE phone_id=$phone_id");
                                if (mysqli_num_rows($salesdetails_phones_results) > 0) {
                                    while ($salesdetails_phones_result = mysqli_fetch_assoc($salesdetails_phones_results)) {
                                        $sales_details_id = $salesdetails_phones_result['sales_details_id'];
                                        //get sales_id
                                        $sales_details_results = mysqli_query($con, "SELECT * FROM sales_details WHERE SALE_DETAILS_ID=$sales_details_id");
                                        if (mysqli_num_rows($sales_details_results) > 0) {
                                            while ($sales_details_result = mysqli_fetch_assoc($sales_details_results)) {
                                                $SALES_ID = $sales_details_result['SALES_ID'];
                                                
                                                //Now Delete the sale
                                                $query="SELECT * FROM sales WHERE SALES_ID=$SALES_ID";
                                                $result=mysqli_query($con,$query);
                                                $number_of_results = mysqli_num_rows($result);
                                                if($number_of_results>0){
                                                    //Remove payment made
                                                    $payment_total = 0;
                                                    $payment_query="SELECT * FROM payments_received WHERE SALES_ID=$SALES_ID";
                                                    $payment_results=mysqli_query($con,$payment_query);
                                                    if (mysqli_num_rows($payment_results) > 0) {
                                                        while ($payment_result = mysqli_fetch_assoc($payment_results)) {
                                                            $payment_total = $payment_total + $payment_result['AMOUNT_PAID'];
                                                        }
                                                        $delete_sales_result = mysqli_query($con, "DELETE FROM payments_received WHERE SALES_ID=$SALES_ID" );
                                                    }

                                                    //Get sale_details
                                                    $sales_details_results = mysqli_query($con, "SELECT * FROM sales_details WHERE SALES_ID=$SALES_ID");
                                                    if (mysqli_num_rows($sales_details_results) > 0) {
                                                        while ($sales_details_result = mysqli_fetch_assoc($sales_details_results)) {

                                                            $sales_details_id = $sales_details_result['SALE_DETAILS_ID'];
                                                            $item_id = $sales_details_result['ITEM_ID'];
                                                            $quantity_sold = $sales_details_result['QUANTITY_SOLD'];
                                                            $available_quantity = 0;

                                                            //Get avaible item quantity
                                                            $item_stock_query_run = mysqli_query($con, "SELECT * FROM item_stock WHERE ITEM_ID=$item_id");
                                                            if (mysqli_num_rows($item_stock_query_run) > 0) {
                                                                while ($item_stock_query_run0 = mysqli_fetch_assoc($item_stock_query_run)) {
                                                                    $available_quantity = $item_stock_query_run0['QUANTITY'];
                                                                }
                                                            }

                                                            $new_quantity = $available_quantity - $quantity_sold;

                                                            //Update Item Stock
                                                            $result = mysqli_query($con, "UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=$item_id");

                                                            //Update phone status to OnSale
                                                            $salesdetails_phones_results = mysqli_query($con, "SELECT * FROM salesdetails_phones WHERE sales_details_id=$sales_details_id");
                                                            if (mysqli_num_rows($salesdetails_phones_results) > 0) {
                                                                while ($salesdetails_phones_result = mysqli_fetch_assoc($salesdetails_phones_results)) {
                                                                    $phone_id = intval($salesdetails_phones_result['phone_id']);
                                                                    // Prepare the update statement
                                                                    $stmt = $con->prepare("UPDATE phones SET PDATE_OF_SALE=NULL, customer_name=NULL, customer_phone=NULL, phone_status='OnSale' WHERE phone_id=$phone_id");
                                                                    if ($stmt === false) {
                                                                        // Error in preparing the statement
                                                                        //die("Error in preparing the statement: " . $con->error);
                                                                    }
                                                                    // Execute the statement
                                                                    if ($stmt->execute()) {
                                                                        //echo "Phone details updated successfully.";
                                                                    } else {
                                                                        //echo "Error: " . $stmt->error;
                                                                    }
                                                                    // Close the statement
                                                                    $stmt->close();
                                                                    
                                                                }
                                                            }

                                                            //DELETE ITEM FROM SALE. (SALES_DETAILS)
                                                            $delete_sales_details_result = mysqli_query($con, "DELETE FROM sales_details WHERE SALE_DETAILS_ID=$sales_details_id");

                                                        }
                                                    }
                                                    //DELETE SALE
                                                    $delete_sales_result = mysqli_query($con, "DELETE FROM sales WHERE SALES_ID=$SALES_ID" );

                                                    
                                                }
                                            }
                                        }
                                    }
                                    $delete_purchased_item_details_result = mysqli_query($con, "DELETE FROM phones WHERE phone_id=$phone_id");
                                    
                                }
                            }
                        }

                    }

                    //Delete purchased_items_details_id
                    $purchased_items_details_result = mysqli_query($con, "DELETE FROM purchased_items_details WHERE PURCHASED_ITEM_DETAILS_ID=$purchased_items_details_id");   

                }
            }

            //DELETE ITEM FROM PURCHASE
            $purchased_items_result = mysqli_query($con, "DELETE FROM purchased_items WHERE PURCHASE_ID=$purchase_id");

        }
    } else {
        $_SESSION['response'] = "<strong><font color='red'>No purchase ID provided.</font></strong>";
    }

    include ("supplier_transaction_history.php");
?>
