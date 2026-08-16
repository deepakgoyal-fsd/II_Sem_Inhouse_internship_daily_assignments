/*======================================================
        EMAIL VALIDATOR PRO
        CYBER NEON EDITION
        SCRIPT.JS PART 1
======================================================*/


// ===========================
// SELECT ELEMENTS
// ===========================


const emailInput = document.getElementById("email");

const liveMessage = document.getElementById("liveMessage");

const resetBtn = document.getElementById("resetBtn");




// Dashboard Elements


const showEmail = document.getElementById("showEmail");

const showUsername = document.getElementById("showUsername");

const showDomain = document.getElementById("showDomain");

const showExtension = document.getElementById("showExtension");

const showProvider = document.getElementById("showProvider");

const showCharacters = document.getElementById("showCharacters");

const showUserLength = document.getElementById("showUserLength");

const showDomainLength = document.getElementById("showDomainLength");

const showStatus = document.getElementById("showStatus");




// Quality Elements


const qualityBar = document.getElementById("qualityBar");

const qualityText = document.getElementById("qualityText");




// Security Elements


const securityScore = document.getElementById("securityScore");

const securityText = document.getElementById("securityText");




// ===========================
// EMAIL PATTERN
// ===========================


const emailPattern =

/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/;






// ===========================
// LIVE EMAIL CHECK
// ===========================


/*======================================================
        AJAX PHP VALIDATION CONNECTION
======================================================*/


emailInput.addEventListener("keyup", function(){


    let email = emailInput.value.trim();



    if(email === ""){


        liveMessage.innerHTML="";


        resetAnalysis();


        return;


    }





    if(emailPattern.test(email)){



        liveMessage.innerHTML=

        "🔄 Checking Email...";


        liveMessage.style.color="#D4A017";



        sendToPHP(email);



    }


    else{


        liveMessage.innerHTML=

        "❌ Invalid Email Format";


        liveMessage.style.color="#FF4D4D";


        resetAnalysis();


    }



});






// ===========================
// SEND DATA TO PHP
// ===========================


function sendToPHP(email){



fetch("validator.php",{


method:"POST",


headers:{


"Content-Type":"application/x-www-form-urlencoded"


},


body:

"email="+encodeURIComponent(email)



})



.then(response=>response.json())



.then(data=>{



if(data.status==="valid"){



liveMessage.innerHTML=

"✅ "+data.message;



liveMessage.style.color="#00F5FF";



showEmail.innerHTML=data.email;


showUsername.innerHTML=data.username;


showDomain.innerHTML=data.domain;


showExtension.innerHTML=data.extension;


showProvider.innerHTML=data.provider;


showCharacters.innerHTML=data.characters;


showUserLength.innerHTML=data.usernameLength;


showDomainLength.innerHTML=data.domainLength;



showStatus.innerHTML=


`

<span class="badge-success">

Valid Email

</span>

`;



qualityBar.style.width=

data.quality+"%";



qualityText.innerHTML=

"Email Quality Score: "

+data.quality+"%";



securityScore.innerHTML=

data.security+"%";



securityText.innerHTML=

"Email Security Score Generated";




}


else{


liveMessage.innerHTML=

"❌ "+data.message;



resetAnalysis();



}



})



.catch(error=>{


console.log(error);


liveMessage.innerHTML=

"Server Error";


});



}





// ===========================
// EMAIL ANALYSIS FUNCTION
// ===========================


function analyzeEmail(email){



    let parts = email.split("@");



    let username = parts[0];

    let domain = parts[1];



    let extension =

    domain.substring(

    domain.lastIndexOf(".")+1

    );





    showEmail.innerHTML=email;


    showUsername.innerHTML=username;


    showDomain.innerHTML=domain;


    showExtension.innerHTML=extension;



    showCharacters.innerHTML=email.length;



    showUserLength.innerHTML=username.length;


    showDomainLength.innerHTML=domain.length;



    showStatus.innerHTML =

    `

    <span class="badge-success">

    Valid Email

    </span>

    `;



    detectProvider(domain);



    calculateQuality(email,username,domain);



    calculateSecurity(email);



}
/*======================================================
        SCRIPT.JS PART 2
        PROVIDER + QUALITY + SECURITY
======================================================*/



// ===========================
// PROVIDER DETECTION
// ===========================


function detectProvider(domain){


    let provider="Unknown";



    if(domain.includes("gmail")){


        provider="Google Gmail";


    }


    else if(domain.includes("yahoo")){


        provider="Yahoo Mail";


    }


    else if(domain.includes("outlook")){


        provider="Microsoft Outlook";


    }


    else if(domain.includes("hotmail")){


        provider="Microsoft Hotmail";


    }


    else if(domain.includes("proton")){


        provider="Proton Mail";


    }


    else if(domain.includes("icloud")){


        provider="Apple iCloud";


    }



    showProvider.innerHTML = provider;



}







// ===========================
// EMAIL QUALITY SCORE
// ===========================


function calculateQuality(email,username,domain){



    let score = 0;



    // Length Check

    if(email.length >= 10){

        score += 25;

    }




    // Username Check

    if(username.length >= 3){

        score += 25;

    }




    // Domain Check

    if(domain.includes(".")){

        score += 25;

    }





    // Trusted extension

    let extensions = [

        "com",

        "org",

        "net",

        "edu",

        "in"

    ];



    let ext =

    domain.substring(

    domain.lastIndexOf(".")+1

    );



    if(extensions.includes(ext)){


        score +=25;


    }






    // Update Progress Bar


    qualityBar.style.width = score+"%";





    if(score >= 90){


        qualityText.innerHTML =

        "Excellent Email Quality ⭐⭐⭐⭐⭐";


    }


    else if(score >=70){


        qualityText.innerHTML =

        "Good Email Quality ⭐⭐⭐⭐";


    }


    else if(score >=50){


        qualityText.innerHTML =

        "Average Email Quality ⭐⭐⭐";


    }


    else{


        qualityText.innerHTML =

        "Poor Email Quality";


    }




}








// ===========================
// SECURITY SCORE
// ===========================


function calculateSecurity(email){



    let score=0;



    // Length

    if(email.length >=12){


        score+=30;


    }





    // Contains numbers


    if(/[0-9]/.test(email)){


        score+=20;


    }





    // Contains special character


    if(/[._-]/.test(email)){


        score+=20;


    }





    // Valid domain


    if(email.includes(".")){


        score+=30;


    }






    securityScore.innerHTML=

    score+"%";





    if(score>=80){



        securityText.innerHTML=

        "Strong Email Structure 🔐";



    }


    else if(score>=50){



        securityText.innerHTML=

        "Moderate Email Structure ⚠️";



    }


    else{



        securityText.innerHTML=

        "Weak Email Structure";


    }




}
/*======================================================
        SCRIPT.JS PART 3
        RESET + DARK MODE + EFFECTS
======================================================*/



// ===========================
// RESET FUNCTION
// ===========================


function resetAnalysis(){



    if(showEmail){

        showEmail.innerHTML="-";

    }


    if(showUsername){

        showUsername.innerHTML="-";

    }


    if(showDomain){

        showDomain.innerHTML="-";

    }


    if(showExtension){

        showExtension.innerHTML="-";

    }


    if(showProvider){

        showProvider.innerHTML="-";

    }


    if(showCharacters){

        showCharacters.innerHTML="-";

    }


    if(showUserLength){

        showUserLength.innerHTML="-";

    }


    if(showDomainLength){

        showDomainLength.innerHTML="-";

    }



    if(showStatus){


        showStatus.innerHTML=

        `

        <span class="badge-danger">

        Waiting...

        </span>

        `;


    }



    if(qualityBar){


        qualityBar.style.width="0%";


    }



    if(qualityText){


        qualityText.innerHTML=

        "Waiting for analysis...";


    }




    if(securityScore){


        securityScore.innerHTML="0%";


    }



    if(securityText){


        securityText.innerHTML=

        "Enter an email to calculate security score.";


    }


}







// ===========================
// RESET BUTTON
// ===========================


resetBtn.addEventListener("click",function(){



    liveMessage.innerHTML="";


    emailInput.style.border="none";


    resetAnalysis();



});







// ===========================
// DARK MODE BUTTON
// ===========================


// ===========================
// THEME TOGGLE
// ===========================


const themeBtn = document.getElementById("themeBtn");

// Website starts in DARK theme
themeBtn.innerHTML = `
<i class="bi bi-sun-fill"></i>
Light Mode
`;

themeBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark-mode");

    if(document.body.classList.contains("dark-mode")){

        // Currently Light Theme
        // Button should offer Dark Mode
        themeBtn.innerHTML = `
        <i class="bi bi-moon-stars-fill"></i>
        Dark Mode
        `;

    }else{

        // Currently Dark Theme
        // Button should offer Light Mode
        themeBtn.innerHTML = `
        <i class="bi bi-sun-fill"></i>
        Light Mode
        `;

    }

});






// ===========================
// SCROLL REVEAL EFFECT
// ===========================


const sections = document.querySelectorAll(

".analysis, .quality-box, .security-card, .history, .info-box, .about-section"

);





const observer = new IntersectionObserver(function(entries){



    entries.forEach(function(entry){



        if(entry.isIntersecting){


            entry.target.classList.add("fade");


        }



    });



},{

threshold:0.2

});






sections.forEach(function(section){



    observer.observe(section);



});







// ===========================
// BUTTON CLICK EFFECT
// ===========================


const buttons = document.querySelectorAll("button");



buttons.forEach(function(button){



    button.addEventListener("click",function(){



        button.style.transform="scale(.95)";



        setTimeout(function(){



            button.style.transform="";



        },150);



    });



});