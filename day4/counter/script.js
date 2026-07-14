let count = 0;

const countDisplay = document.getElementById("count");
const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");

// Increase count
clickBtn.addEventListener("click", () => {
    count++;
    countDisplay.textContent = count;
});

// Reset count
resetBtn.addEventListener("click", () => {
    count = 0;
    countDisplay.textContent = count;
});