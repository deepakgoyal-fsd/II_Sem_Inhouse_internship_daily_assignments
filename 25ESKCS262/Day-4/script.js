//--------Dark/Light Mode-------
const btn=document.querySelector(".toggle")
btn.addEventListener("click",()=> {
document.body.classList.toggle("dark");
if(document.body.classList.contains("dark")){
    btn.innerText="☀️ Light Mode"
}
else{
    btn.innerText="🌙 Dark Mode"
}
});

//------Counter Function-------
let counter=0;
function increment(){
    
    let countBtn=document.querySelector(".counter-increment")
    countBtn.addEventListener("click",()=>{
    counter++;
    document.querySelector(".counter-value").innerText=counter
    })
}
increment()
function decrement(){
    
    let countBtn=document.querySelector(".counter-decrement")
    countBtn.addEventListener("click",()=>{
    counter--;
    document.querySelector(".counter-value").innerText=counter
    })
}
decrement()
function reset(){
    
    let countBtn=document.querySelector(".counter-reset")
    countBtn.addEventListener("click",()=>{
    counter=0;
    document.querySelector(".counter-value").innerText=counter
    })
}
reset()
//---- Registeration form-----
const formSubmit=document.querySelector(".form-submit")

const mobileVerify=document.querySelector("#mobileno")
const mobileError=document.querySelector(".mobile-error")
const passVerify=document.querySelector("#pass")
const passError=document.querySelector(".password-error")
const nameVerify=document.querySelector("#name")
const nameError=document.querySelector(".name-error")
const emailVerify=document.querySelector("#email")
const emailError=document.querySelector(".email-error")
const genderVerify=document.querySelector("#gender")
const genderError=document.querySelector(".gender-error")
const dobVerify=document.querySelector("#dob")
const dobError=document.querySelector(".dob-error")
const form=document.querySelector(".form")
formSubmit.addEventListener("click",(e)=>{
    e.preventDefault()
    let isValid=true
    if(mobileVerify.value.trim()===""){
    mobileError.innerHTML="Error:mobile number not entered"
    isValid=false
} 
else if(mobileVerify.value.trim().length!=10){
    mobileError.innerHTML="Error:Enter 10 digit mobile no"
}
if(passVerify.value.trim()===""){
    passError.innerHTML="Error:Password is not entered"
    isValid=false
}
if(nameVerify.value.trim()===""){
    nameError.innerHTML="Error:Name is not entered"
    isValid=false
}
if(emailVerify.value.trim()===""){
    emailError.innerHTML="Error:Email is not entered"
    isValid=false
}
if(genderVerify.value.trim()===""){
    genderError.innerHTML="Please Select Your Gender"
    isValid=false
}
if(dobVerify.value.trim()===""){
    dobError.innerHTML="Please Enter Your DOB"
    isValid=false
}
if(isValid){
    alert("Registration Successful")
    form.reset()
}

})
mobileVerify.addEventListener("input",()=>{
    mobileError.innerHTML=""
})
passVerify.addEventListener("input",()=>{
    passError.innerHTML=""
})
emailVerify.addEventListener("input",()=>{
    emailError.innerHTML=""
})
genderVerify.addEventListener("input",()=>{
    genderError.innerHTML=""
})
dobVerify.addEventListener("input",()=>{
    dobError.innerHTML=""
})
nameVerify.addEventListener("input",()=>{
    nameError.innerHTML=""
})