const students = [
    { name: "Jai Sharma", branch: "Computer Science", roll: "C-29" },
    { name: "Jatin jangid", branch: "Computer Science", roll: "C-32" },
    { name: "Amit Kumar", branch: "Information Technology", roll: "I-05" }
];

const studentCardRow = document.getElementById("studentCardRow");

for (let i = 0; i < students.length; i++) {
    let student = students[i];

    let cardTemplate = `
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">${student.name}</h5>
                    <p class="card-text">Branch: ${student.branch}</p>
                    <p class="card-text text-muted">Roll No: ${student.roll}</p>
                </div>
            </div>
        </div>
    `;

    studentCardRow.innerHTML = studentCardRow.innerHTML + cardTemplate;
}