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
				$_SESSION['response'] = "<h4><font color='#ff0000'>$error</font></h4>";
               }
         }
         else{
			$_SESSION['response'] = "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function
	if(!isset($_POST['scat'])){
		$query="select * from items inner join item_sellprice on items.ITEM_ID=item_sellprice.ITEM_ID where items.item_id=$_GET[item_id]";
		$query_run=mysqli_query($con,$query);
	if($_GET=mysqli_fetch_array($query_run)){}}
?>
<?php   include ("../pages/header.php");?>
<body>
    <div id="wrapper">
		<?php   include ("../pages/side.php");?>   
        <div id="page-wrapper">
		<div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
								<?php   include ("item_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
		<div class="panel panel-primary">
				  <div class="panel-heading"><h4>All Items</h4></div>
				  <div class="panel-body">
				  <?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
		<div class="col-lg-12">
        	<form id="main-contact-form" method="post" action="save_edit_item.php" role="form">
            <div class="row">
				<div class="col-md-4">
					Model Name
                    <div class="form-group">
					<input type="text"  name="ITEM_NAME" value="<?php echo $_GET['ITEM_NAME']; ?>"  required="required" class="form-control">
                	</div>
                	</div><div class="col-md-4">
					Brand name:
					 <div class="form-group">
						<?php 
												$payment_modes_query = "SELECT brand_name FROM brands"; // Adjust the query as needed
												$payment_modes_result = mysqli_query($con, $payment_modes_query);
												$payment_modes = [];
												while ($row = mysqli_fetch_assoc($payment_modes_result)) {
													$payment_modes[] = $row['brand_name'];
												}

												// Assume the selected mode of payment is retrieved from a database or request
												$selected_mode_of_payment = $_GET['brand_name'] ?? ''; // For example, from a GET request

												// Now generate the dropdown
												echo '<select name="brand_name" class="form-control" required>';
												foreach ($payment_modes as $mode) {
													$selected = ($mode == $selected_mode_of_payment) ? 'selected' : '';
													echo "<option value=\"$mode\" $selected>$mode</option>";
												}
												echo '</select>';  
											?>
						</div>
					</div><div class="col-md-4">
					Selling Price
                    <div class="form-group">
						<input type="text"  name="sell_price" value="<?php echo $_GET['PRICE']; ?>"  required="required" class="form-control">
                	</div>
					</div><div class="col-md-4">
                	Buying Price
                    <div class="form-group">
						<input type="text"  name="BUY_PRICE" value="<?php echo $_GET['BUY_PRICE']; ?>"  required="required" class="form-control">
                	</div>
					</div><div class="col-md-4">
					Item Type:
					<div class="form-group"> 
					<?php 
												$payment_modes_query = "SELECT ITEM_TYPE FROM items"; // Adjust the query as needed
												$payment_modes_result = mysqli_query($con, $payment_modes_query);
												$payment_modes = [];
												while ($row = mysqli_fetch_assoc($payment_modes_result)) {
													$payment_modes[] = $row['ITEM_TYPE'];
												}

												// Assume the selected mode of payment is retrieved from a database or request
												$selected_mode_of_payment = $_GET['ITEM_TYPE'] ?? ''; // For example, from a GET request

												// Now generate the dropdown
												echo '<select name="ITEM_TYPE" class="form-control" required>';
												foreach ($payment_modes as $mode) {
													$selected = ($mode == $selected_mode_of_payment) ? 'selected' : '';
													echo "<option value=\"$mode\" $selected>$mode</option>";
												}
												echo '</select>';  
											?>
						 	
                  	</div>
					</div><div class="col-md-4">					
					<div class="form-group">
						<input type="hidden" name="item_id" value="<?php echo $_GET['ITEM_ID']; ?>" required/>
					</div>
					<div class="form-group">
                    	<button type="submit" name="scat"  class="btn btn-success btn-md btn-block">Save Edit</button>
                	</div>
                	</div>
                	</div>
				 </form>
		</div>
		</div>
		</div>
		</div>
		</div>

<?php   include ("../pages/footer.php");?>