<?php

// db.php
require_once( 'config.php' );

$database_error = "";

function db_connect() {
	global $config;
	try {
		$conn = new PDO( 'mysql:dbname=' . $config['DB_NAME'] . ';host=' . $config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'] );
	} catch ( PDOException $e ) {
		die( 'Connection failed: ' . $e->getMessage() );
	}

	return $conn;
}

function create_exhibitor( $data ) {

	global $database_error;

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

	$connection = db_connect();
	$query      = "INSERT INTO exhibitors (company_name, company_first_name, company_last_name, company_median_name, company_sex, company_email, contact_person_name, contact_person_passport_number, contact_person_passport_given_date, contact_person_passport_expiry_date, contact_person_nationality, contact_person_staying_date, contact_person_address_in_addis, contact_person_hotel, contact_person_telephone) VALUES ('$company_name', '$company_first_name', '$company_last_name', '$company_median_name', '$company_sex', '$company_email', '$contact_person_name', '$contact_person_passport_number', '$contact_person_passport_given_date', '$contact_person_passport_expiry_date', '$contact_person_nationality', '$contact_person_staying_date', '$contact_person_address_in_addis', '$contact_person_hotel', '$contact_person_telephone')";

	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	try {
		$connection->exec( $query );
		$data['id'] = $connection->lastInsertId();
		$connection = null; // close connection
		return $data;
	} catch ( PDOException $e ) {
		$connection = null;
		$database_error = $e->getMessage();
		return false;
	}
}

function get_spots() {
	$connection = db_connect();
	$query = "SELECT * FROM spots";
	$statement = $connection->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	$connection = null; // close connection
	return $result;
}

function reserveSpots($exhibitorId, $spots) {

	global $database_error;

	$spotsText = "(";
	foreach($spots as $spot) {
		$spotsText .= "$spot,";
	}
	$spotsText = rtrim($spotsText, ',') . ')';
	$query = "UPDATE spots SET exhibitor_id=$exhibitorId, reserved=1 WHERE id in $spotsText AND reserved=0 AND approved=0";
	$connection = db_connect();
	if($connection->exec($query)) {
		$connection = null;
		return true;
	} else {
		$database_error = $connection->errorInfo();
		$connection = null;
		return false;
	}
}