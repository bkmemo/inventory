<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(isset($_POST['save_edit_profile'])){
		
			        	$productimage1=$_FILES["productimage1"]["name"];
				    	$productimage2=$_FILES["productimage2"]["name"];

						move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../images/".$_FILES["productimage1"]["name"]);
						move_uploaded_file($_FILES["productimage2"]["tmp_name"],"../images/".$_FILES["productimage2"]["name"]);
				
				
		$query="UPDATE profile SET business_name='$_POST[business_name]', business_slogan='$_POST[business_slogan]', address='$_POST[address]',phone_number='$_POST[phone_number]',email_address='$_POST[email_address]',website_link='$_POST[website_link]',tin_number='$productimage1',company_logo='$productimage2' WHERE profile_id='$_POST[id]'";
		mysqli_query($con,$query)or die(mysqli_error());
		
					$_SESSION['response'] = "Successfully Updated";
					include ("business_profile.php");
	}else {
					$_SESSION['response'] = "Sorry try Again";
		            include ("business_profile.php");
	}
?>