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
//end of function
			if(isset($_POST["save_profile"])){

				$business_name = $_POST['business_name'];
				$business_slogan = $_POST['business_slogan'];
				$address=$_POST['address'];
				$phone_number=$_POST['phone_number'];
				$email_address=$_POST['email_address'];
				$website_link=$_POST['website_link'];
				
					$productimage1=$_FILES["productimage1"]["name"];
					$productimage2=$_FILES["productimage2"]["name"];

						$imag1 = move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../images/".$_FILES["productimage1"]["name"]);
						$image2 = move_uploaded_file($_FILES["productimage2"]["tmp_name"],"../images/".$_FILES["productimage2"]["name"]);

				
				$query = "SELECT * FROM `profile` WHERE business_name = '$business_name'";
					$result = mysqli_query($con,$query);
					if (mysqli_num_rows ( $result ) == 1 ){
						
						$_SESSION['response'] = "Sorry $business_name is already Exists";
						include ("business_profile.php");
					}else{	
					$insert="insert into profile (business_name, business_slogan, address, phone_number, email_address, website_link, tin_number,	company_logo) values('$business_name', '$business_slogan', '$address', '$phone_number', '$email_address', '$website_link', '$imag1','$imag2')";
					$run = mysqli_query($con,$insert)or die(mysqli_error($con));
					$_SESSION['response'] = "$business_name has been added to the database";
					include ("business_profile.php");	
					}
					}else{
						$_SESSION['response'] = "Sorry Try Again";
						include ("business_profile.php");
					}
		
	

?>