// Set timer duration (5 minutes)
let timeLeft = 5 * 60;

const timer = document.getElementById("timer");

const countdown = setInterval(() => {

    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;

    // Add leading zero
    minutes = String(minutes).padStart(2, '0');
    seconds = String(seconds).padStart(2, '0');

    timer.textContent = `${minutes}:${seconds}`;

    if(timeLeft <= 0){
        clearInterval(countdown);
        timer.textContent = "00:00";
        alert("Time's Up!");
    }

    timeLeft--;

}, 1000);