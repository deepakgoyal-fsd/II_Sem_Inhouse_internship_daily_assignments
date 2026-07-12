<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Powered Smart Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .quiz-card {
            max-width: 600px;
            width: 100%;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }
        .option-btn {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #cbd5e1;
            text-align: left;
            padding: 12px 20px;
            margin-bottom: 10px;
            transition: all 0.2s ease;
        }
        .option-btn:hover:not(:disabled) {
            background-color: #1e293b;
            border-color: #38bdf8;
            color: #38bdf8;
        }
        .timer-badge {
            font-size: 1.1rem;
            background-color: #334155;
            color: #fbbf24;
            border: 1px solid #475569;
        }
        .progress {
            height: 6px;
            background-color: #334155;
        }
        .progress-bar {
            background-color: #38bdf8;
        }
    </style>
</head>
<body>

    <div class="quiz-card p-4 m-3" id="quizContainer">
        <div id="loadingScreen" class="text-center py-5">
            <div class="spinner-border text-info mb-3" role="status"></div>
            <h5 class="fw-bold">Generating Live AI Questions...</h5>
            <p class="text-muted small m-0">Connecting to Groq Llama 3.1 engine</p>
        </div>

        <div id="quizInterface" class="d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-bold text-uppercase tracking-wider" id="questionCounter">Question 1 of 5</span>
                <span class="badge timer-badge px-3 py-2 fw-bold" id="timerBox">⏱️ 15s</span>
            </div>
            
            <div class="progress mb-4 rounded-pill">
                <div class="progress-bar rounded-pill" role="progressbar" id="progressBar" style="width: 20%"></div>
            </div>

            <h4 class="fw-bold mb-4 text-white" id="questionText">Loading Question Text Placeholder?</h4>

            <div id="optionsContainer" class="d-flex flex-column">
                </div>

            <div class="text-end mt-3">
                <button class="btn btn-info fw-bold text-dark px-4 py-2 d-none" id="nextBtn">Next Question &rarr;</button>
            </div>
        </div>

        <div id="resultInterface" class="d-none text-center py-4">
            <span class="fs-1">🏆</span>
            <h2 class="fw-bold text-success mt-2">Quiz Completed!</h2>
            <p class="text-muted mb-4">Your answers have been processed successfully.</p>
            
            <div class="bg-dark rounded p-4 mb-4 border border-secondary" style="background-color: #0f172a !important;">
                <h4 class="text-muted small text-uppercase fw-bold m-0">Final Score Metric</h4>
                <div class="display-3 fw-bold text-info my-2" id="scoreValue">0 / 5</div>
                <p class="small text-muted m-0" id="scoreEvaluation">Keep practicing!</p>
            </div>

            <button class="btn btn-outline-info fw-bold w-100 py-2" onclick="window.location.reload();">Try a New AI Quiz</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let quizData = [];
        let currentIdx = 0;
        let score = 0;
        let timerInterval = null;
        let timeLeft = 15; // Set timer to 15 seconds per question

        const loadingScreen = document.getElementById('loadingScreen');
        const quizInterface = document.getElementById('quizInterface');
        const resultInterface = document.getElementById('resultInterface');
        const questionText = document.getElementById('questionText');
        const optionsContainer = document.getElementById('optionsContainer');
        const questionCounter = document.getElementById('questionCounter');
        const timerBox = document.getElementById('timerBox');
        const progressBar = document.getElementById('progressBar');
        const nextBtn = document.getElementById('nextBtn');
        const scoreValue = document.getElementById('scoreValue');
        const scoreEvaluation = document.getElementById('scoreEvaluation');

        // Fetch questions from our custom internal PHP loader endpoint
        async function initQuiz() {
            try {
                const res = await fetch('fetch_questions.php');
                const data = await res.json();
                
                if(data.error) {
                    throw new Error(data.error);
                }
                
                quizData = data.questions;
                loadingScreen.classList.add('d-none');
                quizInterface.classList.remove('d-none');
                renderQuestion();
            } catch (err) {
                loadingScreen.innerHTML = `<span class='fs-1'>⚠️</span><h5 class='text-danger fw-bold mt-2'>Failed to Compile Quiz</h5><p class='text-muted small px-3'>${err.message}</p><button class='btn btn-sm btn-outline-danger fw-bold mt-2' onclick='window.location.reload()'>Retry</button>`;
                console.error(err);
            }
        }

        function renderQuestion() {
            clearInterval(timerInterval);
            timeLeft = 15;
            timerBox.textContent = `⏱️ ${timeLeft}s`;
            timerBox.style.color = "#fbbf24";
            nextBtn.classList.add('d-none');

            let currentQuestion = quizData[currentIdx];
            
            // Render text variables updates
            questionText.textContent = currentQuestion.question;
            questionCounter.textContent = `Question ${currentIdx + 1} of ${quizData.length}`;
            progressBar.style.width = `${((currentIdx + 1) / quizData.length) * 100}%`;

            // Clear previous answer options buttons grid loops
            optionsContainer.innerHTML = '';

            // Inject options tracking buttons elements
            currentQuestion.options.forEach((option, index) => {
                const btn = document.createElement('button');
                btn.className = "btn option-btn fw-semibold";
                btn.textContent = option;
                btn.onclick = () => selectAnswer(index, btn);
                optionsContainer.appendChild(btn);
            });

            // Start the running countdown loop interval track tick
            timerInterval = setInterval(() => {
                timeLeft--;
                timerBox.textContent = `⏱️ ${timeLeft}s`;
                
                if (timeLeft <= 5) {
                    timerBox.style.color = "#ef4444"; // Color changes to alert danger bounds state
                }

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    revealCorrectAnswer(-1); // Automatically force lock options loop as timed out response bounds
                }
            }, 1000);
        }

        function selectAnswer(selectedIndex, selectedBtn) {
            clearInterval(timerInterval);
            const correctIndex = quizData[currentIdx].correct;

            if (selectedIndex === correctIndex) {
                score++;
                selectedBtn.classList.remove('btn-dark');
                selectedBtn.classList.add('btn-success', 'text-white');
            } else {
                selectedBtn.classList.remove('btn-dark');
                selectedBtn.classList.add('btn-danger', 'text-white');
            }

            revealCorrectAnswer(selectedIndex);
        }

        function revealCorrectAnswer(selectedIndex) {
            const correctIndex = quizData[currentIdx].correct;
            const buttons = optionsContainer.getElementsByTagName('button');

            // Explicitly highlight standard target correct indices array element matches
            buttons[correctIndex].classList.remove('btn-dark');
            buttons[correctIndex].classList.add('btn-success', 'text-white');

            // Block multiple clicking triggers across active elements array sets
            for (let btn of buttons) {
                btn.disabled = true;
            }

            nextBtn.classList.remove('d-none');
        }

        nextBtn.onclick = () => {
            currentIdx++;
            if (currentIdx < quizData.length) {
                renderQuestion();
            } else {
                showResults();
            }
        };

        function showResults() {
            quizInterface.classList.add('d-none');
            resultInterface.classList.remove('d-none');
            scoreValue.textContent = `${score} / ${quizData.length}`;
            
            if (score === quizData.length) {
                scoreEvaluation.textContent = "Flawless Performance! Mastermind Status Certified.";
            } else if (score >= quizData.length * 0.6) {
                scoreEvaluation.textContent = "Great job! Strong structural foundation elements.";
            } else {
                scoreEvaluation.textContent = "Keep practicing to reinforce core subject categories.";
            }
        }

        // Trigger startup engine bootstrap logic array maps
        initQuiz();
    </script>
</body>
</html>