document.addEventListener('DOMContentLoaded', function() {
    const optionButtons = document.querySelectorAll('.option-btn');
    const nextButton = document.querySelector('.next-btn');
    const backButton = document.querySelector('.back-btn');
    const totalScore = document.getElementById('totalScore');
    let currentStep = 1;
    let currentScore = 0;
    let maritalStatus = 'single'; // Default to single
    let scores = {
        age: 0,
        education: 0,
        language: {
            reading: 0,
            writing: 0,
            listening: 0,
            speaking: 0
        },
        experience: 0,
        canadianExp: 0,
        spouse: {
            language: {
                reading: 0,
                writing: 0,
                listening: 0,
                speaking: 0
            },
            education: 0,
            experience: 0
        },
        additional: {
            pnp: 0,
            employment: 0,
            sibling: 0,
            french: 0
        }
    };

    // Age points calculation
    const agePoints = {
        'Below 18': { single: 0, married: 0 },
        '18': { single: 99, married: 90 },
        '19': { single: 105, married: 95 },
        '20-29': { single: 110, married: 100 },
        '30': { single: 105, married: 95 },
        '31': { single: 99, married: 90 },
        '32': { single: 94, married: 85 },
        '33': { single: 88, married: 80 },
        '34': { single: 83, married: 75 },
        '35': { single: 77, married: 70 },
        '36': { single: 72, married: 65 },
        '37': { single: 66, married: 60 },
        '38': { single: 61, married: 55 },
        '39': { single: 55, married: 50 },
        '40': { single: 50, married: 45 },
        '41': { single: 39, married: 35 },
        '42': { single: 28, married: 25 },
        '43': { single: 17, married: 15 },
        '44': { single: 6, married: 5 },
        '45+': { single: 0, married: 0 }
    };

    // Education points
    const educationPoints = {
        'PhD': 150,
        'Master\'s degree': 135,
        'Two or more post-secondary diplomas (one must be at least 3 years)': 128,
        'Bachelor\'s degree (3 years or more)': 120,
        'Two-year diploma': 98,
        'One-year diploma': 90,
        'High school diploma': 30
    };

    // Work experience points
    const experiencePoints = {
        'Less than 1': 0,
        '1 year': 40,
        '2 years': 53,
        '3 years': 64,
        '4 years': 72,
        '5+ years': 80
    };

    // Canadian experience points
    const canadianExpPoints = {
        'Less than 1': 0,
        '1 year': 40,
        '2 years': 53,
        '3 years': 64,
        '4 years': 72,
        '5+ years': 70
    };

    // First, add the language points constant at the top with other constants
    const languagePoints = {
        'CLB 10+': { single: 32, married: 30 },
        'CLB 9': { single: 29, married: 26 },
        'CLB 8': { single: 22, married: 22 },
        'CLB 7': { single: 16, married: 16 },
        'CLB 6': { single: 8, married: 8 },
        'CLB 5': { single: 4, married: 4 },
        'Below CLB 5': { single: 0, married: 0 }
    };

    function updateScore() {
        // Instead of looking for a single selected button, we need to look for all selected buttons in the current step
        const currentStepElement = document.querySelector(`#step${currentStep}`);
        if (!currentStepElement) return;

        switch(currentStep) {
            case 1:
                maritalStatus = currentStepElement.querySelector('.option-btn.selected').dataset.status;
                // Reset scores when marital status changes
                scores = {
                    age: 0,
                    education: 0,
                    language: {
                        reading: 0,
                        writing: 0,
                        listening: 0,
                        speaking: 0
                    },
                    experience: 0,
                    canadianExp: 0,
                    spouse: {
                        language: {
                            reading: 0,
                            writing: 0,
                            listening: 0,
                            speaking: 0
                        },
                        education: 0,
                        experience: 0
                    },
                    additional: {
                        pnp: 0,
                        employment: 0,
                        sibling: 0,
                        french: 0
                    }
                };
                break;
            case 2:
                const age = currentStepElement.querySelector('.option-btn.selected').textContent.trim();
                scores.age = agePoints[age][maritalStatus];
                break;
            case 3:
                const education = currentStepElement.querySelector('.option-btn.selected').textContent.trim();
                scores.education = educationPoints[education];
                break;
            case 4:
                const clbLevel = currentStepElement.querySelector('.option-btn.selected').dataset.clb;
                
                if (clbLevel && languagePoints[`CLB ${clbLevel}`]) {
                    const points = languagePoints[`CLB ${clbLevel}`][maritalStatus];
                    // Apply the same points to all language skills
                    scores.language.reading = points;
                    scores.language.writing = points;
                    scores.language.listening = points;
                    scores.language.speaking = points;
                } else {
                    console.error('Invalid CLB level:', clbLevel);
                    scores.language.reading = 0;
                    scores.language.writing = 0;
                    scores.language.listening = 0;
                    scores.language.speaking = 0;
                }
                break;
            case 5:
                const experience = currentStepElement.querySelector('.option-btn.selected').textContent.trim();
                scores.experience = experiencePoints[experience];
                break;
            case 6:
                const canadianExp = currentStepElement.querySelector('.option-btn.selected').textContent.trim();
                scores.canadianExp = canadianExpPoints[canadianExp];
                break;
            case 7:
                if (maritalStatus === 'married') {
                    // Reset spouse scores before adding new ones
                    scores.spouse = {
                        language: {
                            reading: 0,
                            writing: 0,
                            listening: 0,
                            speaking: 0
                        },
                        education: 0,
                        experience: 0
                    };

                    // Get all selected buttons in step 7
                    const selectedSpouseButtons = currentStepElement.querySelectorAll('.option-btn.selected');
                    selectedSpouseButtons.forEach(button => {
                        const section = button.closest('.language-section, .spouse-section');
                        if (!section) return;
                        
                        const sectionType = section.querySelector('h3').textContent.toLowerCase();
                        const points = parseInt(button.dataset.points);
                        
                        if (sectionType.includes('language')) {
                            const pointPerSkill = points / 4;
                            scores.spouse.language = {
                                reading: pointPerSkill,
                                writing: pointPerSkill,
                                listening: pointPerSkill,
                                speaking: pointPerSkill
                            };
                        } else if (sectionType.includes('education')) {
                            scores.spouse.education = points;
                        } else if (sectionType.includes('experience')) {
                            scores.spouse.experience = points;
                        }
                    });
                }
                break;
            case 8:
                // Reset additional points before adding new ones
                scores.additional = {
                    pnp: 0,
                    employment: 0,
                    sibling: 0,
                    french: 0
                };

                // Get all selected buttons in step 8
                const selectedAdditionalButtons = currentStepElement.querySelectorAll('.option-btn.selected');
                selectedAdditionalButtons.forEach(button => {
                    const section = button.closest('.additional-section');
                    if (!section) return;
                    
                    const sectionType = section.querySelector('h3').textContent.toLowerCase();
                    const points = parseInt(button.dataset.points);
                    
                    if (sectionType.includes('provincial')) {
                        scores.additional.pnp = points;
                    } else if (sectionType.includes('employment')) {
                        scores.additional.employment = points;
                    } else if (sectionType.includes('sibling')) {
                        scores.additional.sibling = points;
                    } else if (sectionType.includes('french')) {
                        scores.additional.french = points;
                    }
                });
                break;
        }

        // Calculate total score
        const languageTotal = Object.values(scores.language).reduce((sum, val) => sum + val, 0);
        const spouseTotal = maritalStatus === 'married' ? 
            (Object.values(scores.spouse.language).reduce((sum, val) => sum + val, 0) + 
            scores.spouse.education + 
            scores.spouse.experience) : 0;
        const additionalTotal = Object.values(scores.additional).reduce((sum, val) => sum + val, 0);
        
        currentScore = scores.age + 
                      scores.education + 
                      languageTotal + 
                      scores.experience + 
                      scores.canadianExp + 
                      spouseTotal + 
                      additionalTotal;
        
        // Update the score display
        totalScore.textContent = currentScore;
    }

    // Update the click handler for option buttons
    optionButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove selected class from other buttons in the same grid
            const parentGrid = this.closest('.options-grid');
            parentGrid.querySelectorAll('.option-btn').forEach(btn => {
                btn.classList.remove('selected');
            });
            
            // Add selected class to clicked button
            this.classList.add('selected');
            
            // Update the score
            updateScore();
        });
    });

    // Update the next button click handler
    nextButton.addEventListener('click', function() {
        const currentStepElement = document.getElementById(`step${currentStep}`);
        if (!currentStepElement) {
            console.error('Current step element not found:', currentStep);
            return;
        }

        const selectedOption = currentStepElement.querySelector('.option-btn.selected');
        if (!selectedOption) {
            alert('Please select an option before proceeding.');
            return;
        }

        const nextStepElement = document.getElementById(`step${currentStep + 1}`);
        if (nextStepElement) {
            // Hide current step
            currentStepElement.style.display = 'none';
            currentStepElement.classList.remove('active');
            
            // Show next step
            nextStepElement.style.display = 'block';
            nextStepElement.classList.add('active');
            
            // Update step counter
            currentStep++;
            
            // Enable back button
            backButton.disabled = false;

            // If this is the last step, show the submit section
            if (currentStep === 9) {
                // Hide the next button on the last step
                nextButton.style.display = 'none';
                
                // Show the submit section if it exists
                const submitSection = document.getElementById('submitSection');
                if (submitSection) {
                    submitSection.style.display = 'block';
                }
            }
            
            // Update step indicator
            updateStepIndicator();
        }
    });

    backButton.addEventListener('click', function() {
        if (currentStep > 1) {
            const currentStepElement = document.getElementById(`step${currentStep}`);
            const previousStepElement = document.getElementById(`step${currentStep - 1}`);
            
            currentStepElement.style.display = 'none';
            previousStepElement.style.display = 'block';
            currentStep--;
            updateStepIndicator();
            
            if (currentStep === 1) {
                backButton.disabled = true;
            }
        }
    });

    function updateStepIndicator() {
        // Update step number
        const currentStepElement = document.getElementById('currentStep');
        if (currentStepElement) {
            currentStepElement.textContent = currentStep;
        }

        // Update step text
        const stepText = document.querySelector('.step-text');
        if (stepText) {
            stepText.textContent = `STEP ${currentStep} OF 9`;
        }

        // Update dots
        const dots = document.querySelectorAll('.step-dots .dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index < currentStep);
        });
    }

    // Initialize the calculator
    function initializeCalculator() {
        // Make sure first step is visible and active
        document.querySelectorAll('.step-content').forEach(step => {
            step.style.display = 'none';
            step.classList.remove('active');
        });
        
        const firstStep = document.getElementById('step1');
        if (firstStep) {
            firstStep.style.display = 'block';
            firstStep.classList.add('active');
        }
        
        // Disable back button initially
        backButton.disabled = true;
        
        // Update step indicator
        updateStepIndicator();
    }

    // Call initialize function
    initializeCalculator();

    // Add this function to handle form submission
    function handleSubmit() {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const mobile = document.getElementById('mobile').value;

        // Basic validation
        if (!name || !email || !mobile) {
            alert('Please fill in all fields');
            return;
        }

        const formData = {
            name: name,
            email: email,
            mobile: mobile,
            marital_status: maritalStatus,
            age_points: scores.age,
            education_points: scores.education,
            language_scores: scores.language,
            experience_points: scores.experience,
            canadian_exp_points: scores.canadianExp,
            spouse_language_scores: scores.spouse.language,
            spouse_education_points: scores.spouse.education,
            spouse_experience_points: scores.spouse.experience,
            additional_points: scores.additional,
            total_points: currentScore
        };

        // Send the data to the server
        fetch('process-canada-calculator.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Your assessment has been submitted successfully!');
                // Optional: Reset form
                document.getElementById('contactForm').reset();
            } else {
                alert('Failed to submit assessment. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });
    }

    // Make handleSubmit available globally
    window.handleSubmit = handleSubmit;
}); 