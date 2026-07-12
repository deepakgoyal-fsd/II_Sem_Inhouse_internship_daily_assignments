// Theme Toggle
const themeToggle=document.getElementById("themeToggle");
const themeText=document.getElementById("themeText");

if(localStorage.getItem("theme")==="dark"){
document.body.classList.add("dark");
themeToggle.checked=true;
themeText.textContent="☀️ Light Mode";
}

themeToggle.addEventListener("change",()=>{
document.body.classList.toggle("dark");

if(document.body.classList.contains("dark")){
themeText.textContent="☀️ Light Mode";
localStorage.setItem("theme","dark");
}else{
themeText.textContent="🌙 Dark Mode";
localStorage.setItem("theme","light");
}
});


// Dynamic Heading
const heading=document.getElementById("dynamicHeading");
const headingBtn=document.getElementById("headingBtn");

let showInfo=false;

headingBtn.addEventListener("click",()=>{

if(!showInfo){

heading.innerHTML=
"24-Hour Hackathon • Workshops • Networking • ₹1,00,000 Prize Pool";

headingBtn.innerHTML="⬅ Back";

}else{

heading.innerHTML=
"Ready to Build Something Amazing?";

headingBtn.innerHTML="✨ What's Inside?";

}

showInfo=!showInfo;

});


// Click Counter
const counterBtn=document.getElementById("counterBtn");
const clickCount=document.getElementById("clickCount");

let count=0;

counterBtn.addEventListener("click",()=>{
count++;
clickCount.textContent=count;
});


// Form Validation
const form=document.getElementById("registrationForm");

const name=document.getElementById("name");
const email=document.getElementById("email");
const branch=document.getElementById("branch");
const semester=document.getElementById("semester");
const comment=document.getElementById("comment");

function setError(input,id,msg){
input.classList.remove("input-success");
input.classList.add("input-error");
document.getElementById(id).textContent=msg;
document.getElementById(id).className="error";
}

function setSuccess(input,id,msg){
input.classList.remove("input-error");
input.classList.add("input-success");
document.getElementById(id).textContent=msg;
document.getElementById(id).className="success";
}

function validateName(){
if(name.value.trim().length<3){
setError(name,"nameError","Enter at least 3 characters");
return false;
}
setSuccess(name,"nameError","Looks good!");
return true;
}

function validateEmail(){
const pattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if(!pattern.test(email.value.trim())){
setError(email,"emailError","Enter a valid email");
return false;
}
setSuccess(email,"emailError","Valid Email");
return true;
}

function validateBranch(){
if(branch.value===""){
setError(branch,"branchError","Select a branch");
return false;
}
setSuccess(branch,"branchError","Selected");
return true;
}

function validateSemester(){
if(semester.value===""){
setError(semester,"semesterError","Select semester");
return false;
}
setSuccess(semester,"semesterError","Selected");
return true;
}

function validateComment(){
if(comment.value.trim().length<10){
setError(comment,"commentError","Minimum 10 characters");
return false;
}
setSuccess(comment,"commentError","Perfect!");
return true;
}


// Real-time Validation
name.addEventListener("input",validateName);
email.addEventListener("input",validateEmail);
branch.addEventListener("change",validateBranch);
semester.addEventListener("change",validateSemester);
comment.addEventListener("input",validateComment);


// Submit
form.addEventListener("submit",e=>{

e.preventDefault();

const ok=
validateName()&
validateEmail()&
validateBranch()&
validateSemester()&
validateComment();

if(ok){

alert("🎉 Registration Successful!");

form.reset();

document.querySelectorAll("small").forEach(e=>e.textContent="");

document.querySelectorAll("input,select,textarea").forEach(e=>{
e.classList.remove("input-success","input-error");
});

themeToggle.checked=document.body.classList.contains("dark");

}

});