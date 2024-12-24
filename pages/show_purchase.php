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
                    const itemId = this.getAttribute('data-id');
                    const userConfirmed = confirm('Are you sure you want to delete this item?');

                    if (userConfirmed) {
                        // Proceed with deletion logic
                        // For example, send a request to the server to delete the item
                        // Here we're just removing the item from the list for demonstration
                        const listItem = this.closest('li');
                        listItem.remove();
                        console.log(`Item with ID ${itemId} has been deleted.`);
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

			$query="select * from purchased_items inner join user inner join suppliers on 
            purchased_items.USER_ID = user.id && purchased_items.SUPPLIER_ID = suppliers.supplier_id";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>PURCHASES</h3>";
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>PURCHASE ID</td><td>Username</td><td>Supplier</td><td>RECEIPT_NO</td><td>DATE_OF_PURCHASE</td>
								<td>Action</td>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['PURCHASE_ID'];  
            $username=$a['username']; 	 	 	 	 	 	 	
			$supplier_name=$a['supplier_name'];
            $RECEIPT_NO=$a['RECEIPT_NO'];
            $DATE_OF_PURCHASE=$a['DATE_OF_PURCHASE'];
			echo "<tr bgcolor='#fff'>
					<td>$id</td>
                    <td>$username</td>
					<td>$supplier_name</td>
                    <td>$RECEIPT_NO</td>
                    <td>$DATE_OF_PURCHASE</td>
					<td><a href='delete_purchase.php?PURCHASE_ID=$id' class='btn btn-danger delete-btn' data-id='$id'>Delete</a></td></tr>";
					
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



    