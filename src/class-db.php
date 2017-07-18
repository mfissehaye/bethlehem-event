<?php

// db.php

namespace App;

use Carbon\Carbon;
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
		$data['token'] = md5(uniqid(rand(), true));
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

		$results = $db->table( 'spots' )->where( 'reserved', 1 );
		$final_results = [];
		foreach ( $results as $spot ) {
			$date_reserved = Carbon::parse( $spot['date_reserved'] );
			if($spot['approved'] || ( $spot['reserved'] && Carbon::now()->lt( $date_reserved->addHours( DEPOSIT_DEADLINE_HOURS ) ) )) {
				$final_results[] = $spot;
			}
		}

		return $final_results;
	}

	public static function reserveSpots( $exhibitorData, $spots ) {

		$db = self::connect();

		$free_spots = $db->table( 'spots' )->where( 'id', $spots )->where( 'reserved', 0 )->where( 'approved', 0 );

		$result = [];

		$exhibitor = self::createExhibitor( $exhibitorData );
		$result['token'] = $exhibitor['token'];

		/** @var Result $spot */
		$result['ids'] = [];
		foreach ( $free_spots as $spot ) {
			$result['ids'][]  = $spot['id'];
			$spot['reserved']     = 1;
			$spot['exhibitor_id'] = $exhibitor->getId();
			$spot->save();
		}

		return $result;
	}

	public static function createVisitor( $visitorData, $type = 'organization' ) {
		$db                  = self::connect();
		$visitorData['type'] = $type;
		$row                 = $db->createRow( 'visitors', $visitorData );
		$row->save();

		return $row;
	}

	public static function getCompanyByToken( $token ) {
		$db = self::connect();
		$row = $db->table('exhibitors')->where('token', $token);
		return $row->fetch();
	}

	public static function getVisitorsByCompanyId( $company_id ) {
		$db = self::connect();
		return $db->table('visitors')->where('company_id', $company_id)->fetchAll();
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