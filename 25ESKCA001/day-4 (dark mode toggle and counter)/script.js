var count = 0;

var countText = document.getElementById("count");

function increase() {
    count = count + 1;
    countText.innerHTML = count;
}

function decrease() {
    count = count - 1;
    countText.innerHTML = count;
}

function resetCount() {
    count = 0;
    countText.innerHTML = count;
}

var themeButton = document.getElementById("themeBtn");

themeButton.onclick = function () {

    if (document.body.classList.contains("dark")) {
        document.body.classList.remove("dark");
        themeButton.innerHTML = "Dark Mode";
    }
    else {
        document.body.classList.add("dark");
        themeButton.innerHTML = "Light Mode";
    }

};