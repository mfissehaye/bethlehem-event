<?php

// db.php

namespace App;

use LessQL\Database;
use LessQL\Result;

require_once( 'config.php' );
require_once( BASE_PATH . '/helpers.php' );

class DB {
	public static function connect() {
		$pdo = new \PDO( 'mysql:dbname=' . DB_NAME, DB_USER, DB_PASS );

		return new Database( $pdo );
	}

	public static function createExhibitor( $data ) {
		$db  = self::connect();
		$row = $db->createRow( 'exhibitors', $data );
		$row->save();

		return $row;
	}

	public static function getSpots() {
		$db = self::connect();

		return $db->table( 'spots' )->fetchAll();
	}

	public static function getReservedSpots() {
		$db = self::connect();

		return $db->table( 'spots' )->where( 'reserved', 1 );
	}

	public static function reserveSpots( $exhibitorData, $spots ) {

		$db = self::connect();

		$free_spots = $db->table( 'spots' )->where( 'id', $spots )->where( 'reserved', 0 )->where( 'approved', 0 );

		$reserved_spot_ids = [];

		$exhibitor = self::createExhibitor( $exhibitorData );

		/** @var Result $spot */
		foreach ( $free_spots as $spot ) {
			$reserved_spot_ids[]  = $spot['id'];
			$spot['reserved']     = 1;
			$spot['exhibitor_id'] = $exhibitor->getId();
			$spot->save();
		}

		return $reserved_spot_ids;
	}

	public static function createVisitor( $visitorData, $type = 'organization' ) {
		$db                  = self::connect();
		$visitorData['type'] = $type;
		$row                 = $db->createRow( 'visitors', $visitorData );
		$row->save();

		return $row;
	}
}

/*function get_spots() {

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
}*/