<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once "connect.php"; 
$con = db_connect();
$tbl_name="user"; // Table name
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = mysqli_real_escape_string($con,$mypassword);

$mypassword = md5($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'" ;
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"


$row = mysqli_fetch_row($result);
$_SESSION['username'] = $myusername;

if($row[1]=="admin"){
header('Location:index.php');
}else if($row[1]=="Linda"){
header("location:index.php");
}else if($row[1]=="Miriam"){
header("location:index.php");
}else if($row[1]=="Sophia"){
header("location:index.php");
}else if($row[1]=="Systemadmin"){
header("location:index.php");
}else{
echo "error in validate user";
}
}else {
	//echo md5($mypassword);
	header("location:login.php?msg=Wrong%20Username%20or%20Password");
}
?>