const students=[
{
name:"Amit Sharma",
roll:"101",
course:"BCA",
email:"amit@gmail.com",
phone:"9876543210",
address:"Delhi",
cgpa:"8.6"
},
{
name:"Priya Singh",
roll:"102",
course:"B.Tech",
email:"priya@gmail.com",
phone:"9876501234",
address:"Lucknow",
cgpa:"9.2"
},
{
name:"Rahul Verma",
roll:"103",
course:"B.Sc",
email:"rahul@gmail.com",
phone:"9988776655",
address:"Jaipur",
cgpa:"8.9"
},
{
name:"Sneha Gupta",
roll:"104",
course:"B.Com",
email:"sneha@gmail.com",
phone:"9123456780",
address:"Mumbai",
cgpa:"9.4"
},
{
name:"Karan Mehta",
roll:"105",
course:"MCA",
email:"karan@gmail.com",
phone:"9011223344",
address:"Pune",
cgpa:"8.8"
}
];

const container=document.getElementById("studentContainer");
const search=document.getElementById("search");
const detail=document.getElementById("detailView");
const extra=document.getElementById("extraInfo");
const toggle=document.getElementById("toggleBtn");

function displayStudents(list){

container.innerHTML="";

list.forEach(student=>{

const card=document.createElement("div");

card.className="card";

card.innerHTML=`
<h3>${student.name}</h3>
<p>Roll : ${student.roll}</p>
<p>${student.course}</p>
`;

card.onclick=function(){

detail.style.display="block";

document.getElementById("dName").textContent=student.name;
document.getElementById("dRoll").textContent=student.roll;
document.getElementById("dCourse").textContent=student.course;
document.getElementById("dEmail").textContent=student.email;
document.getElementById("dPhone").textContent=student.phone;
document.getElementById("dAddress").textContent=student.address;
document.getElementById("dCgpa").textContent=student.cgpa;

extra.classList.remove("show");
toggle.innerText="Show More";

};

container.appendChild(card);

});

}

displayStudents(students);

search.addEventListener("keyup",function(){

const text=search.value.toLowerCase();

const filtered=students.filter(student=>
student.name.toLowerCase().includes(text)
);

displayStudents(filtered);

});

toggle.onclick=function(){

extra.classList.toggle("show");

if(extra.classList.contains("show")){
toggle.innerText="Hide";
}
else{
toggle.innerText="Show More";
}

};