<?php
require_once( '../vendor/autoload.php' );

$errors = [];
if(isset($_POST['submit-form'])) {
    unset($_POST['submit-form']);
    $required_fields = ['company_first_name', 'company_last_name', 'company_median_name', 'company_sex', 'company_email', 'contact_person_name', 'contact_person_passport_number', 'contact_person_passport_given_date', 'contact_person_passport_expiry_date', 'contact_person_nationality', 'contact_person_staying_date', 'contact_person_address_in_addis', 'contact_person_hotel', 'contact_person_telephone' ];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field])) {
            $errors[] = "$field is missing";
        }
    }

    if(!filter_var($_POST['company_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    if(!count($errors)) {
        // send email
        require_once('send-email.php');
        send_email($_POST['company_first_name'], $_POST['email']);
	    $visitor = \App\DB::createVisitor($_POST, 'organization');
    }

}

$token   = isset($_GET['token']) ? $_GET['token'] : '';
$company = \App\DB::getCompanyByToken( $token );
if ( ! count( $company ) ) {
	die( 'No company found with that token' );
}
$visitors = \App\DB::getVisitorsByCompanyId( $company->getId() );

foreach($errors as $error): ?>

    <p class="alert alert-danger"><?php echo $error ?></p>

<?php endforeach;

require_once( 'header.php' );

if ( count( $visitors ) ): ?>
    <p><a href="#visitors-list">View registered exhibitors list</a></p>
<?php endif ?>
<h4 class="section-title">Registering Visitors <strong>#<?php echo count( $visitors ) + 1 ?></strong>
    for organization <strong class="text-uppercase"><?php echo $company['company-name'] ?></strong></h4>

<?php
$form_action = "/src/register-visitor.php?token=$token";
$form_id     = "register-visitor-form";
$company_id = $company->getId();

require_once( 'form.php' ); ?>

<div id="visitors-list">
    <ul>
		<?php foreach ( $visitors as $visitor ): ?>
            <li><?php echo $visitor['company_first_name'] . ' ' . $visitor['company_last_name'] . ' ' . $visitor['company_median_name'] ?></li>
		<?php endforeach; ?>
    </ul>
</div>
