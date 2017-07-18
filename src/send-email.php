<?php

require '../vendor/autoload.php';

if(!isset($_POST['email'])) {
	header('Content-Type: application/json');
	echo json_encode(['status' => 'failure', 'error' => 'You must provide email address']);
	exit();
}

$email = $_POST['email'];
$token = $_POST['token'];
$companyName = $_POST['company_name'];
$link = "http://qa1.betesoftware.com/src/create-exhibitor.php?token=$token";

header('Content-Type: application/json');
$client = new \GuzzleHttp\Client;
try {
	$response = $client->post("https://api:key-81ca3afdb5b337bfc40d2ee4a1393521@api.mailgun.net/v3/sandboxa95bf897f1554f39b8796949f40f36c1.mailgun.org/messages", array(
		'form_params' => array(
			'from' => 'Tester Bete Software<test@betesoftware.com>',
			'to' => $email,
			'subject' => "Hello $companyName",
			'text' => "<html><body><h1>Welcome to the Exhibition</h1><p>You have been registered to exhibition. Click on the following link to insert exhibitors from your organization. <a href=\"$link\">$link</a></p></body></html>"
		)
	));
	echo json_encode(['status' => 'success', 'message' => $response->getBody()]);
} catch(\GuzzleHttp\Exception\ClientException $e) {
	echo json_encode(['status' => 'failure', 'message' => 'Could not send email. Please try again.' . $e->getMessage()]);
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