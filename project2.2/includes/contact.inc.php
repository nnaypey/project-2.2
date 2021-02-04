<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_from = 'iitproject2.2@outlook.com';

$email_subject = "New form submission";

$email_body = "User Name: $name.\n" .
    "User email: $visitor_email.\n" .
    "User message: $message.\n";


$to = "iitproject2.2@outlook.com";

$headers = "From: $email_from \r\n";

$headers = "Reply-To: $visitor_email \r\n";

mail($to, $email_subject, $email_body, $headers);

header("Location: ../contact.php");
