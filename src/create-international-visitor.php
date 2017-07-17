<?php

// create-exhibitor.php

use App\DB;

require '../vendor/autoload.php';
$row = DB::createVisitor($_POST, 'international');

require_once('header.php');
?>

<p class="alert alert-success">You have registered successfully as an international visitor.</p>