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
	function selection($table_name,$column_name,$selected,$error){
		$con = db_connect();
         $query="select * from $table_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $item_name=$a['ITEM_NAME'];
						if($item_name==$selected){
							echo "<option selected>$item_name</option>";
						}
						else{
                         echo "<option>$item_name</option>";
						}
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
	if(!isset($_POST['scat'])){
		$query="select * from item_retailprice inner join items on item_retailprice.item_id=items.ITEM_ID where items.ITEM_ID=$_GET[item_id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
?>


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
				<div class="col-lg-12">
					<div class="panel-body">
						<p>
                            <a href="add_price.php">
							<button type="button" class="btn btn-primary">Add New retail Price</button></a>
                            <a href="modify_price.php">
							<button type="button" class="btn btn-primary">View retail Price</button></a>
                        </p>						   
					</div>
             </div> 
        	<form id="main-contact-form" method="post" action="save_edit_price.php" role="form">
            <div class="row">
            	<div class="col-lg-12">
					<h3>Modifying Item retail Price</h3>
					Item Name
                    <div class="form-group">
						<?php selection('items','item_name',$_GET['ITEM_NAME'],'No Items'); ?>
                	</div>
                 </div>
					
                 <div class="col-lg-12">
					Retail Price
                    <div class="form-group">
						<input type="text"  name="retail_price" value="<?php echo $_GET['retail_price']; ?>"  required="required" class="form-control">
                	</div>
                 </div>
                 <div class="col-lg-12">
					<div class="form-group">
						<input type="hidden" name="item_id" value="<?php echo $_GET['ITEM_ID']; ?>" required/>
					</div>
                 </div>
                 <div class="col-lg-12">
                	<div class="form-group">
					</div>		
                 </div>
            </div>
            <div class="row">	
					<div class="form-group">
                    	<button type="submit" name="scat"  class="btn btn-success btn-md btn-block">Save Edit</button>
                	</div>
                </div><!-- /.col-lg-12 -->
        		</form>
            </div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
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
<?php
		}
		else{
			include "modify_price.php";
		}
	}	
	else{
		include "modify_price.php";
	}
?>