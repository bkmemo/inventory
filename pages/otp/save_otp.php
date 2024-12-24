<?php 
session_start();
		// Include PHPMailer library
		require 'PHPMailer/src/PHPMailer.php';
		require 'PHPMailer/src/SMTP.php';
		require 'PHPMailer/src/Exception.php';

		// Import PHPMailer classes
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
include_once("../connect.php");
$con = db_connect();
$errorMessage = '';
if(!empty($_POST["login"]) && $_POST["email"]!=''&& $_POST["loginPass"]!='') {	
	$email = $_POST['email'];
	$password = $_POST['loginPass'];
	$password = md5($password);
	$sqlQuery = "SELECT username FROM user WHERE email_address='".$email."' AND password='".$password."'";
	$resultSet = mysqli_query($con, $sqlQuery) or die("database error:". mysqli_error($conn));
	$isValidLogin = mysqli_num_rows($resultSet);	
	if($isValidLogin){
		
			ini_set('max_execution_time', 300);
			// Recipient's email address
			$to = "$email";

			$otp = rand(100000, 999999);

			// Email subject
			$subject = "OTP to Login";

			// Email message
			$message = "One Time Password for login authentication is:<br/><br/>" . $otp;

			// Your Gmail address
			$from = "noreply@mtlictsolutions.com";
			$fromName = "JLM Hotel Booking Status";

			// Gmail username (your email address)
			$username = "noreply@mtlictsolutions.com";

			// Gmail password
			$password = 'gdp8YuBDDDot';

			// SMTP server configuration
			$smtpHost = "mail.mtlictsolutions.com";
			$smtpPort = 465; // For SSL: 465, TLS/STARTTLS: 587

			// Email headers
			$headers = array(
				"From: $fromName <$from>",
				"Reply-To: $from",
				"Return-Path: $from",
				"Message-ID: <" . time() . "example.com>",
				"X-Mailer: PHP/" . phpversion(),
				"MIME-Version: 1.0",
				"Content-Type: text/html; charset=ISO-8859-1"
			);

			// SMTP authentication
			$smtpAuth = true;
			$smtpSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepte
			$mail = new PHPMailer(true);
					try {
				// Set mailer to use SMTP
				$mail->isSMTP();

				// SMTP configuration
				$mail->Host = $smtpHost;
				$mail->Port = $smtpPort;
				$mail->SMTPAuth = $smtpAuth;
				$mail->SMTPSecure = $smtpSecure;
				$mail->Username = $username;
				$mail->Password = $password;

				// Set email parameters
				$mail->setFrom($from, $fromName);
				$mail->addAddress($to);
				$mail->Subject = $subject;
				$mail->Body = $message;

				// Send email
				$mail->send();
			$insertQuery = "INSERT INTO authentication(otp,	expired, created) VALUES ('".$otp."', 0, '".date("Y-m-d H:i:s")."')";
			$result = mysqli_query($con, $insertQuery);
			$insertID = mysqli_insert_id($con);
			if(!empty($insertID)) {
				include "verify_email_otp.php";
			}
				$_SESSION['response']= "Email sent successfully!";
			} catch (Exception $e) {
						echo "Error: " . $e->getMessage();
					}
				
				include "verify_email_otp.php";
		}else{
                $_SESSION['response']= "Already Exists In The Database";
				include "verify_email_otp.php";
            }
		
} else if(!empty($_POST["email"])){
	$errorMessage = "Enter Both user and password!";	
}	
?>