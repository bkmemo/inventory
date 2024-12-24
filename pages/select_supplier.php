<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
     error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);

	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
?>
<?php
//include ("connect.php");
//function that retiedsfdsfdsf
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

<!DOCTYPE html>
<html lang="en">
<?php   include ("../pages/header.php");?> 
<body>
    <div id="wrapper">
<!-- Navigation -->
	<?php   include ("../pages/side.php");?>        
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--<div class="panel-body" align="right">
					<p>
                       <a href="add_stock.php"><button type="button" class="btn btn-primary">Enter Stock Purchases</button></a>
                       <a href="show_stock.php"><button type="button" class="btn btn-primary">Show Stock Purchases</button></a>
                    </p>						   
				</div>-->
				<form id="form1" runat="server" method="post" action="add_stock.php" role="form">
				<div class="box box-primary">
					<div class="box-header"><h3 class="box-title">Select Supplier</h3></div>
					<div class="row">
						<div class = "col-md-4">
							<div class="form-group"><?php  selection('suppliers','supplier_name','No suppliers');   ?></div>		
						</div>
						<div class = "col-md-4">
           					<div class="form-group"><button type="submit" name="" class="btn btn-primary">Open Account</button></div>
						</div>
            		</div><!-- /.row -->
        		</div>
                </form>
           </div>
       </div>
       </div>
   </div><!-- /#page-wrapper -->
   <?php   include ("../pages/footer.php");?>  
