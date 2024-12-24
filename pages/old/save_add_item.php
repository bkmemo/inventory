	
	<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
    
    if(isset($_POST['save_item'])){
		$item_name=$_POST['phone_model_name'];
		$brand_name=$_POST['brand_name'];
		$sell_price=$_POST['sell_price'];
		// check if item alrady exists
		$query0 = "SELECT * FROM items WHERE ITEM_NAME='$item_name'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into items (ITEM_NAME, brand_id) values('$item_name',(select brand_id from brands where brand_name='$brand_name'))";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			if($run){
				//set the item stock to zero
				$query="insert into item_stock (ITEM_ID, QUANTITY) values((select ITEM_ID from items where ITEM_NAME='$item_name'), '0')";
				$run = mysqli_query($con,$query)or die(mysqli_error($con));
				if($run){
					//set item sell price to sero
					$query="insert into item_sellprice (ITEM_ID, PRICE) values((select ITEM_ID from items where ITEM_NAME='$item_name'), '$sell_price')";
					$run = mysqli_query($con,$query);
					if($run){
					    include ('add_item.php');
						$_SESSION['response'] = "$item_name Successfully Added To The Database";
                        
					}
					else{
						$_SESSION['response'] ="Failled to add $item_name selling price";
                        include ('add_item.php');
					}
				}
				else{
					$_SESSION['response'] = mysqli_error($con);
				}
			}
			else{
				$_SESSION['response'] ="Failled Add $item_name To The Database";
                include ('add_item.php');
			}
		}
		else{
			$session['response'] = "$item_name Already Exists In The Database";
            include ('add_item.php');
		}
		
	}			
	?>