<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail($to, $subject, $message, $from_name = "Easy Borders Immigration") {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com'; // Replace with your SMTP host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@easybordersimmigration.com'; // Your email
        $mail->Password   = 'x[G2Co5o2x?P'; // Your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('info@easybordersimmigration.com', $from_name);
        $mail->addAddress($to);
        $mail->addReplyTo('info@easybordersimmigration.com', $from_name);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>