<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Send the email
  $to = "srhnylmz14@gmail.com"; // Replace with your email address
  $subject = "New message from your website";
  $body = "Name: $name\nEmail: $email\nMessage: $message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message. We'll be in touch soon.";
  } else {
    echo "Sorry, there was a problem sending your message. Please try again later.";
  }
}
?>
