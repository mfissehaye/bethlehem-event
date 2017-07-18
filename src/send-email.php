<?php

require '../vendor/autoload.php';

function send_email($name, $email) {

	header( 'Content-Type: application/json' );
	$client = new \GuzzleHttp\Client;
	try {
		$response = $client->post( "https://api:key-81ca3afdb5b337bfc40d2ee4a1393521@api.mailgun.net/v3/sandboxa95bf897f1554f39b8796949f40f36c1.mailgun.org/messages", array(
			'form_params' => array(
				'from'    => 'Tester Bete Software<test@betesoftware.com>',
				'to'      => $email,
				'subject' => "Hello $name",
				'html'    => "<html><body><h1>Welcome to the Exhibition</h1><p>You have been registered to exhibition."
			)
		) );
	} catch ( \GuzzleHttp\Exception\ClientException $e ) {
		return false;
	}
	return true;
}