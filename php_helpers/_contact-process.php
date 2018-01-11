<?php

$method = strtoupper($_SERVER['REQUEST_METHOD']);
if('POST' != $method) {
	exit('Invalid request');
}

// CONFIGURE RECAPTCHA
//define('GR_SECRET', '');
//define('GR_URL', 'https://www.google.com/recaptcha/api/siteverify');


// Configuration option.
// Enter the email address that you want to emails to be sent to.
// Example $address = "john.doe@yourdomain.com";
$address = "oohfiro@gmail.com";

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

// Sanitize request
//$name = (isset($_POST['name']) ? strip_tags($_POST['name']) : '');
//$lastname = (isset($_POST['lastname']) ? strip_tags($_POST['lastname']) : '');
$email = (isset($_POST['email']) ? strip_tags($_POST['email']) : '');
//$subject = (isset($_POST['subject']) ? strip_tags($_POST['subject']) : '');
//$message= (isset($_POST['message']) ? strip_tags($_POST['message']) : '');
//$g_response = (isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '');

// Validate inputs
/*
if(empty($name)){
	echo '<div class="alert alert-warning error"><p><strong>Attention!</strong> Name is required.</p></div>';
	exit();
}
if(empty($lastname)){
	echo '<div class="alert alert-warning error"><p><strong>Attention!</strong> Last name is required.</p></div>';
	exit();
}
*/
if(empty($email)){
	echo '<div class="galert galert-warning">Email is required.</div>';
	exit();
}
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	echo '<div class="galert galert-warning">invalid e-mail address</div>';
	exit();
}
/*
if(empty($subject)){
	$subject = 'You have been contacted from your website by ' . $name;
}
if(empty($message)){
	echo '<div class="alert alert-warning error"><p><strong>Attention!</strong> Message is required.</p></div>';
	exit();
}
if(get_magic_quotes_gpc()) {
	$message = stripslashes($message);
}         

if(empty($g_response)){
	echo '<div class="alert alert-warning error"><p><strong>Attention!</strong> Please confirm you are not a robot by filling in the captcha.</p></div>';
	exit();
}
if(!validateRecaptcha(GR_SECRET, $g_response, GR_URL)){
	echo '<div class="alert alert-warning error"><p><strong>Attention!</strong> Captcha is not correct.</p></div>';
	exit();
}
  */

// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "Joined Sparrowapp:" . PHP_EOL . PHP_EOL;
$e_reply = "$email";
$msg = wordwrap( $e_body. $e_reply, 70 );

$headers = "From: SparrowCo <no-reply@sparrowapp.co>" . PHP_EOL;
$headers .= "Reply-To: SparrowCo <no-reply@sparrowapp.co>" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$subject = "New subscribe from sparrowapp.co";

if(mail($address, $subject, $msg, $headers)) {

	// Email has sent successfully, echo an error message.
echo '<div class="galert galert-success alert-dismissible" role="alert">Thank you</div>';

} 
else {
	// Email has NOT been sent successfully, echo an error message.
	echo '<div class="galert galert-danger alert-dismissible" role="alert">ERROR! Try again or later.</div>';
}


