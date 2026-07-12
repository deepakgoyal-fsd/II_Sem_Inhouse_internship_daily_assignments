// Dark Mode

let modeBtn = document.getElementById("modeBtn");

modeBtn.onclick = function () {
    document.body.classList.toggle("dark");
};

// Click Counter

let count = 0;

increase.onclick = function () {
    count++;
    document.getElementById("count").innerHTML = count;
};

decrease.onclick = function () {
    if(count > 0){
        count--;
        document.getElementById("count").innerHTML = count;
    }
};

reset.onclick = function () {
    count = 0;
    document.getElementById("count").innerHTML = count;
};