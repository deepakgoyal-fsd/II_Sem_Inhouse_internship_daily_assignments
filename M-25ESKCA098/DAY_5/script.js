let students = [
{
name:"Rahul",
course:"BCA",
age:20,
email:"rahul@gmail.com"
},
{
name:"Priya",
course:"B.Tech",
age:21,
email:"priya@gmail.com"
},
{
name:"Amit",
course:"MCA",
age:22,
email:"amit@gmail.com"
},
{
name:"Sneha",
course:"BBA",
age:19,
email:"sneha@gmail.com"
}
];

function display(data){

let output="";

data.forEach((student,index)=>{

output+=`
<div class="card">

<h2>${student.name}</h2>

<p>${student.course}</p>

<button onclick="toggle(${index})">
Show / Hide
</button>

<div class="details" id="detail${index}">
<p>Age : ${student.age}</p>
<p>Email : ${student.email}</p>
</div>

</div>
`;

});

document.getElementById("students").innerHTML=output;

}

display(students);

function searchStudent(){

let value=document.getElementById("search").value.toLowerCase();

let result=students.filter(student=>
student.name.toLowerCase().includes(value)
);

display(result);

}

function toggle(id){

let x=document.getElementById("detail"+id);

if(x.style.display=="block"){
x.style.display="none";
}else{
x.style.display="block";
}

}