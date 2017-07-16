<?php
$company_name = '';
$company_first_name = '';
$company_last_name = '';
$company_median_name = '';
$company_sex = '';
$company_email = '';
$contact_person_name = '';
$contact_person_passport_number = '';
$contact_person_passport_given_date = '';
$contact_person_passport_expiry_date = '';
$contact_person_nationality = '';
$contact_person_staying_date = '';
$contact_person_address_in_addis = '';
$contact_person_hotel = '';
$contact_person_telephone = '';
if(isset($_SESSION['exhibitor_data'])) {
	extract($_SESSION['exhibitor_data']);
}
?>
<form action="<?php echo $form_action ?>" method="POST" id="<?php echo $form_id ?>">
    <fieldset>
        <legend>Company Information</legend>
        <div class="form-group">
            <label for="company-name">Company's Name</label>
            <input type="text" class="form-control" id="company-name" name="company_name"
                   placeholder="Company's Name" required value="<?php echo $company_name ?>">
        </div>
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" id="first-name" name="company_first_name"
                   placeholder="First Name" required value="<?php echo $company_first_name ?>">
        </div>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="company_last_name" placeholder="Last Name"
                   required value="<?php echo $company_last_name ?>">
        </div>
        <div class="form-group">
            <label for="median-name">Median Name</label>
            <input type="text" class="form-control" id="median-name" name="company_median_name"
                   placeholder="Median Name" required value="<?php echo $company_median_name ?>">
        </div>
        <label for="male">Sex</label>
        <div class="form-group" style="margin-left: 20px">
            <div class="radio">
                <input type="radio" name="company_sex" id="male" value="M"
                       required <?php if ( $company_sex == 'M' )
					echo 'checked="checked"' ?>><label for="male">Male</label>
            </div>
            <div class="radio">
                <input type="radio" name="company_sex" id="female" value="F" required><label
                        for="female" <?php if ( $company_sex == 'F' )
					echo 'checked="checked"' ?>>Female</label>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="company_email" placeholder="Email" required
                   value="<?php echo $company_email ?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Contact Person Information</legend>
        <div class="form-group">
            <label for="contact-person">Contact Person Name</label>
            <input type="text" class="form-control" id="contact-person" name="contact_person_name"
                   placeholder="Contact Person" required value="<?php echo $contact_person_name ?>">
        </div>
        <div class="form-group">
            <label for="passport-number">Passport Number</label>
            <input type="text" class="form-control" id="passport-number" name="contact_person_passport_number"
                   placeholder="Passport Number" required
                   value="<?php echo $contact_person_passport_number ?>">
        </div>
        <div class="form-group">
            <label for="given-date">Given Date</label>
            <input type="date" class="form-control" id="given-date" name="contact_person_passport_given_date"
                   placeholder="Given Date" required
                   value="<?php echo $contact_person_passport_given_date ?>">
        </div>
        <div class="form-group">
            <label for="expiry-date">Expiry Date</label>
            <input type="date" class="form-control" id="expiry-date" name="contact_person_passport_expiry_date"
                   placeholder="Expiry Date" required
                   value="<?php echo $contact_person_passport_expiry_date ?>">
        </div>
        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="contact_person_nationality"
                   placeholder="Nationality" required
                   value="<?php echo $contact_person_nationality ?>">
        </div>
        <div class="form-group">
            <label for="staying-date">Staying Date</label>
            <input type="date" class="form-control" id="staying-date" name="contact_person_staying_date"
                   placeholder="Staying Date" required
                   value="<?php echo $contact_person_staying_date ?>">
        </div>
        <div class="form-group">
            <label for="address-in-addis">Address in Addis</label>
            <input type="text" class="form-control" id="address-in-addis" name="contact_person_address_in_addis"
                   placeholder="Address In Addis" required
                   value="<?php echo $contact_person_address_in_addis ?>">
        </div>
        <div class="form-group">
            <label for="hotel">Hotel</label>
            <input type="text" class="form-control" id="hotel" name="contact_person_hotel" placeholder="Hotel"
                   required value="<?php echo $contact_person_hotel ?>">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" class="form-control" id="telephone" name="contact_person_telephone"
                   placeholder="Telephone" required value="<?php echo $contact_person_telephone ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit-exhibitor-form">Submit</button>
        </div>
    </fieldset>
</form>