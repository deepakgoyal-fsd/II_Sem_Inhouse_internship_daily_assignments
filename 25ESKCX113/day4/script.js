// Score variables
var apple = 0;
var banana = 0;

// Game variables
var game = false;
var timer;
var time = 60;

// Get game area
var area = document.getElementById("gameArea");

// Set game area size
function setArea() {

    var panel = document.querySelector(".top-panel").offsetHeight;

    area.style.top = panel + "px";

}

setArea();

window.onresize = function () {
    setArea();
};

// Move image to random place
function moveImage(img) {

    var w = area.clientWidth;
    var h = area.clientHeight;

    var iw = img.offsetWidth;
    var ih = img.offsetHeight;

    var left = Math.random() * (w - iw);
    var top = Math.random() * (h - ih);

    img.style.left = left + "px";
    img.style.top = top + "px";

}

moveImage(document.getElementById("appleImg"));
moveImage(document.getElementById("bananaImg"));

// Start game
function startGame() {

    clearInterval(timer);

    apple = 0;
    banana = 0;

    game = true;

    document.getElementById("apple").innerHTML = apple;
    document.getElementById("banana").innerHTML = banana;

    document.getElementById("changeColorBtn").style.display = "none";

    time = parseInt(document.getElementById("timeSelect").value);

    showTime();

    timer = setInterval(function () {

        time--;

        showTime();

        if (time <= 0) {

            clearInterval(timer);

            game = false;

            alert("Game Over!\n\nApple : " + apple + "\nBanana : " + banana);

            document.getElementById("changeColorBtn").style.display = "inline-block";

        }

    }, 1000);

}

// Show timer
function showTime() {

    var min = Math.floor(time / 60);
    var sec = time % 60;

    if (min < 10) {
        min = "0" + min;
    }

    if (sec < 10) {
        sec = "0" + sec;
    }

    document.getElementById("timer").innerHTML = min + ":" + sec;

}

// Click fruit
function clickImage(type, img) {

    if (game == false) {
        return;
    }

    if (type == "apple") {

        apple++;

        document.getElementById("apple").innerHTML = apple;

    } else {

        banana++;

        document.getElementById("banana").innerHTML = banana;

    }

    moveImage(img);

}

// Change background color
function changeBG() {

    var letters = "0123456789ABCDEF";
    var color = "#";
    var i;

    for (i = 0; i < 6; i++) {
        color = color + letters[Math.floor(Math.random() * 16)];
    }

    document.body.style.backgroundColor = color;

}