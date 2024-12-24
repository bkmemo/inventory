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
	if(isset($_POST['requisition_id']) || isset($_GET['requisition_id'])){
		if(isset($_POST['requisition_id'])){
			$requisition_id = $_POST['requisition_id'];
		}
		else{
			$requisition_id = $_GET['requisition_id'];
		}
		if(isset($_POST['Use'])){
			$_SESSION['username'] = $_POST['username'];
		}
		$username = $_SESSION['username'];
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
						<?php   include ("../pages/requisition_links.php");?>	
					</div>	
                </div>
             		
		<form  method="post" action="save_edit_requisition.php"  role="form">
        <div class="box box-primary">
					<div class="row">
                    <div class="col-lg-12">
					<div class="box-header"></div>
		   <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
                	<h4 class="box-title" >Edit Requisition</h4>
                	<input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="username" />
                    <?php 
						$r = mysqli_query($con,"select * from requisition where requisition_id='$requisition_id'");
						while($result00=mysqli_fetch_assoc($r)){
							$lpo_number = $result00['lpo_number'];
							$date_ordered = $result00['date_ordered'];
							$destination = $result00['destination'];
							$date_required = $result00['date_required'];
							
						}
					?>
		
						<div class="col-md-3">
									LPO Number
									<div class="form-group">
									<input type="text"  name="lpo_number" value="<?php echo $lpo_number; ?>" placeholder="Enter LPO Number"  required="required" class="form-control"/>
									</div>	
						</div>
						<div class="col-md-3">
								Order Date 
								<div class="form-group">
								<input type="text" id="start_date" name="date_ordered"  value="<?php echo $date_ordered; ?>" placeholder="Enter Requisition Date" class="form-control"/>
								</div>
						 </div>
						<div class="col-md-3">
								 Destination 
								 <div class="form-group">
								  <input style="" type="text"  name="destination" value="<?php echo $destination; ?>"  placeholder="Enter Destination" class="form-control" required />
								 </div>
						 </div>
						 <div class="col-md-3">
								 Requisition Date
								 <div class="form-group">
								  <input style="" required type="text" id="expDate"  name="date_required" value="<?php echo $date_required; ?>" class="form-control" placeholder="Enter Date Required"/>
								 </div>
						 </div>
						</div>
						</div>
               
          
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
                <?php
					$query0="select * from requisition inner join requisition_items_details inner join items on 
					requisition.requisition_id=requisition_items_details.requisition_id && requisition_items_details.ITEM_ID=items.ITEM_ID where 
					requisition_items_details.requisition_id=$requisition_id";
                    $query_run0=mysqli_query($con,$query0);
					$count = 0;
					$row = 1;
					$total = 0;
                    while($result0=mysqli_fetch_assoc($query_run0)){
						$requisition_items_details_id = $result0['requisition_items_details_id'];
						$item_name = $result0['ITEM_NAME'];
						$quantity = $result0['PURCHASED_QUANTITY'];
						$unit_price = $result0['BUYING_PRICE'];
						//$batch_no = $result0['BATCH_NO'];
						//$expiry_date = $result0['EXPIRY_DATE'];
						$amount = $unit_price*$quantity;
						$total = $total+$amount;
						echo "<tr>";
						?>
                            
                        <?php  	 	 
							echo "<td>";
            				$query="select * from items inner join requisition_items_details on items.ITEM_ID=requisition_items_details.ITEM_ID order by items.ITEM_NAME ASC";
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
								echo "<input type='hidden' name='requisition_items_details_id[]' value='$requisition_items_details_id'  class='form-control' >";
								echo "<input type='hidden' value='$requisition_id' name='requisition_id'  >";
                            ?>
                            </td>
							<td><input id="quantity_<?php echo $row; ?>" value="<?php echo $quantity; ?>" type="text" class="form-control quantity  bold"  name="quantity[]"  ></td>
                            <td><input id="price_<?php echo $row; ?>" value="<?php echo $unit_price;?>" type="text" class="form-control price  bold"  name="price[]" /></td>
                            <td><input id="amount_<?php echo $row; ?>" value="<?php echo $amount ?>" type="text" class="form-control amount  bold"  name="amount[]"  ></td>
                            <td><a href="delete_edited_requisition.php?<?php echo "requisition_items_details_id=$requisition_items_details_id"; ?>" class="btn btn-default btn-success">Delete</a></td> 
                        </tr>
                 <?php 
						$row++;	
					} 
					//get the amount paid
					//$query3="select * from requisition where requisition_id=$requisition_id";
                    //$query_run3=mysqli_query($con,$query3);
					//$amount_paid = 0;
                   // while($result3=mysqli_fetch_assoc($query_run3)){
					//	$amount_paid = $amount_paid+$result3['AMOUNT_PAID'];
					//}
					//calculate balance
					//$balance = $total-$amount_paid
					
				?>
				</tbody>
				<tfoot>
					<th colspan="3">Total</th>
					<th colspan="1" style="text-align:left;" class="total" id="total">  <?php echo $total; ?></th>
                    <th></th>
				</tfoot>
            </table>
			<div align="right"><button type="submit" name="save_edit_requisition" class="btn btn-primary">Save Record</button></div>		 							
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
   
	function addnewrow(){
		var n = ($('.detail tr').length-0)+1;
		var select_options = get_select_options();
		var tr ='<tr>'+
				
				'<td><select id="item_select_'+n+'" class="form-control  bold js-example-basic-single" name="item_name[]"  onChange="change_item_price('+n+')">'+select_options+'</section></td>'+
				'<td><input id="quantity_'+n+'" type="text" class="form-control quantity  bold"  name="quantity[]"></td>'+
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
	}

	
	var item_prices,items;
	function change_item_price(row_id){
		var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = $('#quantity_'+row_id).val();
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
</body>
</html>
<?php
	}//end of if(isset($_POST['sale_id'])){
	else{
		header ("Location:supplier_transaction_history.php");
	}
?>