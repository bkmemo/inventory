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
                   echo "<select name='$column_name' class='form-control bold js-example-basic-single' required>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option=''>Select Unit</option>";
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
    <script src="../areyousure/jquery-1.4.2.min.js"></script>
    
<style>
.table-responsive {
    overflow-x: auto;
}

@media (max-width: 768px) {
    .table thead, .table tfoot {
        display: none;
    }
    .table tbody td {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
    .table tbody tr {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
    }
    .table tbody td:before {
        content: attr(data-label);
        font-weight: bold;
        width: 100%;
        display: block;
    }
}

/* Optional: Customize the appearance for better readability on small screens */
.table tbody td {
    padding: 0.5rem;
    border: 1px solid #dee2e6;
}

</style>
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
            <div class="panel panel-red">
				  <div class="panel-heading"><h3>Add New Sale For <?php echo $_SESSION['customer_name']; ?></h3></div>
				  <div class="panel-body"> 		
		<form id="add_sales_form"  method="post" action="save_sales.php" role="form" onsubmit="return checkForm(this);">
					<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
        <div class="row">
            <div class="col-md-3">
                Customer Name:
				<th><input type="hidden" value="<?php echo $_SESSION['customer_name']; ?>" name="customer_name" /></th>
                <input type="text" value="" name="customer" placeholder="Customer Name" class="form-control" />
            </div>
            <div class="col-md-3">
                Customer Telephone:
                <input type="text" name="customer_telephone" placeholder="Customer Telephone" class="form-control" required pattern="[0-9]{10,14}">
            </div>
			<div class="col-md-3">
                Sale Type
                	<div class="form-group"> 	 	
            			<select type="text" type="text"  name="topup_phone_serial"  required="required" class="form-control">
						<option value="">Select Unit</option>
						<option>Normal</option>
						<option>Linda</option>
						<option>Miriam</option>
						<option>Nasifu</option>
						<option>Dickson</option>
						<option>Ibrahim</option>
						</select>
                  	</div>	
            </div>
            <div class="col-md-3">
                Date Of Sale:
                <input id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="date_of_sale">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 250px;">Item</th>
                        <th>Serial</th>
                        <th style="width: 150px;">Buying Price</th>
                        <th>Qty</th>
                        <th>Selling Price</th>
                        <th>Amount</th>
                        <th><input type="button" value="+" id="add" class="btn btn-primary"></th>
                    </tr>
                </thead>
                <tbody class="detail">
                    <tr>
                        <td>
                            <?php 
                                $count = 0;
                                $query = "select i.ITEM_NAME, s.PRICE, k.QUANTITY from items i inner join item_sellprice s on i.ITEM_ID=s.ITEM_ID inner join phones p on i.ITEM_ID=p.ITEM_ID inner join item_stock k on i.ITEM_ID = k.ITEM_ID where p.phone_status='OnSale' group by i.ITEM_ID order by i.ITEM_NAME ASC";
                                $query_run = mysqli_query($con, $query);
                                echo "<select id='item_select_1' name='item_name[]' class='form-control bold js-example-basic-single' onChange='change_item_price(1)'>";
                                while ($result = mysqli_fetch_assoc($query_run)) {
                                    $item_name = $result['ITEM_NAME'];
                                    $qty = $result['QUANTITY'];
                                    echo "<option value='$item_name'>$item_name | ($qty)</option>";
                                    if ($count == 0) { // store price for the first item in the list
                                        $price = $result['PRICE'];
                                        $count++;
                                    }
                                }
                                echo "</select>";
                            ?>
                        </td>
                        <td>
                            <select id="serial_1" class="serial_multiple_1" name="serial_1[]" multiple="multiple" style="width: 200px;" onChange="change_item_price2(1)">
                            </select>
                        </td>
                        <td><div id="buying_price_1"></div></td>
                        <td><input id="quantity_1" type="text" class="form-control quantity bold" name="quantity[]" readonly></td>
                        <td><input id="price_1" value="<?php echo $price; ?>" type="text" class="form-control price bold" name="price[]" required></td>
                        <td><input id="amount_1" type="text" class="form-control amount bold" name="amount[]" required></td>
                        <td><a href="#" class="remove">Delete</a></td>
                    </tr>
                </tbody>
                <tfoot>
                    <th colspan="5">Total</th>
                    <th colspan="1" style="text-align:left;" class="total" id="total">0</th>
                    <th></th>
                    <tr>
                        <th colspan="5">Amount Paid</th>
                        <th><input type="text" class="form-control" name="amount_paid" id="amount_paid"></th>
                    </tr>
                    <tr>
                        <th colspan="5">Balance</th>
                        <th class="balance">0</th>
                    </tr>
                </tfoot>
            </table>
            <div align="right">
                <button  type="submit" name="save" class="btn btn-primary">Save Record</button>
            </div>
        </div>
    </div>
</form>
           </div>
           </div>
           </div>
           </div>



<?php   include ("../pages/footer.php");?>
	

<script type="text/javascript">

$(document).ready(function() {
    $('.serial_multiple_1').select2();
});

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
   
	function addnewrow() {
    var n = ($('.detail tr').length - 0) + 1;
    var tr = '<tr>' +
        '<td><select id="item_select_' + n + '" class="form-control bold js-example-basic-single" name="item_name[]" onChange="change_item_price(' + n + ')">' + select_options + '</select></td>' +
        '<td><select id="serial_' + n + '" onChange="change_item_price2(' + n + ')" class="serial_multiple_' + n + '" name="serial_' + n + '[]" multiple="multiple" style="width: 200px;"></select></td>' +
        '<td><div id="buying_price_' + n + '"></div></td>' +
        '<td><input id="quantity_' + n + '" type="text" class="form-control quantity bold" name="quantity[]" readonly></td>' +
        '<td><input id="price_' + n + '" type="text" class="form-control price bold" name="price[]"></td>' +
        '<td><input id="amount_' + n + '" type="text" class="form-control amount bold" name="amount[]"></td>' +
        '<td><a href="#" class="remove">Delete</a></td>' +
    '</tr>';
    $('.detail').append(tr);
    $('.js-example-basic-single').select2();
    $('.serial_multiple_' + n).select2();

    // Set default values for price and quantity based on the first option
    var selectedOption = $('#item_select_' + n + ' option:selected');
    var quantity = selectedOption.data('quantity');
    var price = selectedOption.data('price');
    
    $('#quantity_' + n).val(quantity);
    $('#price_' + n).val(price);
}
	
	var item_prices,items, item_serial_numbers, item_ids;
	
	function change_item_price2(row_id){
		//Change price
		var serial_select = document.getElementById("serial_"+row_id);
		var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = 0;
		var buying_price_HTML = '';
		$("#buying_price_"+row_id).html("");
		for (var i=0; i<serial_select.length; i++) {
			opt = serial_select[i];
			if (opt.selected) {
			  qty = qty + 1;
			  
			$.ajax({
				url: "backend_script.php", // Replace with the actual backend script URL
				type: "GET", // or "GET" depending on your server-side logic
				data: { selectedValue: opt.value },
				success: function(response) {
					buying_price_HTML = buying_price_HTML + response;
					//alert(buying_price_HTML);
				  // Update the page with the retrieved data
				  $("#buying_price_"+row_id).html("<p>"+buying_price_HTML +"</p>");
				},
				error: function(error) {
				  console.error("Error loading data:", error);
				}
			});
	  
			  //alert(opt.value)
			}
		}
		//document.getElementById("buying_price_"+row_id).innerHTML = buying_price_HTML;
		document.getElementById('quantity_'+row_id).value = qty;
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();
		
		/*var selectedOptions = [];
		for (var i = 0; i < selectElement.options.length; i++) {
			if (selectElement.options[i].selected) {
				selectedOptions.push(selectElement.options[i].value);
			}
		}*/

	}
	
	function change_item_price(row_id){
		//Change price
		document.getElementById('quantity_'+row_id).value = 0;
		var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = $('#quantity_'+row_id).val();
		
		//document.getElementById("buying_price_"+row_id).innerHTML = item_buy_prices[item_select.selectedIndex]
		$("#buying_price_"+row_id).html("");
		
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();
		//end of change Price
		//alert(item_ids[item_select.selectedIndex]+' '+item_select.selectedIndex);
		//change serial numbers
		var serial_numbers = '';
		for(x=0;x<item_serial_numbers.length;x++){
			if(item_ids[item_select.selectedIndex] == item_serial_numbers[x]['item_id']){
				serial_numbers = serial_numbers+"<option style='color: #ff0000;'  value='"+item_serial_numbers[x]['serial_number']+"'>"+item_serial_numbers[x]['serial_number']+"</option>";
				//alert(item_buy_prices[x])
			}
		}
		
		var serial_option = document.getElementById("serial_"+row_id);
		for(x=0;x<serial_option.options.length;x++){
			serial_option.remove(x);
		}
		$('#serial_'+row_id).empty().append(serial_numbers);
		//alert(serial_numbers);
		//end of change serial numbers
	}
	
	function get_select_options(){
		var y;
		for(x=0;x<items.length;x++){
			y = y+"<option>"+items[x]+"</option>";
		}
		return y;
	}
	
// get items sell prices
	<?php
		$item_ids;
		$items; //array that stores all items
		$item_prices; //array that stores all item prices
		$item_serial_numbers;
		//$query="select * from items inner join item_sellprice inner join phones on items.ITEM_ID=item_sellprice.ITEM_ID && items.ITEM_ID=phones.ITEM_ID && phones.phone_status='OnSale' group by items.ITEM_ID order by items.ITEM_NAME ASC";

		$query="select i.ITEM_ID, i.ITEM_NAME, s.PRICE, s.BUY_PRICE from items i inner join item_sellprice s on i.ITEM_ID=s.ITEM_ID inner join phones p on i.ITEM_ID=p.ITEM_ID where p.phone_status='OnSale' group by i.ITEM_ID order by i.ITEM_NAME ASC";

		$query_run = mysqli_query($con,$query);
		if($query_run){
			$count = mysqli_num_rows($query_run);
			if($count>0){
				$index=0; $index2=0;
				while($a=mysqli_fetch_assoc($query_run)){

					$item_id = $a["ITEM_ID"];
					$item_ids[$index]=$a["ITEM_ID"];
					$items[$index]=$a["ITEM_NAME"];
					$item_prices[$index]=$a["PRICE"];
					$item_buy_prices[$index]=$a["BUY_PRICE"];
					$index++;

					$query2="select p.serial_number, p.ITEM_ID from phones p  where p.ITEM_ID='".$item_id."' && p.phone_status='OnSale' group by p.serial_number";
					$query_run2 = mysqli_query($con,$query2);
					if($query_run2){
						$count2 = mysqli_num_rows($query_run2);
						if($count2>0){
							while($a2=mysqli_fetch_assoc($query_run2)){
								$item_serial_numbers[$index2]['item_id']=$a2["ITEM_ID"];
								$item_serial_numbers[$index2]['serial_number']=$a2["serial_number"];
								$index2++; //item_prices
							}
						}
					}
					
					/*$item_ids[$index]=$a["ITEM_ID"];
					$items[$index]=$a["ITEM_NAME"];
					$item_prices[$index]=$a["PRICE"];
					$item_serial_numbers[$index]['item_id']=$a["ITEM_ID"];
					$item_serial_numbers[$index]['serial_number']=$a["serial_number"];
					$index++;*/
				}
			}
		}
	?>
	item_prices = <?php echo json_encode($item_prices); ?>;
	item_ids = <?php echo json_encode($item_ids); ?>;
	items = <?php echo json_encode($items); ?>;
	item_buy_prices = <?php echo json_encode($item_buy_prices); ?>;
	item_serial_numbers = <?php echo json_encode($item_serial_numbers); ?>;
	
	//console.log(item_serial_numbers);
	//console.log(item_ids);
	//console.log(items);
</script>

</body>
</html>

<script>

var form_being_submitted = false; /* global variable */

var checkForm = function(form) {

  if(form_being_submitted) {
    alert("The form is being submitted, please wait a moment...");
    form.myButton.disabled = true;
    return false;
  }
    if(form.customer.value == "") {
    alert("Please enter customer");
    form.customer.focus();
    return false;
  }
   form.save.value = 'Submitting form...';
  form_being_submitted = true;
  return false; /* submit form */
};

var resetForm = function(form) {
  form.myButton.disabled = false;
  form.myButton.value = "submit";
  form_being_submitted = false;
};

</script>
<script type="text/javascript">
    var select_options = "<?php
        $options = '';
        $query = "SELECT i.ITEM_NAME, s.PRICE, k.QUANTITY FROM items i
                  INNER JOIN item_sellprice s ON i.ITEM_ID=s.ITEM_ID
                  INNER JOIN phones p ON i.ITEM_ID=p.ITEM_ID
                  INNER JOIN item_stock k ON i.ITEM_ID = k.ITEM_ID
                  WHERE p.phone_status='OnSale'
                  GROUP BY i.ITEM_ID
                  ORDER BY i.ITEM_NAME ASC";
        $query_run = mysqli_query($con, $query);
        while ($result = mysqli_fetch_assoc($query_run)) {
            $item_name = $result['ITEM_NAME'];
            $qty = $result['QUANTITY'];
            $options .= "<option value='$item_name'>$item_name | ($qty)</option>";
        }
        echo $options;
    ?>";
</script>