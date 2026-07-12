var apple = 0;
var banana = 0;
var total_click = 0;
var game = false;

var seconds = 60;

var timer;

moveApple();
moveBanana();

function startGame(){

    apple = 0;
    banana = 0;
    total_click =0;
    document.getElementById("apple").innerHTML = apple;
    document.getElementById("banana").innerHTML = banana;

    game = true;

    document.getElementById("colorBtn").style.display = "none";

    seconds = document.getElementById("time").value;

    showTime();

    clearInterval(timer);

    timer = setInterval(countDown,1000);

}

function countDown(){

    seconds--;

    showTime();

    if(seconds==0){

        clearInterval(timer);

        game = false;

        alert("Game Over\n\nApple = "+apple+"\nBanana = "+banana);

        document.getElementById("colorBtn").style.display="inline";

    }

}

function showTime(){

    var m = Math.floor(seconds/60);

    var s = seconds%60;

    if(m<10){

        m="0"+m;

    }

    if(s<10){

        s="0"+s;

    }

    document.getElementById("timer").innerHTML=m+":"+s;

}

function fruitClick(name){

    if(game==false){

        return;

    }

    if(name=="apple"){

        apple++;

        document.getElementById("apple").innerHTML=apple;

        moveApple();

    }

    if(name=="banana"){

        banana++;

        document.getElementById("banana").innerHTML=banana;

        moveBanana();

    }

}

function moveApple(){

    var x=Math.random()*700;

    var y=Math.random()*350;

    document.getElementById("appleImg").style.left=x+"px";
    document.getElementById("appleImg").style.top=y+"px";

}

function moveBanana(){

    var x=Math.random()*700;

    var y=Math.random()*350;

    document.getElementById("bananaImg").style.left=x+"px";
    document.getElementById("bananaImg").style.top=y+"px";

}

function changeColor(){

    var color="#"+Math.floor(Math.random()*16777215).toString(16);

    document.body.style.background=color;

}
function sum(){

    total_click = apple + banana;

    document.getElementById("total").innerHTML =
        "Total Clicks : " + total_click;

}