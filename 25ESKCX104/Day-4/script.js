let count = 0;
const heading = document.querySelector("#heading");
const darkBtn = document.querySelector("#darkBtn");
const countBtn = document.querySelector("#countBtn");
const resetBtn = document.querySelector("#resetBtn");
const countDisplay = document.querySelector("#countDisplay");
const myForm = document.querySelector("#myForm");
const message = document.querySelector("#message");
function updateCounter(){}
function resetCounter(){}
function changeTheme(){}
function validateForm(event){}
function updateCounter(){
    count++;
    countDisplay.textContent = "Clicks : " + count;
}
countBtn.addEventListener("click", updateCounter);
function resetCounter(){
    count = 0;
    countDisplay.textContent = "Clicks : 0";
}
resetBtn.addEventListener("click", resetCounter);
function changeTheme(){
    document.body.classList.toggle("dark");
}
darkBtn.addEventListener("click", changeTheme);
countBtn.addEventListener("click", updateCounter);
resetBtn.addEventListener("click", resetCounter);
darkBtn.addEventListener("click", changeTheme);
function changeTheme()
{
    document.body.classList.toggle("dark");
    if(document.body.classList.contains("dark")){
        darkBtn.textContent = "Light Mode";
    }
    else{
        darkBtn.textContent = "Dark Mode";
    }
}
function validateForm(event){
    event.preventDefault();
}
myForm.addEventListener("submit", validateForm);
function validateForm(event){
    event.preventDefault();
    let name = document.querySelector("#name").value;
    if(name == ""){
        message.textContent = "Please Enter Your Name";
        return;
    }
}
function validateForm(event){
    event.preventDefault();
    let name = document.querySelector("#name").value;
    let email = document.querySelector("#email").value;
    if(name == ""){
        message.textContent = "Please Enter Your Name";
        return;
    }
    if(email.includes("@") == false){
        message.textContent = "Please Enter Valid Email";
        return;
    }
}
function validateForm(event){
    event.preventDefault();
    let name = document.querySelector("#name").value;
    let email = document.querySelector("#email").value;
    if(name == ""){
        message.textContent = "Please Enter Your Name";
        return;
    }
    if(email.includes("@") == false){
        message.textContent = "Please Enter Valid Email";
        return;
    }
    message.textContent = "Form Submitted Successfully";
}