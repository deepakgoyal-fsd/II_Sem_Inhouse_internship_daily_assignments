const students = [
{
    name: "Mayank Pancholi",
    roll: "25ESKCS001",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "mridul krishna soni",
    roll: "25ESKCS002",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "lakshya rajvaniya",
    roll: "24ESKCS003",
    branch: "IT",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Aman Verma",
    roll: "25ESKCS004",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Priya Meena",
    roll: "25ESKCS005",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Anjali Sharma",
    roll: "24ESKCS006",
    branch: "ME",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Rohit Kumar",
    roll: "24ESKCS007",
    branch: "Civil",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "nilaksh Yadav",
    roll: "24ESKCS008",
    branch: "IT",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Neha Gupta",
    roll: "25ESKCS009",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "mayankk saini",
    roll: "25ESKCS010",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},{
    name: "kunal dhar dwivedi",
    roll: "25ESKCS012",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "nish jajoo",
    roll: "25ESKCS012",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "sameer rajkumavat",
    roll: "25ESKCS013",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name :"madhvi sharma",
    roll: "25ESKCS014",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name:"mayank sharma",
    roll: "25ESKCS015",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
}
];

function displayStudents() {

    let container = document.getElementById("studentContainer");

    container.innerHTML = "";

    document.getElementById("message").innerHTML = "";

    document.getElementById("totalStudent").innerHTML = students.length;

    for (let i = 0; i < students.length; i++) {

        container.innerHTML += `
        <div class="card">

            <h2>${students[i].name}</h2>

            <p><b>Roll No :</b> ${students[i].roll}</p>

            <p><b>Branch :</b> ${students[i].branch}</p>

            <p><b>Year :</b> ${students[i].year}</p>

            <p><b>Course :</b> ${students[i].course}</p>

        </div>
        `;
    }

}
function searchStudent() {

    let searchName = document.getElementById("search").value.trim();

    let container = document.getElementById("studentContainer");

    let message = document.getElementById("message");

    container.innerHTML = "";
    message.innerHTML = "";

    if (searchName === "") {
        displayStudents();
        return;
    }

    let found = false;

    for (let i = 0; i < students.length; i++) {

        if (students[i].name.toLowerCase().includes(searchName.toLowerCase())) {

            container.innerHTML += `
            <div class="card">
                <h2>${students[i].name}</h2>
                <p><b>Roll No :</b> ${students[i].roll}</p>
                <p><b>Branch :</b> ${students[i].branch}</p>
                <p><b>Year :</b> ${students[i].year}</p>
                <p><b>Course :</b> ${students[i].course}</p>
            </div>
            `;

            found = true;
        }
    }

    if (!found) {
        message.innerHTML = "Student is not in the college.";
    }
}

function resetStudents() {
    document.getElementById("search").value = "";
    document.getElementById("message").innerHTML = "";
    displayStudents();
}

function darkMode() {

    document.body.classList.toggle("dark");

    let btn = document.getElementById("modeBtn");

    if (document.body.classList.contains("dark")) {
        btn.innerHTML = " Light Mode";
    } else {
        btn.innerHTML = " Dark Mode";
    }
}

displayStudents();