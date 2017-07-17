<?php

require '../vendor/autoload.php';

$client = new \GuzzleHttp\Client();
if(!isset($_POST['email'])) {
	header('Content-Type: application/json');
	echo json_encode(['status' => 'failure', 'error' => 'Required field email missing']);
	exit();
}
try {
	$response = $client->post( 'https://api.sparkpost.com/api/v1/transmissions', [
		'json'    => [
			'content'    => [
				'from'    => 'test@qa1.betesoftware.com',
				'subject' => 'Oh Hey',
				'text'    => 'Testing Sparkspot'
			],
			'recipients' => [
				[
					'address' => $_POST['email']
				]
			]
		],
		'headers' => [
			'Authorization' => '35163ea00f151d62b0e518251c265552c9a2231b',
			'Content-Type'  => 'application/json'
		],
		'verify'  => false
	] );

	header('Content-Type: application/json');
	echo json_encode( $response );

} catch ( \GuzzleHttp\Exception\ClientException $e ) {
	header('Content-Type: application/json');
	echo json_encode(['status' => 'failure', 'error' => $e]);
}