<?php 
 
// Include the database configuration file 
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
// Get current page URL 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
 
$user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
 
// Get server related info 
$user_ip_address = $_SERVER['REMOTE_ADDR']; 
$referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
date_default_timezone_set('Africa/Kampala');
$today_date = date("Y-m-d H:i:s");
$user_role = $_SESSION['username'];
// Insert visitor activity log into database 
 
$query = "insert into visitor_activity_logs (user_ip_address, role, user_agent, page_url, referrer_url, created_on) VALUES ('$user_ip_address', '$user_role', '$user_agent', '$user_current_url', '$referrer_url', '$today_date')"; 

$run = mysqli_query($con,$query)or die(mysqli_error($con));
 
?>