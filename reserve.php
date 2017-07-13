<?php

// reserve.php
session_start();

require_once('inc/db.php');

header( 'Content-Type', 'application/json' );
if($spots = reserveSpots($_GET['exhibitorId'], $_GET['spots'])) {
	echo json_encode( ['status' => 'success' ] );
} else {
	echo json_encode(['status' => 'failure', 'msg' => $database_error ]);
}