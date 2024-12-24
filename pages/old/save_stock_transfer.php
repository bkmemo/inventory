<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}

	$username = $_SESSION['username'];
		
	$item_id = $_POST['item_id'];
	$transfer_branch_id = $_POST['transfer_branch_id'];
	$transfer_quantity = $_POST['transfer_quantity'];
	$quantity = $_POST['quantity'];
	$branch_id = $_POST['branch_id'];
	
	echo $transfer_branch_id." ".$quantity." ".$branch_id;
	if($transfer_quantity <= $quantity ){
		$transfer_branch_quantity = 0;
		$branch_quantity = 0;
		
		
		//UPDATE STORE FROM
		$query0="select * from item_stock where ITEM_ID=$item_id && branch_id=$branch_id";
		$query=mysqli_query($con,$query0)or die(mysqli_error($con));
		while($a=mysqli_fetch_assoc($query)){
			$branch_quantity = $a['QUANTITY'] - $transfer_quantity;
			$result = mysqli_query($con,"UPDATE item_stock SET QUANTITY='$branch_quantity' WHERE ITEM_ID=$item_id && branch_id=$branch_id");
		}
		
		
		//UPDATE STORE TO
		$query00="select * from item_stock where ITEM_ID=$item_id && branch_id=$transfer_branch_id";
		$query00=mysqli_query($con,$query00)or die(mysqli_error($con));
		$count = mysqli_num_rows($query00);
		if($count>0){
			while($a=mysqli_fetch_assoc($query00)){
				$transfer_branch_quantity = $a['QUANTITY'] + $transfer_quantity;
				$result = mysqli_query($con,"UPDATE item_stock SET QUANTITY='$transfer_branch_quantity' WHERE ITEM_ID=$item_id && branch_id=$transfer_branch_id");
			}
		}
		else{
			$query0="insert into item_stock (ITEM_ID, QUANTITY, branch_id) values ($item_id, $transfer_quantity, $transfer_branch_id )";
			$query=mysqli_query($con,$query0)or die(mysqli_error($con));
		}
		
		$query0="insert into stock_transfer (user_id, item_id, store_from_id, store_to_id, quantity) values (".$_SESSION['id'].", $item_id, $branch_id, $transfer_branch_id, $transfer_quantity )";
		$query=mysqli_query($con,$query0)or die(mysqli_error($con));
		
		
		
		
		
		
		$_SESSION['response'] = "Stock has been transfered";
	}
	else{
		$_SESSION['response'] = "Transfer quantity is greater tan the availbale quantity</font></h4>";
	}

		
	
	header("location:view_branch_details.php?branch_id=$branch_id");
	
?>