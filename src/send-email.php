<?php

require '../vendor/autoload.php';

if(!isset($_POST['email'])) {
	header('Content-Type: application/json');
	echo json_encode(['status' => 'failure', 'error' => 'You must provide email address']);
	exit();
}

$client = new \GuzzleHttp\Client;
$response = $client->post("https://api:key-81ca3afdb5b337bfc40d2ee4a1393521@api.mailgun.net/v3/sandboxa95bf897f1554f39b8796949f40f36c1.mailgun.org/messages", array(
	'form_params' => array(
		'from' => 'Tester Bete Software<test@betesoftware.com>',
		'to' => $_POST['email'],
		'subject' => 'Hello',
		'text' => 'Testing from PHP code'
	)
));
header('Content-Type: application/json');
if($response->getBody()) {
	echo json_encode(['status' => 'success', 'message' => 'Email has been sent']);
} else {
	echo json_encode(['status' => 'failure', 'message' => 'Could not send email. Please try again.']);
}

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