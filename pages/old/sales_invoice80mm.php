<?php

    require_once __DIR__ . '/../vendor/autoload.php'; 
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}

	if(isset($_POST['sale_id'])){
		



		$con = db_connect();
		//Select the data from the database
		//$customer_name = $_SESSION['customer_name'];
		$customer_name = $_SESSION['customer_name'];
		$user_name = $_SESSION['username'];
		$sale_id = $_POST['sale_id'];
		$query="select * from sales_details inner join sales inner join customer inner join items on sales.CUSTOMER_ID=customer.customer_id && sales_details.SALES_ID=sales.SALES_ID && sales_details.ITEM_ID=items.ITEM_ID where sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') && sales.SALES_ID=$sale_id order by items.ITEM_NAME ASC";
		$result=mysqli_query($con,$query);
		$number_of_results = mysqli_num_rows($result);
		
		//Initialize the 3 columns and the total
		$column_item = "";
		$column_quantity = "";
		$column_price = "";
		$column_total = "";
		$total = $number_of_results;
		$item_serials = null;
		
		//For each row, add the field to the corresponding column
		$index =0;
		$total_sum =0;
		while($row = mysqli_fetch_array($result)){
			$item = $row["ITEM_NAME"]; 
			$quantity = $row["QUANTITY_SOLD"];
			$price = $row["SELLING_PRICE"];
			$date_of_sale = $row["DATE_OF_SALE"];
			$phone = $row["phone"];
			$email = $row["email"];
			$sale_details_id = $row["SALE_DETAILS_ID"];
			$total = $quantity*$price;
			
			$column_item = $column_item.$item."\n";
			$column_quantity = $column_quantity.$quantity."\n";
			$column_price = $column_price.$price."\n";
			$column_total = $column_total.$total."\n";
		
			//arrays
			$column_items[$index] = $item;
			//Get Serial numbers
			$query3="select p.serial_number, p.customer_name, p.customer_phone from salesdetails_phones sdp inner join phones p on sdp.phone_id = p.phone_id where sdp.sales_details_id = $sale_details_id";
		    $result3=mysqli_query($con,$query3);
		    $serial_index = 0;
		    while($row3 = mysqli_fetch_array($result3)){
                $item_serials[$index][$serial_index] = $row3["serial_number"];
			    $customer_name = $row3["customer_name"];
			    $phone = $row3["customer_phone"];
			    $serial_index++;
		    }

			$column_quantitys[$index] = $quantity;
			$column_prices[$index] = $price;
			$column_totals[$index] = $total;
			$index++;
		
			//Sum all the Prices (TOTAL)
			$total_sum = $total_sum+$total;
		}
		//get amount of money paid
		$query="select * from payments_received where SALES_ID=$sale_id";
		$result=mysqli_query($con,$query);
		$amount_paid=0;
		while($row = mysqli_fetch_array($result)){
			$amount_paid = $amount_paid+$row['AMOUNT_PAID'];
		}
		$balance = $total_sum-$amount_paid;
		$pdf_title = "Sales Report";
		//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
		//$total_sum = number_format($total_sum,',','.','.');
		
		//Create a new PDF file
		$mpdf = new \Mpdf\Mpdf(['format' => [80, 180]]);
        //$mpdf->WriteHTML('<h1>Hello world!</h1>');
        //$mpdf->WriteHTML('<h1>Hello world!</h1>');
		
		//title
		//$pdf->SetDisplayMode(real,'default');
		//$pdf->Image('hddppr.png',10,20,33,0,' ','http://www.fpdf.org/');
		//$pdf->SetXY(50,20);
		//$pdf->SetDrawColor(50,60,100);
		//$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);
		//$pdf->Write(5,'Congratulations! You have generated a PDF.');
		//$pdf->SetX(15);
		//$pdf->Cell(85,6,'SALES REPORT',1,0,'C',1);
		$mpdf->SetAuthor('MEMO TECH');
		$mpdf->SetTitle($pdf_title); 
		$mpdf->SetFont('Helvetica','B',20);
		$mpdf->SetTextColor(0,0,0);
		//HEADER

		$query0="select * from profile";
		$query=mysqli_query($con,$query0);
		while($a=mysqli_fetch_assoc($query)){
			$company_logo=$a['company_logo'];
			$business_name=$a['business_name'];
			$business_slogan=$a['business_slogan'];
			$address=$a['address'];
			$phone_number=$a['phone_number'];
			$email_address=$a['email_address'];
			$website_link=$a['website_link'];
			$tin_number=$a['tin_number'];
		}
		$html = "<div>";
		$html = $html."<img src='".$company_logo."' />";
			
		
	    $html = $html."<p style='font-size: 0.7em;'>".$address."<br />".$website_link."<br />".$phone_number."</p>";
		
		$html = $html."<h4 style='font-size: 0.7em;'>PAYMENT RECEIPT</h4>";		
		
		$html = $html."<table border='' style=' width: 100%; font-size: 0.7em;'><tr><td><b>Date</b></td><td>".$date_of_sale."</td></tr>";
		
		$html = $html."<tr><td><b>Names</b></td><td>".$customer_name."</td></tr>";
		
		$html = $html."<tr><td><b>Tel</b></td><td>".$phone."</td></tr>";
		
		$html = $html."<tr><td><b>Receipt No</b></td><td>".$sale_id."</td></tr></table><br />";
	    
        $html = $html."<table border='1' style=' border-collapse: collapse; font-size: 0.7em;'><tr><th>Item</th><th>Serial No</th><th>Qty</th><th>Amount</th></tr>";
	    

		for($x=0;$x<$index;$x++){
                $serials = "";
			for ($i=0; $i < count($item_serials[$x]); $i++) {
			    $serials = $serials.$item_serials[$x][$i];
			    if($x<$index){
			    	$serials = $serials."<br />";
			    }
			}
			$html = $html."<tr><td>".$column_items[$x]."</td><td>".$serials."</td><td>".$column_quantitys[$x]."</td><td >".$column_totals[$x]."</td></tr>";
		}

		$html = $html."<tr><td colspan='3'><b>Total</b></td><td><b>".$total_sum."</b></td></tr>";
		$html = $html."<tr><td colspan='3'><b>Amout Paid</b></td><td><b>".$amount_paid."</b></td></tr>";
		$html = $html."<tr><td colspan='3'><b>Balance</b></td><td><b>".$balance."</b></td></tr>";

		$html = $html."</table>";
		$html = $html."<p style='font-size: 0.7em;'>Comment: .............................................</p>";
        $html = $html."<p style='font-size: 0.7em;'>Served By: ".$user_name."</p>";
        $html = $html."<p style='font-size: 0.7em;'>Thanx For Doing Business With Mobileshop.ug</p></div>";
		$html = $html."<p style='font-size: 0.7em;'>Powered By Mtl Ict Solutions</p></div>";
		$mpdf->WriteHTML($html);
		$mpdf->Output('sales_report.pdf','I');
	}
	else{
		header("Location:customer_transaction_history.php");	
	}
?>