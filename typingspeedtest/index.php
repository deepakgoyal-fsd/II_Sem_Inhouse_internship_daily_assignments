<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Speed Test</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ===== Welcome Modal ===== -->
<div id="modalOverlay" class="modal-overlay">
    <div id="modalBox" class="modal-box">
        <h2 class="modal-heading">👋 Welcome to Typing Speed Test</h2>
        <p class="modal-desc">Enter your name to begin.</p>
        <input type="text" id="modalUsername" class="modal-input" placeholder="Enter your name" maxlength="50" autocomplete="off">
        <p id="modalError" class="modal-error">Please enter your name.</p>
        <button id="modalStartBtn" class="modal-btn">Start Test</button>
    </div>
</div>

<!-- ===== Username Display (top-left corner) ===== -->
<div id="usernameDisplay" class="username-display" style="display:none;">
    👤 <span id="usernameText"></span>
</div>

<div class="container">

    <h1>⌨️ Typing Speed Test</h1>
    <p class="subtitle">
        Test your typing speed, accuracy, and improve your skills.
    </p>

    <div id="typingBox">
        <div id="typingInner" contenteditable="true" spellcheck="false" tabindex="0"></div>
    </div>

    <!-- Timer selection pills -->
    <div class="timer-options">
        <button class="timer-btn" data-time="15">15 Seconds</button>
        <button class="timer-btn active" data-time="30">30 Seconds</button>
        <button class="timer-btn" data-time="45">45 Seconds</button>
        <button class="timer-btn" data-time="60">60 Seconds</button>
    </div>

    <div class="btn-group">
        <button id="resetBtn">Reset</button>
    </div>

    <div class="result-box">

        <div class="card">
            <h2 id="time">30</h2>
            <p>Time Left</p>
        </div>

        <div class="card">
            <h2 id="speed">0</h2>
            <p>WPM</p>
        </div>

        <div class="card">
            <h2 id="accuracy">0%</h2>
            <p>Accuracy</p>
        </div>

    </div>

    <!-- Submit Result section (hidden until test completes) -->
    <div id="submitSection" class="submit-section" style="display:none;">
        <button id="submitResultBtn" class="submit-btn">Submit Result</button>
        <p id="submitStatus" class="submit-status"></p>
    </div>

    <!-- Hidden form to POST results to result.php -->
    <form id="resultForm" method="POST" action="result.php" style="display:none;">
        <input type="hidden" name="time" id="hiddenTime" value="">
        <input type="hidden" name="speed" id="hiddenSpeed" value="">
        <input type="hidden" name="accuracy" id="hiddenAccuracy" value="">
        <input type="hidden" name="correctWords" id="hiddenCorrectWords" value="">
        <input type="hidden" name="totalChars" id="hiddenTotalChars" value="">
    </form>

    <!-- History link -->
    <div class="history-link">
        <a href="history.php">📊 View History</a>
    </div>

</div>

<script src="script.js"></script>

</body>
</html>
