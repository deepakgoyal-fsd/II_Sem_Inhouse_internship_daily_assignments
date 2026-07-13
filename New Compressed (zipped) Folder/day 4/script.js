let currentClicks = 0;

const clickMeBtn = document.getElementById("clickMeBtn");
const counterDisplay = document.getElementById("counterDisplay");

clickMeBtn.addEventListener("click", function() {
    currentClicks = currentClicks + 1;
    counterDisplay.textContent = currentClicks;
});

const studentForm = document.getElementById("studentForm");
const usernameInput = document.getElementById("usernameInput");
const alertBox = document.getElementById("alertBox");

studentForm.addEventListener("submit", function(event) {
    let enteredName = usernameInput.value;

    if (enteredName == "") {
        event.preventDefault();
        alertBox.textContent = "Please enter your name!";
        alertBox.classList.remove("d-none");
    } else {
        alertBox.classList.add("d-none");
    }
});