

let count = 0;

function updateDisplay(){
    count++;
    document.getElementById("counter").innerText = count;
}

document.querySelector(".btn").addEventListener("click", updateDisplay);


document.getElementById("resetBtn").addEventListener("click", function(){
    count = 0;
    document.getElementById("counter").innerText = count;
});



document.getElementById("darkBtn").addEventListener("click", function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        this.innerText="Light Mode";
    }
    else{
        this.innerText="Dark Mode";
    }

});


document.getElementById("myForm").addEventListener("submit", function(event){

    event.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();

    if(name==""){
        document.getElementById("message").innerHTML="Name cannot be empty";
        return;
    }

    if(!email.includes("@")){
        document.getElementById("message").innerHTML="Enter a valid email";
        return;
    }

    document.getElementById("message").innerHTML="Form Submitted Successfully";
});