<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

require_once('header.php'); ?>

<p class="alert alert-success">Visitor <strong><?php echo $_POST['company_first_name'] . ' ' . $_POST['company_last_name'] . ' ' . $_POST['company_median_name'] ?></strong> has been registered. Email is sent to: <strong><?php echo $_POST['company_email'] ?></strong></p>
