<?php 

	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
  include ("../pages/header.php");?>

<body>

    <div id="wrapper">
        <div id="page-wrapper">

		<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h4>Search For Recept No Or Serial Number</h4>
								</div>
							</div>
						</div>
		</div>            
		
		<div class="row">	
		<div class="col-lg-12">
<form method="POST" action="view_receipts.php">
    <div class="row">	
		<div class="col-lg-12">
			<div class="col-md-6">
					<input type="text" name="search" placeholder="Search for Serial Number Or Receipt No" class="form-control" required>
			</div>
			<div class="col-md-6">
				<button type="submit" name="SEARCH"  class="btn btn-success btn-lg btn-block">Search </button>
			</div>
		</div>
	</div><br><br>
</form>

<?php
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
			$search=$_POST['search'];

			$query="select * from receipts inner join sales inner join phones on receipts.SALES_ID=sales.SALES_ID && receipts.phone_id=phones.phone_id where phones.serial_number='$search' OR sales.SALES_ID='$search'";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
    if ($rows > 0) { 

			echo "
			<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover'>
			<thead>	
			<tr><td>Item</td><td>Details</td>
			</tr></thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$SALES_ID=$a['SALES_ID'];
			$customer_name=$a['customer_name'];
			$serial_number=$a['serial_number'];
			$pdf_receipt=$a['pdf_receipt'];
			
			}
			echo "
			<tr>
			<tr><td>Invoice Number</td><td>$SALES_ID</td></tr>
			<tr><td>Customer Name</td><td>$customer_name</td></tr>
			<tr><td>Serial Number</td><td>$serial_number</td></tr>
			<tr><td>Receipt</td><td><iframe  src='$pdf_receipt' width='100%' height='300'></iframe></td></tr>";
			echo "</tbody></table>";
			print"</div>";
  
  
}}
  else { 
  
  echo "No results found"; 
  
  }
?>

           </div>
           </div>
           </div>
           </div>

<?php   include ("../pages/footer.php");?>
<!-- Supplier -->
<script>