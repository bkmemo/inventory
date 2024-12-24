<?php
	include ("connect.php");
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	session_start(); // Use session variable on this page. This function must put on the top of page.
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
	<script src="../areyousure/jquery.are-you-sure.js"></script>
    <script src="../areyousure/ays-beforeunload-shim.js"></script>
    
    
    <script>
  $(function() {
    $('#add_sales_form').areYouSure(
          {
            message: "Did you forget to save your standard coffee order?"
          }
        );
  });

</script>
</head>
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
                        	<a href="add_sales.php"><button type="button" class="btn btn-primary">Sale Entry</button></a>
                            <a href="receive_payment.php"><button type="button" class="btn btn-primary">Recieve Payment</button></a>
                            <a href="customer_transaction_history.php"><button type="button" class="btn btn-primary">Sales History</button></a>
                            <a href="customer_information.php"><button type="button" class="btn btn-primary">Customer Info</button></a>
                            <a href="select_customer.php"><button type="button" class="btn " style="background-color:#cc0000; color:#FFF">Close Account</button></a>	
                        </p>
					</div>	
                </div>
             		
				
				

		<form id="add_sales_form"  method="post" action="save_sales.php"  role="form">
        <div class="box box-primary">
		   <div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['customer_name'];  ?></h3></div>
		   <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <?php //get_totals($_SESSION['customer_name']); ?>
           <br />
           <table width="95%">
           		<tr>
                	<th><h4 class="box-title" >Add New Sale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                	<th><input type="hidden" value="<?php echo $_SESSION['customer_name']; ?>" name="customer_name" /></th>
                    <th><p>Sale Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    	<select name="sale_type" onChange="switch_view()">
                        	<option>Retail</option>
                            <option>Whole Sale</option>
                        </select>
                    </th>
                    <th><p style="float:right;">Date Of Sale <input style="float:right; text-align:center; width:50%;" id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="date_of_sale"  ></p></th>
                </tr>
           </table><br />
		   <table class="table table-bordered table-hover">
           		<thead>
                	<tr>
                    	<th>Quantity</th>
                    	<th>Item</th>
                        <th id="package_0" style="display:none;">Packaging</th>
                        <th>Batch No</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th><input type="button" value="+" id=add class="btn btn-primary"></th> 
                    </tr>
                </thead>
				<tbody class="detail">
                		<tr> 
                        	<td><input id="quantity_1" type="text" class="form-control quantity bold"  name="quantity[]"  ></td>
                            <td>
                            <?php 
							    $count = 0;$item_id=0;
                                $query="select * from items inner join purchased_items_details inner join item_retailprice on items.ITEM_ID=purchased_items_details.ITEM_ID && items.ITEM_ID=item_retailprice.item_id group by items.ITEM_NAME order by items.ITEM_NAME ASC";
                                $query_run=mysqli_query($con,$query);
                                echo "<select id='item_select_1' name='item_name[]' class='form-control bold' onChange='change_package_and_price(1)'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
                                        $item_name=$result['ITEM_NAME'];
										echo "<option>$item_name</option>";
										if($count==0){ //store price for the first item in the list
											$retail_price=$result['retail_price'];
											$item_id=$result['ITEM_ID'];
											$count++;
										}
                                    }
                                echo "</select>";
                            ?>
                            </td>
                            <td id="package_1" style="display:none;">
                            <?php 
							    $count = 0;
                                $query="select * from items inner join item_packaging on items.ITEM_ID=item_packaging.item_id order by items.ITEM_NAME ASC";
                                $query_run=mysqli_query($con,$query);
                                echo "<select id='package_select_1' name='package_name[]' class='form-control bold' onChange='change_price(1)'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
                                        $packaging_type=$result['packaging_type'];
										echo "<option>$packaging_type</option>";
										if($count==0){ //store price for the first item in the list
											$whole_sale_price=$result['sell_price'];
											$count++;
										}
                                    }
                                echo "</select>";
                            ?>
                            </td>
                            <td>
                            	<?php 
							    $count = 0;
                                $query="select * from purchased_items_details where ITEM_ID=$item_id";
                                $query_run=mysqli_query($con,$query);
                                echo "<select id='bacth_no_select_1' name='batch_no[]' class='form-control bold'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
                                        $batch_no=$result['BATCH_NO'];
										echo "<option>$batch_no</option>";
										if($count==0){ //store price for the first item in the list
											$item_batch_no=$batch_no;
											$count++;
										}
                                    }
                                echo "</select>";
                            ?>
                            </td>
                            <td><input id="price_1" value="<?php echo $retail_price;?>" type="text" class="form-control price bold"  name="price[]" /></td>
                            <td><input id="amount_1" type="text" class="form-control amount bold"  name="amount[]"  ></td>
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
<?php   include ("../pages/footer.php");?>
	
	

<script type="text/javascript">
$(function(){
	$('#add').click(function(){
		addnewrow();
		});	
	$('body').delegate('.remove','click',function(){
		 var n = ($('.detail tr').length-0);
		 if(n != 1){
			 $(this).parent().parent().remove();
			 total();
			 calculate_balance();	
		 }
		
	});
	
	$('.detail').delegate('.quantity,.price','keyup',function(){
		
	    var tr = $(this).parent().parent();
		var qty = tr.find('.quantity').val();
		var price = tr.find('.price').val();
		var amt = (qty*price);
		tr.find('.amount').val(amt);
		total();
		calculate_balance();	
	});
	
	$('#amount_paid').keyup(function() {
		calculate_balance();
	});
	
	
});
function calculate_balance(){
	var amount_paid = $('#amount_paid').val() // get the current value of the input field.
	var total_amount = $('.total').text();
	var balance = total_amount-amount_paid;
	$('.balance').html(balance);	
}
function total(){
	var t = 0;
	$('.amount').each(function(i,e){
		var amt = $(this).val()-0;
		t+=amt;
	} );
	$('.total').html(t);	
}

var current_view = "retail";
   
	function addnewrow(){
		var n = ($('.detail tr').length-0)+1;
		if(current_view == "retail"){
			var tr ='<tr>'+
				'<td><input id="quantity_'+n+'" type="text" class="form-control quantity bold"  name="quantity[]"></td>'+
				'<td><select id="item_select_'+n+'" class="form-control bold" name="item_name[]"  onChange="change_package_and_price('+n+')">'+get_retail_select_options()+'</select></td>'+
				'<td id="package_'+n+'" style="display:none;"><select id="package_select_'+n+'" class="form-control bold" name="package_name[]"  onChange="change_price('+n+')">'+get_whole_sale_package_options()+'</select></td>'+
				'<td><select id="batch_no_select_'+n+'" class="form-control bold" name="batch_no[]"  onChange="change_package_and_price('+n+')">'+get_batch_select_options()+'</select></td>'+
				'<td><input id="price_'+n+'" type="text" value="<?php echo $retail_price; ?>" class="form-control price bold" name="price[]"></td>'+
				'<td><input id="amount_'+n+'" type="text" class="form-control amount bold"  name="amount[]"></td>'+
				'<td><a href="#" class="remove">Delete</td>'+ 
			'</tr>';
		}
		else{
			var tr ='<tr>'+
				'<td><input id="quantity_'+n+'" type="text" class="form-control quantity bold"  name="quantity[]"></td>'+
				'<td><select id="item_select_'+n+'" class="form-control bold" name="item_name[]"  onChange="change_package_and_price('+n+')">'+get_whole_sale_select_options()+'</select></td>'+
				'<td id="package_'+n+'" style="display:block;"><select id="package_select_'+n+'" class="form-control bold" name="package_name[]"  onChange="change_price('+n+')">'+get_whole_sale_package_options()+'</select></td>'+
				'<td><select id="batch_no_select_'+n+'" class="form-control bold" name="batch_no[]"  onChange="change_package_and_price('+n+')">'+get_batch_select_options()+'</select></td>'+
				'<td><input id="price_'+n+'" type="text" value="<?php echo $whole_sale_price; ?>" class="form-control price bold" name="price[]"></td>'+
				'<td><input id="amount_'+n+'" type="text" class="form-control amount bold"  name="amount[]"></td>'+
				'<td><a href="#" class="remove">Delete</td>'+ 
			'</tr>';
		}
		$('.detail').append(tr);
	}
	 
	
	function switch_view(){
		var number_of_rows= ($('.detail tr').length-0)+1;
		var items,price;
		if(current_view == 'retail'){
			for(var x = 0; x<number_of_rows; x++){
				document.getElementById("package_"+x).style.display = "block";
			}
			current_view = 'whole_sale';
			items = whole_sale_items;
			price = whole_sale_prices[0][0];
			/*for(var x = 0; x<whole_sale_batch_nos[0].length; x++){
				batch_nos[x] = whole_sale_batch_nos[0][x];
			}*/
		}
		else{
			for(var x = 0; x<number_of_rows; x++){
				document.getElementById("package_"+x).style.display = "none";
			}
			current_view = 'retail';
			items = retail_items;
			price = retail_prices[0];
			//batch_nos = item_batch_nos;
		}
		
		for(var row = 1;row<number_of_rows;row++){
			var item_select = document.getElementById("item_select_"+row);
			var package_select = document.getElementById("package_select_"+row);
			//var bacth_no_select = document.getElementById("bacth_no_select_"+row);
			
			for(var i = item_select.options.length - 1 ; i >= 0 ; i--){
				item_select.remove(i);
			}
			for(var i = 0; i< items.length; i++){
				var option = document.createElement("option");
				option.text = items[i];
				item_select.add(option);
			}
			
			for(var i = package_select.options.length - 1 ; i >= 0 ; i--){
				package_select.remove(i);
			}
			for(var i = 0; i< whole_sale_item_packages[0].length; i++){
				var option = document.createElement("option");
				option.text = whole_sale_item_packages[0][i];
				package_select.add(option);
			}
			
			/*for(var i = batch_no_select.options.length - 1 ; i >= 0 ; i--){
				batch_no_select.remove(i);
			}
			for(var i = 0; i< batch_nos.length; i++){
				var option = document.createElement("option");
				option.text = batch_nos[i];
				batch_no_select.add(option);
			}
			*/
			$('#price_'+row).val(price);
		}
		
		
	}
	
	var retail_items,retail_prices,whole_sale_items,whole_sale_item_packages,whole_sale_prices,item_batch_nos,whole_sale_batch_nos;
	
	function change_package_and_price(row_id){
		var price,batch_nos;
		var item_select = document.getElementById("item_select_"+row_id);
		var package_select = document.getElementById("package_select_"+row_id);
		var batch_no_select = document.getElementById("batch_no_select_"+row);
		
		if(current_view == 'retail'){
			price = retail_prices[item_select.selectedIndex];
			//batch_nos = item_batch_nos;
		}
		}
		else{
			price = whole_sale_prices[item_select.selectedIndex][0];
			//for(var x = 0; x<whole_sale_batch_nos[item_select.selectedIndex].length; x++){
				//batch_nos[x] = whole_sale_batch_nos[item_select.selectedIndex][x];
			//}
		}
		
		for(var i = package_select.options.length - 1 ; i >= 0 ; i--){
			package_select.remove(i);
		}
		for(var i = 0; i< whole_sale_item_packages[item_select.selectedIndex].length; i++){
			var option = document.createElement("option");
			option.text = whole_sale_item_packages[item_select.selectedIndex][i];
			package_select.add(option);
		}
		
		/*for(var i = batch_no_select.options.length - 1 ; i >= 0 ; i--){
			batch_no_select.remove(i);
		}
		for(var i = 0; i< batch_nos.length; i++){
			var option = document.createElement("option");
			option.text = batch_nos[i];
			batch_no_select.add(option);
		}*/
		
		var qty = $('#quantity_'+row_id).val();
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();
	}
	
	function change_price(row_id){
		var item_select = document.getElementById("item_select_"+row_id);
		var package_select = document.getElementById("package_select_"+row_id);
		var price = whole_sale_prices[item_select.selectedIndex][package_select.selectedIndex];
		var qty = $('#quantity_'+row_id).val();
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();
	}
	function get_batch_select_options(){
		var y;
		for(x=0;x<item_batch_nos.length;x++){
			y = y+"<option>"+item_batch_nos[x]+"</option>";
		}
		return y;
	}
	
	function get_retail_select_options(){
		var y;
		for(x=0;x<retail_items.length;x++){
			y = y+"<option>"+retail_items[x]+"</option>";
		}
		return y;
	}
	function get_whole_sale_select_options(){
		var y;
		for(x=0;x<whole_sale_items.length;x++){
			y = y+"<option>"+whole_sale_items[x]+"</option>";
		}
		return y;
	}
	function get_whole_sale_package_options(){
		var y;
		for(x=0;x<whole_sale_item_packages[0].length;x++){
			y = y+"<option>"+whole_sale_item_packages[0][x]+"</option>";
		}
		return y;
	}
	
// get items sell prices
	<?php
		$retail_items; //array that stores all items
		$retail_prices; //array that stores all retail prices
		
		$item_batch_nos;
		$whole_sale_items;
		$whole_sale_item_packages;
		$whole_sale_prices;
		$whole_sale_batch_nos; 
		//$query="select * from items inner join item_retailprice on items.ITEM_ID=item_retailprice.item_id group by items.ITEM_NAME order by items.ITEM_NAME ASC";
		$query="select * from items inner join purchased_items_details inner join item_retailprice on items.ITEM_ID=purchased_items_details.ITEM_ID && items.ITEM_ID=item_retailprice.item_id group by items.ITEM_NAME order by items.ITEM_NAME ASC";
		//$query="select * from items inner join item_retailprice on items.ITEM_ID=item_retailprice.item_id order by items.ITEM_NAME ASC";
		$query_run = mysqli_query($con,$query);
		if($query_run){
			$count = mysqli_num_rows($query_run);
			if($count>0){
				$index=0;
				while($a=mysqli_fetch_assoc($query_run)){
					$retail_items[$index]=$a["ITEM_NAME"];
					$retail_prices[$index]=$a["retail_price"];
					if($index==0){$item_id=$a['ITEM_ID'];}
					$index++;
				}
			}
		}
		
		$query="select * from purchased_items_details where ITEM_ID=$item_id";
        $query_run=mysqli_query($con,$query);
		$item_index=0;
        while($result=mysqli_fetch_assoc($query_run)){
        	$item_batch_nos[$item_index]=$result['BATCH_NO'];
			$item_index++;
		}
		
		
		$query="select * from items inner join item_packaging on items.ITEM_ID=item_packaging.item_id group by items.ITEM_NAME order by items.ITEM_NAME ASC";
		$query_run = mysqli_query($con,$query);
		$item_index=0;
		while($result=mysqli_fetch_assoc($query_run)){
			$whole_sale_items[$item_index]=$result['ITEM_NAME'];
			$item_id=$result["ITEM_ID"];
			
			$query0="select * from item_packaging where item_id=$item_id order by packaging_type";
			$query_run0 = mysqli_query($con,$query0);
			$package_index= 0;
			while($a0=mysqli_fetch_assoc($query_run0)){
				$whole_sale_item_packages[$item_index][$package_index]=$a0["packaging_type"];
				$whole_sale_prices[$item_index][$package_index]=$a0['sell_price'];
				$package_index++;
			}
			
			$query0="select * from purchased_items_details where ITEM_ID=$item_id order by EXPIRY_DATE";
			$query_run0 = mysqli_query($con,$query0);
			$package_index= 0;
			while($a0=mysqli_fetch_assoc($query_run0)){
				$whole_sale_batch_nos[$item_index][$package_index]=$a0['BATCH_NO'];
				$package_index++;
			}
			$item_index++;
        }
	?>
	retail_items = <?php echo json_encode($retail_items); ?>;
	retail_prices = <?php echo json_encode($retail_prices); ?>;
	item_batch_nos = <?php echo json_encode($item_batch_nos); ?>;
	
	
	whole_sale_items = <?php echo json_encode($whole_sale_items); ?>;
	whole_sale_item_packages = <?php echo json_encode($whole_sale_item_packages); ?>;
	whole_sale_prices = <?php echo json_encode($whole_sale_prices); ?>;
	whole_sale_batch_nos = <?php echo json_encode($whole_sale_batch_nos); ?>;
	
</script>

</body>
</html>