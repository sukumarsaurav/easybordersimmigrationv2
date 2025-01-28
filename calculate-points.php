<?php
session_start();

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

// Replace the existing email sending code with:
require_once 'mail-config.php';

// After require_once 'mail-config.php', add error checking
if (!file_exists('mail-config.php')) {
    error_log("mail-config.php not found");
    die("Mail configuration error");
}

// Modify the email sending section
try {
    // Validate POST data exists
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['mobile'])) {
        throw new Exception("Required POST data missing");
    }
    
    $to = "inquiry@easybordersimmigration.com";
    $subject = "New PR Points Calculator Submission";
    $message = "
    <html>
    <head>
    <title>New PR Calculator Submission</title>
    </head>
    <body>
    <h2>User Details:</h2>
    <p>Name: {$_POST['name']}</p>
    <p>Email: {$_POST['email']}</p>
    <p>Mobile: {$_POST['mobile']}</p>
    <p>Total Points: {$total_points}</p>
    </body>
    </html>
    ";

    $mail_sent = sendMail($to, $subject, $message);
    
    if (!$mail_sent) {
        error_log("Failed to send email using sendMail() function");
        // Optionally show user-friendly message
        echo "<div class='alert alert-warning'>Note: We received your submission but email notification failed.</div>";
    }
} catch (Exception $e) {
    error_log("Error in calculate-points.php: " . $e->getMessage());
    // Optionally show user-friendly message
    echo "<div class='alert alert-warning'>An error occurred but your points were calculated.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Points Calculator Result</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="number-carousel.css">
    <link rel="stylesheet" href="studyvisastyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .result-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .user-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .user-details {
            margin-bottom: 30px;
        }

        .user-details h3 {
            color: #0b1f47;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .detail-label {
            font-weight: bold;
            width: 120px;
            color: #666;
        }

        .points-display {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin-top: 20px;
        }

        .contact-form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .contact-form h3 {
            color: #0b1f47;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group textarea {
            height: 120px;
        }

        @media (max-width: 768px) {
            .result-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
        <!-- Top Bar -->
        <div class="top-bar">
        <div class="number-carousel">
            <div class="carousel-container">
                <div class="carousel-track">
                    <a href="tel:+918586878899" class="phone-number">+91 858 687 8899</a>
                    <a href="tel:+919659645927" class="phone-number">+91 965 964 5927</a>
                    <a href="tel:+919953747187" class="phone-number">+91 995 374 7187</a>
                    <a href="tel:+917838000996" class="phone-number">+91 783 800 0996</a>
                    <a href="tel:+13154651248" class="phone-number">+1 (315) 465-1248 (USA)</a>
                    <a href="tel:+17869495757" class="phone-number">+1 (786) 949-5757 (USA)</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="src/images/logo.jpeg" alt="Easy Borders Immigration Logo">
            </div>
            <nav>
                <button class="mobile-menu-button"><i class="fas fa-bars"></i></button>
                <ul>
                    <li><a href="/" class="active">Home</a></li>
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="english-preparation-test.html">English Test Preparation</a></li>
                    <li><a href="study-visa.html">Study Visa</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="sidebar-menu">
            <button class="close-menu-button">&times;</button>
            <ul>
                <li><a href="/" class="active">Home</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="english-preparation-test.html">English Test Preparation</a></li>
                <li><a href="study-visa.html">Study Visa</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
            </ul>
        </div>
    </header>

    <div class="result-container">
        <!-- Left Side: User Details Card -->
        <div class="user-card">
            <div class="user-details">
                <h3>Your Details</h3>
                <div class="detail-item">
                    <span class="detail-label">Name:</span>
                    <span><?php echo htmlspecialchars($_POST['name']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Email:</span>
                    <span><?php echo htmlspecialchars($_POST['email']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Mobile:</span>
                    <span><?php echo htmlspecialchars($_POST['mobile']); ?></span>
                </div>
            </div>

            <div class="points-display">
                <h2>Your Immigration Points</h2>
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
            </div>

            <div class="contact-options">
                <a href="tel:+917838000996" class="contact-btn call-btn">
                    <i class="fas fa-phone"></i> Call Now
                </a>
                <a href="https://wa.me/+917838000996" class="contact-btn whatsapp-btn">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="contact-form">
            <h3>Contact Us</h3>
            <form action="send-contact.php" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="contact_name" required value="<?php echo htmlspecialchars($_POST['name']); ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="contact_email" required value="<?php echo htmlspecialchars($_POST['email']); ?>">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="contact_phone" required value="<?php echo htmlspecialchars($_POST['mobile']); ?>">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Quick Links -->
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Policy</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="footer-col">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Career Counselling</a></li>
                        <li><a href="#">CAPS Notes</a></li>
                        <li><a href="#">English Test Preparation</a></li>
                        <li><a href="#">Study Visa</a></li>
                        <li><a href="#">Interview Preparation</a></li>
                    </ul>
                </div>

                <!-- Study Visa -->
                <div class="footer-col">
                    <h3>Study Visa</h3>
                    <ul>
                        <li><a href="study-visa/austrilia.html">Australia</a></li>
                        <li><a href="study-visa/canada.html">Canada</a></li>
                        <li><a href="study-visa/new-zealand.html">New Zealand</a></li>
                        <li><a href="study-visa/singapore.html">Singapore</a></li>
                        <li><a href="study-visa/germany.html">Germany</a></li>
                        <li><a href="study-visa/switzerland.html">Switzerland</a></li>
                        <li><a href="study-visa/france.html">France</a></li>
                    </ul>
                </div>

                <!-- English Test Preparation -->
                <div class="footer-col">
                    <h3>English Test Preparation</h3>
                    <ul>
                        <li><a href="english-preparation-test/ilets.html">IELTS</a></li>
                        <li><a href="english-preparation-test/pte.html">PTE</a></li>
                        <li><a href="english-preparation-test/cael.html">CAEL</a></li>
                        <li><a href="english-preparation-test/celpip.html">CELPIP</a></li>
                        <li><a href="english-preparation-test/oet.html">OET</a></li>
                        <li><a href="english-preparation-test/tofel.html">TOEFL</a></li>
                        <li><a href="english-preparation-test/spoken-english-and-personality-development.html">Spoken
                                English & Personality Development</a></li>
                    </ul>
                    <h3 class="migration-title">Migration</h3>
                    <ul>
                        <li><a href="migration/australia.html">Australia</a></li>
                        <li><a href="migration/canada.html">Canada</a></li>
                        <li><a href="migration/germany-job-search-visa.html">Germany Job Search Visa</a></li>
                    </ul>
                </div>

                <!-- Contact & Branches -->
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <div class="contact-info">
                        <p>WZ-481 Shiv Nagar, near Jail Road, New Delhi-110058</p>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d218.87630300551004!2d77.09561940226342!3d28.6291372569422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04a3f7abe5df%3A0x2305c17c54f27f73!2s481%2C%20Pocket%205%2C%20Shiv%20Nagar%2C%20Janakpuri%2C%20New%20Delhi%2C%20Delhi%2C%20110058!5e0!3m2!1sen!2sin!4v1737735011636!5m2!1sen!2sin"
                            width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

                <!-- Our Branches -->
                <div class="footer-col">
                    <h3>Our Branches</h3>
                    <div class="branches">
                        <div class="country">
                            <img src="/src/images/flag/indian-flag.png" alt="India Flag" class="flag">
                            <span>INDIA</span>
                        </div>
                        <h4>Delhi</h4>
                        <ul>
                            <li><a href="/branches/india/delhi/shiv-nagar-branch.html">Shiv Nagar</a></li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <p>Copyright © 2020 EsayBordersImmigration. All rights reserved</p>
                    <p>Designed by Suku</p>

                </div>
                <div class="social-links">
                    <span>Get Social with us</span>
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Social Media Sidebar -->
    <div class="social-sidebar">
        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://wa.me/+917838000996" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
    </div>
    <script>
        // Check if elements exist before adding listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Load other scripts only after DOM is ready
            const scripts = [
                'hero-script.js',
                'script.js',
                'number-carousel.js'
            ];
            
            scripts.forEach(script => {
                const scriptElement = document.createElement('script');
                scriptElement.src = script;
                scriptElement.onerror = function() {
                    console.error(`Failed to load ${script}`);
                };
                document.body.appendChild(scriptElement);
            });
        });
    </script>
</body>
</html> 