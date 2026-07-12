let form = document.getElementById("form");
let msg = document.getElementById("msg");
let themeBtn = document.getElementById("themeBtn");
let count = 0;
themeBtn.addEventListener("click", function(){
document.body.classList.toggle("dark");
if(document.body.classList.contains("dark")){
themeBtn.innerText = "Light Mode";
}
else{
themeBtn.innerText = "Dark Mode";
}
});

form.addEventListener("submit", function(e){
e.preventDefault();

count++;
console.log("Form submitted count:", count);

let name = document.getElementById("name").value;
let email = document.getElementById("email").value;
let phone = document.getElementById("phone").value;
let password = document.getElementById("password").value;
let confirmPassword = document.getElementById("confirmPassword").value;

if(name === "" || email === "" || phone === ""){
msg.innerHTML = `<div class="alert alert-danger">Please fill required fields</div>`;
return;
}

if(password.length < 8 || password.length > 20){
msg.innerHTML = `<div class="alert alert-danger">Password must be 8-20 characters</div>`;
return;
}

if(password !== confirmPassword){
msg.innerHTML = `<div class="alert alert-danger">Passwords do not match</div>`;
return;
}

msg.innerHTML = `<div class="alert alert-success">Registration Successful</div>`;

form.reset();

setTimeout(function(){
msg.innerHTML = "";
},2000);
});