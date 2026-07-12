const students=[
{
name:"Rahul Sharma",
branch:"Computer Science",
year:"2nd Year",
email:"rahul@gmail.com",
phone:"9876543210",
cgpa:"8.7",
city:"Jaipur"
},
{
name:"Priya Verma",
branch:"Information Technology",
year:"3rd Year",
email:"priya@gmail.com",
phone:"9988776655",
cgpa:"9.2",
city:"Delhi"
},
{
name:"Vikas Choudhary",
branch:"Computer Science",
year:"1st Year",
email:"vikas@gmail.com",
phone:"9123456789",
cgpa:"9.0",
city:"Pali"
},
{
name:"Aman Gupta",
branch:"Electronics",
year:"4th Year",
email:"aman@gmail.com",
phone:"9876512345",
cgpa:"8.3",
city:"Kota"
},
{
name:"Sneha Singh",
branch:"Mechanical",
year:"2nd Year",
email:"sneha@gmail.com",
phone:"9898989898",
cgpa:"8.9",
city:"Udaipur"
}
];

function displayStudents(data){

let cards="";

data.forEach(student=>{

cards+=`

<div class="card">

<h2>${student.name}</h2>

<p><strong>Branch:</strong> ${student.branch}</p>

<p><strong>Year:</strong> ${student.year}</p>

<span class="tag">CGPA : ${student.cgpa}</span>

<div class="details">

<p><strong>Email :</strong> ${student.email}</p>

<p><strong>Phone :</strong> ${student.phone}</p>

<p><strong>City :</strong> ${student.city}</p>

</div>

</div>

`;

});

$("#studentContainer").html(cards);

}

displayStudents(students);

$("#search").keyup(function(){

let value=$(this).val().toLowerCase();

let filtered=students.filter(student=>student.name.toLowerCase().includes(value));

displayStudents(filtered);

});

$(document).on("click",".card",function(){

$(this).find(".details").slideToggle(400);

});