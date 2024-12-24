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
           		<form id="form1" runat="server" method="post" action="show_suppliers.php" role="form">
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
			$query0="select * from suppliers";
			$query_run0=mysqli_query($con,$query0);
			$rows0=mysqli_num_rows($query_run0);
			$query="select * from suppliers limit 0,10";
			if(isset($_POST['limit_view'])){
				$number_of_results = $_POST['number_of_results'];
				if($number_of_results=='All'){
					$query="select * from suppliers";
				}
				else{
					$query="select * from suppliers limit 0,$number_of_results";
				}
			}
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h4>Registered Suppliers <span style='float:right; color:#ff0000;'>$rows of $rows0</span></h4>";
			echo "
				<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
			<thead>	
			<tr  class='success' align='center'><td>No.</td><td>Supplier Name</td><td>Address</td><td>Phone</td><td>Email Address</td></tr></thead>";
			$n=0;
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['supplier_id'];
			$v=$a['supplier_name'];
			$c=$a['address'];
			$b=$a['phone'];
			$e=$a['email'];
			$n++;
			echo "<tbody>
			<tr align='center'><td>$n</td><td>$v</td><td>$c</td><td>$b</td><td>$e</td></tr> </tbody>";
			}
			echo "</table>";
			print"</div>";
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
<script type="text/javascript">
$(function(){
	$('#add').click(function(){
		addnewrow();
		});	
	$('body').delegate('.remove','click',function(){
		
	     $(this).parent().parent().remove();	
		
	});
		$('.detail').delegate('.quantity,.price,.discount','keyup',function(){
		
	    var tr = $(this).parent().parent();
		var qty = tr.find('.quantity').val();
		var price = tr.find('.price').val();
		var dis = tr.find('.discount').val();
		var amt = (qty*price)-(qty*price*dis)/100;
		tr.find('.amount').val(amt);
		total();
		
	});
});
function total(){
	var t = 0;
	$('.amount').each(function(i,e)
	{
	var amt = $(this).val()-0;
	t+=amt;
	} );
	
	$('.total').html(t);
	
	
}
   
function addnewrow()
{
	var n = ($('.detail tr').length-0)+1;
	var tr ='<tr>'+ 
				'<td class="no">' + n + '</td>'+
				'<td><input type="text" class="form-control productname"  name="productname[]"  ></td>'+
				'<td><input type="date" class="form-control exp_date" name="exp_date[]"></td>'+
				'<td><input type="text" class="form-control quantity"  name="quantity[]"  ></td>'+
				'<td><input type="text" class="form-control price"  name="price[]"  ></td>'+
				'<td><input type="text" class="form-control discount"  name="discount[]"  ></td>'+
				'<td><input type="text" class="form-control amount"  name="amount[]"  ></td>'+
				'<td><a href="#" class="remove">Delete</td>'+ 
			'</tr>';
			$('.detail').append(tr);
}
</script>
	 		<script>	
		
		function callAutoComplete(idname)
	{
	
	$("#"+idname).autocomplete("stock.php", {
		width: 160,
		autoFill: true,
		mustMatch: true,
		selectFirst: false
	});
	
	
	
	}
	</script>   
</body>

</html>