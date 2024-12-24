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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Procurement Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
<script type="text/javascript">
        $(function () {
            $('#txtDate').datepicker({
                dateFormat: "yy/MM/dd",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
	 <script src="jquery.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>
    <link href="jquery-ui.css" rel="Stylesheet" type="text/css" />
	
	
</head>

<body>

    <div id="wrapper">

       

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
        	<div class="row">
           		<form id="form1" runat="server" method="post" action="show_customers.php" role="form">
                    <div class = "col-md-3">Number of Results:</div>
                    <div class = "col-md-3">
                        <select name="number_of_results" class="form-control">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                            <option>250</option>
                            <option>500</option>
                            <option>All</option>
                        </select>
                     </div>
                     <div class = "col-md-3">
                        <button type="submit" name="limit_view" class="btn btn-primary">View</button>
                     </div>
                 </form>
            </div>
            <div class="row">
                <div class="col-lg-12">
<?php
			$query0="select * from customer";
			$query_run0=mysqli_query($con,$query0);
			$rows0=mysqli_num_rows($query_run0);
			$query="select * from customer limit 0,10";
			if(isset($_POST['limit_view'])){
				$number_of_results = $_POST['number_of_results'];
				if($number_of_results=='All'){
					$query="select * from customer";
				}
				else{
					$query="select * from customer limit 0,$number_of_results";
				}
			}
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>Manage customers <span style='float:right; color:#ff0000;'>$rows of $rows0</span></h3>";
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>Customer name</td><td>Address</td>
								<td>Phone</td><td>email</td>
						    </tr>
					    </thead>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['customer_id'];
			$qw=$a['customer_name'];
			$s=$a['address'];
			$q=$a['phone'];
			$e=$a['email'];
			echo "<tbody><tr bgcolor='#fff'><td>$qw</td><td>$s</td><td>$q</td><td>$e</td></tr></tbody>";
			}
			echo "</table><br>";
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

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>  
</body>

</html>