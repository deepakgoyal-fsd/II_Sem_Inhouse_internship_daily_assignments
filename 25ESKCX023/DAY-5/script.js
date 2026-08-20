// Student Data
const students = [
{
    name: "Bhavika Sharma",
    branch: "CSE - Data Science",
    cgpa: 9.04,
    city: "Jaipur",
    year: "1st Year",
    skills: ["HTML", "CSS"],
    hobbies: ["Drawing", "Music"]
},
{
    name: "Rahul Sharma",
    branch: "CSE",
    cgpa: 8.2,
    city: "Delhi",
    year: "2nd Year",
    skills: ["Java", "Python"],
    hobbies: ["Cricket", "Reading"]
},
{
    name: "Priya Verma",
    branch: "IT",
    cgpa: 9.1,
    city: "Jaipur",
    year: "3rd Year",
    skills: ["C++", "JavaScript"],
    hobbies: ["Photography", "Travel"]
},
{
    name: "Ankit Gupta",
    branch: "ECE",
    cgpa: 7.8,
    city: "Kota",
    year: "2nd Year",
    skills: ["C", "Embedded Systems"],
    hobbies: ["Gaming", "Football"]
},
{
    name: "Sara Khan",
    branch: "AI & DS",
    cgpa: 9.4,
    city: "Ajmer",
    year: "1st Year",
    skills: ["Python", "Machine Learning"],
    hobbies: ["Painting", "Dancing"]
}
];

// Total Students
document.getElementById("totalStudents").innerHTML =
"Total Students : " + students.length;

// Generate Student Cards
let html = "";

for (let i = 0; i < students.length; i++) {

    let badgeColor = students[i].cgpa > 8 ? "success" : "danger";
    let cardColor = i % 2 === 0 ? "high" : "low";

    html += `
    <div class="col-md-4 mb-4">
        <div class="card ${cardColor} p-3">

            <span class="badge bg-primary serial-badge">
                #${i + 1}
            </span>

            <h4 class="card-title">${students[i].name}</h4>

            <p><b>Branch:</b> ${students[i].branch}</p>

            <span class="badge bg-${badgeColor}">
                CGPA : ${students[i].cgpa}
            </span>

            <button class="btn btn-primary btn-details mt-3">
                Show Details
            </button>

            <div class="details">

                <p><b>City:</b> ${students[i].city}</p>

                <p><b>Year:</b> ${students[i].year}</p>

                <p><b>Skills:</b> ${students[i].skills.join(", ")}</p>

                <p><b>Hobbies:</b> ${students[i].hobbies.join(", ")}</p>

            </div>

        </div>
    </div>
    `;
}

document.getElementById("container").innerHTML = html;

// Show / Hide Details
$(".btn-details").click(function () {

    $(this).closest(".card").find(".details").slideToggle();

    if ($(this).text() === "Show Details") {
        $(this).text("Hide Details");
        $(this).removeClass("btn-primary").addClass("btn-danger");
    } else {
        $(this).text("Show Details");
        $(this).removeClass("btn-danger").addClass("btn-primary");
    }
});

// Search Student
$("#search").keyup(function () {

    let value = $(this).val().toLowerCase();

    $(".card").each(function () {

        let name = $(this).find(".card-title").text().toLowerCase();

        if (name.includes(value)) {
            $(this).parent().show();
        } else {
            $(this).parent().hide();
        }

    });

});