<<<<<<< HEAD
let count = 0;

const counter = document.getElementById("count");

function increase(){
    count++;
    counter.innerHTML = count;
}

function decrease(){
    count--;
    counter.innerHTML = count;
}

function reset(){
    count = 0;
    counter.innerHTML = count;
}

function toggleMode(){

    document.body.classList.toggle("dark");

    const btn = document.querySelector(".toggle");

    if(document.body.classList.contains("dark")){
        btn.innerHTML = "☀️ Light Mode";
    }
    else{
        btn.innerHTML = "🌙 Dark Mode";
    }
=======
let count = 0;

const counter = document.getElementById("count");

function increase(){
    count++;
    counter.innerHTML = count;
}

function decrease(){
    count--;
    counter.innerHTML = count;
}

function reset(){
    count = 0;
    counter.innerHTML = count;
}

function toggleMode(){

    document.body.classList.toggle("dark");

    const btn = document.querySelector(".toggle");

    if(document.body.classList.contains("dark")){
        btn.innerHTML = "☀️ Light Mode";
    }
    else{
        btn.innerHTML = "🌙 Dark Mode";
    }
>>>>>>> 9c940f7eab83dfe77285822bc50a32f74164b2dd
}