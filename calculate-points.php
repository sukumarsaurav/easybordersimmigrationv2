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
    <script src="hero-script.js"></script>

    <script src="script.js"></script>
    <script src="number-carousel.js"></script>
</body>
</body>
</html> 