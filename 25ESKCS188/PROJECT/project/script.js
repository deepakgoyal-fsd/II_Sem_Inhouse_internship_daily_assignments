function generateLetter() {

const name = document.getElementById("name").value;
const company = document.getElementById("company").value;
const job = document.getElementById("job").value;
const skills = document.getElementById("skills").value;
const experience = document.getElementById("experience").value;
const why = document.getElementById("why").value;

if(
name==="" ||
company==="" ||
job==="" ||
skills==="" ||
experience==="" ||
why==="")
{

alert("Please fill all fields.");

return;

}

const letter =

`Dear Hiring Manager,

I am excited to apply for the position of ${job} at ${company}. With a strong interest in technology and continuous learning, I am confident that my skills and enthusiasm make me a strong candidate for this opportunity.

My experience includes:

${experience}

Throughout my journey, I have developed valuable skills in:

${skills}

These abilities have strengthened my problem-solving, communication, and teamwork skills while allowing me to deliver quality work and adapt quickly to new challenges.

I am particularly interested in joining ${company} because:

${why}

I admire your organization's commitment to innovation and excellence. I am eager to contribute my knowledge, learn from experienced professionals, and make a meaningful impact as part of your team.

Thank you for taking the time to review my application. I would welcome the opportunity to discuss how my background and passion align with your organization's goals.

Sincerely,

${name}`;

document.getElementById("output").innerText = letter;

}

function copyLetter(){

const text = document.getElementById("output").innerText;

navigator.clipboard.writeText(text);

alert("Cover Letter Copied!");

}

function clearFields(){

document.getElementById("name").value="";
document.getElementById("company").value="";
document.getElementById("job").value="";
document.getElementById("skills").value="";
document.getElementById("experience").value="";
document.getElementById("why").value="";

document.getElementById("output").innerHTML="Your AI-generated cover letter will appear here...";

}