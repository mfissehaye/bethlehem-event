<?php

$to = 'merhawifissehaye@gmail.com';
$subject = 'This is the subject';
$body = '<div class="">Hello Hello</div>';

$headers = 'From: YourLogoName test@qa1.betesoftware.com' . "\r\n" ;
$headers .='Reply-To: '. $to . "\r\n" ;
$headers .='X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
if(mail($to, $subject, $body,$headers)) {
    header('Content-Type: application/json');
    json_encode(['status' => 'success', 'message' => 'Mail has been sent');
}
else
{
    header('Content-Type: application/json');
    json_encode(['status' => 'failure', 'message' => 'Message sending failed']);
}