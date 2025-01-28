<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sukumarsaurav@gmail.com";
    $subject = "New Contact Form Submission";
    
    $message = "
    <html>
    <head>
    <title>New Contact Form Submission</title>
    </head>
    <body>
    <h2>Contact Form Details:</h2>
    <p>Name: {$_POST['contact_name']}</p>
    <p>Email: {$_POST['contact_email']}</p>
    <p>Phone: {$_POST['contact_phone']}</p>
    <p>Message: {$_POST['message']}</p>
    </body>
    </html>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: {$_POST['contact_email']}" . "\r\n";
    
    mail($to, $subject, $message, $headers);
    
    // Redirect back with success message
    header("Location: thank-you.html");
    exit();
}
?> 