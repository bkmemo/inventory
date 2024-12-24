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

	if(isset($_POST['supplier_name'])){
		$_SESSION['supplier_name'] = $_POST['supplier_name'];
	}
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
				<?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
             		
		<form  method="post" action="save_requisition.php"  role="form">
		<div class="box box-primary">
		<h3>Add New Requisition: Ordered By <?php echo "$_SESSION[username]"; ?></h3><br>
		<div class="col-lg-12">
		
		<div class="col-md-3">
					LPO Number
                    <div class="form-group">
                    <input type="text"  name="lpo_number" placeholder="Enter LPO Number"  required="required" class="form-control"/>
                    </div>	
		</div>
		<div class="col-md-3">
				Order Date 
				<div class="form-group">
				<input type="text" id="start_date" name="date_ordered" placeholder="Enter Requisition Date" class="form-control"/>
				</div>
		 </div>
		<div class="col-md-3">
				 Customer Name 
				 <div class="form-group">
				 <?php  selection('customer','customer_name','No Customer');   ?>
				 </div>
		 </div>
		 <div class="col-md-3">
				 Requisition Date
				 <div class="form-group">
				  <input style="" required type="text" id="expDate"  name="date_required" class="form-control" placeholder="Enter Date Required"/>
				 </div>
		 </div>
		</div>
		   <table class='table table-striped table-bordered table-hover'>
           		<thead>
                	<tr>
                    	<th>Item</th>
                    	<th>Description</th>
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
                            echo "<select id='item_select_1' name='item_name[]' class='form-control  bold js-example-basic-single' onChange='change_item_price(1)'>";
                            while($result=mysqli_fetch_assoc($query_run)){
                        	    $item_name=$result['ITEM_NAME'];
								echo "<option>$item_name</option>";
                            }
                            echo "</select>";
                        ?>
                        </td>
						<td><textarea type="text" id="description_1" class="form-control description  bold"  name="description[]" ></textarea></td>
                    <td><input id="quantity_1" onkeyup="calculatePrice(1)" type="text" class="form-control quantity  bold"  name="quantity[]"  ></td>						
                        <td><input id="price_1" value="" type="text" class="form-control price bold"  name="price[]" /></td>
                        <td><input id="amount_1" onkeyup="calculatePrice(1)" type="text" class="form-control amount bold"  name="amount[]"  ></td>
                        <td><a href="#" class="remove">Delete</a></td> 
                      </tr>
				</tbody>
				<tfoot>
					<th colspan="4">Total</th>
					<th colspan="1" style="text-align:left;" class="total" id="total">0</th>
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
		
	     $(this).parent().parent().remove();
		 total();
		 calculate_balance();	
		
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
				'<td><textarea id="description_'+n+'" type="text" class="form-control description_ bold"  name="description[]"></textarea></td>'+
				'<td><input id="quantity_'+n+'" type="text" onkeyup="calculatePrice('+n+')" class="form-control quantity bold"  name="quantity[]"></td>'+
				'<td><input id="price_'+n+'" type="text" value="" class="form-control price  bold" name="price[]"></td>'+
				'<td><input id="amount_'+n+'" type="text" onkeyup="calculatePrice('+n+')" class="form-control amount  bold"  name="amount[]"></td>'+
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
		/*var item_select = document.getElementById("item_select_"+row_id);
		var price = item_prices[item_select.selectedIndex];
		var qty = $('#quantity_'+row_id).val();
		var amount = qty*price;
		$('#price_'+row_id).val(price);
		$('#amount_'+row_id).val(amount);
		total();
		calculate_balance();*/
	}
	
	function get_select_options(){
		var y;
		for(x=0;x<items.length;x++){
			y = y+"<option>"+items[x]+"</option>";
		}
		return y;
	}
	
	
	//get price 
	function calculatePrice(n){
		
	var amount = $('#amount_'+n),price = $('#price_'+n),quantity = $('#quantity_'+n);
	 
	if(amount.val() != 0 && quantity.val() != 0 ){
		price.val(amount.val()/quantity.val());
	}
	
	total();
	
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