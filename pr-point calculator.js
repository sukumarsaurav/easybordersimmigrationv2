document.addEventListener('DOMContentLoaded', function() {
    const optionButtons = document.querySelectorAll('.option-btn');
    const nextButton = document.querySelector('.next-btn');
    const backButton = document.querySelector('.back-btn');
    const totalScore = document.getElementById('totalScore');
    let currentScore = 0; // Changed from 25 to 0
    let currentStep = 1;
    let currentQuestion = 1;
    let scores = {
        age: 0,
        education: 0,
        experience: 0,
        english: 0,
        marital: 0,
        additional: 0
    };

    // Remove duplicate navigation buttons and keep only the main ones
    const navigationButtons = document.querySelector('.calculator-content > .navigation-buttons');
    const stepContents = document.querySelectorAll('.step-content');
    
    // Remove navigation buttons from individual steps
    stepContents.forEach(step => {
        const stepNavButtons = step.querySelector('.navigation-buttons');
        if (stepNavButtons) {
            stepNavButtons.remove();
        }
    });

    let answeredQuestions = new Set();
    
    function showQuestion(questionNumber) {
        // Hide all questions
        document.querySelectorAll('.question').forEach(q => {
            q.style.display = 'none';
        });
        
        // Show the selected question
        const questionElement = document.getElementById(`question${questionNumber}`);
        if (questionElement) {
            questionElement.style.display = 'block';
            document.getElementById('questionProgress').textContent = `Question ${questionNumber} of 7`;
            
            // Update question navigation buttons
            updateQuestionNavigation(questionNumber);
        }
    }

    function updateQuestionNavigation(currentQuestionNum) {
        const navButtons = document.querySelectorAll('.question-nav-btn');
        navButtons.forEach(btn => {
            const questionNum = parseInt(btn.dataset.question);
            btn.classList.remove('active', 'completed');
            
            if (questionNum === currentQuestionNum) {
                btn.classList.add('active');
            } else if (answeredQuestions.has(questionNum)) {
                btn.classList.add('completed');
            }
        });
    }

    // Add click handlers for question navigation buttons
    document.querySelectorAll('.question-nav-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const questionNum = parseInt(this.dataset.question);
            if (answeredQuestions.has(questionNum) || questionNum === currentQuestion) {
                currentQuestion = questionNum;
                showQuestion(currentQuestion);
            } else {
                alert('Please answer the current question first');
            }
        });
    });

    // Modify the option button click handler in step 6
    optionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const parent = this.parentElement;
            parent.querySelectorAll('.option-btn').forEach(btn => {
                btn.classList.remove('selected');
            });
            this.classList.add('selected');
            
            if (currentStep === 6) {
                answeredQuestions.add(currentQuestion);
                updateQuestionNavigation(currentQuestion);
                
                // If there are more questions, show the next one
                if (currentQuestion < 7) {
                    setTimeout(() => {
                        currentQuestion++;
                        showQuestion(currentQuestion);
                    }, 500);
                }
            }
            updateScore();
        });
    });

    // Update the next button click handler
    nextButton.addEventListener('click', function() {
        console.log('Next button clicked', currentStep); // Debug log
        
        const currentStepElement = document.getElementById(`step${currentStep}`);
        const nextStepElement = document.getElementById(`step${currentStep + 1}`);
        
        if (!currentStepElement) {
            console.error('Current step element not found:', currentStep);
            return;
        }

        // Check if there's a selection made (except for step 7 which is the form)
        if (currentStep < 7) {
            const selectedButton = currentStepElement.querySelector('.option-btn.selected');
            if (!selectedButton) {
                alert('Please select an option before proceeding.');
                return;
            }
        }

        if (nextStepElement) {
            currentStepElement.style.display = 'none';
            nextStepElement.style.display = 'block';
            currentStep++;
            updateStepIndicator();
            
            if (currentStep === 6) {
                // Check if all questions are answered
                if (answeredQuestions.size < 7) {
                    alert('Please answer all questions before proceeding');
                    return;
                }
            }
            
            backButton.disabled = false;
        }
        
        // Handle form submission in step 7
        if (currentStep === 7) {
            const form = document.getElementById('userDetailsForm');
            if (!form.hasEventListener) {
                form.addEventListener('submit', handleFormSubmission);
                form.hasEventListener = true;
            }
        }
    });

    // Separate form submission handler
    function handleFormSubmission(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const mobile = document.getElementById('mobile').value;
        
        // Here you can handle the score submission
        alert(`Name: ${name}\nEmail: ${email}\nMobile: ${mobile}\nYour Total Score: ${currentScore}`);
    }

    backButton.addEventListener('click', function() {
        if (currentStep === 2) {
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step1').style.display = 'block';
            currentStep--;
            updateStepIndicator();
        } else if (currentStep === 3) {
            document.getElementById('step3').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
            currentStep--;
            updateStepIndicator();
        } else if (currentStep === 4) {
            document.getElementById('step4').style.display = 'none';
            document.getElementById('step3').style.display = 'block';
            currentStep--;
            updateStepIndicator();
        } else if (currentStep === 5) {
            document.getElementById('step5').style.display = 'none';
            document.getElementById('step4').style.display = 'block';
            currentStep--;
            updateStepIndicator();
        } else if (currentStep === 6) {
            currentQuestion--; // Go back to the previous question
            showQuestion(currentQuestion);
        } else if (currentStep === 7) {
            document.getElementById('step7').style.display = 'none';
            document.getElementById('step6').style.display = 'block';
            currentStep--;
            updateStepIndicator();
        }
    });

    function updateScore() {
        const selectedButton = document.querySelector(`#step${currentStep} .option-btn.selected`);
        let points = 0;

        if (currentStep === 1) {
            if (selectedButton) {
                switch (selectedButton.textContent.trim()) {
                    case '18 - 24':
                        points = 25;
                        break;
                    case '25 - 32':
                        points = 30;
                        break;
                    case '33 - 39':
                        points = 25;
                        break;
                    case '40 - 44':
                        points = 15;
                        break;
                }
            }
            scores.age = points;
        } else if (currentStep === 2) {
            if (selectedButton) {
                switch (selectedButton.textContent.trim()) {
                    case 'PHD':
                        points = 20;
                        break;
                    case 'Masters':
                        points = 15;
                        break;
                    case 'Diploma after Bachelors':
                        points = 10;
                        break;
                    case 'Bachelors':
                        points = 15;
                        break;
                    case 'Diploma after Secondary':
                        points = 10;
                        break;
                }
            }
            scores.education = points;
        } else if (currentStep === 3) {
            if (selectedButton) {
                switch (selectedButton.textContent.trim()) {
                    case '8 years or more':
                        points = 15;
                        break;
                    case '5 - 7 years':
                        points = 10;
                        break;
                    case '3 - 4 years':
                        points = 5;
                        break;
                    case 'Less than 3 years':
                        points = 0;
                        break;
                }
            }
            scores.experience = points;
        } else if (currentStep === 4) {
            if (selectedButton) {
                switch (selectedButton.textContent.trim()) {
                    case 'Superior English (Excellent)':
                        points = 20;
                        break;
                    case 'Proficient English (Very Good)':
                        points = 10;
                        break;
                    case 'Competent English (Good)':
                        points = 0;
                        break;
                }
            }
            scores.english = points;
        } else if (currentStep === 5) {
            if (selectedButton) {
                switch (selectedButton.textContent.trim()) {
                    case 'Married':
                        points = 0;
                        break;
                    case 'Single':
                        points = 10;
                        break;
                }
            }
            scores.marital = points;
        } else if (currentStep === 6) {
            // Handle scoring for questions in step 6
            const questionPoints = {
                question1: {
                    '8 years or More': 20,
                    '5 to 7 years': 15,
                    '3 to 4 years': 10,
                    '1 to 2 years': 5,
                    'Less than 1 year': 0
                },
                question2: { 'Yes': 5, 'No': 0 },
                question3: { 'Yes': 10, 'No': 0 },
                question4: { 'Yes': 5, 'No': 0 },
                question5: { 'Yes': 5, 'No': 0 },
                question6: {
                    'State/Territory (Subclass 190)': 5,
                    'Regional State (Subclass 491)': 15,
                    'Close Family (PR/Citizen Status in Australia) (Subclass 491)': 15,
                    'No (Subclass 189)': 0
                },
                question7: { 'Yes': 5, 'No': 0 }
            };

            let additionalPoints = 0;
            // Calculate points for all answered questions in step 6
            for (let i = 1; i <= 7; i++) {
                const questionSelected = document.querySelector(`#question${i} .option-btn.selected`);
                if (questionSelected) {
                    const selectedAnswer = questionSelected.textContent.trim();
                    additionalPoints += questionPoints[`question${i}`][selectedAnswer] || 0;
                }
            }
            scores.additional = additionalPoints;
        }

        // Calculate total score by adding all categories
        currentScore = Object.values(scores).reduce((total, score) => total + score, 0);
        
        // Update the total score display
        totalScore.textContent = currentScore;

        // Update the summary section
        updateSummary();

        // Debug logging
        console.log('Score Breakdown:', scores);
        console.log('Total Score:', currentScore);
    }

    // Add this new function to update the summary text
    function updateSummary() {
        const summaryText = document.querySelector('.summary-text');
        if (summaryText) {
            summaryText.textContent = `Age Group: [${scores.age}], Education: [${scores.education}], Experience: [${scores.experience}], English Proficiency: [${scores.english}], Marital Status: [${scores.marital}], Additional Points: [${scores.additional}]`;
        }
    }

    function updateStepIndicator() {
        document.getElementById('currentStep').textContent = currentStep;
        const dots = document.querySelectorAll('.step-dots .dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index < currentStep);
        });
    }

    // Initialize the first step
    backButton.disabled = true;
});