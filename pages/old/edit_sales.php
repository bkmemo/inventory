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
	if(isset($_POST['sale_id']) || isset($_GET['sale_id'])){
		if(isset($_POST['sale_id'])){
			$sale_id = $_POST['sale_id'];
		}
		else{
			$sale_id = $_GET['sale_id'];
		}
		if(isset($_POST['customer'])){
			$_SESSION['customer_name'] = $_POST['customer'];
		}
		$customer = $_SESSION['customer_name'];
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
						<?php   include ("../pages/sales_links.php");?>        
					</div>	
                </div>
             		
		<form  method="post" action="save_edit_sales.php"  role="form">
        <div class="box box-primary">
		   <div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['customer_name'];  ?></h3></div>
		   <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <?php //get_totals($_SESSION['customer_name']); ?>
           <br />
           <?php 
				$r = mysqli_query($con,"select DATE_OF_SALE from sales where SALES_ID='$sale_id'");
				while($result00=mysqli_fetch_assoc($r)){
					$date = $result00['DATE_OF_SALE'];
				}
                
                //Get customer information
			$query3="select p.customer_name, p.customer_phone from salesdetails_phones sdp inner join phones p on sdp.phone_id = p.phone_id inner join sales_details sd on sd.SALE_DETAILS_ID = sdp.sales_details_id where sd.SALES_ID = $sale_id";
		    $result3=mysqli_query($con,$query3);
		    while($row3 = mysqli_fetch_array($result3)){
			    $customer_name = $row3["customer_name"];
			    $phone = $row3["customer_phone"];
		    }
				

		   ?>

		   <table width="95%">
           		<tr>
                	<th><h4 class="box-title" >Edit Sale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                	<th><p style="float:right;">Customer Name
                		<input type="text" value="<?php echo $customer_name; ?>" class="form-control" name="customer_name" />
                        <input type="hidden" value="<?php echo $customer_name; ?>" name="customer_name" />
                    </p>
                	</th>
                	<th><p style="float:right;">Customer Telephone
                		<input type="text" value="<?php echo $phone; ?>" class="form-control" name="customer_telephone" />
                    </p>
                	</th>
                    <th><p style="float:right;">Date Of Sale <input style="float:right; text-align:center; width:50%;" id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="date_of_sale"  ></p></th>
                </tr>
           </table><br />

		   <table class="table table-bordered table-hover">
           		<thead>
                	<tr>
                    	<th>Item</th>
                    	<th>Serial</th>
						<th>Qty</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                        <th><input type="button" value="+" id=add class="btn btn-primary"></th> 
                    </tr>
                </thead>
				<tbody class="detail">
                <?php
					$query0="select * from sales inner join sales_details inner join customer inner join items on 
					sales.SALES_ID=sales_details.SALES_ID && sales.CUSTOMER_ID=customer.customer_id && 
					sales_details.ITEM_ID=items.ITEM_ID where 
					sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer') && 
					sales_details.SALES_ID=$sale_id";
                    $query_run0=mysqli_query($con,$query0);
					$count = 0;
					$row = 1; $row1 = 1;
					$total = 0;
                    while($result0=mysqli_fetch_assoc($query_run0)){
						$sale_details_id = $result0['SALE_DETAILS_ID'];
						$item_id = $result0['ITEM_ID'];
						$item_name = $result0['ITEM_NAME'];
						$quantity = $result0['QUANTITY_SOLD'];
						$unit_price = $result0['SELLING_PRICE'];
						$amount = $unit_price*$quantity;
						$total = $total+$amount;
						echo "<tr>";
							echo "<td>";
            				//$query="select * from items inner join item_sellprice on items.ITEM_ID=item_sellprice.ITEM_ID order by items.ITEM_NAME ASC";
            				$query="select i.ITEM_NAME, s.PRICE from items i inner join item_sellprice s on i.ITEM_ID=s.ITEM_ID inner join phones p on i.ITEM_ID=p.ITEM_ID group by i.ITEM_ID order by i.ITEM_NAME ASC";

                        	$query_run=mysqli_query($con,$query);
                                echo "<select id='item_select_".$row."' name='item_name[]' class='form-control js-example-basic-single' onChange='change_item_price($row)'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
                                        $item_name2=$result['ITEM_NAME'];
										if($item_name==$item_name2){
											echo "<option selected>$item_name</option>";
										}
										else{
											echo "<option>$item_name2</option>";
										}
										if($count==0){ //store price for the first item in the list
											$price=$result['PRICE'];
											$count++;
										}
                                    }
                                echo "</select>";
								echo "<input type='hidden' class='form-control sale_details_id' value='$sale_details_id' name='sales_details_id[]'  >";
								echo "<input type='hidden' value='$sale_id' name='sale_id'  >";
                            ?>
                            </td>
                            <td>
                            	
								<?php
								    
                                    //$query="select i.serial_number, p.phone_status from salesdetails_phones s inner join phones p on s.phone_id=p.phone_id inner join sales_details sd on sd.SALE_DETAILS_ID = s.sales_details_id ";

								    $query="select p.serial_number, p.phone_status, sd.SALES_ID from phones p inner join salesdetails_phones sdp on p.phone_id = sdp.phone_id inner join sales_details sd on sd.SALE_DETAILS_ID = sdp.sales_details_id where sd.SALES_ID = $sale_id && sd.ITEM_ID = $item_id ";


                                    $query_run=mysqli_query($con,$query);
                                    echo "<select id='serial_".$row1."' name='serial_".$row1."[]' class='serial_multiple' onChange='change_item_price2($row1)' multiple='multiple' style='width: 200px;''>";
                                        while($result=mysqli_fetch_assoc($query_run)){
                                        	$serial_number=$result['serial_number'];
                                            echo "<option selected>".$serial_number."</option>";
                                        }
                                   echo "</select>";
								?>

							</td>
                            <td><input id="quantity_<?php echo $row; ?>" value="<?php echo $quantity; ?>" type="text" class="form-control quantity"  name="quantity[]" readonly ></td>
                            <td><input id="price_<?php echo $row; ?>" value="<?php echo $unit_price;?>" type="text" class="form-control price"  name="price[]" /></td>
                            <td><input id="amount_<?php echo $row; ?>" value="<?php echo $amount ?>" type="text" class="form-control amount"  name="amount[]"  ></td>
                            <td><a href="delete_edited_sale.php?<?php echo "sale_details_id=$sale_details_id"; ?>" class="btn btn-default btn-success">Delete</a></td> 
                        </tr>
                 <?php 
						$row++;	$row1++;
					} 
					//get the amount paid
					$query3="select * from payments_received where SALES_ID=$sale_id";
                    $query_run3=mysqli_query($con,$query3);
					$amount_paid = 0;
                    while($result3=mysqli_fetch_assoc($query_run3)){
						$amount_paid = $amount_paid+$result3['AMOUNT_PAID'];
					}
					//calculate balance
					$balance = $total-$amount_paid
					
				?>
				</tbody>
				<tfoot>
					<th colspan="4">Total</th>
					<th colspan="1" style="text-align:left;" class="total" id="total"><?php echo $total; ?></th>
                    <th></th>
                    <tr> 
                        <th colspan="4">Amount Paid</th>
                        <th><input type="text" class="form-control" value="<?php echo $amount_paid; ?>"  name="amount_paid" id="amount_paid" /></th>
                    	<th></th>
                    </tr>
                    <tr> 
                        <th colspan="4">Balance</th>
                        <th class="balance"><?php echo $balance; ?></th>
                        <th></th>
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

$(document).ready(function() {
    $('.serial_multiple').select2();
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
   
	function addnewrow(){
		var n = ($('.detail tr').length-0)+1;
		var select_options = get_select_options();
		var tr ='<tr>'+
				'<td><select id="item_select_'+n+'" class="form-control bold js-example-basic-single" name="item_name[]"  onChange="change_item_price('+n+')">'+select_options+'</section></td>'+
				'<td><select id="serial_'+n+'"  onChange="change_item_price2('+n+')" class="serial_multiple_'+n+'" name="serial_'+n+'[]" multiple="multiple" style="width: 200px;"></td>'+
				'<td><input id="quantity_'+n+'" type="text" class="form-control quantity bold"  name="quantity[]" readonly></td>'+
				'<td><input id="price_'+n+'" type="text" value="<?php echo $price; ?>" class="form-control price bold" name="price[]"></td>'+
				'<td><input id="amount_'+n+'" type="text" class="form-control amount bold"  name="amount[]"></td>'+
				'<td><a href="#" class="remove">Delete</td>'+ 
			'</tr>';
			$('.detail').append(tr);
			$('.js-example-basic-single').select2();
			$('.serial_multiple_'+n).select2();
	}

	
	var item_prices,items, item_serial_numbers, item_ids;
	
	function change_item_price2(row_id){
		//Change price
		var serial_select = document.getElementById("serial_"+row_id);
		var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = 0;
		
		for (var i=0; i<serial_select.length; i++) {
			opt = serial_select[i];
			if (opt.selected) {
			  qty = qty + 1;
			}
		}
		document.getElementById('quantity_'+row_id).value = qty;
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();
	}
	function change_item_price(row_id){
		//Change price
		document.getElementById('quantity_'+row_id).value = 0;
		var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = $('#quantity_'+row_id).val();
		
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
				serial_numbers = serial_numbers+"<option value='"+item_serial_numbers[x]['serial_number']+"'>"+item_serial_numbers[x]['serial_number']+"</option>";
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

		$query="select i.ITEM_ID, i.ITEM_NAME, s.PRICE from items i inner join item_sellprice s on i.ITEM_ID=s.ITEM_ID inner join phones p on i.ITEM_ID=p.ITEM_ID group by i.ITEM_ID order by i.ITEM_NAME ASC";

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
					$index++;

					$query2="select p.serial_number, p.ITEM_ID from phones p  where p.ITEM_ID='".$item_id."' group by p.serial_number";
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
	item_serial_numbers = <?php echo json_encode($item_serial_numbers); ?>;
	
	console.log(item_serial_numbers);
	console.log(item_ids);
	console.log(items);
</script>


</body>
</html>
<?php
	}//end of if(isset($_POST['sale_id'])){
	else{
		header ("Location:customer_transaction_history.php");
	}
?>