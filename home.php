<?php
// Include database connection
require_once 'db.php';

// Fetch SEO data from the database
$query = "SELECT * FROM seo WHERE page = 'index'";
$result = mysqli_query($conn, $query);
$seoData = mysqli_fetch_assoc($result);

// Set the page title
$pageTitle = $seoData['title'] ?? 'Easy Borders Immigration - Education Consultancy';

include 'src/includes/header.php';
?>

  <!-- Hero Section -->
  <section class="hero">
        <div class="carousel">
            <div class="carousel-slide active">
                <img src="/src/images/hero/1.png" alt="Hero Image 1">
                <div class="hero-content">
                    <h1>Welcome to Easy Borders Immigration</h1>
                    <h2>Your Journey Starts Here</h2>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="/src/images/hero/2.png" alt="Hero Image 2">
                <div class="hero-content">
                    <h1>Explore New Opportunities</h1>
                    <h2>Study Abroad with Us</h2>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="/src/images/hero/3.png" alt="Hero Image 3">
                <div class="hero-content">
                    <h1>Achieve Your Dreams</h1>
                    <h2>Get the Best Education</h2>
                </div>
            </div>
        </div>
    </section>

<!-- Other sections... -->
  <!-- English Test Preparation Section -->
  <section class="test-prep">
        <div class="container">
            <h2>English Test Preparation</h2>
            <p>Easy Borders Immigration gives you the freedom to explore exciting new opportunities, and our range of
                courses and specially designed learning content plus certified trainer will help you to reach your
                goals.</p>
            <div class="test-types">
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/courses-1.jpg" alt="IELTS Students">
                    </div>
                    <div class="card-content">
                        <h3>IELTS</h3>
                        <p>The International English Language Testing System (IELTS) is an international standardized
                            test of English Language Proficiency for non-native English language speakers.</p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/Pearson.jpg" alt="PTE Academic">
                    </div>
                    <div class="card-content">
                        <h3>PTE</h3>
                        <p>The Pearson Test of English Academic or PTE - has a quickly grown to become the preferred
                            English test for students and migrant visa applicants alike around the world.</p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/courses-3.jpg" alt="CAEL">
                    </div>
                    <div class="card-content">
                        <h3>CAEL</h3>
                        <p>This test designed to measure the English language proficiency of students planning to study
                            in Canadian post-secondary institutions. CAEL is one of the best tools...</p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/courses-4.jpg" alt="CELPIP">
                    </div>
                    <div class="card-content">
                        <h3>CELPIP</h3>
                        <p>The Canadian English Language Proficiency Index Program (CELPIP) is an English language
                            proficiency test accepted by a number of governments, professional organizations...</p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/OCCUPATIONAL ENGLISH TEST.jpg" alt="OET">
                    </div>
                    <div class="card-content">
                        <h3>OET</h3>
                        <p>The OET (Occupational English Test) assesses the English language communication skills of
                            healthcare professionals who wish to practice in an English-speaking environment.</p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/courses-6.jpg" alt="TOEFL">
                    </div>
                    <div class="card-content">
                        <h3>TOEFL</h3>
                        <p>Test of English as a Foreign Language (TOEFL) is a standardized test to measure the English
                            language ability of non-native speakers wishing to enroll in English-speaking universities.
                        </p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card">
                    <div class="card-image">
                        <img src="/src/images/ENGLISH.jpg" alt="Spoken English">
                    </div>
                    <div class="card-content">
                        <h3>Spoken English & Personality Development</h3>
                        <p>General Spoken English & Business English are Computer Based Classes that enhance the level
                            of english.</p>
                        <div class="card-actions">
                            <a href="#" class="know-more">Know More</a>
                            <a href="#" class="register">Online Registration</a>
                        </div>
                    </div>
                </div>
                <div class="test-card success-card">
                    <div class="success-content">
                        <h3>Our Successful Results</h3>
                        <div class="student-profile">
                            <img src="/src/images/courses-6.jpg" alt="Student" class="student-image">
                            <span class="student-name">Paramveer Singh</span>
                        </div>
                        <div class="score-badge">
                            <span class="score">70</span>
                            <span class="total">Overall Score - 92</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="study-visa">
        <div class="container">
            <h2 class="section-title">
                <span class="title-decoration">⬥</span>
                Study Visa
                <span class="title-decoration">⬥</span>
            </h2>

            <div class="visa-grid">
                <!-- Australia -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/australia-flag.webp" alt="Australian Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>Australia</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/Australia.png" alt="Sydney Opera House">
                    </div>
                    <div class="card-content">
                        <p>Australia is the home of some of the world's top research facilities and academic
                            institutions. Imagine learning in supportive academic environments where professors...</p>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- Canada -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/canada-flag.png" alt="Canadian Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>Canada</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/canada.png" alt="Toronto Skyline">
                    </div>
                    <div class="card-content">
                        <p>Canada is the home of some of the world's top research facilities and academic institutions.
                            Imagine learning in supportive academic environments...</p>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- Dubai -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/dubai-flag.png" alt="UAE Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>Dubai</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/dubai.png" alt="Dubai Skyline">
                    </div>
                    <div class="card-content">
                        <p>
                            Studying in Dubai offers a unique blend of world-class education and a vibrant,
                            multicultural environment. With a growing number of international universities and
                            institutions, ...</p>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- Europe -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/europe-flag.png" alt="EU Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>Europe</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/Europe.png" alt="European City">
                    </div>
                    <div class="card-content">
                        <div class="country-tags">
                            <span class="tag">Bulgaria</span>
                            <span class="tag">Cyprus</span>
                            <span class="tag">France</span>
                            <span class="tag">Germany</span>
                            <span class="tag">Italy</span>
                            <span class="tag">Netherlands</span>
                            <span class="tag">Romania</span>
                            <span class="tag">Switzerland</span>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- Add similar blocks for New Zealand, South Asia, UK, and USA -->
                <!-- New Zealand -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/newzland-flag.png" alt="NZ Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>New Zealand</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/New zealand.png" alt="New Zealand City">
                    </div>
                    <div class="card-content">
                        <p>Start your Education in New Zealand with valuable information on everything you need to know
                            about studying abroad in New Zealand, from study permits...</p>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- South Asia -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/singapore-flag.png" alt="Asia Map" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>South Asia</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/singapore.png" alt="Singapore Skyline">
                    </div>
                    <div class="card-content">
                        <div class="country-tags">
                            <span class="tag">Malaysia</span>
                            <span class="tag">Singapore</span>
                            <span class="tag">Thailand</span>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- UK -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/uk-flag.png" alt="UK Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>UK</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/UK.png" alt="London Bridge">
                    </div>
                    <div class="card-content">
                        <p>UK is the home of some of the world's top research facilities and academic institutions.
                            Imagine learning in supportive academic environments where...</p>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>

                <!-- USA -->
                <div class="visa-card">
                    <div class="card-header">
                        <img src="/src/images/flag/usa-flag.jpg" alt="USA Flag" class="country-flag">
                        <div class="study-in">Study In</div>
                        <h3>USA</h3>
                    </div>
                    <div class="card-image">
                        <img src="/src/images/studyvisa/Usa.png" alt="Statue of Liberty">
                    </div>
                    <div class="card-content">
                        <p>Millions of people every year choose to study in the USA. The quality of education provided
                            by schools, colleges, and universities in the USA are among the highest...</p>
                        <div class="card-actions">
                            <a href="#" class="btn-read-more">READ MORE</a>
                            <a href="#" class="btn-assessment">ONLINE ASSESSMENT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Add this section after the study-visa section -->
     <section class="why-choose">
        <div class="container">
            <h2 class="section-title">
                <span>WHY CHOOSE</span>
                <span class="highlight">Esay Borders Immigration for Studying Abroad</span>
            </h2>

            <div class="services-grid">
                <!-- Career Counseling -->
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>CAREER COUNSELING</h3>
                    <p>Counseling is of course the first right step when deciding to study overseas. It helps students
                        to take right decisions for their bright future. Such type of counseling is given only by the
                        higher education consultant.</p>
                </div>

                <!-- Admission Guidance -->
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3>ADMISSION GUIDANCE</h3>
                    <p>We helps the students by telling them about the options of universities which conduct their
                        preferred course. We also helps them by telling them the fee structure and total estimated
                        expense of staying in a country.</p>
                </div>

                <!-- Financial Estimation -->
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <h3>FINANCIAL ESTIMATION</h3>
                    <p>Once the students take help from us they get a complete idea of what are the documents they
                        require, the total amount to be spent in education and living and how much amount to be shown to
                        the embassy.</p>
                </div>

                <!-- Visa Assistance -->
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-passport"></i>
                    </div>
                    <h3>VISA ASSISTANCE</h3>
                    <p>Getting a visa is something wherein a student face much difficulty. We helps the students to
                        collect right documents. Documentation part can only be done perfectly when get assistance of
                        someone who is experienced.</p>
                </div>

                <!-- Accommodation Guidance -->
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>ACCOMMODATION GUIDANCE</h3>
                    <p>We helps in providing accommodation to the students as they have tie ups with the universities.
                        In some cases We also provide you the contact details of seniors which they have sent for the
                        last intake.</p>
                </div>

                <!-- Job Awareness -->
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>JOB AWARENESS IN ABROAD</h3>
                    <p>We helps the students in getting job during of the course but also help them to know what kind of
                        jobs they can do their and earn an attractive amount of money simultaneously with their studies
                        and after the completion of study.</p>
                </div>
            </div>
        </div>
    </section>
      <!-- Services Section -->
      <section class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-grid">
                <div class="service-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Study Abroad</h3>
                    <p>Explore opportunities to study in top universities worldwide.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-plane-departure"></i>
                    <h3>Migration Services</h3>
                    <p>Expert guidance for your migration process.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-language"></i>
                    <h3>Language Training</h3>
                    <p>Comprehensive language courses for various tests.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-briefcase"></i>
                    <h3>Career Counseling</h3>
                    <p>Professional advice to shape your career path.</p>
                </div>
            </div>
        </div>
    </section>
       <!-- Add this section after the PR visa sections -->
       <section class="updates-section">
        <div class="container">
            <h2 class="section-title">
                <span>Trusted by Our Clients </span>
                
            </h2>
            <script defer async src='https://cdn.trustindex.io/loader.js?1e3000641bbb027707366b43f81'></script>

          
        </div>
    </section>
    <section class="pr-visa-sections">
        <!-- Australia PR Visa Section -->
        <div class="australia-pr">
            <div class="container">
                <div class="pr-grid">
                    <div class="pr-content">
                        <div class="pr-header">
                            <img src="/src/images/flag/australia-flag.webp" alt="Australia Flag Icon"
                                class="country-icon">
                            <h2>AUSTRALIA PR VISA</h2>
                        </div>
                        <p>An Australian permanent resident (permanent resident) is the name given to a non-citizen who
                            is the holder of a permanent visa. A permanent resident can live, work and study without
                            restriction in Australia.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                   
                    <div class="crs-calculator">
                        <h3>Australia Immigration Point Calculator</h3>
                        
                        <p>How many  Points do you have?</p>
                        <p>Find Out Now</p>
                        <a href="visa-calculator.html" class="cta-button">KNOW YOUR POINTS</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Canada PR Visa Section -->
        <div class="canada-pr">
            <div class="container">
                <div class="pr-grid">
                    <div class="calculator-section">
                        <div class="crs-calculator">
                            <h3>CRS Calculator</h3>
                            <p>Comprehensive Ranking System</p>
                            <p>How many CRS Points do you have?</p>
                            <p>Find Out Now</p>
                            <a href="#" class="cta-button">GET YOUR FREE CRS SCORE</a>
                        </div>
                        <div class="pnp-program">
                            <h3>DO YOU HAVE LOW CRS SCORE ?</h3>
                            <div class="pnp-content">
                                <h4>PNP PROGRAMME</h4>
                                <span class="express-entry">EXPRESS ENTRY</span>
                            </div>
                        </div>
                    </div>
                    <div class="pr-content">
                        <div class="pr-header">
                            <img src="/src/images/flag/canada-flag.png" alt="Canada Flag Icon" class="country-icon">
                            <h2>CANADA PR VISA</h2>
                        </div>
                        <p>Canada is the most preferred country for Indians when it comes to applying for Permanent
                            Residency Visa. Canada's flexible immigration policies,cultural diversity,democratic values,
                            career opportunities & Indian communities</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="contact-grid">
                <div class="contact-info" style="display:flex ;flex-direction: column ;align-items: start;">
                    <h3>Get in Touch</h3>
                    <p><i class="fas fa-map-marker-alt"></i> WZ-406 Janak park near Sanatan Dharm Mandir Hari Nagar New Delhi 110064</p>
                    <p><i class="fas fa-phone"></i> +91 783 800 0996</p>
                    <p><i class="fas fa-envelope"></i>support@easybordersimmigration.com</p>
                </div>
                <form class="contact-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <textarea placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    <a href="https://wa.me/+917838000996" target="_blank" class="whatsapp-button">
        <i class="fab fa-whatsapp"></i>
    </a>

<?php include 'src/includes/footer.php'; ?>