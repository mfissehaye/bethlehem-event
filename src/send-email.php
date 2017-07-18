<?php

require '../vendor/autoload.php';

$msgClient = new \Mailgun\Mailgun( 'key-81ca3afdb5b337bfc40d2ee4a1393521' );
$domain    = "sandboxa95bf897f1554f39b8796949f40f36c1.mailgun.org";

$result = $msgClient->sendMessage( "$domain",
	array(
		'from'    => 'Excited User <test.betesoftware.com>',
		'to'      => 'Merhawi Fissehaye <merhawifissehaye@gmail.com>',
		'subject' => 'Hello',
		'text' => 'Teset some mailgun awesomeness'
	) );

header('Content-Type', 'application/json');
json_encode(['status' => 'succes', 'result' => $result]);