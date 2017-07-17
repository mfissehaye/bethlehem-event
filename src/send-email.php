<?php
$newLine = "\r\n";
$to      = 'info@betesoftware.com';
$message = 'From : Merhawi Fissehaye' . $newLine . 'Email : merhawifissehaye@gmail.com' . $newLine . 'Message : welcome' . $newLine . "Sent from www.bete.com Contact Us Page";
$headers = 'From: Contact Us' . "\r\n";

//if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // this line checks that we have a valid email address
mail( $to, 'This is the subject', $message, $headers ); //This method sends the mail.
echo '<script language="javascript">';
echo 'alert("Your email was sent!");'; // success message
echo 'window.location = "http://www.bete.com/contactus.php";'; // reload page
echo '</script>';
//header( "Location: http://www.bete.com/contactus.php" );
//}else{
//echo "Invalid Email, please provide an correct email.";
//}
?>
    and here is another thing
<?php
if ( isset( $_POST['email'] ) ) {
	echo "hgere";
	// EDIT THE 2 LINES BELOW AS REQUIRED
	$email_to      = "merhawifissehaye@gmail.com";
	$email_subject = "Your email subject line";

	function died( $error ) {
		// your error code can go here
		echo "We are very sorry, but there were error(s) found with the form you submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error . "<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}


	// validation expected data exists
	if ( ! isset( $_POST['email'] )) {
		died( 'We are sorry, but there appears to be a problem with the form you submitted.' );
	}


	$email   = $_POST['email']; // required

	$error_message = "";
	$email_exp     = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

	if ( ! preg_match( $email_exp, $email ) ) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	}

	$string_exp = "/^[A-Za-z .'-]+$/";

	//if(!preg_match($string_exp,$last_name)) {
	//  $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
	//}

	if ( strlen( $error_message ) > 0 ) {
		died( $error_message );
	}

	$email_message = "Form details below.\n\n";


	function clean_string( $string ) {
		$bad = array( "content-type", "bcc:", "to:", "cc:", "href" );

		return str_replace( $bad, "", $string );
	}


// create email headers
	$headers = 'From: ' . $email . "\r\n" .
	           'Reply-To: ' . $email . "\r\n" .
	           'X-Mailer: PHP/' . phpversion();
	@mail( $email_to, $email_subject, 'This is the message', $headers );
	?>

    <!-- include your own success html here -->
    Thank you for contacting us. We will be in touch with you very soon.

	<?php

}
?>