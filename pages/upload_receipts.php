<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control js-example-basic-single'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option>$category_name</option>";
                    }
                    echo "</select>";
               }
               else{
                    echo "<h4><font color='#ff0000'>$error</font></h4>";
               }
         }
         else{
              echo "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function
	if(isset($_POST['add_receipt'])){
		$b=mysqli_real_escape_string($con,$_POST['SALES_ID']);
		$serial_number=mysqli_real_escape_string($con,$_POST['serial_number']);
		
		
		$target_path = "../receipts/";  
		$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
				  
				if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
					echo "File uploaded successfully!";  
				} else{  
					echo "Sorry, file not uploaded, please try again!";  
				}  

		$query = "SELECT * FROM `receipts` WHERE SALES_ID = '{$b}'";
		$result = mysqli_query($con,$query);
 		if (mysqli_num_rows ( $result ) >= 1 ){
			/* Username already exists */
			$_SESSION['response']= "Sorry Receipt already exists";
		}			

		else{
		$query="insert into receipts(`SALES_ID`, `phone_id`, `pdf_receipt`) values('$b', (select phone_id from phones where serial_number='$serial_number'), '$target_path')";
			mysqli_query($con,$query)or die(mysqli_error());
			$_SESSION['response']= "Successfully Registered";
		}
	}
?>
<?php   include ("../pages/header.php");?>

<body>

    <div id="wrapper">

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
		<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h4>Manage Receipts</h4>
								</div>
							</div>
						</div>
		</div>
            <div class="row">	
			<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['response']);?><?php echo htmlentities($_SESSION['response']="");?>
					</div>	
				<div class="col-md-3">
				<h4>Add Customer</h4>
                <form id="main-contact-form" method="post" action="upload_receipts.php" role="form" enctype="multipart/form-data">
                    Receipt No:        
                    <div class="form-group">
						<div class="form-group"><?php  selection('sales','SALES_ID','No Receipt');   ?></div>	
                    </div>
					Serial Number:        
                    <div class="form-group">
						<div class="form-group"><?php  selection('phones','serial_number','No Customer');   ?></div>	
                    </div>
                    Upload Pdf 
                    <div class="form-group">
						<input type="file"  name="fileToUpload"  class="form-control">
                    </div>
				    <div class="form-group">
						<button type="submit" name="add_receipt"  class="btn btn-success btn-md btn-block">Add Receipt </button>
                    </div>
            
                </form> 
		        </div>
				<div class="col-md-9">
				<h3>All Receipts</h3>
				<?php
			$query="select * from receipts inner join sales inner join phones on receipts.SALES_ID=sales.SALES_ID && receipts.phone_id=phones.phone_id limit 4";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "
			<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			<thead>	
			<tr><td>Invoice_No</td><td>Customer_Name</td><td>Serial_Number</td>
			<td>View</td></tr></thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$SALES_ID=$a['SALES_ID'];
			$customer_name=$a['customer_name'];
			$serial_number=$a['serial_number'];
			$pdf_receipt=$a['pdf_receipt'];
			echo "
			<tr><td>$SALES_ID</td><td>$customer_name</td><td>$serial_number</td>
			<td><iframe  src='$pdf_receipt' width='100%' height='200'></iframe></td></i></td></tr>
			";
			}
			echo "</tbody></table>";
			print"</div>";
		?>	
				</div> 	
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php   include ("../pages/footer.php");?>
<!-- Supplier -->
<script>

var form_being_submitted = false; /* global variable */

var checkForm = function(form) {

  if(form_being_submitted) {
    alert("The form is being submitted, please wait a moment...");
    form.myButton.disabled = true;
    return false;
  }

  if(form.supplier_name.value == "") {
    alert("Please enter supplier_name");
    form.supplier_name.focus();
    return false;
  }
  if(form.address.value == "") {
    alert("Please enter address");
    form.address.focus();
    return false;
  }
  if(form.phone.value == "") {
    alert("Please enter phone");
    form.phone.focus();
    return false;
  }
  if(form.email.value == "") {
    alert("Please enter email");
    form.email.focus();
    return false;
  }

  form.Add_supplier.value = 'Submitting form...';
  form_being_submitted = true;
  return true; /* submit form */
};

var resetForm = function(form) {
  form.myButton.disabled = false;
  form.myButton.value = "Submit";
  form_being_submitted = true;
};

</script>