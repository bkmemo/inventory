<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();

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
					<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['response']);?><?php echo htmlentities($_SESSION['response']="");?>
					</div>
		 <div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['supplier_name'];  ?></h3></div>    				
		<form  method="post" action="save_stock.php"  role="form">
		<br>
		<div class="col-lg-12">
		<div class="col-md-6">
		<input type="hidden" value="<?php echo $_SESSION['supplier_name']; ?>" name="supplier_name" />		
			Receipt No
			<div class="form-group"><input style="" type="text" class="form-control" value=""  name="receipt_no"></div>
		</div>
		<div class="col-md-6">			
            Date Of Purchase 
		<div class="form-group">
				<input id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="purchase_date"  >
		</div>
		</div>
		</div>
		
		
<!--
<div class="create__section">
   <label class="create__label BMehrBold" for="tags">Tags (separate each one by [space])</label>
   <input type="text" class="form-control BKoodakBold" id="tags" placeholder="Enter the keywords here">
   <span id="tagshow"></span>
</div>-->


		   <div class="box box-primary">
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
                    <td>
                    	<input id="serial_1" type="text" name="serial[]" class="form-control" style="width: 100%;" required />
                    </td>
                    <td>
                    	<div id="TextContainer_serial_1"></div>
                    </td>
                    <td><input id="quantity_serial_1" onkeyup="calculatePrice(1)" type="text" class="form-control quantity  bold"  name="quantity[]" readonly ></td>						
                        <td><input id="price_1" value="" type="text" class="form-control price bold"  name="price[]" /></td>
                        <td><input id="amount_1" onkeyup="calculatePrice(1)" type="text" class="form-control amount bold"  name="amount[]"  ></td>
                        <td><a href="#" class="remove">Delete</a></td> 
                      </tr>
				</tbody>
				<tfoot>
					<th colspan="5">Total</th>
					<th colspan="1" style="text-align:left;" class="total" id="total">0</th>
                    <th></th>
                    <tr> 
                        <th colspan="5">Amount Paid</th>
                        <th><input type="text" class="form-control"  name="amount_paid" id="amount_paid" /></th>
                    </tr>
                    <tr> 
                        <th colspan="5">Balance</th>
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
serialTextContainerToEdit = 'serial_1';
const textContainer = document.querySelector('#TextContainer_serial_1');

document.querySelector('#serial_1').addEventListener('input', ({ target }) => textToElements(target.value, target.id));

const textToElements = (text, id) => {
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
	document.getElementById('amount_'+element_id).value = amt;total();
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

	/*const [tags, tagshow]=["tags","tagshow"].map(id=>document.getElementById(id));
    tags.addEventListener("input",_=> tagshow.textContent=tags.value.trim().split(/ +/).map(w=>"#"+w).join(" "));*/

	
</script>
	
	

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
				'<td><input id="serial_'+n+'" type="text" class="form-control" name="serial[]" required /></td><td><div id="TextContainer_serial_'+n+'"></div></td>'+
				'<td><input id="quantity_serial_'+n+'" type="text" onkeyup="calculatePrice('+n+')" class="form-control quantity bold"  name="quantity[]" readonly></td>'+
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

			//const textContainer = document.querySelector('#serialTextContainer_'+n);
			document.querySelector('#serial_'+n).addEventListener('input', ({ target }) => textToElements(target.value, target.id));

			//const clearWordsContainer = () => textContainer.innerHTML = '';

            /*const textToElements_+n = (text) => {
                const words = text.split(' ')
                const wordsElements = words.map(createWordElement)
                clearWordsContainer()
                wordsElements.forEach(putWordElement)
            }

            const createWordElement_+n = (word) => {
            	const element = document.createElement('span')
            	element.classList.add('word')
            	element.textContent = word
            	return element
            }

            const putWordElement_+n = (element) => {
            	const spaceElement = document.createElement('span')
            	spaceElement.classList.add('space')
            	spaceElement.textContent = ' '
            	textContainer.appendChild(element)
            	textContainer.appendChild(spaceElement)
            }

            const clearWordsContainer_+n = () => textContainer.innerHTML = '';*/
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