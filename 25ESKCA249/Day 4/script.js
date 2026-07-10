let apple = 0;
let strawberry = 0;

let appleImg = document.getElementById("apple");
let strawberryImg = document.getElementById("strawberry");

let appleCount = document.getElementById("appleCount");
let strawberryCount = document.getElementById("strawberryCount");

let appleBox = document.getElementById("appleBox");
let strawberryBox = document.getElementById("strawberryBox");



function moveRandom(box){

    let x = Math.floor(Math.random() * 800);
    let y = Math.floor(Math.random() * 350);

    box.style.left = x + "px";
    box.style.top = y + "px";
}



appleImg.addEventListener("click", function(){

    apple++;
    appleCount.innerText = apple;

    moveRandom(appleBox);

});




strawberryImg.addEventListener("click", function(){

    strawberry++;
    strawberryCount.innerText = strawberry;

    moveRandom(strawberryBox);

});



let timeLeft = 10;       


let timer = document.getElementById("time");


let countdown = setInterval(function(){

    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;

    if(seconds < 10){
        seconds = "0" + seconds;
    }

    timer.innerText = minutes + ":" + seconds;

    timeLeft--;

    if(timeLeft < 0){

        clearInterval(countdown);

        document.body.classList.toggle("dark");

        timer.innerText = "Time Over!";
    }

},1000);