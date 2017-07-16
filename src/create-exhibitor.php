<?php

namespace App;

// create-exhibitor.php

require_once( '../vendor/autoload.php' );
require_once( 'config.php' );
require_once( BASE_PATH . '/helpers.php' );

session_start();

class Exhibitor {
	public function __construct() {

		$errors = [];

		$required_attributes = array( 'company-name' );

		foreach ( $required_attributes as $required_attribute ) {
			if ( ! isset( $_POST[ $required_attribute ] ) ) {
				$errors[] = [ 'key' => $required_attribute, 'msg' => $required_attribute . ' is required' ];
			}
		}

		header( 'Content-Type: application/json' );
		if ( ! empty( $errors ) ) {
			echo json_encode( [ 'status' => 'failure', 'errors' => $errors ] );

			return;
		}

		$_SESSION['exhibitor_data'] = DB::createExhibitor( $_POST )->getData();
		echo json_encode( [ 'status' => 'success' ] );
	}
}

new Exhibitor;