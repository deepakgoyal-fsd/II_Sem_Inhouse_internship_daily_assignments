const students = [
{
    name: "Nisha Panghal",
    roll: "25ESKCS241",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Madhvi",
    roll: "25ESKCS205",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Mahak",
    roll: "24ESKCS207",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "parth mathur",
    roll: "25ESKCS004",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Nish Jajoo",
    roll: "25ESKCS240",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Nilaksh Yadav",
    roll: "24ESKCS239",
    branch: "IT",
    year: "2nd Year",
    course: "B.Tech"
},

{
    name: "mayank pancholi",
    roll: "24ESKCS008",
    branch: "IT",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name: "Lakshya",
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
    name: "divyanshi goyan",
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
    name :"divyanshi rathore",
    roll: "25ESKCS014",
    branch: "CSE",
    year: "2nd Year",
    course: "B.Tech"
},
{
    name:"mridul kirshn soni",
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