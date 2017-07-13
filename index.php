<?php

session_start();
$exhibitor_data = $_SESSION['exhibitor_data'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Exhibition</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <div class="text-center">
        <h4 class="section-title text-uppercase"><strong>Welcome to Exhibition Manager</strong></h4>
        <ul class="nav nav-pills" style="display: inline-block;">
            <li><a href="#">Exhibitor Register</a></li>
            <li><a href="#">International Visitor</a></li>
        </ul>
    </div>
    <form action="" method="POST" id="exhibitor-form" class="col-md-5">
        <fieldset>
            <legend>Company Information</legend>
            <div class="form-group">
                <label for="company-name">Company's Name</label>
                <input type="text" class="form-control" id="company-name" name="company_name"
                       placeholder="Company's Name" required value="<?php echo $exhibitor_data['company_name'] ?>">
            </div>
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" id="first-name" name="company_first_name"
                       placeholder="First Name" required value="<?php echo $exhibitor_data['company_first_name'] ?>">
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" class="form-control" id="last-name" name="company_last_name" placeholder="Last Name"
                       required value="<?php echo $exhibitor_data['company_last_name'] ?>">
            </div>
            <div class="form-group">
                <label for="median-name">Median Name</label>
                <input type="text" class="form-control" id="median-name" name="company_median_name"
                       placeholder="Median Name" required value="<?php echo $exhibitor_data['company_median_name'] ?>">
            </div>
            <label for="male">Sex</label>
            <div class="form-group">
                <div class="radio">
                    <input type="radio" name="company_sex" id="male" value="M" required <?php if($exhibitor_data['company_sex'] == 'M') echo 'checked="checked"' ?>><label for="male">Male</label>
                </div>
                <div class="radio">
                    <input type="radio" name="company_sex" id="female" value="F" required><label
                            for="female" <?php if($exhibitor_data['company_sex'] == 'F') echo 'checked="checked"' ?>>Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="company_email" placeholder="Email" required value="<?php echo $exhibitor_data['company_email'] ?>">
            </div>
        </fieldset>
        <fieldset>
            <legend>Contact Person Information</legend>
            <div class="form-group">
                <label for="contact-person">Contact Person Name</label>
                <input type="text" class="form-control" id="contact-person" name="contact_person_name"
                       placeholder="Contact Person" required value="<?php echo $exhibitor_data['contact_person_name'] ?>">
            </div>
            <div class="form-group">
                <label for="passport-number">Passport Number</label>
                <input type="text" class="form-control" id="passport-number" name="contact_person_passport_number"
                       placeholder="Passport Number" required value="<?php echo $exhibitor_data['contact_person_passport_number'] ?>">
            </div>
            <div class="form-group">
                <label for="given-date">Given Date</label>
                <input type="date" class="form-control" id="given-date" name="contact_person_passport_given_date"
                       placeholder="Given Date" required value="<?php echo $exhibitor_data['contact_person_passport_given_date'] ?>">
            </div>
            <div class="form-group">
                <label for="expiry-date">Expiry Date</label>
                <input type="date" class="form-control" id="expiry-date" name="contact_person_passport_expiry_date"
                       placeholder="Expiry Date" required value="<?php echo $exhibitor_data['contact_person_passport_expiry_date'] ?>">
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="contact_person_nationality"
                       placeholder="Nationality" required value="<?php echo $exhibitor_data['contact_person_nationality'] ?>">
            </div>
            <div class="form-group">
                <label for="staying-date">Staying Date</label>
                <input type="date" class="form-control" id="staying-date" name="contact_person_staying_date"
                       placeholder="Staying Date" required value="<?php echo $exhibitor_data['contact_person_staying_date'] ?>">
            </div>
            <div class="form-group">
                <label for="address-in-addis">Address in Addis</label>
                <input type="text" class="form-control" id="address-in-addis" name="contact_person_address_in_addis"
                       placeholder="Address In Addis" required value="<?php echo $exhibitor_data['contact_person_address_in_addis'] ?>">
            </div>
            <div class="form-group">
                <label for="hotel">Hotel</label>
                <input type="text" class="form-control" id="hotel" name="contact_person_hotel" placeholder="Hotel"
                       required value="<?php echo $exhibitor_data['contact_person_hotel'] ?>">
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="contact_person_telephone"
                       placeholder="Telephone" required value="<?php echo $exhibitor_data['contact_person_telephone'] ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="submit-exhibitor-form">Submit</button>
            </div>
        </fieldset>
    </form>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/exhibitor.js"></script>
</body>
</html>