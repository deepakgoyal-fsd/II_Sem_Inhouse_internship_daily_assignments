
    let appleScore = 0;
    let bananaScore = 0;
    let time = 60;
    let gameRunning = false;
    let timer;
    let fruitMovement;
    let apple =
        document.getElementById("apple");
    let banana =
        document.getElementById("banana");
    let appleScoreText =
        document.getElementById("apple-score");
    let bananaScoreText =
        document.getElementById("banana-score");
    let timerText =
        document.getElementById("timer");
    let result =
        document.getElementById("result");
    let button =
        document.getElementById("game-button");
    function gameButton() {
        if (gameRunning == false) {
            startGame();
        }
        else {
            endGame();
        }
    }
    function startGame() {
        appleScore = 0;
        bananaScore = 0;
        time = 60;
        gameRunning = true;
        appleScoreText.innerText = 0;
        bananaScoreText.innerText = 0;
        timerText.innerText = 60;
        result.innerText = "";
        button.innerText = "End Game";
        apple.style.display = "block";
        banana.style.display = "block";
        moveFruit(apple);
        moveFruit(banana);
        timer = setInterval(function () {
            time--;
            timerText.innerText = time;
            if (time == 0) {
                endGame();
            }
        }, 1000);
        fruitMovement = setInterval(function () {
            moveFruit(apple);
            moveFruit(banana);
        }, 2000);
    }
    function moveFruit(fruit) {
        let randomLeft =
            Math.floor(Math.random() * 90);
        let randomTop =
            Math.floor(Math.random() * 80);
        fruit.style.left =
            randomLeft + "%";
        fruit.style.top =
            randomTop + "%";
    }
    apple.onclick = function () {
        if (gameRunning == true) {
            appleScore++;
            appleScoreText.innerText =
                appleScore;
            moveFruit(apple);
        }
    };

    banana.onclick = function () {
        if (gameRunning == true) {
            bananaScore++;
            bananaScoreText.innerText =
                bananaScore;
            moveFruit(banana);
        }
    };
    function endGame() {
        gameRunning = false;
        clearInterval(timer);
        clearInterval(fruitMovement);
        apple.style.display = "none";
        banana.style.display = "none";
        button.innerText = "Start Game";
        if (appleScore > bananaScore) {
            result.innerText =
                "🍎 Apple Wins!";
        }
        else if (bananaScore > appleScore) {
            result.innerText =
                "🍌 Banana Wins!";
        }
        else {
                result.innerText =
                "It's a Draw!";
        }
    }

