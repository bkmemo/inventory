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


<?php   include ("../pages/header.php");?> 

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		        	<div class="panel-body" align="right">
                    	<h2>Purchases Report</h2>
						<!--<p>
                        	<a href="reports.php"><button type="button" class="btn btn-primary">Today</button></a>
                            <a href="receive_payment.php"><button type="button" class="btn btn-primary">Monthly</button></a>
                            <a href="select_customer.php"><button type="button" class="btn " style="background-color:#cc0000; color:#FFF">Close Account</button></a>
							
                        </p>-->
					</div>	
                
        <?php
	   	   $date1 = date('Y-m-d');
		   $date2 = $date1;
		   $groupby = "Invoice No";
		   if(isset($_POST['search'])){
		   		$date1 = $_POST['search_value1'];
				$date1 = strtotime( $date1 );
				$date1 = date( 'Y-m-d', $date1 );
				
				$date2 = $_POST['search_value2'];
				$date2 = strtotime( $date2 );
				$date2 = date( 'Y-m-d', $date2 );
				
				$groupby = $_POST['groupby'];
		   }
	   ?>
		<div class="box box-primary">
			<!-- <div class="box-header"><h3 class="box-title" style="color:#333333;">Report</h3></div> -->  
           <form  method="post" action="purchase_report.php"  role="form">
           <table width="100%">
           		<tr>
                	<th>Group By</th>
                    <th>
                    	<select name="groupby" class="form-control">
                    		<option>Invoice No</option><option>Supplier</option><option>Item</option>
                        </select>
                    </th>
                   <th>From</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="dopDate" class="form-control" name="search_value1" value="<?php echo $date1; ?>"  /></th>
                    <th>To</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="to_date" class="form-control" name="search_value2" value="<?php echo $date2; ?>"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Generate Report" class="btn btn-primary"></th>
                </tr>
           </table>
           </form>
        <?php get_purchase_report($groupby,$date1, $date2); ?>
           </div> <!-- /.col-lg-12 -->
		   </div>
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>
</body>
</html>