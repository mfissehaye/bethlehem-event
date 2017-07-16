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

header( 'Content-Type: application/json' );
if ( ! count( $reserved_spot_ids ) ) {
	echo json_encode( [ 'status' => 'failure', 'msg' => 'All spots are reserved.' ] );
} else {
	echo json_encode( [ 'status' => 'success', 'spots' => $reserved_spot_ids ] );
}