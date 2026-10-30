function fruitClicked() {
            if (currentFruit == "apple") {
                appleCount++;
                document.getElementById("apple").innerHTML = appleCount;
            } else {
                bananaCount++;
                document.getElementById("banana").innerHTML = bananaCount;
            }

            showFruit();
        }
        let appleCount = 0;
        let bananaCount = 0;
        let currentFruit = "";
        function showFruit() {
            let fruit = document.getElementById("fruits");

            let random = Math.floor(Math.random() * 2);

            if (random == 0) {
                fruit.src = "apple.jpg";
                currentFruit = "apple";
            } else {
                fruit.src = "banana.jpeg";
                currentFruit = "banana";
            }

            moveImage(fruit);
        }
        function moveImage(img) {
            let x = Math.random() * 800;
            let y = Math.random() * 400;
           img.style.left = x + "px";
           img.style.top = y + "px";


        }
        function startTimer() {
            let timeLeft = 20;
            let timer = setInterval(function () {
                document.getElementById("timeLeft").innerHTML = timeLeft;
                timeLeft--;
                if (timeLeft < 0) {
                    clearInterval(timer);
                    alert("game over!")
                    document.getElementById("restartBtn").style.display = "inline-block";
                }
            }, 1000);

        }

        function startGame() {
            document.getElementById("startPage").style.display = "none";
            document.getElementById("gamePage").style.display = "block";
            moveImage(document.getElementById("fruits"));
            showFruit();
            startTimer();
        }
        function restartGame() {

            appleCount = 0;
            bananaCount = 0;

            document.getElementById("apple").innerHTML = 0;
            document.getElementById("banana").innerHTML = 0;
            document.getElementById("timeLeft").innerHTML = 20;

            document.getElementById("fruit").style.display = "block";

            document.getElementById("restartBtn").style.display = "none";

            showFruit();
            startTimer();
        }