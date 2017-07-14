<?php

// reserve.php
session_start();

require_once( '../vendor/autoload.php' );

//header( 'Content-Type: application/json' );
$exhibitorId       = isset( $_POST['exhibitorId'] ) ? $_POST['exhibitorId'] : '21';
$spots             = isset( $_POST['spots'] ) ? $_POST['spots'] : [ 21,22,23 ];
$company_email     = isset( $_POST['exhibitorEmail'] ) ? $_POST['exhibitorEmail'] : 'merhawifissehaye@gmail.com';
$reserved_spot_ids = App\DB::reserveSpots( $exhibitorId, $spots );

/*function sendEmail() {
	global $company_email;
	$headers = 'From: merhawifissehaye@gmail.com' . "\r\n" .
	           'Reply-To: webmaster@example.com' . "\r\n" .
	           'X-Mailer: PHP/' . phpversion();

	mail($company_email, 'Hello', 'You have successfully registered', $headers);
}*/

header( 'Content-Type: application/json' );
if ( ! count( $reserved_spot_ids ) ) {
	echo json_encode( [ 'status' => 'failure', 'msg' => 'All spots are reserved.' ] );
} else {
	echo json_encode( [ 'status' => 'success', 'spots' => $reserved_spot_ids ] );
}