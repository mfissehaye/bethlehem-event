<?php

require_once('inc/db.php');

header('Content-Type', 'application/json');
$spots = get_spots();
$spot_ids = [];
foreach($spots as $spot) {
	if($spot['reserved']) {
		$spot_ids[] = $spot['id'];
	}
}
echo json_encode($spot_ids);