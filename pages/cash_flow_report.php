<?php	
   session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	session_start(); // Use session variable on this page. This function must put on the top of page.
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
						 <?php   include ("../pages/cashflow_links.php");?>	 						   
					</div>
             </div>	
             		
				
				

		<div class="box box-primary">
			<?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <form  method="post" action="assets_history.php"  role="form">
           <table width="100%">
           		<tr>
                	<th><h4 class="box-title" >Cash Flow Statement</h4></th>
                    <th><input style="float:right; text-align:center; width:80%;" type="text" id="" class="form-control" name="search_value"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Search" class="btn btn-primary"></th>
                </tr>
           </table>
           </form>
           <?php get_expense_totals(); ?>
		   <?php 
		   				date_default_timezone_set('Africa/Kampala');
		   				$today=date("Y-m-d");
						if(isset($_POST['search'])){
							$search_value = $_POST['search_value'];
							//$search_value = strtotime( $search_value );
							//$search_value = date( 'Y-m-d', $search_value );
							$query0="select * from cashflow inner join cashfow_amount on cashflow.cashflow_id=cashfow_amount.cashflow_id where DATE like '%$search_value%' || cashflow_type  like '%$search_value%' group by cashfow_amount.cashflow_id order by cashflow_type ASC";
					   		echo "<h4>Sarch Results for $search_value</h4>";
					   }
					   else{
						   $query0="select * from cashflow inner join cashfow_amount on cashflow.cashflow_id=cashfow_amount.cashflow_id where DATE like '%$today%' group by cashfow_amount.cashflow_id order by cashflow_type ASC";
					   		echo "<h4>Today's cashflow</h4>";
					   }
					   
                        $query_run0=mysqli_query($con,$query0);
						echo "<table class='table table-bordered table-hover'>";
                        while($result0=mysqli_fetch_assoc($query_run0)){
							$cashflow_id=$result0['cashflow_id'];
							$cashflow_type=$result0['cashflow_type'];
							$cashflow_category=$result0['cashflow_category'];
							if(isset($_POST['search'])){
								$query="select * from cashfow_amount where cashflow_id='$cashflow_id' order by DATE ASC";
							}
							else{
								$query="select * from cashfow_amount inner join cashflow on cashfow_amount.cashflow_id=cashflow.cashflow_id where cashfow_amount.cashflow_id='$cashflow_id' && DATE like '%$today%' order by cashflow_category";
							}
							$query_run=mysqli_query($con,$query);
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>$cashflow_category</th>
							<th>Amount</th>
							<th>Descreption</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$total = 0;
							if(!$query_run){
								echo mysqli_error($con);
							}
							while($result=mysqli_fetch_assoc($query_run)){
								$amount_spent = $result['AMOUNT'];
								$Descreption = $result['Descreption'];
								$cashflow_category = $result['cashflow_category'];
								$date = $result['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$cashflow_type</td>";
									echo "<td>$amount_spent</td>";
									echo "<td>$Descreption</td>";
								echo "</tr>";
							}
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th>$total</th><th></th></tr>";
							echo "</thead>";
                        }
						echo "</table>";
                    ?>	 
           </div> <!-- /.col-lg-12 -->
		    </div>
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>
	
</body>
</html>