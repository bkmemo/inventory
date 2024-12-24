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
	if(isset($_POST['purchase_id']) || isset($_GET['purchase_id'])){
		if(isset($_POST['purchase_id'])){
			$purchase_id = $_POST['purchase_id'];
		}
		else{
			$purchase_id = $_GET['purchase_id'];
		}
		if(isset($_POST['supplier_name'])){
			$_SESSION['supplier_name'] = $_POST['supplier_name'];
		}
		$supplier_name = $_SESSION['supplier_name'];
		
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
?>        


<!DOCTYPE html>
<html lang="en">

<?php   include ("../pages/header.php");?> 

<style type="text/css">
	.word {
  color: #FFF;
  background: #333;
  padding: 0px 7px;
  border-radius: 10px;
}

.space {
	padding: 0px 5px;
    background: #fff;
}
</style>

<script type="text/javascript">
	var serials;
</script>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		        	<div class="panel-body" align="center">
						<?php   include ("../pages/purchase_links.php");?> 
					</div>	
                </div>
             		
		<form  method="post" action="save_edit_purchases.php"  role="form">
        <div class="box box-primary">
		   <div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['supplier_name'];  ?></h3></div>
		   <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <?php //get_totals($_SESSION['customer_name']); ?>
           <br />
		   <h4 class="box-title" >Edit Purchase&nbsp;</h4>
		   <div class="col-lg-12">
		<div class="col-md-4">
		  
		  <input type="hidden" value="<?php echo $_SESSION['supplier_name']; ?>" name="supplier_name" />
		 
		</div>
		<div class="col-md-4">		
					<?php 
						$r = mysqli_query($con,"select * from purchased_items where PURCHASE_ID='$purchase_id'");
						while($result00=mysqli_fetch_assoc($r)){
							$receipt_no = $result00['RECEIPT_NO'];
							$date = $result00['DATE_OF_PURCHASE'];
						}
					?>		
			Receipt No
			<div class="form-group"><input type="text" name="receipt_no" value="<?php echo $receipt_no; ?>" class="form-control"   ></div>
		</div>
		<div class="col-md-4">			
            Date Of Purchase 
		<div class="form-group">
				<input id="dopDate" type="text" name="purchase_date" class="form-control" value="<?php echo $date; ?>">
		</div>
		</div>
		</div>
		   
		   <table class="table table-bordered table-hover">
           		<thead>
                	<tr>
                    	<th>Item</th>
                    	<th colspan="2">Serial</th>
						<th>Qty</th>
                    	<th>Unit Price</th>
                        <th>Amount</th>
                        <th><input type="button" value="+" id=add class="btn btn-primary"></th> 
                    </tr>
                </thead>
				<tbody class="detail">
                <?php
					$query0="select * from purchased_items inner join purchased_items_details inner join suppliers inner join items on 
					purchased_items.PURCHASE_ID=purchased_items_details.PURCHASE_ID && purchased_items.SUPPLIER_ID=suppliers.supplier_id && 
					purchased_items_details.ITEM_ID=items.ITEM_ID where 
					purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') && 
					purchased_items_details.PURCHASE_ID=$purchase_id";
                    $query_run0=mysqli_query($con,$query0);
					$count = 0;
					$row = 1;
					$total = 0;
					$serial_index = 0;
					$serials[] = null;
                    while($result0=mysqli_fetch_assoc($query_run0)){
						$purchase_details_id = $result0['PURCHASED_ITEM_DETAILS_ID'];
						$item_name = $result0['ITEM_NAME'];
						$quantity = $result0['PURCHASED_QUANTITY'];
						$unit_price = $result0['BUYING_PRICE'];
						//$batch_no = $result0['BATCH_NO'];
						//$expiry_date = $result0['EXPIRY_DATE'];
						$amount = $unit_price*$quantity;
						$total = $total+$amount;
                        
                        $query50="select * from phones p inner join purchased_items_details_phones pidp on p.phone_id = pidp.phone_id where pidp.purchased_items_details_id=$purchase_details_id";
                        $query_run50=mysqli_query($con,$query50);
                        $serial_string = '';
                        while($result50=mysqli_fetch_assoc($query_run50)){
						    $serial_string = $serial_string.' '.$result50['serial_number'];
					    }
					    $serials[$serial_index] = $serial_string;
                        $serial_index++;
						echo "<tr>";
						?> 
                        <?php  	 	 
							echo "<td>";
            				$query="select * from items inner join purchased_items_details on items.ITEM_ID=purchased_items_details.ITEM_ID order by items.ITEM_NAME ASC";
                        	$query_run=mysqli_query($con,$query);
                                echo "<select id='item_select_".$row."' name='item_name[]' class='form-control bold js-example-basic-single' onChange='change_item_price($row)'>";
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
								echo "<input type='hidden' class='form-control purchase_details_id' value='$purchase_details_id' name='purchase_details_id[]'  >";
								echo "<input type='hidden' value='$purchase_id' name='purchase_id'  >";
                            ?>
                            </td>
                            <td><input id="serial_<?php echo $row; ?>" type="text" name="serial[]" class="form-control" value="<?php echo $serials[$row-1]; ?>" style="width: 100%;" required /></td>
                            <td><div id="TextContainer_serial_<?php echo $row; ?>"></div></td>
							<td><input id="quantity_serial_<?php echo $row; ?>" value="<?php echo $quantity; ?>" type="text" class="form-control quantity  bold"  name="quantity[]" readonly ></td>
                            <td><input id="price_<?php echo $row; ?>" value="<?php echo $unit_price;?>" type="text" class="form-control price  bold"  name="price[]" /></td>
                            <td><input id="amount_<?php echo $row; ?>" value="<?php echo $amount ?>" type="text" class="form-control amount  bold"  name="amount[]"  ></td>
                            <td><a href="delete_edited_purchase.php?<?php echo "purchase_details_id=$purchase_details_id"; ?>" class="btn btn-default btn-success">Delete</a></td> 
                        </tr>
                 <?php 
						$row++;	
					} 
					//get the amount paid
					$query3="select * from payments_made where PURCHASE_ID=$purchase_id";
                    $query_run3=mysqli_query($con,$query3);
					$amount_paid = 0;
                    while($result3=mysqli_fetch_assoc($query_run3)){
						$amount_paid = $amount_paid+$result3['AMOUNT_PAID'];
					}
					//calculate balance
					$balance = $total-$amount_paid
					
				?>
				<script type="text/javascript"> serials = <?php echo json_encode($serials); ?>; </script>
				</tbody>
				<tfoot>
					<th colspan="5">Total</th>
					<th colspan="1" style="text-align:left;" class="total" id="total"><?php echo $total; ?></th>
                    <th></th>
                    <tr> 
                        <th colspan="5">Amount Paid</th>
                        <th><input type="text" class="form-control" value="<?php echo $amount_paid; ?>"  name="amount_paid" id="amount_paid" /></th>
                    	<th></th>
                    </tr>
                    <tr> 
                        <th colspan="5">Balance</th>
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
		t= t+amt;
	} );
	$('.total').html(t);	
}
   
	function addnewrow(){
		var n = ($('.detail tr').length-0)+1;
		var select_options = get_select_options();
		var tr ='<tr>'+
				'<td><select id="item_select_'+n+'" class="form-control  bold js-example-basic-single" name="item_name[]"  onChange="change_item_price('+n+')">'+select_options+'</section></td>'+
				'<td><input id="serial_'+n+'" type="text" class="form-control" name="serial[]" /></td><td><div id="TextContainer_serial_'+n+'"></div></td>'+
				'<td><input id="quantity_serial_'+n+'" type="text" class="form-control quantity  bold"  name="quantity[]" readonly></td>'+
				'<td><input id="price_'+n+'" type="text" value="" class="form-control price  bold" name="price[]"></td>'+
				'<td><input id="amount_'+n+'" type="text" class="form-control amount  bold"  name="amount[]"></td>'+
				'<td><a href="#" class="remove">Delete</td>'+ 
			'</tr>';
			$('.detail').append(tr);
			
			$('.date_'+n).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			$('.js-example-basic-single').select2();
			document.querySelector('#serial_'+n).addEventListener('input', ({ target }) => textToElements(target.value, target.id));
	}

	
	var item_prices,items;
	function change_item_price(row_id){
		//alert(row_id);
		var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = $('#quantity_serial_'+row_id).val();
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();
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
		$items; //array that stores all items
		$item_prices; //array that stores all item prices
		$query="select * from items inner join item_sellprice on items.ITEM_ID=item_sellprice.ITEM_ID order by items.ITEM_NAME ASC";
		$query_run = mysqli_query($con,$query);
		if($query_run){
			$count = mysqli_num_rows($query_run);
			if($count>0){
				$index=0;
				while($a=mysqli_fetch_assoc($query_run)){
					$items[$index]=$a["ITEM_NAME"];
					$item_prices[$index]=$a["PRICE"];
					$index++;
				}
			}
		}
	?>
	item_prices = <?php echo json_encode($item_prices); ?>;
	items = <?php echo json_encode($items); ?>;
</script>
<script type="text/javascript">
serialTextContainerToEdit = 'serial_1';
const textContainer = document.querySelector('#TextContainer_serial_1');

document.querySelector('#serial_1').addEventListener('input', ({ target }) => textToElements(target.value, target.id));



const textToElements = (text, id) => {

	//alert('ssd '.length);
    serialTextContainerToEdit = id;
    const words = text.replace(/\s+/g, ' ').trim().split(' ')
    const wordsElements = words.map(createWordElement)
    //alert(text.replace(/\s+/g, ' ').trim().split(' '));
    if (text.replace(/\s+/g, ' ').trim()) {
        document.getElementById('quantity_'+serialTextContainerToEdit).value = text.replace(/\s+/g, ' ').trim().split(' ').length;
    }
    else{
    	document.getElementById('quantity_'+serialTextContainerToEdit).value = 0;
    }

    clearWordsContainer()
    wordsElements.forEach(putWordElement)
	
	var element_id = id.replace("serial_", "");
	var qty = document.getElementById('quantity_serial_'+element_id).value;
	var price = document.getElementById('price_'+element_id).value;
	var amt = (qty*price);
	document.getElementById('amount_'+element_id).value = amt;
	total();
	calculate_balance();
}

const createWordElement = (word) => {
  const element = document.createElement('span')

  element.classList.add('word')
  element.textContent = word

  return element
}

const putWordElement = (element) => {
  const spaceElement = document.createElement('span')

  spaceElement.classList.add('space')
  spaceElement.textContent = ' '

  //serialTextContainerToEdit =

  document.querySelector('#TextContainer_'+serialTextContainerToEdit).appendChild(element);
  document.querySelector('#TextContainer_'+serialTextContainerToEdit).appendChild(spaceElement);
  //textContainer.appendChild(element)
  //textContainer.appendChild(spaceElement)
}

const clearWordsContainer = () => document.querySelector('#TextContainer_'+serialTextContainerToEdit).innerHTML = '';

for(x=1;x<=serials.length;x++){
	serialTextContainerToEdit = 'serial_'+x;
	textToElements(serials[x-1], 'serial_'+x);
	//alert(serials[x-1]);
	//alert(serials.length);
	document.querySelector('#serial_'+x).addEventListener('input', ({ target }) => textToElements(target.value, target.id));
}

	/*const [tags, tagshow]=["tags","tagshow"].map(id=>document.getElementById(id));
    tags.addEventListener("input",_=> tagshow.textContent=tags.value.trim().split(/ +/).map(w=>"#"+w).join(" "));*/

	
</script>
</body>
</html>
<?php
	}//end of if(isset($_POST['sale_id'])){
	else{
		header ("Location:supplier_transaction_history.php");
	}
?>