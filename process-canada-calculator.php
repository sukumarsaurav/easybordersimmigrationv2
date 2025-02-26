<?php
require_once 'mail-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw JSON data since we're sending application/json
    $jsonData = file_get_contents('php://input');
    $formData = json_decode($jsonData, true);
    
    // Parse the language scores
    $languageScores = $formData['language_scores'];
    $totalLanguagePoints = array_sum($languageScores);
    
    // Parse spouse scores
    $spouseLanguageScores = $formData['spouse_language_scores'];
    $totalSpouseLanguagePoints = array_sum($spouseLanguageScores);
    
    // Parse additional points
    $additionalPoints = $formData['additional_points'];
    $totalAdditionalPoints = array_sum((array)$additionalPoints);
    
    $message = "
    <html>
    <head>
        <title>Canada PR Points Calculator Submission</title>
        <style>
            table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
            th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
            th { background-color: #f2f2f2; }
            .total-score { font-size: 24px; font-weight: bold; color: #0066cc; }
        </style>
    </head>
    <body>
        <h2>Canada PR Points Calculator Submission</h2>
        
        <h3>Personal Information</h3>
        <table>
            <tr><th>Name</th><td>{$formData['name']}</td></tr>
            <tr><th>Email</th><td>{$formData['email']}</td></tr>
            <tr><th>Mobile</th><td>{$formData['mobile']}</td></tr>
            <tr><th>Marital Status</th><td>{$formData['marital_status']}</td></tr>
        </table>

        <h3>CRS Score Breakdown</h3>
        <table>
            <tr><th>Category</th><th>Points</th></tr>
            <tr><td>Age</td><td>{$formData['age_points']}</td></tr>
            <tr><td>Education</td><td>{$formData['education_points']}</td></tr>
            <tr><td>Language Skills (Total)</td><td>{$totalLanguagePoints}</td></tr>
            <tr><td>- Reading</td><td>{$languageScores['reading']}</td></tr>
            <tr><td>- Writing</td><td>{$languageScores['writing']}</td></tr>
            <tr><td>- Listening</td><td>{$languageScores['listening']}</td></tr>
            <tr><td>- Speaking</td><td>{$languageScores['speaking']}</td></tr>
            <tr><td>Work Experience</td><td>{$formData['experience_points']}</td></tr>
            <tr><td>Canadian Experience</td><td>{$formData['canadian_exp_points']}</td></tr>";

    // Add spouse section if married
    if ($formData['marital_status'] === 'married') {
        $message .= "
            <tr><td colspan='2'><strong>Spouse Factors</strong></td></tr>
            <tr><td>Spouse Language Skills (Total)</td><td>{$totalSpouseLanguagePoints}</td></tr>
            <tr><td>- Spouse Reading</td><td>{$spouseLanguageScores['reading']}</td></tr>
            <tr><td>- Spouse Writing</td><td>{$spouseLanguageScores['writing']}</td></tr>
            <tr><td>- Spouse Listening</td><td>{$spouseLanguageScores['listening']}</td></tr>
            <tr><td>- Spouse Speaking</td><td>{$spouseLanguageScores['speaking']}</td></tr>
            <tr><td>Spouse Education</td><td>{$formData['spouse_education_points']}</td></tr>
            <tr><td>Spouse Canadian Experience</td><td>{$formData['spouse_experience_points']}</td></tr>";
    }

    $message .= "
            <tr><td>Additional Points</td><td>{$totalAdditionalPoints}</td></tr>
            <tr><td>- Provincial Nomination</td><td>{$additionalPoints['pnp']}</td></tr>
            <tr><td>- Arranged Employment</td><td>{$additionalPoints['employment']}</td></tr>
            <tr><td>- Sibling in Canada</td><td>{$additionalPoints['sibling']}</td></tr>
            <tr><td>- French Language</td><td>{$additionalPoints['french']}</td></tr>
        </table>

        <p class='total-score'>Total CRS Score: {$formData['total_points']}</p>
    </body>
    </html>";

    $to = "inquiry@easybordersimmigration.com";
    $subject = "New Canada PR Calculator Submission - {$formData['name']}";
    
    $mailResult = sendMail($to, $subject, $message);

    header('Content-Type: application/json');
    echo json_encode([
        'success' => $mailResult,
        'message' => $mailResult ? 'Your assessment has been submitted successfully!' : 'Failed to submit assessment'
    ]);
    exit;
}
?> 