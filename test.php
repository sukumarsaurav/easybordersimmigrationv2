<?php
// Test email configuration
$from = "info@easybordersimmigration.com";
$to = "sukumarsaurav@gmail.com";
$subject = "PHP Mail Test";

// Create email headers
$headers = array(
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: ' . $from,
    'Reply-To: ' . $from,
    'X-Mailer: PHP/' . phpversion()
);

// Create test message
$message = "
<html>
<head>
    <title>PHP Mail Test</title>
</head>
<body>
    <h2>PHP Mail Configuration Test</h2>
    <p>This is a test email to verify mail configuration.</p>
    <hr>
    <h3>Server Information:</h3>
    <ul>
        <li>PHP Version: " . phpversion() . "</li>
        <li>Server: " . $_SERVER['SERVER_SOFTWARE'] . "</li>
        <li>DateTime: " . date('Y-m-d H:i:s') . "</li>
    </ul>
</body>
</html>
";

// Attempt to send email
$mail_sent = mail($to, $subject, $message, implode("\r\n", $headers));

// Display results
echo "<h1>PHP Mail Configuration Test</h1>";

if($mail_sent) {
    echo "<div style='color: green; padding: 10px; border: 1px solid green; margin: 10px 0;'>";
    echo "✓ Test email sent successfully to $to";
    echo "</div>";
} else {
    echo "<div style='color: red; padding: 10px; border: 1px solid red; margin: 10px 0;'>";
    echo "✗ Failed to send test email";
    echo "</div>";
}

// Check mail configuration
echo "<h2>Mail Configuration Details:</h2>";
echo "<pre style='background: #f5f5f5; padding: 15px; border-radius: 5px;'>";

// Check sendmail path
$sendmail_path = ini_get('sendmail_path');
echo "Sendmail Path: " . ($sendmail_path ? $sendmail_path : 'Not configured') . "\n";

// Check SMTP configuration
$smtp_host = ini_get('SMTP');
$smtp_port = ini_get('smtp_port');
echo "SMTP Host: " . ($smtp_host ? $smtp_host : 'Not configured') . "\n";
echo "SMTP Port: " . ($smtp_port ? $smtp_port : 'Not configured') . "\n";

// Check error log
$error_log = error_get_last();
if($error_log) {
    echo "\nLast Error:\n";
    print_r($error_log);
}

echo "</pre>";

// Additional checks
echo "<h2>Additional Checks:</h2>";
echo "<ul>";

// Check if mail function exists
if(function_exists('mail')) {
    echo "<li style='color: green;'>✓ PHP mail() function is available</li>";
} else {
    echo "<li style='color: red;'>✗ PHP mail() function is not available</li>";
}

// Check if we can connect to SMTP server (if configured)
if($smtp_host && $smtp_port) {
    $connection = @fsockopen($smtp_host, $smtp_port, $errno, $errstr, 5);
    if($connection) {
        echo "<li style='color: green;'>✓ Successfully connected to SMTP server</li>";
        fclose($connection);
    } else {
        echo "<li style='color: red;'>✗ Could not connect to SMTP server ($errstr)</li>";
    }
}

echo "</ul>";

// Recommendations
echo "<h2>Recommendations:</h2>";
echo "<ul>";
echo "<li>If the test fails, check your server's mail logs (usually in /var/log/mail.log)</li>";
echo "<li>Verify that your domain's SPF and DKIM records are properly configured</li>";
echo "<li>Consider using a dedicated SMTP service like SendGrid or Amazon SES for better deliverability</li>";
echo "<li>Make sure your hosting provider allows sending emails</li>";
echo "</ul>";
?>