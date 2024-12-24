<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
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
		        	<div class="panel-body" align="center">
						<?php   include ("../pages/sales_links.php");?>     
					</div>	
                </div>
             		
		<div class="box box-primary">
			<div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['customer_name'];  ?></h3></div>   
           <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <form  method="post" action="supplier_transaction_history.php"  role="form">
           <table width="100%">
           		<tr>
                	<th><h4 class="box-title" >Customer Information</h4></th>
                </tr>
           </table>
           </form>
           <?php //get_totals($_SESSION['supplier_name']); ?>
       <?php
	   	   $customer_name = $_SESSION['customer_name'];
		   $query="select * from customer where customer_name='$customer_name'";
		   $query_run = mysqli_query($con,$query);
           if($query_run){
			   while($result=mysqli_fetch_assoc($query_run)){
					echo "<br /><table class='table' border='0'>";
						echo "<thead>";
						echo "<tr><th>Name</th><td>".$result['customer_name']."</td></tr>";
						echo "<tr><th>Phone</th><td>".$result['phone']."</td></tr>";
						echo "<tr><th>Email</th><td>".$result['email']."</td></tr>";
						echo "</thead>";
					echo "</table>";
			   }
		   }
		   
	?>
           </div> <!-- /.col-lg-12 -->
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>
</body>
</html>