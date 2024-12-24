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

	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option>$category_name</option>";
                    }
                    echo "</select>";
               }
               else{
                    echo "<h3><font color='#ff0000'>$error</font></h3>";
               }
         }
         else{
              echo "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function

	if(isset($_POST['customer_name'])){
		$_SESSION['customer_name'] = $_POST['customer_name'];
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

    <title>MobileShop Uganda</title>


    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="../dist/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <link href="../dist/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link href="../css/datepicker.css" rel="Stylesheet" type="text/css" />
	    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
	
	
	<link href="../select2/dist/css/select2.min.css" rel="stylesheet" />

	
	<style>
      #ready {
         display: none;
         background-color: #f10044; 
         border: 1px solid #aaa; 
         position: fixed;
         width: 250px; 
         left: 50%;
         margin-left: -100px; 
         padding: 6px 8px 8px; 
         box-sizing: border-box; 
         text-align: center;
      }
      #ready button {
         background-color: #00ff56; 
         display: inline-block; 
         border-radius: 50%; 
         border: 1px solid #aaa; 
         padding: 5px;
         text-align: center; 
         width: 80px; 
         cursor: pointer;
      }
      #ready .message { 
         text-align: center;
      }
   </style>
   
   
   <link href="assets/kartik/css/dependent-dropdown.min.css" media="all" rel="stylesheet" type="text/css" />
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 
<script src="assets/kartik/js/dependent-dropdown.min.js" type="text/javascript"></script>

	
</head>

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
             		
				
				

		<form id="add_sales_form"  method="post" action="save_sales.php"  role="form">
        <div class="box box-primary">
		   <div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['customer_name'];  ?></h3></div>
		   <div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong><font color='green'>	<?php echo htmlentities($_SESSION['response']);?><?php echo htmlentities($_SESSION['response']="");?></font></h4>
					</div>
           <?php //get_totals($_SESSION['customer_name']); ?>
           <br />
           <table width="95%">
           		<tr>
                	<th><h4 class="box-title" >Add New Sale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                	<th><input type="hidden" value="<?php echo $_SESSION['customer_name']; ?>" name="customer_name" /></th>
                    <th><p style="float:right;">Date Of Sale <input style="float:right; text-align:center; width:50%;" id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="date_of_sale"  ></p></th>
                </tr>
           </table><br />
		   <table class="table table-bordered table-hover">
           		<thead>
                	<tr>
                    	<th>Item</th>
						<th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                        <th><input type="button" value="+" id=add class="btn btn-primary"></th> 
                    </tr>
                </thead>
				<tbody class="detail">
                		<tr> 
                        	
                            <td>
                            <?php 
							    $count = 0;
                                $query="select * from items inner join item_sellprice on items.ITEM_ID=item_sellprice.ITEM_ID order by items.ITEM_NAME ASC";
                                $query_run=mysqli_query($con,$query);
                                echo "<select id='item_select_1' name='item_name[]' class='form-control bold js-example-basic-single' onChange='change_item_price(1)'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
                                        $item_name=$result['ITEM_NAME'];
										echo "<option>$item_name</option>";
										if($count==0){ //store price for the first item in the list
											$price=$result['PRICE'];
											$count++;
										}
                                    }
                                echo "</select>";
                            ?>
							
							<select id="parent-1">
							<option>one </option>
							<option>two</option>
 
</select>
 
 
 
<select id="child-1" class="depdrop" data-depends="['parent-1']" data-url="http://localhost/mobile/pages/getSubCat.php">
 
   <!-- your select options -->
 
</select>
							
                            </td>
							<td><input id="quantity_1" type="text" class="form-control quantity bold"  name="quantity[]"  ></td>
                            <td><input id="price_1" value="<?php echo $price;?>" type="text" class="form-control price bold"  name="price[]" required></td>
                            <td><input id="amount_1" type="text" class="form-control amount bold"  name="amount[]" required ></td>
                            <td><a href="#" class="remove">Delete</a></td> 
                        </tr>
				</tbody>
				<tfoot>
					<th colspan="3">Total</th>
					<th colspan="1" style="text-align:left;" class="total" id="total">0</th>
                    <th></th>
                    <tr> 
                        <th colspan="3">Amount Paid</th>
                        <th><input type="text" class="form-control"  name="amount_paid" id="amount_paid" /></th>
                    </tr>
                    <tr> 
                        <th colspan="3">Balance</th>
                        <th class="balance">0</th>
                    </tr>
				</tfoot>
            </table>
			<div align="right"><button type="submit" name="save" class="btn btn-primary">Save Record</button></div>		 							
			</form>	
           </div> <!-- /.col-lg-12 -->
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   //include ("../pages/footer.php");?>
	

</body>
</html>