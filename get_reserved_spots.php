<?php

require_once('inc/db.php');

header('Content-Type', 'application/json');
$reserved_spot_ids = get_reserved_spot_ids();
echo json_encode($reserved_spot_ids);