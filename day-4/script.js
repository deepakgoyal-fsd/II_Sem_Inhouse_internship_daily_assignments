let appleVotes = 0;
let bananaVotes = 0;

let selectedFruit = "";

const apple = document.getElementById("apple");
const banana = document.getElementById("banana");
const gameArea = document.getElementById("gameArea");

// Initial Positions
apple.style.left = "200px";
apple.style.top = "200px";

banana.style.left = "500px";
banana.style.top = "200px";

// Apple Click
function voteApple(event) {
    event.stopPropagation();

    appleVotes++;
    document.getElementById("appleCount").innerText = appleVotes;

    selectedFruit = "apple";

    apple.style.border = "3px solid green";
    banana.style.border = "none";
}

// Banana Click
function voteBanana(event) {
    event.stopPropagation();

    bananaVotes++;
    document.getElementById("bananaCount").innerText = bananaVotes;

    selectedFruit = "banana";

    banana.style.border = "3px solid green";
    apple.style.border = "none";
}

// Move Selected Fruit
gameArea.addEventListener("click", function(event) {

    if (event.target.classList.contains("fruit")) return;

    let x = event.offsetX - 60;
    let y = event.offsetY - 60;

    if (selectedFruit === "apple") {

        apple.style.left = x + "px";
        apple.style.top = y + "px";

    }
    else if (selectedFruit === "banana") {

        banana.style.left = x + "px";
        banana.style.top = y + "px";

    }

});

// Show Winner
function showWinner() {

    let winner = document.getElementById("winner");

    if (appleVotes > bananaVotes) {

        winner.innerHTML = "🏆 Apple Wins! 🍎";

    }
    else if (bananaVotes > appleVotes) {

        winner.innerHTML = "🏆 Banana Wins! 🍌";

    }
    else {

        winner.innerHTML = "🤝 It's a Tie!";

    }

}