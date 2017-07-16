<?php

// reserve.php
session_start();

require_once( '../vendor/autoload.php' );

//header( 'Content-Type: application/json' );

if ( ! isset( $_POST['spots'] ) && ! isset( $_POST['company-name'] ) ) {
	header( 'Content-Type: application/json' );
	echo json_encode( [ 'status' => 'failure', 'msg' => 'No spots specified' ] );
	exit();
}
$spots = $_POST['spots'];
unset( $_POST['spots'] );
$reserved_spot_ids = App\DB::reserveSpots( $_POST, $spots );

function sendEmail() {
	global $company_email;
	$headers = 'From: merhawifissehaye@gmail.com' . "\r\n" .
	           'Reply-To: webmaster@example.com' . "\r\n" .
	           'X-Mailer: PHP/' . phpversion();

	mail($company_email, 'Hello', 'You have successfully registered', $headers);
}

header( 'Content-Type: application/json' );
if ( ! count( $reserved_spot_ids ) ) {
	echo json_encode( [ 'status' => 'failure', 'msg' => 'All spots are reserved.' ] );
} else {
	sendEmail();
	echo json_encode( [ 'status' => 'success', 'spots' => $reserved_spot_ids ] );
}