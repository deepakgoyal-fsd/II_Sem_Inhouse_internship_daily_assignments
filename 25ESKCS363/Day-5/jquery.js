const students = [
{
name:"Vikas Choudhary",
branch:"Computer Science",
year:"2nd Year",
type:"Undergraduate",
cgpa:"9.1",
email:"vikas@gmail.com",
phone:"9876543210",
city:"Pali",
image:"https://randomuser.me/api/portraits/men/11.jpg"
},
{
name:"Rahul Sharma",
branch:"Information Technology",
year:"3rd Year",
type:"Undergraduate",
cgpa:"8.8",
email:"rahul@gmail.com",
phone:"9123456780",
city:"Jaipur",
image:"https://randomuser.me/api/portraits/men/22.jpg"
},
{
name:"Priya Verma",
branch:"Computer Science",
year:"1st Year",
type:"Undergraduate",
cgpa:"9.4",
email:"priya@gmail.com",
phone:"9988776655",
city:"Delhi",
image:"https://randomuser.me/api/portraits/women/32.jpg"
},
{
name:"Aman Gupta",
branch:"Mechanical",
year:"Graduate",
type:"Graduate",
cgpa:"8.2",
email:"aman@gmail.com",
phone:"9000012345",
city:"Kota",
image:"https://randomuser.me/api/portraits/men/44.jpg"
},
{
name:"Sneha Singh",
branch:"Electronics",
year:"Graduate",
type:"Graduate",
cgpa:"9.0",
email:"sneha@gmail.com",
phone:"9012345678",
city:"Udaipur",
image:"https://randomuser.me/api/portraits/women/52.jpg"
},
{
name:"Rohit Jain",
branch:"Civil",
year:"4th Year",
type:"Undergraduate",
cgpa:"8.5",
email:"rohit@gmail.com",
phone:"9345678123",
city:"Ajmer",
image:"https://randomuser.me/api/portraits/men/60.jpg"
},
{
name:"Anjali Sharma",
branch:"Electrical",
year:"Graduate",
type:"Graduate",
cgpa:"9.3",
email:"anjali@gmail.com",
phone:"9876501234",
city:"Jodhpur",
image:"https://randomuser.me/api/portraits/women/61.jpg"
},
{
name:"Karan Mehta",
branch:"AI & ML",
year:"2nd Year",
type:"Undergraduate",
cgpa:"8.9",
email:"karan@gmail.com",
phone:"9898989898",
city:"Mumbai",
image:"https://randomuser.me/api/portraits/men/70.jpg"
}
];

function displayStudents(data){

let cards="";

data.forEach(student=>{

cards+=`

<div class="card">

<img src="${student.image}">

<h2>${student.name}</h2>

<p class="branch">${student.branch}</p>

<p class="year">${student.year}</p>

<div class="badge">${student.cgpa} CGPA</div>

<button class="btn-details">Show Details</button>

<div class="details">

<p><strong>Type :</strong> ${student.type}</p>

<p><strong>Email :</strong> ${student.email}</p>

<p><strong>Phone :</strong> ${student.phone}</p>

<p><strong>City :</strong> ${student.city}</p>

</div>

</div>

`;

});

$("#studentContainer").html(cards);

$(".card").hide().fadeIn(800);

}

displayStudents(students);

$("#search").on("keyup",function(){

let value=$(this).val().toLowerCase();

let filtered=students.filter(student=>{

return student.name.toLowerCase().includes(value) ||
student.branch.toLowerCase().includes(value);

});

displayStudents(filtered);

});

$(".filter").click(function(){

$(".filter").removeClass("active");

$(this).addClass("active");

let category=$(this).data("type");

if(category==="All"){

displayStudents(students);

}

else{

let filtered=students.filter(student=>student.type===category);

displayStudents(filtered);

}

});

$(document).on("click",".btn-details",function(e){

e.stopPropagation();

let details=$(this).siblings(".details");

details.slideToggle(400);

if($(this).text()=="Show Details"){

$(this).text("Hide Details");

$(this).css({
background:"#ff4757",
color:"#fff"
});

}

else{

$(this).text("Show Details");

$(this).css({
background:"#00d4ff",
color:"#111"
});

}

});