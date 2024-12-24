<?php	
   session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
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
					<div class="panel-body" align="right">
						<p>
                            <a href="add_expenses.php"><button type="button" class="btn btn-primary">Add Expense Type</button></a>
                            <a href="manage_expenses.php"><button type="button" class="btn btn-primary">View Expenses Type</button></a>
							<a href="incure_expenses.php"><button type="button" class="btn btn-primary">Enter Expense Incured</button></a>
                            <a href="expenses_history.php"><button type="button" class="btn btn-primary">Expense History</button></a>
                        </p>						   
					</div>
             </div>	
             		
				
				

		<div class="box box-primary">
			<?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <form  method="post" action="expenses_history.php"  role="form">
           <table width="100%">
           		<tr>
                	<th><h4 class="box-title" >Expenses</h4></th>
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
							$query0="select * from expenses inner join expenses_incured on expenses.EXPENSE_ID=expenses_incured.EXPENSE_ID where DATE like '%$search_value%' || expenses.EXPENSE_NAME  like '%$search_value%' group by expenses_incured.EXPENSE_ID order by expenses.EXPENSE_NAME ASC";
					   		echo "<h4>Sarch Results for $search_value</h4>";
					   }
					   else{
						   $query0="select * from expenses inner join expenses_incured on expenses.EXPENSE_ID=expenses_incured.EXPENSE_ID where DATE like '%$today%' group by expenses_incured.EXPENSE_ID order by expenses.EXPENSE_NAME ASC";
					   		echo "<h4>Today's Expenses</h4>";
					   }
					   
                        $query_run0=mysqli_query($con,$query0);
						echo "<table class='table table-bordered table-hover'>";
                        while($result0=mysqli_fetch_assoc($query_run0)){
							$expense_id=$result0['EXPENSE_ID'];
							$expense_name=$result0['EXPENSE_NAME'];
							if(isset($_POST['search'])){
								$query="select * from expenses_incured SE_ID where EXPENSE_ID='$expense_id' order by DATE ASC";
							}
							else{
								$query="select * from expenses_incured inner join expenses on expenses_incured.EXPENSE_ID=expenses.EXPENSE_ID where expenses_incured.EXPENSE_ID='$expense_id' && DATE like '%$today%' order by DATE ASC";
							}
							$query_run=mysqli_query($con,$query);
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>$expense_name</th>
							<th>Amount</th>
							<th>Descreption</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$total = 0;
							
							while($result=mysqli_fetch_assoc($query_run)){
								$amount_spent = $result['AMOUNT_SPENT'];
								$Descreption = $result['Descreption'];
								$date = $result['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$date</td>";
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