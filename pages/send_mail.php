<?php 
// if "email" variable is filled out, send email
if (isset($_REQUEST['submit'])) {

//Email information
$to = "mtlictsolutions@gmail.com";
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];

//Send email
mail($to, $subject, $message, "From:" . $email);

//Email response
echo "Thank you for contacting us!"; }

//if "email" variable is not filled out, display the form
else { ?>
<form method="post">
Email: <input name="email" type="text" />
Subject: <input name="subject" type="text" />
Message: <textarea name="message" rows="15" cols="40"></textarea>
<input type="submit" name="submit" value="Submit" />
</form>
<?php } ?>