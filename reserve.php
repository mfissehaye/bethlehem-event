<?php

// reserve.php
session_start();

require_once('inc/db.php');

header( 'Content-Type', 'application/json' );
$exhibitorId    = $_POST['exhibitorId'];
$spots          = $_POST['spots'];
$company_email  = $_POST['exhibitorEmail'];
$returned_spots = reserveSpots($exhibitorId, $spots);

/*function sendEmail() {
	global $company_email;
	$headers = 'From: merhawifissehaye@gmail.com' . "\r\n" .
	           'Reply-To: webmaster@example.com' . "\r\n" .
	           'X-Mailer: PHP/' . phpversion();

	mail($company_email, 'Hello', 'You have successfully registered', $headers);
}*/

if(is_array($spots)) {
	echo json_encode(['status' => 'success', 'spots' => $returned_spots] );
} else {
	echo json_encode(['status' => 'failure', 'msg' => $database_error ]);
}