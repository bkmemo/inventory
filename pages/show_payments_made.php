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
?>
<?php   include ("../pages/header.php");?>
<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default action (navigation)
                    const itemId = this.getAttribute('data-id');
                    const userConfirmed = confirm('Are you sure you want to delete this item?');

                    if (userConfirmed) {
                        // Proceed with deletion logic
                        // Redirect to the deletion URL
                        window.location.href = this.href;
                    } else {
                        // Do nothing if the user cancels the action
                        console.log('Deletion cancelled.');
                    }
                });
            });
        });
    </script>
<body>

    <div id="wrapper">

       
    
<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
			<div class="col-lg-12">
					<div class="panel-body" align="center">
						<?php   include ("../pages/requisition_links.php");?>								   
					</div>
             </div>			
            <div class="row"> 
                <div class="col-lg-12"><?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
<?php       

			$query="select * from payments_made inner join purchased_items on payments_made.PURCHASE_ID = purchased_items.PURCHASE_ID";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>All Payment Made</h3>";
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>ID</td><td>PURCHASE ID.</td>
								<td>AMOUNT_PAID</td><td>DATE</td><td>Action</td>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['PAYMENT_MADE_ID'];  	 	 
			$PURCHASE_ID=$a['PURCHASE_ID'];
			$DATE_OF_PAYMENT=$a['DATE_OF_PAYMENT'];
			$AMOUNT_PAID=$a['AMOUNT_PAID'];
			echo "<tr bgcolor='#fff'>
					<td>$id</td>
					<td>$PURCHASE_ID</td>
					<td>$AMOUNT_PAID</td>
					<td>$DATE_OF_PAYMENT</td>
					<td><a href='delete_payment_made.php?PAYMENT_MADE_ID=$id' class='btn btn-danger delete-btn' data-id='$id'>Delete</a></td>
                    </tr>";
					
			}
			echo "</tbody></table><br>";
			print "</div>";
			
			

?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php   include ("../pages/footer.php");?>