<?php

// db.php

require_once( 'config.php' );

/** @var PDO $connection */
$connection = null;
$database_error = '';

function db_connect( $db_name = DB_NAME, $db_host = DB_HOST, $db_user = DB_USER, $db_pass = DB_PASS ) {
	global $connection;
	try {
		$connection = new \PDO( 'mysql:dbname=' . $db_name . ';host=' . $db_host, $db_user, $db_pass );
	} catch ( \PDOException $e ) {
		die( 'Connection failed: ' . $e->getMessage() );
	}
}

function create_exhibitor( $data ) {

	global $database_error;
	global $connection;

	if ( ! $connection ) {
		db_connect();
	}

	$company_name        = $data['company_name'];
	$company_first_name  = $data['company_first_name'];
	$company_last_name   = $data['company_last_name'];
	$company_median_name = $data['company_median_name'];
	$company_sex         = $data['company_sex'];
	$company_email       = $data['company_email'];

	$contact_person_name                 = $data['contact_person_name'];
	$contact_person_passport_number      = $data['contact_person_passport_number'];
	$contact_person_passport_given_date  = $data['contact_person_passport_given_date'];
	$contact_person_passport_expiry_date = $data['contact_person_passport_expiry_date'];
	$contact_person_nationality          = $data['contact_person_nationality'];
	$contact_person_staying_date         = $data['contact_person_staying_date'];
	$contact_person_address_in_addis     = $data['contact_person_address_in_addis'];
	$contact_person_hotel                = $data['contact_person_hotel'];
	$contact_person_telephone            = $data['contact_person_telephone'];

	$query = "INSERT INTO exhibitors (company_name, company_first_name, company_last_name, company_median_name, company_sex, company_email, contact_person_name, contact_person_passport_number, contact_person_passport_given_date, contact_person_passport_expiry_date, contact_person_nationality, contact_person_staying_date, contact_person_address_in_addis, contact_person_hotel, contact_person_telephone) VALUES ('$company_name', '$company_first_name', '$company_last_name', '$company_median_name', '$company_sex', '$company_email', '$contact_person_name', '$contact_person_passport_number', '$contact_person_passport_given_date', '$contact_person_passport_expiry_date', '$contact_person_nationality', '$contact_person_staying_date', '$contact_person_address_in_addis', '$contact_person_hotel', '$contact_person_telephone')";

	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	try {
		$connection->exec( $query );
		$data['id'] = $connection->lastInsertId();
		$connection = null; // close connection

		return $data;
	} catch ( PDOException $e ) {
		$connection     = null;
		$database_error = $e->getMessage();

		return false;
	}
}

function get_spots() {

	global $connection;

	if ( ! $connection ) {
		db_connect();
	}

	$query     = "SELECT * FROM spots";
	$statement = $connection->prepare( $query );
	$statement->execute();
	$result     = $statement->fetchAll( PDO::FETCH_ASSOC );
	$connection = null; // close connection

	return $result;
}

function get_reserved_spot_ids() {

	global $connection;

	if ( ! $connection ) {
		db_connect();
	}

	$query     = "SELECT id FROM spots WHERE reserved=1";
	$statement = $connection->prepare( $query );
	$statement->execute();
	$result     = $statement->fetchAll( PDO::FETCH_ASSOC );
	$connection = null; // close connection
	$ids        = [];
	foreach ( $result as $id ) {
		$ids[] = $id['id'];
	}

	return $ids;
}

function reserve_spots( $exhibitorId, $spots ) {

	global $database_error;
	global $connection;

	if ( ! $connection ) {
		db_connect();
	}

	$spotsText = '';
	foreach ( $spots as $spot ) {
		$spotsText .= "$spot,";
	}
	$spotsText = rtrim($spotsText, ',');

	// select the ones which are not reserved nor approved already
	$query                   = "SELECT id FROM spots WHERE id IN ($spotsText) AND reserved=0 AND approved=0";
	$itemsToReserveStatement = $connection->prepare( $query );
	$itemsToReserveStatement->execute();
	$itemsToReserve = $itemsToReserveStatement->fetchAll( PDO::FETCH_ASSOC );
	$token = rand_str(30);
	$query     = "UPDATE spots SET exhibitor_id=$exhibitorId, reserved=1, token='$token' WHERE id in ($spotsText) AND reserved=0 AND approved=0";
	if ( $connection->exec( $query ) ) {
		$connection = null;
		$ids = [];
		foreach($itemsToReserve as $item) {
			$ids[] = $item['id'];
		}
		return $ids;
	} else {
		$database_error = $connection->errorInfo();
		$connection     = null;
		return false;
	}
}

function rand_str($length) {
	$random_string = '';
	$s = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()';
	foreach(range(0, $length) as $index) {
		$random_string .= $s[rand(0, strlen($s))];
	}
	return $random_string;
}