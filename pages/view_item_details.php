<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once 'log.php';
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
    if(isset($_GET['phone_id'])){
?>
<?php   include ("header.php");?>
<body>
    <div id="wrapper">

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">		
            <div class="row">
                <div class="col-md-12">
<?php			

			$phone_id = $_GET['phone_id'];	
			$query11="select * from phones inner join items inner join suppliers on items.ITEM_ID = phones.ITEM_ID && phones.supplier_id = suppliers.supplier_id  where phones.phone_id = '$phone_id'";		
			$query_run=mysqli_query($con,$query11)or die(mysqli_error($con));	
			echo "<div class='hero-unit-table'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-striped table-bordered table-hover'>
						<thead class='static'>	
                            <tr><td>Item</td><td>Details</td></tr>
					    </thead>";
			while($a=mysqli_fetch_assoc($query_run)){
			$phone_id=$a['phone_id'];
			
			$item = $a["ITEM_NAME"]; 
			$serial_number=$a["serial_number"];
			$customer_name = $a["customer_name"];
			$customer_phone = $a["customer_phone"]; 
            $phone_status=$a["phone_status"];
			$supplier_name=$a['supplier_name'];
			$register_date=$a['register_date'];
			$phone_return_status=$a['phone_return_status'];
			$faulty_description=$a['faulty_description'];
			}	
			echo "
                  <tr><td>Model Name:</td><td> $item</td></tr>
                  <tr><td>Serial Number:</td><td> $serial_number</td></tr>
                  <tr><td>Phone Status:</td><td> <strong>$phone_status</strong></td></tr>
                  <tr><td>Supplier Name:</td><td> <strong>$supplier_name</strong></td></tr>
				  <tr><td>Customer Name:</td><td> $customer_name</td></tr>
				  <tr><td>Register_date:</td><td> <strong>$register_date</strong></td></tr>
				  <tr><td>Phone_return_status:</td><td> <strong>$phone_return_status</strong></td></tr>
				  <tr><td>Faulty_description:</td><td> <strong>$faulty_description</strong></td></tr>
                  <tr><td>Edit Status</td><td><a href='#' class='btn btn-warning'><i class='fa fa-cog fa-spin fa-1x fa-fw'></i></a></td></tr>";				
			print "</div>";
			print "</div>";
	
?>

                </div>
            </div>


        </div>

    </div>


<?php
		}else{
            echo "<strong><font color='#cc0000'>Sorry  Doesnt Exist</font></strong>";
        }
?>
<?php   include ("footer2.php");?>