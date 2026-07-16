const students = [
{
    name:"Rahul",
    age:20,
    course:"B.Tech CSE",
    email:"rahul@gmail.com"
},
{
    name:"Priya",
    age:21,
    course:"BCA",
    email:"priya@gmail.com"
},
{
    name:"Amit",
    age:22,
    course:"B.Tech IT",
    email:"amit@gmail.com"
},
{
    name:"Sneha",
    age:20,
    course:"B.Sc",
    email:"sneha@gmail.com"
}
];

function displayStudents(data){

    let output="";

    data.forEach((student,index)=>{

        output+=`
        <div class="card">
            <h2>${student.name}</h2>

            <button onclick="toggle(${index})">
            Show/Hide Details
            </button>

            <div class="details" id="detail${index}">
                <p>Age : ${student.age}</p>
                <p>Course : ${student.course}</p>
                <p>Email : ${student.email}</p>
            </div>

        </div>
        `;
    });

    document.getElementById("studentContainer").innerHTML=output;
}

displayStudents(students);

function toggle(id){

    let x=document.getElementById("detail"+id);

    if(x.style.display==="block"){
        x.style.display="none";
    }
    else{
        x.style.display="block";
    }
}

document.getElementById("search").addEventListener("keyup",function(){

    let value=this.value.toLowerCase();

    let result=students.filter(function(student){

        return student.name.toLowerCase().includes(value);

    });

    displayStudents(result);

});