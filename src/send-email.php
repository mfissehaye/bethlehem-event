<?php

require '../vendor/autoload.php';

$client = new \GuzzleHttp\Client;
$client->post("https://api:key-81ca3afdb5b337bfc40d2ee4a1393521@api.mailgun.net/v3/sandboxa95bf897f1554f39b8796949f40f36c1.mailgun.org/messages", array(
	'form_params' => array(
		'from' => 'Excited User<test@betesoftware.com>',
		'to' => 'briktyfissehaye@gmail.com',
		'subject' => 'Hello',
		'text' => 'Testing from PHP code'
	)
));

/*$msgClient = new \Mailgun\Mailgun( 'key-81ca3afdb5b337bfc40d2ee4a1393521' );
$domain    = "https://api.mailgun.net/v3/sandboxa95bf897f1554f39b8796949f40f36c1.mailgun.org";

$result = $msgClient->sendMessage( "$domain",
	array(
		'from'    => 'Excited User <test.betesoftware.com>',
		'to'      => 'Brikty Fissehaye <briktyfissehaye@gmail.com>',
		'subject' => 'Hello',
		'text' => 'Testing from my PHP code'
	) );

header('Content-Type', 'application/json');
json_encode(['status' => 'succes', 'result' => $result]);*/