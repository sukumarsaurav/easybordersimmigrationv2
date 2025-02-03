<?php
require_once 'mail-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $formData = $_POST;
    
    // Create HTML email content
    $message = "
    <html>
    <head>
        <title>Australia PR Points Calculator Submission</title>
        <style>
            table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
            th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
            th { background-color: #f2f2f2; }
            .total-score { font-size: 24px; font-weight: bold; color: #0066cc; }
        </style>
    </head>
    <body>
        <h2>Australia PR Points Calculator Submission</h2>
        
        <h3>Personal Information</h3>
        <table>
            <tr><th>Name</th><td>{$formData['name']}</td></tr>
            <tr><th>Email</th><td>{$formData['email']}</td></tr>
            <tr><th>Mobile</th><td>{$formData['mobile']}</td></tr>
        </table>

        <h3>Assessment Details</h3>
        <table>
            <tr><th>Age Group</th><td>{$formData['age_group']}</td></tr>
            <tr><th>Education</th><td>{$formData['education']}</td></tr>
            <tr><th>Work Experience</th><td>{$formData['experience']}</td></tr>
            <tr><th>English Proficiency</th><td>{$formData['english_level']}</td></tr>
            <tr><th>Marital Status</th><td>{$formData['marital_status']}</td></tr>
        </table>

        <h3>Additional Questions</h3>
        <table>";

    // Add additional questions responses
    for ($i = 1; $i <= 7; $i++) {
        if (isset($formData["question_$i"])) {
            $message .= "<tr><td colspan='2'><strong>Q$i:</strong> {$formData["question_$i"]}</td></tr>";
        }
    }

    $message .= "</table>
        
        <h3>Points Breakdown</h3>
        <table>";
    
    $scoreBreakdown = json_decode($formData['score_breakdown'], true);
    foreach ($scoreBreakdown as $category => $points) {
        $message .= "<tr><th>" . ucfirst($category) . "</th><td>$points points</td></tr>";
    }

    $message .= "</table>
        <p class='total-score'>Total Points: {$formData['total_points']}</p>
    </body>
    </html>";

    // Send email
    $to = "sukumarsaurav@gmail.com"; // Replace with your email
    $subject = "New PR Points Calculator Submission - {$formData['name']}";
    
    $mailResult = sendMail($to, $subject, $message);

    // Send response back to JavaScript
    header('Content-Type: application/json');
    if ($mailResult) {
        echo json_encode(['success' => true, 'message' => 'Your assessment has been submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to submit assessment. Please try again.']);
    }
    exit;
}
?> 