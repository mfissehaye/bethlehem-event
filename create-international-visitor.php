<?php

// create-exhibitor.php

session_start();
require_once( 'db.php' );

// register organization
header( 'Content-Type: application/json' );
json_encode(['msg' => 'Welcome']);