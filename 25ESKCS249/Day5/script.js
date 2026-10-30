const students = [

{
id:1,
name:"Rahul Sharma",
roll:"22CS001",
department:"CSE",
semester:"6th",
cgpa:9.4,
skills:"HTML, CSS, JavaScript",
email:"rahul@gmail.com",
address:"Jaipur"
},

{
id:2,
name:"Priya Singh",
roll:"22IT002",
department:"IT",
semester:"5th",
cgpa:8.7,
skills:"Java, Spring Boot",
email:"priya@gmail.com",
address:"Delhi"
},

{
id:3,
name:"Amit Verma",
roll:"22AI003",
department:"AI",
semester:"7th",
cgpa:9.2,
skills:"Python, Machine Learning",
email:"amit@gmail.com",
address:"Lucknow"
},

{
id:4,
name:"Sneha Patel",
roll:"22EC004",
department:"ECE",
semester:"4th",
cgpa:7.8,
skills:"Embedded Systems",
email:"sneha@gmail.com",
address:"Ahmedabad"
},

{
id:5,
name:"Vikram Yadav",
roll:"22ME005",
department:"Mechanical",
semester:"8th",
cgpa:6.9,
skills:"AutoCAD",
email:"vikram@gmail.com",
address:"Bikaner"
},

{
id:6,
name:"Neha Gupta",
roll:"22CS006",
department:"CSE",
semester:"5th",
cgpa:8.5,
skills:"React, Bootstrap",
email:"neha@gmail.com",
address:"Kota"
},

{
id:7,
name:"Karan Mehta",
roll:"22IT007",
department:"IT",
semester:"6th",
cgpa:7.4,
skills:"PHP, MySQL",
email:"karan@gmail.com",
address:"Mumbai"
},

{
id:8,
name:"Anjali Joshi",
roll:"22AI008",
department:"AI",
semester:"7th",
cgpa:9.8,
skills:"Deep Learning",
email:"anjali@gmail.com",
address:"Pune"
},

{
id:9,
name:"Rohit Kumar",
roll:"22CS009",
department:"CSE",
semester:"5th",
cgpa:8.9,
skills:"JavaScript, Bootstrap",
email:"rohit@gmail.com",
address:"Noida"
},

{
id:10,
name:"Pooja Sharma",
roll:"22EC010",
department:"ECE",
semester:"6th",
cgpa:7.2,
skills:"PCB Design",
email:"pooja@gmail.com",
address:"Indore"
},

{
id:11,
name:"Arjun Singh",
roll:"22ME011",
department:"Mechanical",
semester:"7th",
cgpa:6.8,
skills:"SolidWorks",
email:"arjun@gmail.com",
address:"Udaipur"
},

{
id:12,
name:"Kavya Jain",
roll:"22IT012",
department:"IT",
semester:"8th",
cgpa:9.3,
skills:"Flutter",
email:"kavya@gmail.com",
address:"Chandigarh"
},

{
id:13,
name:"Mohit Gupta",
roll:"22AI013",
department:"AI",
semester:"5th",
cgpa:8.2,
skills:"TensorFlow",
email:"mohit@gmail.com",
address:"Bhopal"
},

{
id:14,
name:"Simran Kaur",
roll:"22CS014",
department:"CSE",
semester:"4th",
cgpa:7.9,
skills:"Bootstrap, CSS",
email:"simran@gmail.com",
address:"Amritsar"
},

{
id:15,
name:"Deepak Verma",
roll:"22EC015",
department:"ECE",
semester:"8th",
cgpa:6.5,
skills:"VLSI",
email:"deepak@gmail.com",
address:"Nagpur"
}

];


// ==============================
// Display Student Cards
// ==============================

function displayStudents(studentList){

let cards="";

studentList.forEach(function(student){

cards += `

<div class="col-lg-4 col-md-6">

<div class="card student-card shadow h-100">

<div class="card-body">

<h4 class="text-success fw-bold">
<i class="bi bi-person-circle"></i>
${student.name}
</h4>

<hr>

<p>
<strong>Roll No :</strong>
${student.roll}
</p>

<p>
<strong>Department :</strong>
${student.department}
</p>

<p>
<strong>Semester :</strong>
${student.semester}
</p>

<p>
<strong>CGPA :</strong>
<span class="badge bg-success">
${student.cgpa}
</span>
</p>

<p>
<strong>Skills :</strong>
${student.skills}
</p>


<button
class="btn btn-success w-100 detailBtn"
data-id="${student.id}">

View Profile

</button>


</div>

</div>

</div>

`;

});


$("#studentContainer").html(cards);

}


// Initial Load

$(document).ready(function(){

displayStudents(students);

});



// ==============================
// Search + Filter
// ==============================


function filterStudents(){

let search=$("#searchName").val()
.toLowerCase()
.trim();


let department=$("#departmentFilter").val();

let cgpa=$("#cgpaFilter").val();


let filtered=students.filter(function(student){


let matchName =
student.name.toLowerCase()
.includes(search);


let matchDepartment =
department==="All" ||
student.department===department;


let matchCgpa =
cgpa==="All" ||
student.cgpa>=parseFloat(cgpa);



return matchName &&
matchDepartment &&
matchCgpa;


});


displayStudents(filtered);

}



$("#searchName").on("keyup",filterStudents);

$("#departmentFilter").on("change",filterStudents);

$("#cgpaFilter").on("change",filterStudents);




// ==============================
// Student Details Modal
// ==============================


$(document).on("click",".detailBtn",function(){


let id=$(this).data("id");


let student=students.find(function(s){

return s.id==id;

});



$("#studentDetails").html(`


<h3 class="text-success mb-3">

<i class="bi bi-person-badge"></i>
${student.name}

</h3>


<table class="table table-success table-striped">


<tr>
<th>Roll Number</th>
<td>${student.roll}</td>
</tr>


<tr>
<th>Department</th>
<td>${student.department}</td>
</tr>


<tr>
<th>Semester</th>
<td>${student.semester}</td>
</tr>


<tr>
<th>CGPA</th>
<td>${student.cgpa}</td>
</tr>


<tr>
<th>Skills</th>
<td>${student.skills}</td>
</tr>


<tr>
<th>Email</th>
<td>${student.email}</td>
</tr>


<tr>
<th>Address</th>
<td>${student.address}</td>
</tr>


</table>


`);



let modal=new bootstrap.Modal(
document.getElementById("studentModal")
);


modal.show();


});