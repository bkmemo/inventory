<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(isset($_GET['requisition_id'])){
		require("fpdf.php");
		$con = db_connect();
		//Select the data from the database
		//$customer_name = $_SESSION['customer_name'];
		//$user_name = $_SESSION['username'];
		$requisition_id = $_GET['requisition_id'];
		$query="select * from requisition where requisition_id = '$requisition_id'";
		$result=mysqli_query($con,$query)or die(mysqli_error($con));
		$number_of_results = mysqli_num_rows($result);
		//For each row, add the field to the corresponding column
		while($row = mysqli_fetch_array($result)){
			$lpo_number=$row["lpo_number"];
			$ordered_By=$row["ordered_By"];
			$destination=$row["destination"];
			$reason=$row["reason"];
			$date_ordered=$row["date_ordered"];
			$date_required=$row["date_required"];
			$order_status=$row["order_status"];
			$approved_by=$row["approved_by"];
			
		}
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
		$image1 = "mobileshop.jpg";
		//Move to the right
		//$pdf->Cell(70);
		//Title
		$pdf->setXY(10,10);
		$pdf->SetFont('Arial','B',18);
		$pdf->Image('../images/'.$image1,90,15,30,10);
		
		$pdf->setXY(10,22);
		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(91); 
		$pdf->Cell(0,10,'Dealers in All Types Of Furniture',0,0,'C');		
		
	    $pdf->setXY(10,27);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,10,'Tel +256709744874 (Available Online 24/7)',0,0,'C');
		
		$pdf->setXY(10,33);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,10,'Bulange Mengo',0,0,'C');

		$pdf->setXY(10,40);
		$pdf->SetFont('Arial','U',13);
		$pdf->Cell(0,10,'REQUISITION ORDER',0,0,'C');
		
		$pdf->setXY(10,40);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(0,10,'Order Date: '.$date_ordered,0,0,'L');
		
		
		$pdf->setXY(10,45);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,10,'Required Date: '.$date_required,0,0,'R');
		
		$pdf->setXY(10,50);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'Order Status: '.$order_status,0,0,'L');
		
		$pdf->setXY(10,53);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'LPO Number: '.$lpo_number,0,0,'R');
		
		$pdf->setXY(10,60);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'Action By: '.$approved_by,0,0,'L');
		
		$pdf->setXY(10,60);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'Destination: '.$destination,0,0,'R');
		
		$pdf->setXY(10,60);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,10,'Reason: '.$reason,0,0,'C');
					
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
		
		//Initialize the 3 columns and the total
		$column_item = "";
		$column_quantity = "";
		$column_price = "";
		$column_total = "";
		$total = $number_of_results;
		
		
		$query1="select * from requisition inner join requisition_items_details inner join items on requisition.requisition_id = requisition_items_details.requisition_id && items.ITEM_ID = requisition_items_details.ITEM_ID where requisition.requisition_id='$requisition_id' order by requisition.date_ordered DESC";
		$result1=mysqli_query($con,$query1)or die(mysqli_error($con));
		$number_of_results = mysqli_num_rows($result1);
		$total_sum = 0;
		while($row1 = mysqli_fetch_array($result1)){
			$item = $row1["ITEM_NAME"]; 
			$description=$row1["description"];
			$quantity = $row1["PURCHASED_QUANTITY"];
			$price = $row1["BUYING_PRICE"]; 
			$total = $quantity*$price;
			//Sum all the Prices (TOTAL)
			$total_sum = $total_sum+$total;
			//Now show the 3 columns
			$pdf->SetTextColor(0,0,0);
			
			$pdf->SetFont('Arial','',12);
			
			$pdf->SetX(15);
			$pdf->Cell(85,8,$item,1);
			
			
			$pdf->SetX(100);
			$pdf->Cell(30,8,$quantity,1);
			
			$pdf->SetX(130);
			$pdf->Cell(30,8,$price,1,0,'R');
			
			$pdf->SetX(160);
			$pdf->Cell(35,8,$total,1,0,'R');
			$pdf->Ln();
		}
		
		//$pdf->SetY($Y_Table_Position);
		//$pdf->setX(15);
		//$pdf->Cell(85,8,'Paid:   '.$amount_paid,1,0,'L',1);
		
		//$pdf->setX(100);
		//$pdf->Cell(60,8,'Balance:   '.$balance,1,0,'L',1);
		
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
		
		
		$pdf->Output('Requisition.pdf','I');
	}
	else{
			header("Location:select_car_number.php");
	}
?>