<?php
session_start();

// Verify captcha
if (!isset($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['captcha']) {
    die('Invalid captcha code');
}

// Calculate points
function calculatePoints($data) {
    $points = 0;
    
    // Age points
    switch ($data['age']) {
        case '18-24': $points += 25; break;
        case '25-32': $points += 30; break;
        case '33-39': $points += 25; break;
        case '40-44': $points += 15; break;
    }
    
    // Education points
    switch ($data['education']) {
        case 'graduation': $points += 15; break;
        case 'phd': $points += 20; break;
    }
    
    // Experience points
    switch ($data['experience']) {
        case '8+': $points += 15; break;
        case '5-7': $points += 10; break;
        case '3-4': $points += 5; break;
    }
    
    // Language points
    switch ($data['language_score']) {
        case '8': $points += 20; break;
        case '7': $points += 10; break;
        case '6': $points += 0; break;
    }
    
    // Marital status points
    switch ($data['marital_status']) {
        case 'single': $points += 10; break;
        case 'married': $points += 5; break;
    }
    
    // State/Region points
    switch ($data['state_region']) {
        case '190': $points += 5; break;
        case '491': $points += 15; break;
    }
    
    return $points;
}

$total_points = calculatePoints($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Points Calculator Result</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .result-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .points {
            font-size: 48px;
            color: #0b1f47;
            text-align: center;
            margin: 20px 0;
        }
        .contact-options {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }
        .contact-btn {
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .call-btn {
            background-color: #0b1f47;
            color: white;
        }
        .whatsapp-btn {
            background-color: #25D366;
            color: white;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Your Immigration Points Result</h2>
        
        <div class="points">
            <?php echo $total_points; ?> Points
        </div>
        
        <p class="result-message">
            <?php if ($total_points >= 65): ?>
                Congratulations! You meet the minimum points requirement for Australian PR.
            <?php else: ?>
                You currently don't meet the minimum points requirement (65 points) for Australian PR.
            <?php endif; ?>
        </p>
        
        <div class="contact-options">
            <a href="tel:+1234567890" class="contact-btn call-btn">
                <i class="fas fa-phone"></i> Call Now
            </a>
            <a href="https://wa.me/1234567890" class="contact-btn whatsapp-btn">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>
    </div>
</body>
</html> 