<?php

// create-exhibitor.php

session_start();
// register organization
header( 'Content-Type: application/json' );
json_encode(['msg' => 'Welcome']);