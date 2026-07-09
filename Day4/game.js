const apple = document.getElementById("apple");
const banana = document.getElementById("banana");

function moveFruit(fruit){

    let x = Math.random() * (window.innerWidth - 120);
    let y = Math.random() * (window.innerHeight - 180);

    fruit.style.left = x + "px";
    fruit.style.top = y + "px";
}

apple.onclick = function(){
    moveFruit(apple);
}

banana.onclick = function(){
    moveFruit(banana);
}