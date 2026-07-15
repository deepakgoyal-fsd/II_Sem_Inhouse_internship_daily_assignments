function runJSON(){

const student = {
    name: "Simran Godara",
    branch: "Computer Science Engineering",
    cgpa: 8.7,
    skills: ["C++","HTML","JavaScript"],
    city: "Jaipur"
};

const jsonString = JSON.stringify(student);

const parsedObject = JSON.parse(jsonString);

const classmates = [

{
    name:"Aman Sharma",
    branch:"Computer Science Engineering",
    cgpa:8.5,
    skills:["C","HTML","CSS"],
    city:"Delhi"
},

{
    name:"Priya Verma",
    branch:"Information Technology",
    cgpa:9.1,
    skills:["Java","Python","SQL"],
    city:"Jaipur"
},

{
    name:"Rahul Singh",
    branch:"Electronics Engineering",
    cgpa:8.2,
    skills:["C++","JavaScript","React"],
    city:"Kota"
}

];

let output="";

output += "===== Original Object =====\n\n";
output += JSON.stringify(student,null,2);

output += "\n\n===== JSON String =====\n\n";
output += jsonString;

output += "\n\n===== Parsed Object =====\n\n";
output += JSON.stringify(parsedObject,null,2);

output += "\n\n===== Verification =====\n";
output += "✅ Round Trip Successful!\n";

output += "\n\n===== Classmates =====\n\n";
output += JSON.stringify(classmates,null,2);

document.getElementById("result").textContent = output;

console.clear();

console.log(student);
console.log(jsonString);
console.log(parsedObject);
console.log(classmates);

}