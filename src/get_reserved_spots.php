<?php

require_once('../vendor/autoload.php');

header('Content-Type: application/json');
$reserved_spot_ids = App\DB::getReservedSpots();
$ids = [];
foreach($reserved_spot_ids as $spot) {
	$ids[] = $spot['id'];
}
echo json_encode($ids);