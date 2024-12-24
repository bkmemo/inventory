<?php
	session_start(); 
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);

	if (!isset($_SESSION['username'])) {
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!");
	}

	if (isset($_POST['sale_id'])) {
		require("fpdf.php");
		$con = db_connect();

		$customer_name = $_SESSION['customer_name'];
		$user_name = $_SESSION['username'];
		$sale_id = $_POST['sale_id'];
		$query="select * from sales_details inner join sales inner join customer inner join items on sales.CUSTOMER_ID=customer.customer_id && sales_details.SALES_ID=sales.SALES_ID && sales_details.ITEM_ID=items.ITEM_ID where sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') && sales.SALES_ID=$sale_id order by items.ITEM_NAME ASC";
		$result = mysqli_query($con, $query);
		$number_of_results = mysqli_num_rows($result);

		// Variables for table data
		$column_items = [];
		$column_quantitys = [];
		$column_prices = [];
		$column_totals = [];
		$total_sum = 0;

		while ($row = mysqli_fetch_array($result)) {
			$item = $row["ITEM_NAME"];
			$quantity = $row["QUANTITY_SOLD"];
			$price = $row["SELLING_PRICE"];
			$DATE_OF_SALE = $row["DATE_OF_SALE"];
			$customer_name = $row["customer_name"];
			$total = $quantity * $price;

			// Store data in arrays
			$column_items[] = $item;
			$column_quantitys[] = $quantity;
			$column_prices[] = $price;
			$column_totals[] = $total;

			$total_sum += $total;
		}

		// Get amount paid
		$query = "SELECT * FROM payments_received WHERE SALES_ID = $sale_id";
		$result = mysqli_query($con, $query);
		$amount_paid = 0;
		while ($row1 = mysqli_fetch_array($result)) {
			$amount_paid += $row1['AMOUNT_PAID'];
		}
		$balance = $total_sum - $amount_paid;

		 // Initialize PDF
    $pdf = new FPDF('P', 'mm', array(92, 265));
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetXY(5, 10);

    // Business details section (same as before)
    $query_1 = "SELECT * FROM profile";
    $result = mysqli_query($con, $query_1);
    $profile = mysqli_fetch_assoc($result);

    $pdf->Image('../images/' . $profile['company_logo'], 25, 15, 40, 15);
    $pdf->SetXY(5, 35);
    $pdf->Cell(0, 5, $profile['business_name'], 0, 0, 'C');
    $pdf->SetXY(5, 40);
    $pdf->Cell(0, 5, 'Tel: ' . $profile['phone_number'], 0, 0, 'C');
    $pdf->SetXY(5, 45);
    $pdf->Cell(0, 5, $profile['address'], 0, 0, 'C');

    // Guest details section (same as before)
	$pdf->SetFont('Arial', '', 11);
	
    $pdf->SetXY(5, 55);
    $pdf->Cell(0, 5, 'Guest Details', 0, 0, 'L');
    $pdf->SetXY(5, 65);
    $pdf->Cell(0, 5, 'Date: ' . $DATE_OF_SALE, 0, 0, 'L');
    $pdf->SetXY(5, 72);
	$pdf->Cell(0, 5, 'Customer Name: ' . $customer_name, 0, 0, 'L');
	 $pdf->SetXY(5, 77);
    $pdf->Cell(0, 5, 'Order: ' . $sale_id, 0, 0, 'L');
    $pdf->SetXY(5, 84);
    // Table header
    $pdf->SetXY(5, 90);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'Item', 1);
    $pdf->Cell(15, 6, 'Qty', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Price', 1, 0, 'C');
    $pdf->Cell(20, 6, 'Total', 1, 0, 'C');
    $pdf->Ln();

    // Table content
    $pdf->SetFont('Arial', '', 9);
    for ($i = 0; $i < count($column_items); $i++) {
		$pdf->SetXY(5, $pdf->GetY()); // Automatically adjust to the current position of Y-axis
        $pdf->Cell(30, 6, $column_items[$i], 1);
        $pdf->Cell(15, 6, number_format($column_quantitys[$i]), 1, 0, 'C');
        $pdf->Cell(20, 6, number_format($column_prices[$i]), 1, 0, 'C');
        $pdf->Cell(20, 6, number_format($column_totals[$i]), 1, 0, 'C');
        $pdf->Ln();
    }

			// Add "Total", "Paid", and "Balance" to the same table
		$pdf->SetFont('Arial', 'B', 10);

		// Row for "Total"
		$pdf->SetXY(35, $pdf->GetY()); // Automatically adjust to the current position of Y-axis
		$pdf->Cell(35, 6, 'Total:', 1); // Cell spanning multiple columns for label
		$pdf->Cell(20, 6, number_format($total_sum), 1, 0, 'C'); // Cell for total value
		$pdf->Ln(); // Move to the next line

		// Row for "Paid"
		$pdf->SetXY(35, $pdf->GetY()); // Automatically adjust to the current position of Y-axis
		$pdf->Cell(35, 6, 'Paid:', 1); // Cell spanning multiple columns for label
		$pdf->Cell(20, 6, number_format($amount_paid), 1, 0, 'C'); // Cell for paid amount
		$pdf->Ln(); // Move to the next line

		// Row for "Balance"
		$pdf->SetXY(35, $pdf->GetY()); // Automatically adjust to the current position of Y-axis
		$pdf->Cell(35, 6, 'Balance:', 1); // Cell spanning multiple columns for label
		$pdf->Cell(20, 6, number_format($balance), 1, 0, 'C'); // Cell for balance amount
		$pdf->Ln(); // Move to the next line
    
    // Footer section
    $pdf->SetXY(5, $pdf->GetY() + 10); // Position footer content below the payment section
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 5, 'Served By: ' . $_SESSION['username'], 0, 0, 'L');
    $pdf->SetXY(5, $pdf->GetY() + 5);
    $pdf->Cell(0, 5, 'Thank You For Supporting Us', 0, 0, 'C');

		$pdf->Output('sales_report.pdf', 'I');
	} else {
		header("Location:customer_transaction_history.php");	
	}
?>
