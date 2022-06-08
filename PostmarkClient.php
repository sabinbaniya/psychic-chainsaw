<?php

// Import the Postmark Client Class:
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;

$client = new PostmarkClient("505ac7ea-3f6e-43af-8a84-df8a4ffa4568");
$fromEmail = "dummymail@tutanota.de";
$toEmail = "dummymail@tutanota.de";
$subject = "Hello from Postmark";
$htmlBody = "<strong>Hello</strong> dear Postmark user.";
$textBody = "Hello dear Postmark user.";
$tag = "example-email-tag";
$trackOpens = true;
$trackLinks = "None";
$messageStream = "confirmation-emails";

// Send an email:
$sendResult = $client->sendEmail(
  $fromEmail,
  $toEmail,
  $subject,
  $htmlBody,
  $textBody,
  $tag,
  $trackOpens,
  NULL, // Reply To
  NULL, // CC
  NULL, // BCC
  NULL, // Header array
  NULL, // Attachment array
  $trackLinks,
  NULL, // Metadata array
  $messageStream
);

var_dump($sendResult);

?>