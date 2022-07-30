<?php

$sendTo = "markmarriott@bigpond.com";
$subject = "The Nevilles Contact Form";


$headers = "From: " . $_POST["name"]; 
$headers .= "<" . $_POST["email"] . ">\r\n"; 
$headers .= "Reply-To: " . $_POST["email"] . "\r\n"; 
$headers .= "Return-Path: " . $_POST["email"]; 


$message = "Phone: ".$_POST["phone"]."\n\n"."Message: ".$_POST["message"];


mail($sendTo, $subject, $message, $headers);

?>