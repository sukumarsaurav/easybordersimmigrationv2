<?php
session_start();
require_once 'mail-config.php';

// Get all POST data
$userData = $_POST;
$total_points = $userData['total_points'];

// Create detailed HTML email content
$message = "
<html>
<head>
<title>New PR Calculator Assessment</title>
<style>
    table { border-collapse: collapse; width: 100%; }
    th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
    th { background-color: #f2f2f2; }
</style>
</head>
<body>
    <h2>PR Points Calculator Assessment Details</h2>
    
    <h3>User Information</h3>
    <table>
        <tr><th>Name</th><td>{$userData['name']}</td></tr>
        <tr><th>Email</th><td>{$userData['email']}</td></tr>
        <tr><th>Mobile</th><td>{$userData['mobile']}</td></tr>
        <tr><th>Total Points</th><td>{$total_points}</td></tr>
    </table>

    <h3>Assessment Details</h3>
    <table>
        <tr><th>Category</th><th>Selection</th></tr>
        <tr><td>Age Group</td><td>{$userData['age_group']}</td></tr>
        <tr><td>Education</td><td>{$userData['education']}</td></tr>
        <tr><td>Experience</td><td>{$userData['experience']}</td></tr>
        <tr><td>English Level</td><td>{$userData['english_level']}</td></tr>
        <tr><td>Marital Status</td><td>{$userData['marital_status']}</td></tr>
    </table>

    <h3>Additional Questions</h3>
    <table>
        <tr><th>Question</th><th>Answer</th></tr>";

// Add all additional questions
for ($i = 1; $i <= 7; $i++) {
    if (isset($userData["question_$i"])) {
        $message .= "<tr><td colspan='2'>{$userData["question_$i"]}</td></tr>";
    }
}

$message .= "</table>
    <h3>Score Breakdown</h3>
    <pre>" . print_r(json_decode($userData['score_breakdown'], true), true) . "</pre>
</body>
</html>";

// Send email using the configuration from mail-config.php
$to = "inquiry@easybordersimmigration.com";
$subject = "New PR Points Calculator Assessment - {$userData['name']}";

$mailResult = sendMail($to, $subject, $message);

// Send response back to JavaScript
header('Content-Type: application/json');
if ($mailResult) {
    echo json_encode(['success' => true, 'message' => 'Assessment submitted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to send assessment']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Australia Pr points Calculator Easy Immigration</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="number-carousel.css">
    <link rel="stylesheet" href="studyvisastyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KSHT33RH');</script>
    <!-- End Google Tag Manager -->
    
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KSHT33RH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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