//-----Registration Form Validation-----//

const form = document.querySelector(".form");

if(form){

const user = document.querySelector("#user");
const userError = document.querySelector(".user-error");

const mobile = document.querySelector("#mobile");
const mobileError = document.querySelector(".mobile-error");

const email = document.querySelector("#email");
const emailError = document.querySelector(".email-error");

const password = document.querySelector("#pass");
const passwordError = document.querySelector(".pass-error");



form.addEventListener("submit",(e)=>{
    let isValid=true
    if(user.value.trim()===""){
        userError.innerHTML="Error:Enter Your Username"
        isValid=false
    }
    if(mobile.value.trim()===""){
        mobileError.innerHTML="Error:Enter Your Mobile No"
        isValid=false
    }
    else if(mobile.value.trim().length!==10){
        mobileError.innerHTML="Error:Mobile-No should be equal to 10 digits"
        isValid=false
    }
    if(email.value.trim()===""){
        emailError.innerHTML="Error:Enter Your Email"
        isValid=false
    }
    else if(!email.value.trim().includes("@")){
        emailError.innerHTML="Error:Email should contain @ symbol"
        isValid=false
    }
    if(password.value.trim()===""){
        passwordError.innerHTML="Error:Enter Your Password"
        isValid=false
    }
    if(isValid){
        alert("Registration Successful")
        
    }else{
        e.preventDefault();
    }
})
user.addEventListener("input",()=>{
    userError.innerHTML=""
})
mobile.addEventListener("input",()=>{
    mobileError.innerHTML=""
})
email.addEventListener("input",()=>{
    emailError.innerHTML=""
})
password.addEventListener("input",()=>{
    passwordError.innerHTML=""
})
let showPass = document.querySelector("#showPass");
showPass.addEventListener("change",()=>{
    if(showPass.checked){
        password.type="text"
    }else{
        password.type="password"
    }
})
}

//-----Login Form Validation-----//

const loginForm = document.querySelector("#loginForm");

if (loginForm) {

    const loginUser = document.querySelector("#loginUser");
    const loginPass = document.querySelector("#loginPass");

    const loginUserError = document.querySelector(".login-user-error");
    const loginPassError = document.querySelector(".login-pass-error");

    loginForm.addEventListener("submit", (e) => {

        let isValid = true;

        if (loginUser.value.trim() === "") {
            loginUserError.innerHTML = "Error: Enter Your Username";
            isValid = false;
        }

        if (loginPass.value.trim() === "") {
            loginPassError.innerHTML = "Error: Enter Your Password";
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }

    });

    loginUser.addEventListener("input", () => {
        loginUserError.innerHTML = "";
    });

    loginPass.addEventListener("input", () => {
        loginPassError.innerHTML = "";
    });

}