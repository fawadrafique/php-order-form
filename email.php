<?php
require 'message.php';

$to = $email;
$subject = 'Your order\'s in the kitchen';
$from = dp_email;
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'To: ' . $to . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
// Send the email
mail($to, $subject, $message, $headers);
