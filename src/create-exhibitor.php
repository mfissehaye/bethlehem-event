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

		$required_attributes = array(
			'company_name',
			'company_first_name',
			'company_last_name',
			'company_median_name',
			'company_sex',
			'company_email',
			'contact_person_name',
			'contact_person_passport_number',
			'contact_person_passport_given_date',
			'contact_person_passport_expiry_date',
			'contact_person_nationality',
			'contact_person_staying_date',
			'contact_person_address_in_addis',
			'contact_person_hotel',
			'contact_person_telephone'
		);

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