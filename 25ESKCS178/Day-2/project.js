const darkModeBtn = document.getElementById("darkModeBtn");

darkModeBtn.addEventListener("click", function () {
    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {
        darkModeBtn.innerHTML = "☀️ Light Mode";
    } else {
        darkModeBtn.innerHTML = "🌙 Dark Mode";
    }
});
