<?php
session_start();

// Create image
$image = imagecreatetruecolor(120, 40);

// Colors
$bg = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

// Fill background
imagefilledrectangle($image, 0, 0, 120, 40, $bg);

// Generate random string
$chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$captcha_string = '';
for ($i = 0; $i < 6; $i++) {
    $captcha_string .= $chars[rand(0, strlen($chars) - 1)];
}

// Store in session
$_SESSION['captcha'] = $captcha_string;

// Add text to image
imagettftext($image, 20, 0, 15, 30, $text_color, 'arial.ttf', $captcha_string);

// Output image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?> 