const students = [
    {
        name: "aarush Vijay",
        branch: "CSE",
        year: "2nd Year",
        cgpa: "9.5",
        email: "aarush13vijay@gmail.com"
    },
    {
        name: "kritika ",
        branch: "CSE",
        year: "2nd Year",
        cgpa: "9.2",
        email: "kritu12@gmail.com"
    },
    {
        name: "atishay jain ",
        branch: "CSE",
        year: "2nd Year",
        cgpa: "8.9",
        email: "atishay12@gmail.com"
    },
    {
        name: "vaibhav jain",
        branch: "CSE",
        year: "2nd Year",
        cgpa: "9.0",
        email: "vaibhu12@gmail.com"
    },
    {
        name: "priyansh jain",
        branch: "CSE",
        year: "2nd Year",
        cgpa: "8.8",
        email: "priyansh90jain@gmail.com"
    }
];

// Select Container
const container = document.getElementById("studentContainer");

// Function to Display Students
function displayStudents(studentList) {

    container.innerHTML = "";

    studentList.forEach(student => {

        const card = document.createElement("div");
        card.classList.add("card");

        card.innerHTML = `
            <h2>${student.name}</h2>

            <div class="details" style="display:none;">

                <p><strong>Branch:</strong> ${student.branch}</p>

                <p><strong>Year:</strong> ${student.year}</p>

                <p><strong>CGPA:</strong> ${student.cgpa}</p>

                <p><strong>Email:</strong> ${student.email}</p>

            </div>
        `;

        // Show / Hide Details
        card.addEventListener("click", () => {

            const details = card.querySelector(".details");

            if (details.style.display === "none") {
                details.style.display = "block";
            } else {
                details.style.display = "none";
            }

        });

        container.appendChild(card);

    });

}

// Display all students initially
displayStudents(students);

// Search Function
const searchBox = document.getElementById("search");

searchBox.addEventListener("keyup", function () {

    const searchValue = this.value.toLowerCase();

    const filteredStudents = students.filter(student =>
        student.name.toLowerCase().includes(searchValue)
    );

    displayStudents(filteredStudents);

});
