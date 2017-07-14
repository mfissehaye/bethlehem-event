<?php

// create-exhibitor.php

session_start();
require_once( 'db.php' );

// register organization
header( 'Content-Type', 'application/json' );
if ( $data = create_exhibitor( $_POST ) ) {
	$_SESSION['exhibitor_data'] = $data;
	echo json_encode( [ 'status' => 'success' ] );
} else {
	echo json_encode( [ 'status' => 'failure', 'msg' => $database_error ] );
}