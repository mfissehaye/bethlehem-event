<?php

// create-exhibitor.php

use App\DB;

require '../vendor/autoload.php';
require_once('send-email.php');

$errors = [];

if(isset($_POST['submit-form'])) {
    unset($_POST['submit-form']);

    // validation
	$required_fields = ['company_first_name', 'company_last_name', 'company_median_name', 'company_sex', 'company_email', 'contact_person_name', 'contact_person_passport_number', 'contact_person_passport_given_date', 'contact_person_passport_expiry_date', 'contact_person_nationality', 'contact_person_staying_date', 'contact_person_address_in_addis', 'contact_person_hotel', 'contact_person_telephone' ];

	foreach($required_fields as $field) {
		if(!isset($_POST[$field])) {
			$errors[] = "$field is missing";
		}
	}

	if(!count($errors)) {
		send_email($_POST['company_first_name'], $_POST['email']);
		$row = DB::createVisitor($_POST, 'international');
    }
}

require_once('header.php');

foreach($errors as $error): ?>
    <p><?php echo $error ?></p>
<?php endforeach ?>

<p class="alert alert-success">You have registered successfully as an international visitor.</p>