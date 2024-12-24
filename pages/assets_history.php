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
						 <?php   include ("../pages/balance_sheet_links.php");?>	 						   
					</div>
             </div>	
             		
			<div class="row">
					<div class="col-lg-12">
					<div class="col-lg-6">
					<?php 
							
					   		echo "<h4>Current Assets</h4>";
							echo "<table class='table table-bordered table-hover'>";
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>Asset Type</th>
							<th>Descreption</th>
							<th>Amount</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$query0="select * from  bstype_amount inner join balance_sheet on balance_sheet.balance_sheet_id=bstype_amount.balance_sheet_id where balance_sheet.category_type='Current Assets'";
							$total=0;
							$query_run=mysqli_query($con,$query0);
							while($result=mysqli_fetch_assoc($query_run)){
								$balance_sheet_type = $result['balance_sheet_type'];
								$amount_spent = $result['AMOUNT'];
								$Descreption = $result['Descreption'];
								$category_type = $result['category_type'];
								$date = $result['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$balance_sheet_type</td>";
									echo "<td>$Descreption</td>";
									echo "<td>$amount_spent</td>";
									
								echo "</tr>";
								
								
							}
							
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th></th><th>$total</th></tr>";
							echo "</thead>";
                      
						echo "</table>";
                    ?>						
					
					
					
					
					</div>
					<div class="col-lg-6">
					<?php 
							
					   		echo "<h4>Current Liabilities</h4>";
							echo "<table class='table table-bordered table-hover'>";
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>Asset Type</th>
							<th>Descreption</th>
							<th>Amount</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$query1="select * from  balance_sheet inner join bstype_amount on balance_sheet.balance_sheet_id=bstype_amount.balance_sheet_id where balance_sheet.category_type = 'Current Liabilities'";
							$total=0;
							$query_run1=mysqli_query($con,$query1);
							while($result1=mysqli_fetch_assoc($query_run1)){
								$balance_sheet_type = $result1['balance_sheet_type'];
								$amount_spent = $result1['AMOUNT'];
								$Descreption = $result1['Descreption'];
								$category_type = $result1['category_type'];
								$date = $result1['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$balance_sheet_type</td>";
									echo "<td>$Descreption</td>";
									echo "<td>$amount_spent</td>";
									
								echo "</tr>";
							}
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th></th><th>$total</th></tr>";
							echo "</thead>";
                      
						echo "</table>";
                    ?>									
					
					
					</div>
			</div>
			<div class="col-lg-12">
					<div class="col-lg-6">
					<?php 
							
					   		echo "<h4>Property Plan & Equipments</h4>";
							echo "<table class='table table-bordered table-hover'>";
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>Asset Type</th>
							<th>Descreption</th>
							<th>Amount</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$query0="select * from  bstype_amount inner join balance_sheet on balance_sheet.balance_sheet_id=bstype_amount.balance_sheet_id where balance_sheet.category_type='Property Plan & Equipments'";
							$total=0;
							$query_run=mysqli_query($con,$query0);
							while($result=mysqli_fetch_assoc($query_run)){
								$balance_sheet_type = $result['balance_sheet_type'];
								$amount_spent = $result['AMOUNT'];
								$Descreption = $result['Descreption'];
								$category_type = $result['category_type'];
								$date = $result['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$balance_sheet_type</td>";
									echo "<td>$Descreption</td>";
									echo "<td>$amount_spent</td>";
									
								echo "</tr>";
							}
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th></th><th>$total</th></tr>";
							echo "</thead>";
                      
						echo "</table>";
                    ?>						
					
					
					
					
					</div>
					<div class="col-lg-6">
					<?php 
							
					   		echo "<h4>Long Term Liabilities</h4>";
							echo "<table class='table table-bordered table-hover'>";
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>Asset Type</th>
							<th>Descreption</th>
							<th>Amount</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$query1="select * from  balance_sheet inner join bstype_amount on balance_sheet.balance_sheet_id=bstype_amount.balance_sheet_id where balance_sheet.category_type = 'Long Term Liabilities'";
							$total=0;
							$query_run1=mysqli_query($con,$query1);
							while($result1=mysqli_fetch_assoc($query_run1)){
								$balance_sheet_type = $result1['balance_sheet_type'];
								$amount_spent = $result1['AMOUNT'];
								$Descreption = $result1['Descreption'];
								$category_type = $result1['category_type'];
								$date = $result1['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$balance_sheet_type</td>";
									echo "<td>$Descreption</td>";
									echo "<td>$amount_spent</td>";
									
								echo "</tr>";
							}
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th></th><th>$total</th></tr>";
							echo "</thead>";
                      
						echo "</table>";
                    ?>									
					
					
					</div>
			</div>
			<div class="col-lg-12">
					<div class="col-lg-6">
					<?php 
							
					   		echo "<h4>Intergable Assets</h4>";
							echo "<table class='table table-bordered table-hover'>";
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>Asset Type</th>
							<th>Descreption</th>
							<th>Amount</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$query0="select * from  bstype_amount inner join balance_sheet on balance_sheet.balance_sheet_id=bstype_amount.balance_sheet_id where balance_sheet.category_type='Intergable Assets'";
							$total=0;
							$query_run=mysqli_query($con,$query0);
							while($result=mysqli_fetch_assoc($query_run)){
								$balance_sheet_type = $result['balance_sheet_type'];
								$amount_spent = $result['AMOUNT'];
								$Descreption = $result['Descreption'];
								$category_type = $result['category_type'];
								$date = $result['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$balance_sheet_type</td>";
									echo "<td>$Descreption</td>";
									echo "<td>$amount_spent</td>";
									
								echo "</tr>";
							}
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th></th><th>$total</th></tr>";
							echo "</thead>";
                      
						echo "</table>";
                    ?>						
					
					
					
					
					</div>
					<div class="col-lg-6">
					<?php 
							
					   		echo "<h4>Owners Equity</h4>";
							echo "<table class='table table-bordered table-hover'>";
							echo "<thead>";
							echo "<tr bgcolor='#99cc99'>
							<th>Asset Type</th>
							<th>Descreption</th>
							<th>Amount</th>
							
							</tr>";
							echo "</thead>";
							echo "<tbody>";
							$query1="select * from  balance_sheet inner join bstype_amount on balance_sheet.balance_sheet_id=bstype_amount.balance_sheet_id where balance_sheet.category_type = 'Owners Equity'";
							$total=0;
							$query_run1=mysqli_query($con,$query1);
							while($result1=mysqli_fetch_assoc($query_run1)){
								$balance_sheet_type = $result1['balance_sheet_type'];
								$amount_spent = $result1['AMOUNT'];
								$Descreption = $result1['Descreption'];
								$category_type = $result1['category_type'];
								$date = $result1['DATE']; 
								$total = $total+$amount_spent;  
								echo "<tr>";
									echo "<td>$balance_sheet_type</td>";
									echo "<td>$Descreption</td>";
									echo "<td>$amount_spent</td>";
									
								echo "</tr>";
							}
							echo "</tbody>";
							echo "<thead>";
							echo "<tr bgcolor='#e2e2e2' style='hover:none;'><th>Total</th><th></th><th>$total</th></tr>";
							echo "</thead>";
                      
						echo "</table>";
                    ?>									
					
					
					</div>
			</div>
			</div>

		    </div>
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
<?php   include ("../pages/footer.php");?>
	
</body>
</html>