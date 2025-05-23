<?php
error_reporting(0);
/*
 * ------------------------------------
 * Contact Form Configuration
 * ------------------------------------
 */
 
$to = "elaftradingcontracting@gmail.com"; // <--- Your email ID here

$server_email = 'elaftradingcontracting@gmail.com'; // Your server email to authenticate outgoing emails. eg: name@yourdomain.com

/*
 * ------------------------------------
 * END CONFIGURATION
 * ------------------------------------
 */

$username = $_POST["username"];
$email    = $_POST["email"];
$phone    = $_POST["phone"];
$subject  = $_POST["subject"];
$message  = $_POST["message"];


if (isset($email) && isset($name)) {

	$subject  = "Contact Message from $name"; // <--- Contact for Subject here.
 
	$msg      = 'Hello Admin, <br/> <br/> Here are the message details:';
	$msg     .= ' <br/> <br/> <table border="1" cellpadding="6" cellspacing="0" style="border: 1px solid  #eeeeee;">';
	foreach ($_POST as $label => $value) {
	    $msg .= "<tr><td width='100'>". ucfirst($label) . "</td><td width='300'>" . $value . " </tr>";
	}
	$msg      .= " </table>";
 
/*
 * ------------------------------------
 * Send Mail via PHP Mailer
 * ------------------------------------
 */

date_default_timezone_set('Etc/UTC');

require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom($server_email, $name);
//Set an alternative reply-to address
$mail->addReplyTo($email, $name);
//Set who the message is to be sent to
$mail->addAddress($to);
//Set the HTML True
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $msg;

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "success";
}

//echo "success";

} // END isset
?>