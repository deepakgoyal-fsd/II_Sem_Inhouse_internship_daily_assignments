/* ==========================================
   SELECT ELEMENTS
========================================== */

const form = document.getElementById("portfolioForm");

const photo = document.getElementById("photo");

const previewImage = document.getElementById("previewImage");

const downloadBtn = document.getElementById("downloadBtn");

const resumeScore = document.getElementById("resumeScore");


/* ==========================================
   IMAGE UPLOAD PREVIEW
========================================== */

photo.addEventListener("change", function () {

    const file = this.files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.onload = function (e) {

        previewImage.src = e.target.result;

    };

    reader.readAsDataURL(file);

});


/* ==========================================
   GENERATE PORTFOLIO
========================================== */

form.addEventListener("submit", function (e) {

    e.preventDefault();


    /* =========================
       GET INPUT VALUES
    ========================= */

    const name = document.getElementById("name").value;

    const title = document.getElementById("title").value;

    const email = document.getElementById("email").value;

    const phone = document.getElementById("phone").value;

    const city = document.getElementById("city").value;

    const linkedin = document.getElementById("linkedin").value;

    const github = document.getElementById("github").value;

    const college = document.getElementById("college").value;

    const degree = document.getElementById("degree").value;

    const branch = document.getElementById("branch").value;

    const year = document.getElementById("year").value;

    const cgpa = document.getElementById("cgpa").value;

    const career = document.getElementById("career").value;

    const skills = document.getElementById("skills").value;

    const languages = document.getElementById("languages").value;

    const frameworks = document.getElementById("frameworks").value;

    const tools = document.getElementById("tools").value;

    const certificates = document.getElementById("certificates").value;

    const achievements = document.getElementById("achievements").value;

    const hobbies = document.getElementById("hobbies").value;

    const project1 = document.getElementById("project1").value;

    const tech1 = document.getElementById("tech1").value;

    const project2 = document.getElementById("project2").value;

    const tech2 = document.getElementById("tech2").value;


    /* =========================
       BASIC DETAILS
    ========================= */

    document.getElementById("previewName").textContent = name;

    document.getElementById("previewTitle").textContent = title;

    document.getElementById("previewEmail").textContent =
        "Email : " + email;

    document.getElementById("previewPhone").textContent =
        "Phone : " + phone;

    document.getElementById("previewCity").textContent =
        "City : " + city;

    document.getElementById("previewLinkedin").textContent =
        "LinkedIn : " + linkedin;

    document.getElementById("previewGithub").textContent =
        "GitHub : " + github;


    /* =========================
       EDUCATION
    ========================= */

    document.getElementById("educationPreview").innerHTML =

        "<strong>" + degree + "</strong>" +

        "<br>" +

        branch +

        "<br>" +

        college +

        "<br>" +

        "Graduation : " + year +

        "<br>" +

        "CGPA : " + cgpa;


    /* =========================
       CERTIFICATES
    ========================= */

    document.getElementById("certificatePreview").textContent =
        certificates;


    /* =========================
       ACHIEVEMENTS
    ========================= */

    document.getElementById("achievementPreview").textContent =
        achievements;


    /* =========================
       SKILL BADGES
    ========================= */

    const badgeContainer =
        document.getElementById("skillBadges");

    badgeContainer.innerHTML = "";

    const skillArray = skills.split(",");

    skillArray.forEach(function (skill) {

        if (skill.trim() !== "") {

            const badge =
                document.createElement("span");

            badge.className = "skill-badge";

            badge.textContent = skill.trim();

            badgeContainer.appendChild(badge);

        }

    });


    /* =========================
       SAVE VALUES
       (Used in Next Parts)
    ========================= */

    window.userData = {

        career,

        skills,

        languages,

        frameworks,

        tools,

        hobbies,

        project1,

        project2,

        tech1,

        tech2,

        college,

        degree,

        branch,

        name

    };
    savePortfolioToBackend({

    name,

    title,

    email,

    phone,

    city,

    linkedin,

    github,

    college,

    degree,

    branch,

    year,

    cgpa,

    career,

    skills,

    languages,

    frameworks,

    tools,

    certificates,

    achievements,

    hobbies,

    project1,

    tech1,

    project2,

    tech2

});
    

});


/* ==========================================
   RESET BUTTON
========================================== */

form.addEventListener("reset", function () {

    previewImage.src =
        "https://via.placeholder.com/180";

    document.getElementById("previewName").textContent =
        "Your Name";

    document.getElementById("previewTitle").textContent =
        "Professional Title";

    document.getElementById("summary").textContent =
        "AI-generated summary will appear here.";

    document.getElementById("objective").textContent =
        "Career objective will appear here.";

    document.getElementById("skillBadges").innerHTML = "";

    document.getElementById("projectPreview").innerHTML = "";

    document.getElementById("strengthList").innerHTML = "";

    document.getElementById("suggestionList").innerHTML = "";

    resumeScore.textContent = "0%";

});


/* ==========================================
   DOWNLOAD PDF
========================================== */

downloadBtn.addEventListener("click", function () {

    window.print();
    


});
/* ==========================================
   JAVASCRIPT PART 2
   AI SUMMARY + CAREER OBJECTIVE
========================================== */

function generateSummary(data){

    let summary = "";

    switch(data.career){

        case "Full Stack Developer":

            summary =
            `Motivated ${data.branch} undergraduate at ${data.college} with a strong interest in Full Stack Web Development. Skilled in ${data.skills}. Passionate about developing responsive web applications and continuously improving problem-solving abilities. Seeking opportunities to contribute to innovative software projects while enhancing technical expertise.`;

            break;

        case "Frontend Developer":

            summary =
            `Dedicated ${data.branch} student at ${data.college} with a passion for creating modern and user-friendly web interfaces. Experienced with ${data.skills}. Enthusiastic about responsive design, UI development, and delivering excellent user experiences.`;

            break;

        case "Backend Developer":

            summary =
            `Aspiring Backend Developer pursuing ${data.degree} in ${data.branch} at ${data.college}. Skilled in ${data.skills}. Interested in designing scalable applications, APIs, and efficient server-side solutions while continuously learning modern backend technologies.`;

            break;

        case "Cybersecurity":

            summary =
            `Enthusiastic ${data.branch} undergraduate at ${data.college} with a keen interest in Cybersecurity and Ethical Hacking. Familiar with ${data.skills}. Passionate about securing digital systems, identifying vulnerabilities, and staying updated with emerging security technologies.`;

            break;

        case "Artificial Intelligence":

            summary =
            `Highly motivated ${data.branch} student at ${data.college} with a growing interest in Artificial Intelligence and Machine Learning. Skilled in ${data.skills}. Passionate about developing intelligent systems that solve real-world problems through data-driven approaches.`;

            break;

        case "Cloud Computing":

            summary =
            `Motivated ${data.branch} undergraduate at ${data.college} interested in Cloud Computing and scalable infrastructure. Familiar with ${data.skills}. Eager to build secure and reliable cloud-based applications while continuously learning modern cloud platforms.`;

            break;

        case "Data Science":

            summary =
            `Passionate ${data.branch} student at ${data.college} with an interest in Data Science and Analytics. Skilled in ${data.skills}. Dedicated to extracting valuable insights from data and solving business problems using analytical techniques.`;

            break;

        case "Android Development":

            summary =
            `Aspiring Android Developer pursuing ${data.degree} in ${data.branch} at ${data.college}. Skilled in ${data.skills}. Interested in building intuitive mobile applications with excellent performance and user experience.`;

            break;

        default:

            summary =
            `Motivated ${data.branch} student at ${data.college} with strong technical skills in ${data.skills}. Passionate about continuous learning, problem solving, and contributing to innovative technology projects.`;

    }

    document.getElementById("summary").textContent = summary;

}

/* ==========================================
   CAREER OBJECTIVE
========================================== */

function generateObjective(career){

    let objective = "";

    switch(career){

        case "Full Stack Developer":

            objective =
            "Seeking an entry-level Full Stack Developer position where I can utilize my programming knowledge, problem-solving abilities, and passion for creating scalable web applications.";

            break;

        case "Frontend Developer":

            objective =
            "Seeking an opportunity to contribute as a Frontend Developer while creating modern, responsive, and user-friendly web interfaces.";

            break;

        case "Backend Developer":

            objective =
            "Looking for an opportunity to develop secure, scalable, and efficient backend systems while continuously improving my software engineering skills.";

            break;

        case "Cybersecurity":

            objective =
            "Seeking an entry-level Cybersecurity role where I can apply my knowledge of ethical hacking, network security, and threat analysis to protect digital assets.";

            break;

        case "Artificial Intelligence":

            objective =
            "Looking forward to contributing to Artificial Intelligence projects by applying analytical thinking and machine learning concepts to solve real-world problems.";

            break;

        case "Cloud Computing":

            objective =
            "Seeking an opportunity to work on cloud infrastructure and scalable applications while continuously expanding my cloud computing expertise.";

            break;

        case "Data Science":

            objective =
            "Aspiring Data Scientist seeking opportunities to analyze data, generate insights, and build predictive models that support informed decision-making.";

            break;

        case "Android Development":

            objective =
            "Seeking an Android Developer role to create high-quality mobile applications while continuously improving my development skills.";

            break;

        default:

            objective =
            "Seeking an opportunity to contribute my technical skills, creativity, and problem-solving abilities while continuously learning and growing in the software industry.";

    }

    document.getElementById("objective").textContent = objective;

}

/* ==========================================
   PROJECT DESCRIPTION GENERATOR
========================================== */

function generateProjects(data){

    const container =
    document.getElementById("projectPreview");

    container.innerHTML = "";

    if(data.project1 !== ""){

        container.innerHTML +=
        `
        <div class="project-card">

            <h3>${data.project1}</h3>

            <p>
            Developed a responsive application using
            <strong>${data.tech1}</strong>.
            The project demonstrates practical implementation of modern development concepts with a focus on usability, performance, and clean interface design.
            </p>

        </div>
        `;
    }

    if(data.project2 !== ""){

        container.innerHTML +=
        `
        <div class="project-card">

            <h3>${data.project2}</h3>

            <p>
            Designed and implemented this project using
            <strong>${data.tech2}</strong>.
            The application focuses on solving real-world problems through efficient development practices and user-centered design.
            </p>

        </div>
        `;
    }

}

/* ==========================================
   CALL FUNCTIONS
========================================== */

const oldSubmit = form.onsubmit;

form.addEventListener("submit",function(){

    generateSummary(window.userData);

    generateObjective(window.userData.career);

    generateProjects(window.userData);

});
/* ==========================================
   JAVASCRIPT PART 3
   RESUME SCORE + STRENGTHS + SUGGESTIONS
========================================== */

/* ==========================================
   RESUME SCORE
========================================== */

function calculateResumeScore(data){

    let score = 0;

    if(data.name.trim() !== "")
        score += 10;

    if(data.skills.trim() !== "")
        score += 20;

    if(data.project1.trim() !== "")
        score += 15;

    if(data.project2.trim() !== "")
        score += 10;

    if(data.college.trim() !== "")
        score += 10;

    if(data.degree.trim() !== "")
        score += 5;

    if(data.branch.trim() !== "")
        score += 5;

    if(data.languages.trim() !== "")
        score += 5;

    if(data.frameworks.trim() !== "")
        score += 5;

    if(data.tools.trim() !== "")
        score += 5;

    if(document.getElementById("certificates").value.trim() !== "")
        score += 5;

    if(document.getElementById("achievements").value.trim() !== "")
        score += 5;

    animateScore(score);

}

/* ==========================================
   SCORE ANIMATION
========================================== */

function animateScore(target){

    let current = 0;

    resumeScore.innerText = "0%";

    const timer = setInterval(function(){

        current++;

        resumeScore.innerText = current + "%";

        if(current >= target){

            clearInterval(timer);

        }

    },20);

}

/* ==========================================
   STRENGTH GENERATOR
========================================== */

function generateStrengths(data){

    const list =
    document.getElementById("strengthList");

    list.innerHTML = "";

    const strengths = [

        "Quick Learner",

        "Problem Solving",

        "Team Player",

        "Communication Skills",

        "Leadership",

        "Adaptability",

        "Critical Thinking",

        "Time Management"

    ];

    strengths.forEach(function(item){

        const li =
        document.createElement("li");

        li.textContent = item;

        list.appendChild(li);

    });

}

/* ==========================================
   SUGGESTION GENERATOR
========================================== */

function generateSuggestions(data){

    const list =
    document.getElementById("suggestionList");

    list.innerHTML = "";

    function addSuggestion(text){

        const li =
        document.createElement("li");

        li.textContent = text;

        list.appendChild(li);

    }

    if(data.skills.trim()===""){

        addSuggestion("Add more technical skills.");

    }

    if(data.project1.trim()===""){

        addSuggestion("Include at least one project.");

    }

    if(data.project2.trim()===""){

        addSuggestion("Adding a second project will strengthen your portfolio.");

    }

    if(document.getElementById("certificates").value.trim()===""){

        addSuggestion("Add professional certifications.");

    }

    if(document.getElementById("achievements").value.trim()===""){

        addSuggestion("Mention academic or extracurricular achievements.");

    }

    if(data.frameworks.trim()===""){

        addSuggestion("Learn at least one framework like React or Bootstrap.");

    }

    if(data.tools.trim()===""){

        addSuggestion("Mention development tools such as Git or VS Code.");

    }

    if(list.children.length===0){

        addSuggestion("Excellent profile! Your portfolio is interview-ready.");

    }

}

/* ==========================================
   UPDATE ON GENERATE
========================================== */

form.addEventListener("submit",function(){

    calculateResumeScore(window.userData);

    generateStrengths(window.userData);

    generateSuggestions(window.userData);

});
/* ==========================================
   JAVASCRIPT PART 4
   LOCAL STORAGE + FINAL FEATURES
========================================== */

/* ==========================================
   SAVE DATA
========================================== */

function savePortfolio(){

    const data = {

        name:document.getElementById("name").value,

        title:document.getElementById("title").value,

        email:document.getElementById("email").value,

        phone:document.getElementById("phone").value,

        linkedin:document.getElementById("linkedin").value,

        github:document.getElementById("github").value,

        city:document.getElementById("city").value,

        college:document.getElementById("college").value,

        degree:document.getElementById("degree").value,

        branch:document.getElementById("branch").value,

        year:document.getElementById("year").value,

        cgpa:document.getElementById("cgpa").value,

        career:document.getElementById("career").value,

        skills:document.getElementById("skills").value,

        languages:document.getElementById("languages").value,

        frameworks:document.getElementById("frameworks").value,

        tools:document.getElementById("tools").value,

        certificates:document.getElementById("certificates").value,

        achievements:document.getElementById("achievements").value,

        hobbies:document.getElementById("hobbies").value,

        project1:document.getElementById("project1").value,

        tech1:document.getElementById("tech1").value,

        project2:document.getElementById("project2").value,

        tech2:document.getElementById("tech2").value

    };

    localStorage.setItem(
        "portfolioData",
        JSON.stringify(data)
    );

}

/* ==========================================
   LOAD DATA
========================================== */

window.addEventListener("load",function(){

    const saved =
    localStorage.getItem("portfolioData");

    if(saved===null) return;

    const data = JSON.parse(saved);

    for(const key in data){

        const element =
        document.getElementById(key);

        if(element){

            element.value = data[key];

        }

    }

});

/* ==========================================
   SAVE AFTER GENERATE
========================================== */

form.addEventListener("submit",function(){

    savePortfolio();

});

/* ==========================================
   CLEAR STORAGE ON RESET
========================================== */

form.addEventListener("reset",function(){

    localStorage.removeItem("portfolioData");

});

/* ==========================================
   PDF DOWNLOAD
========================================== */

downloadBtn.addEventListener("click",function(){

    window.print();

});

/* ==========================================
   SMOOTH SCROLL TO PORTFOLIO
========================================== */

form.addEventListener("submit",function(){

    document.querySelector(".portfolio-card")
    .scrollIntoView({

        behavior:"smooth"

    });

});

/* ==========================================
   BUTTON LOADING EFFECT
========================================== */

const generateBtn =
document.querySelector(".generate-btn");

form.addEventListener("submit",function(){

    generateBtn.disabled = true;

    const oldText =
    generateBtn.innerHTML;

    generateBtn.innerHTML =
    "Generating Portfolio...";

    setTimeout(function(){

        generateBtn.disabled = false;

        generateBtn.innerHTML = oldText;

    },1500);

});

/* ==========================================
   HIGHLIGHT EMPTY FIELDS
========================================== */

const inputs =
document.querySelectorAll("input, textarea, select");

inputs.forEach(function(input){

    input.addEventListener("blur",function(){

        if(this.value.trim()===""){

            this.style.borderColor="#ef4444";

        }

        else{

            this.style.borderColor="#22c55e";

        }

    });

});

/* ==========================================
   END OF SCRIPT
========================================== */

console.log(
"PortfolioAI Loaded Successfully"
);
/* ==========================================
   SAVE PORTFOLIO TO BACKEND
========================================== */

async function savePortfolioToBackend(data){

    try{

        const response = await fetch(
            "http://localhost:5000/portfolio",
            {

                method:"POST",

                headers:{
                    "Content-Type":"application/json"
                },

                body:JSON.stringify(data)

            }

        );

        const result = await response.json();

        console.log(result);

    }

    catch(error){

        console.error(error);

        alert("Unable to connect to backend.");

    }

}