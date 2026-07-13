let start = document.getElementById("startbtn");
let gameArea = document.getElementById("gameArea");
let appleCount = document.getElementById("applecount");
let bananaCount = document.getElementById("bananacount");
let btn5 = document.getElementById("btn5");
let btn10 = document.getElementById("btn10");
let gameOver = document.getElementById("gameover");
let appleScore = 0;
let bananaScore = 0;
let gameTime = 0;
let gameRunning  = false;
let timeLeft = document.getElementById("timer");

function createApple(){
    let fruit = document.createElement("img");
    fruit.src="Apple.jpg";
    fruit.type = "apple";
    return fruit;
}

function createBanana(){
    let fruit = document.createElement("img");
    fruit.src="banana.jpg";
    fruit.type = "banana";
    return fruit;
}

function createFruit(){
    let random = Math.floor(Math.random()*2);
    let place = Math.floor(Math.random()*540);
    let fruit;

    if(random === 0){
        fruit=createApple();
    }

    else{
        fruit=createBanana();
    }
    fruit.style.width = "80px";
    fruit.style.position = "absolute";
    fruit.style.top = "0px";
    fruit.style.left = place + "px";
    gameArea.appendChild(fruit);
    let top = 0;
    let interval = setInterval(function(){
        if(gameRunning){
            top+=3;
            fruit.style.top=top+"px";
            if(top >= 500){
               fruit.remove();
               clearInterval(interval);
               if(gameRunning){
                  createFruit();
               }
            }
        }

        else{
            fruit.remove();
            clearInterval(interval);
        }
    },50)

    fruit.addEventListener("click",function(){

        if(fruit.type === "apple"){
            appleScore++;
            appleCount.textContent = appleScore;
            fruit.remove();
            clearInterval(interval);
            if(gameRunning){
               createFruit();
            }
        }

        else{
            bananaScore++;
            bananaCount.textContent = bananaScore;
            fruit.remove();
            clearInterval(interval);
            if(gameRunning){
               createFruit();
            }
        }

    })
}
 
start.addEventListener("click",function(){
    gameOver.textContent = "";
    appleScore = 0;
    appleCount.textContent = appleScore;
    bananaScore = 0;
    bananaCount.textContent = bananaScore;
    gameRunning = true;
    start.disabled = true;
    btn5.disabled = true;
    btn10.disabled = true;
    if(btn5.checked){
        gameTime = 5;
        timeLeft.textContent = 5;
        let timer = setInterval(function(){
            if(gameTime > 0){
                gameTime--;
                timeLeft.textContent = gameTime;
                console.log(gameTime)
            }

            else{
                gameRunning = false;
                start.disabled = false;
                btn5.disabled = false;
                btn10.disabled = false;
                clearInterval(timer);
                gameOver.textContent = "GAME OVER";
            }
        },1000)
    }

    else if(btn10.checked){
        gameTime = 10;
        timeLeft.textContent = 10;
        timer = setInterval(function(){
            if(gameTime > 0){
                gameTime--;
                timeLeft.textContent = gameTime;
            }

            else{
                gameRunning = false;
                start.disabled = false;
                btn5.disabled = false;
                btn10.disabled = false;
                clearInterval(timer);
                gameOver.textContent = "GAME OVER";
            }
        },1000)
    }
createFruit();
})