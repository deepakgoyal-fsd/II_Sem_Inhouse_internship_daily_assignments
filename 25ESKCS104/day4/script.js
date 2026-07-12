// ===========================
// DARK MODE
// ===========================

const themeBtn = document.getElementById("themeBtn");

themeBtn.addEventListener("click", () => {

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){

        themeBtn.innerHTML='<i class="fa-solid fa-sun"></i>';

    }

    else{

        themeBtn.innerHTML='<i class="fa-solid fa-moon"></i>';

    }

});

// ===========================
// FORM VALIDATION
// ===========================

const form=document.getElementById("registerForm");

form.addEventListener("submit",function(e){

    e.preventDefault();

    let valid=true;

    // Inputs

    let name=document.getElementById("name");
    let email=document.getElementById("email");
    let phone=document.getElementById("phone");
    let dob=document.getElementById("dob");
    let branch=document.getElementById("branch");
    let password=document.getElementById("password");
    let confirmPassword=document.getElementById("confirmPassword");
    let terms=document.getElementById("terms");

    clearErrors();

    // ======================
    // NAME
    // ======================

    if(name.value.trim()===""){

        showError(name,"Full name is required.");

        valid=false;

    }

    // ======================
    // EMAIL
    // ======================

    let emailPattern=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(!emailPattern.test(email.value.trim())){

        showError(email,"Enter a valid email.");

        valid=false;

    }

    // ======================
    // PHONE
    // ======================

    let phonePattern=/^[6-9]\d{9}$/;

    if(!phonePattern.test(phone.value.trim())){

        showError(phone,"Enter a valid 10-digit phone number.");

        valid=false;

    }

    // ======================
    // DOB
    // ======================

    if(dob.value===""){

        showError(dob,"Select your date of birth.");

        valid=false;

    }

    // ======================
    // GENDER
    // ======================

    let gender=document.querySelector('input[name="gender"]:checked');

    if(!gender){

        document.querySelector(".gender")
        .nextElementSibling.innerHTML="Please select gender.";

        valid=false;

    }

    // ======================
    // BRANCH
    // ======================

    if(branch.value===""){

        showError(branch,"Please select a branch.");

        valid=false;

    }

    // ======================
    // PASSWORD
    // ======================

    if(password.value.length<6){

        showError(password,"Password must be at least 6 characters.");

        valid=false;

    }

    // ======================
    // CONFIRM PASSWORD
    // ======================

    if(confirmPassword.value!==password.value){

        showError(confirmPassword,"Passwords do not match.");

        valid=false;

    }

    // ======================
    // TERMS
    // ======================

    if(!terms.checked){

        document.getElementById("checkError").innerHTML="Please accept Terms & Conditions.";

        valid=false;

    }

    // ======================
    // SUCCESS
    // ======================

    if(valid){

        document.getElementById("popup").style.display="flex";

        form.reset();

    }

});

// ===========================
// SHOW ERROR
// ===========================

function showError(input,message){

    input.nextElementSibling.innerHTML=message;

}

// ===========================
// CLEAR ERRORS
// ===========================

function clearErrors(){

    document.querySelectorAll("small").forEach(function(item){

        item.innerHTML="";

    });

}

// ===========================
// CLOSE POPUP
// ===========================

function closePopup(){

    document.getElementById("popup").style.display="none";

}
