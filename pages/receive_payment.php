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
<head>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

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
           <?php echo "<h4><font color='green'>".$_SESSION['response']."</font></h4>"; $_SESSION['response']=""; ?>
           <center><table width="100%">
           		<tr>
                	<th><h4 class="box-title" >Credit List</h4></th>
                </tr>
           </table></center>
           <?php //get_totals($_SESSION['supplier_name']); ?>
      	   <?php include "html-type/index.php"; ?>
      </div><!-- /.row -->
      
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>

<script src="../assets/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
	
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'getuser.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});

</script>
</body>
</html>