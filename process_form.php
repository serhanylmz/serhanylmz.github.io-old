<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // validate the form data
    $errors = array();
    if (empty($name)) {
        $errors[] = 'Please enter your name.';
    }
    if (empty($email)) {
        $errors[] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (empty($message)) {
        $errors[] = 'Please enter a message.';
    }
    
    // if there are no errors, send the email
    if (empty($errors)) {
        $to = 'youremail@example.com'; // replace with your email address
        $subject = 'New message from your website';
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";
        
        if (mail($to, $subject, $body, $headers)) {
            echo 'Thank you for your message. We will be in touch soon.';
        } else {
            echo 'Sorry, there was a problem sending your message. Please try again later.';
        }
    } else {
        // if there are errors, display them to the user
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
    }
}
?>
