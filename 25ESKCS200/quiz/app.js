// Global variable to hold our quiz data so the submit button can access it later
let currentQuizData = null;

document.getElementById('generate-btn').addEventListener('click', function() {
    const topic = document.getElementById('topic-input').value.trim();

    if (topic === "") {
        alert("Please enter a topic first!");
        return;
    }

    document.getElementById('setup-section').style.display = 'none';
    document.getElementById('loading').style.display = 'block';

    fetch('generate_quiz.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'topic=' + encodeURIComponent(topic)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('loading').style.display = 'none';
        
        // Save the data globally so we can check answers later
        currentQuizData = data;
        
        // Call our new function to render the quiz UI
        displayQuiz(data);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Something went wrong. Check the console.');
        document.getElementById('setup-section').style.display = 'block';
        document.getElementById('loading').style.display = 'none';
    });
});

// --- NEW FUNCTION: Render the AI Data into HTML ---
function displayQuiz(quiz) {
    const quizSection = document.getElementById('quiz-section');
    const quizTitle = document.getElementById('quiz-title');
    const container = document.getElementById('questions-container');
    
    // Clear out any old quiz questions if they played before
    container.innerHTML = "";
    document.getElementById('results').innerHTML = "";
    
    // Set the quiz header title
    quizTitle.innerText = quiz.title || "Your AI Generated Quiz";
    
    // Loop through each question the AI gave us
    quiz.questions.forEach((q, qIndex) => {
        const qBlock = document.createElement('div');
        qBlock.className = 'question-block';
        
        // Add the question text
        const qText = document.createElement('p');
        qText.className = 'question-text';
        qText.innerText = `${qIndex + 1}. ${q.question}`;
        qBlock.appendChild(qText);
        
        // Loop through the options for this question
        q.options.forEach((option) => {
            const label = document.createElement('label');
            label.className = 'option-label';
            
            // Create a radio button for multiple choice selection
            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = 'question' + qIndex; // Group radios together by question index
            radio.value = option;
            
            label.appendChild(radio);
            label.append(" " + option);
            qBlock.appendChild(label);
        });
        
        container.appendChild(qBlock);
    });
    
    // Unhide the quiz container
    quizSection.style.display = 'block';
}

// --- NEW FUNCTION: Grade the Quiz ---
document.getElementById('submit-btn').addEventListener('click', function() {
    if (!currentQuizData) return;
    
    let score = 0;
    const totalQuestions = currentQuizData.questions.length;
    
    currentQuizData.questions.forEach((q, qIndex) => {
        // Find the radio button the user checked for this specific question
        const selectedRadio = document.querySelector(`input[name="question${qIndex}"]:checked`);
        
        if (selectedRadio && selectedRadio.value === q.answer) {
            score++;
        }
    });
    
    // Display the results dynamically on the screen
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `<h3>🎉 You scored ${score} out of ${totalQuestions}!</h3>`;
});