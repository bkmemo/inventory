<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(isset($_POST['purchase_id'])){
		require("fpdf.php");
		$con = db_connect();
		//Select the data from the database
		//$customer_name = $_SESSION['customer_name'];
		$supplier_name = $_SESSION['supplier_name'];
		$user_name = $_SESSION['username'];
		$purchase_id = $_POST['purchase_id'];
		$query="select * from purchased_items inner join suppliers inner join purchased_items_details inner join items on purchased_items.SUPPLIER_ID=suppliers.supplier_id && purchased_items.PURCHASE_ID=purchased_items_details.PURCHASE_ID && purchased_items_details.ITEM_ID=items.ITEM_ID where purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') && purchased_items.PURCHASE_ID=$purchase_id order by items.ITEM_NAME ASC";
		$result=mysqli_query($con,$query)or die(mysqli_error());
		$number_of_results = mysqli_num_rows($result);
		
		//Initialize the 3 columns and the total
		$column_item = "";
		$column_quantity = "";
		$column_price = "";
		$column_total = "";
		$total = $number_of_results;
		
		//For each row, add the field to the corresponding column
		$index =0;
		$total_sum = 0;
		while($row = mysqli_fetch_array($result)){
			$item = $row["ITEM_NAME"]; 
			$quantity = $row["PURCHASED_QUANTITY"];
			$price = $row["BUYING_PRICE"];
			$date_of_purchase = $row["DATE_OF_PURCHASE"];
			$phone = $row["phone"];
			$email = $row["email"];
			$total = $quantity*$price;
		
			$column_item = $column_item.$item."\n";
			$column_quantity = $column_quantity.$quantity."\n";
			$column_price = $column_price.$price."\n";
			$column_total = $column_total.$total."\n";
			
			//arrays
			$column_items[$index] = $item;
			$column_quantitys[$index] = $quantity;
			$column_prices[$index] = $price;
			$column_totals[$index] = $total;
			$index++;
		
			//Sum all the Prices (TOTAL)
			$total_sum = $total_sum+$total;
		}
		//get amount of money paid
		$query="select * from payments_made where PURCHASE_ID=$purchase_id";
		$result=mysqli_query($con,$query);
		$amount_paid=0;
		while($row = mysqli_fetch_array($result)){
			$amount_paid = $amount_paid+$row['AMOUNT_PAID'];
		}
		$balance = $total_sum-$amount_paid;
		mysqli_close($con);
		$pdf_title = "Purchase Report";
		//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
		//$total_sum = number_format($total_sum,',','.','.');
		
		//Create a new PDF file
		$pdf=new FPDF();
		$pdf->AddPage();
		
		//title
		//$pdf->SetDisplayMode(real,'default');
		//$pdf->Image('hddppr.png',10,20,33,0,' ','http://www.fpdf.org/');
		//$pdf->SetXY(50,20);
		//$pdf->SetDrawColor(50,60,100);
		//$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);
		//$pdf->Write(5,'Congratulations! You have generated a PDF.');
		//$pdf->SetX(15);
		//$pdf->Cell(85,6,'SALES REPORT',1,0,'C',1);
		$pdf->SetAuthor('MEMO TECH');
		$pdf->SetTitle($pdf_title); 
		$pdf->SetFont('Helvetica','B',20);
		$pdf->SetTextColor(0,0,0);
		//HEADER
		$con = db_connect();
		$query3 = "select * from profile";
		$query_run1 = mysqli_query($con, $query3);
		while($u=mysqli_fetch_assoc($query_run1)){
			$company_logo=$u['company_logo'];
			$business_name=$u['business_name'];
			$business_slogan=$u['business_slogan'];
			$address=$u['address'];
			$phone_number=$u['phone_number'];
			$email_address=$u['email_address'];
			$website_link=$u['website_link'];
			$tin_number=$u['tin_number'];
		}
		$image1 = "mobileshop.jpg";
		//Move to the right
		//$pdf->Cell(70);
		//Title
		$pdf->setXY(10,10);
		$pdf->SetFont('Arial','B',18);
		$pdf->Image(''.$company_logo,90,15,30,10);
		
		$pdf->setXY(10,22);
		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(91); 
		$pdf->Cell(0,10,'Dealers in General Phones & Accessories',0,0,'C');		
		
	    $pdf->setXY(10,27);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,10,'(Available Online 24/7) '.$phone_number,0,0,'C');
		
		$pdf->setXY(10,33);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,10,''.$address,0,0,'C');

		$pdf->setXY(10,40);
		$pdf->SetFont('Arial','U',13);
		$pdf->Cell(0,10,'PURCHASE INVOICE',0,0,'C');
		
		$pdf->setXY(10,40);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(0,10,'DATE: '.$date_of_purchase,0,0,'L');
		
		
		$pdf->setXY(10,45);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,10,'SUPPLIER NAME: '.$supplier_name,0,0,'R');
		
		$pdf->setXY(10,50);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'TEL: '.$phone,0,0,'L');
		
		$pdf->setXY(10,55);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'INVOICE NO: '.$purchase_id,0,0,'R');
		
		$pdf->setXY(10,60);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'EMAIL: '.$email,0,0,'L');
					//
		//Line break
		$pdf->Ln(80);
		
		//Fields Name position
		$Y_Fields_Name_position = 70;
		//Table position, under Fields Name
		$Y_Table_Position = 76;
		
		//First create each Field Name
		//Gray color filling each Field Name box
		//$pdf->SetFillColor(232,232,232);
		$pdf->SetFillColor(232,232,232);
		//Bold Font for Field Name
		$pdf->SetFont('Arial','B',12);
		$pdf->SetY($Y_Fields_Name_position);
		$pdf->SetX(15);
		$pdf->Cell(85,6,'ITEM',1,0,'L',1);
		
		$pdf->SetX(100);
		$pdf->Cell(30,6,'QUANTITY',1,0,'L',1); //$pdf->Cell(width,height,'QUANTITY',1,0,'L',1);
		
		$pdf->SetX(130);
		$pdf->Cell(30,6,'UNIT PRICE',1,0,'R',1);
		
		$pdf->SetX(160);
		$pdf->Cell(35,6,'TOTAL',1,0,'R',1);
		$pdf->Ln();
		
		$column_items[$index] = $item;
		$column_quantitys[$index] = $quantity;
		$column_prices[$index] = $price;
		$column_totals[$index] = $total;
		
		for($x=0;$x<$index;$x++){
			//Now show the 3 columns
			$pdf->SetTextColor(0,0,0);
			
			$pdf->SetFont('Arial','',12);
			
			$pdf->SetX(15);
			$pdf->Cell(85,8,$column_items[$x],1);
			
			
			$pdf->SetX(100);
			$pdf->Cell(30,8,$column_quantitys[$x],1);
			
			$pdf->SetX(130);
			$pdf->Cell(30,8,$column_prices[$x],1,0,'R');
			
			$pdf->SetX(160);
			$pdf->Cell(35,8,$column_totals[$x],1,0,'R');
			$pdf->Ln();
		}
		
		//$pdf->SetY($Y_Table_Position);
		$pdf->setX(15);
		$pdf->Cell(85,8,'Paid:   '.$amount_paid,1,0,'L',1);
		
		$pdf->setX(100);
		$pdf->Cell(60,8,'Balance:   '.$balance,1,0,'L',1);
		
		$pdf->SetX(160);
		$pdf->MultiCell(35,8,'TT: '.$total_sum,1,'R');
		
		//Create lines (boxes) for each ROW (Product)
		//If you don't use the following code, you don't create the lines separating each row
		$i = 0;
		$pdf->SetY($Y_Table_Position);
		while ($i < $number_of_results){
			$pdf->SetX(15);
			$pdf->MultiCell(180,8,'',1);
			$i = $i +1;
		}
		
		
		$pdf->Output('sales_report.pdf','I');
	}
	else{
		header("Location:supplier_transaction_history.php");	
	}
?>