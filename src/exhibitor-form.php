<form action="<?php echo $form_action ?>" method="POST" id="<?php echo $form_id ?>">
	<fieldset>
		<legend>Company Information</legend>
		<div class="form-group">
			<label for="company-name">Company's Name</label>
			<input type="text" class="form-control" id="company-name" name="company-name" placeholder="Company's Name" required>
		</div>
	</fieldset>
	<fieldset>
		<legend>Representative Name</legend>
		<div class="form-group">
			<label for="region">Region</label>
			<input type="text" class="form-control" id="region" name="region" placeholder="Region" required>
		</div>
		<div class="form-group">
			<label for="town">Town</label>
			<input type="text" class="form-control" id="town" name="town" placeholder="Town">
		</div>
		<div class="form-group">
			<label for="h-no">H.no</label>
			<input type="number" class="form-control" id="h-no" name="h-no" placeholder="House Number">
		</div>
		<div class="form-group">
			<label for="po-box">P.O.Box</label>
			<input type="number" class="form-control" id="po-box" name="po-box" placeholder="Expiry Date" required>
		</div>
		<div class="form-group">
			<label for="tel">Tel</label>
			<input type="tel" class="form-control" id="tel" name="tel" placeholder="Tel">
		</div>
		<div class="form-group">
			<label for="fax">Fax</label>
			<input type="tel" class="form-control" id="fax" name="fax" placeholder="Fax">
		</div>
		<div class="form-group">
			<label for="mob">Mob</label>
			<input type="tel" class="form-control" id="mob" name="mob" placeholder="Mobile Number">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
		</div>
		<div class="form-group">
			<label for="passport-number">Passport No.</label>
			<input type="text" class="form-control" id="passport-no" name="passport-no" placeholder="Passport No."> </div>
		<div class="form-group">
			<label for="web">Web</label>
			<input type="url" class="form-control" id="web" name="web" placeholder="Web">
		</div>
	</fieldset>
    <fieldset>
        <legend>Business Information</legend>
        <div class="form-group">
            <label for="business-type">Type of Business</label>
            <select name="business-type" id="business-type" class="form-control" required>
                <option value="">Select</option>
                <option value="it">IT</option>
                <option value="health">Health</option>
                <option value="agriculture">Agriculture</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit-exhibitor-form" name="submit_form">Submit</button>
        </div>
    </fieldset>
</form>