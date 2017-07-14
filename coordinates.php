<?php

$coordinates = [
	1  => [ 'x' => 65.5, 'y' => 292.5, 'rotate' => true ],
	2  => [ 'x' => 80.5, 'y' => 308.5, 'rotate' => true ],
	3  => [ 'x' => 119.5, 'y' => 318, 'reserved' => true ],
	4  => [ 'x' => 143, 'y' => 318, 'reserved' => true ],
	5  => [ 'x' => 165, 'y' => 318, 'reserved' => true ],
	6  => [ 'x' => 240, 'y' => 318 ],
	7  => [ 'x' => 281.5, 'y' => 343.5, 'rotate' => true ],
	8  => [ 'x' => 295.5, 'y' => 327.5, 'rotate' => true ],
	9  => [ 'x' => 322, 'y' => 271, 'reserved' => true ],
	10 => [ 'x' => 322, 'y' => 248, 'reserved' => true ],
	11 => [ 'x' => 346, 'y' => 248 ],
	12 => [ 'x' => 346, 'y' => 271 ],
	13 => [ 'x' => 376, 'y' => 290, 'reserved' => true ],
	14 => [ 'x' => 404, 'y' => 290, 'reserved' => true ],
	15 => [ 'x' => 451, 'y' => 290 ],
	16 => [ 'x' => 374, 'y' => 261 ],
	17 => [ 'x' => 374, 'y' => 236 ],
	18 => [ 'x' => 397, 'y' => 261 ],
	19 => [ 'x' => 397, 'y' => 236 ],
	20 => [ 'x' => 429, 'y' => 262 ],
	21 => [ 'x' => 429, 'y' => 236 ],
	22 => [ 'x' => 452, 'y' => 262 ],
	23 => [ 'x' => 452, 'y' => 237 ],
	24 => [ 'x' => 325, 'y' => 168 ],
	25 => [ 'x' => 325, 'y' => 144 ],
	26 => [ 'x' => 346, 'y' => 168 ],
	27 => [ 'x' => 346, 'y' => 144 ],
	28 => [ 'x' => 374, 'y' => 180 ],
	29 => [ 'x' => 374, 'y' => 155 ],
	30 => [ 'x' => 397, 'y' => 180 ],
	31 => [ 'x' => 397, 'y' => 155 ],
	32 => [ 'x' => 429, 'y' => 181 ],
	33 => [ 'x' => 429, 'y' => 156 ],
	34 => [ 'x' => 452, 'y' => 181 ],
	35 => [ 'x' => 452, 'y' => 156 ],
	36 => [ 'x' => 495, 'y' => 218 ],
	37 => [ 'x' => 495, 'y' => 195 ],
	38 => [ 'x' => 452, 'y' => 126, 'reserved' => true ],
	39 => [ 'x' => 404, 'y' => 126 ],
	40 => [ 'x' => 376, 'y' => 126 ],
	41 => [ 'x' => 295.5, 'y' => 91.5, 'rotate' => true ],
	42 => [ 'x' => 281.5, 'y' => 75.5, 'rotate' => true ],
	43 => [ 'x' => 240, 'y' => 100 ],
	44 => [ 'x' => 165, 'y' => 100 ],
	45 => [ 'x' => 143, 'y' => 100 ],
	46 => [ 'x' => 120, 'y' => 100 ],
	47 => [ 'x' => 81.5, 'y' => 112, 'rotate' => true ],
	48 => [ 'x' => 66.5, 'y' => 127.5, 'rotate' => true ],
	49 => [ 'x' => 30, 'y' => 186 ],
	50 => [ 'x' => 30, 'y' => 208 ],
	51 => [ 'x' => 30, 'y' => 231 ],
];

require_once( 'db.php' );
foreach($coordinates as $index => $coordinate) {
	$x = $coordinate['x'];
	$y = $coordinate['y'];
	$rotate = isset($coordinate['rotate']) && $coordinate['rotate'] ? 1 : 0;
	$reserved = isset($coordinate['reserved']) && $coordinate['reserved'] ? 1 : 0;
	$query = "INSERT INTO spots (id, coordinate_x, coordinate_y, rotated, reserved) VALUES ('$index', '$x', '$y', $rotate, $reserved)";
	db_connect();
	if($connection->exec($query)) {
		echo "Inserted id: ", $index;
	} else {
		print_r($connection->errorInfo());
	}
}
$connection = null;