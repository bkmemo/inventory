<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_item'])){	
		$brand_name=$_POST['brand_name'];
		$item_name=$_POST['ITEM_NAME'];
		$serial_number=$_POST['serial_number'];
		$supplier_name=$_POST['supplier_name'];
		
        $register_date = $_POST['register_date'];
		$register_date = strtotime( $register_date );
		$register_date = date( 'Y-m-d H:i:s', $register_date );
		
		$query0 = "SELECT * FROM phones WHERE serial_number='$serial_number'";
		$query_run0=mysqli_query($con, $query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into phones (ITEM_ID, serial_number, supplier_id, register_date, phone_status)
			 values((select ITEM_ID from items where ITEM_NAME='$item_name'), '$serial_number', (select supplier_id from suppliers where supplier_name='$supplier_name'), '$register_date', 'OnSale')";
			 $run = mysqli_query($con,$query)or die(mysqli_error($con));
			$_SESSION['response'] = "$serial_number Add To The Database";
		}
		else{
			$_SESSION['response'] = "$serial_number Already Exists In The Database";
		}
		
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
            <div class="row">
				<div class="panel panel-primary">
				   <div class="panel-heading"><h4>Manage Phones</h4></div>
					   <div class="panel-body">
						 <div class="col-md-12"> <?php   include ("../pages/manage_phones.php");?> </div>
					   </div>					
					</div>					
			</div>					
            </div>
                <!-- /.col-lg-12 -->
            <!-- /.row -->
        </div>
   <?php   include ("../pages/footer.php");?> 
