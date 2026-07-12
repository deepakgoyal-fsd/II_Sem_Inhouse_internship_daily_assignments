const studentContainer = document.getElementById("studentContainer");

function renderStudents(studentList = students) {

    studentContainer.innerHTML = "";

    studentList.forEach(student => {

        const skills = student.skills
            .map(skill => `<span class="badge bg-primary me-1">${skill}</span>`)
            .join("");

        const favoriteIcon = student.favorite
            ? "fa-solid fa-heart text-danger"
            : "fa-regular fa-heart";

        const progress = (student.cgpa / 10) * 100;

        const card = `

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card student-card h-100">

                <img
                    src="${student.image}"
                    class="card-img-top"
                    alt="${student.name}">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-2">

                        <h4 class="mb-0">

                            ${student.name}

                            <i class="fa-solid fa-circle-check text-primary ms-1"></i>

                        </h4>

                        <i
                            class="${favoriteIcon} favorite-btn"
                            data-id="${student.id}"
                            style="font-size:24px;cursor:pointer;">
                        </i>

                    </div>

                    <p><strong>Department:</strong> ${student.department}</p>

                    <p><strong>Year:</strong> ${student.year}</p>

                    <p class="mb-1">

                        <strong>CGPA:</strong>

                        ${student.cgpa}/10

                    </p>

                    <div class="progress mb-3" style="height:8px;">

                        <div
                            class="progress-bar bg-success"
                            style="width:${progress}%">

                        </div>

                    </div>

                    <div
                        class="student-details"
                        id="details-${student.id}"
                        style="display:none;">

                        <hr>

                        <p><strong>City:</strong> ${student.city}</p>

                        <p><strong>Email:</strong> ${student.email}</p>

                        <p><strong>Phone:</strong> ${student.phone}</p>

                       
                        <p><strong>Skills:</strong></p>

                        <div class="mb-3">

                            ${skills}

                        </div>

                    </div>

                    <div class="d-grid gap-2">

                        <button
                            class="btn btn-primary view-btn"
                            data-id="${student.id}">

                            <i class="fa-solid fa-eye"></i>

                            View Details

                        </button>

                        <button
                            class="btn btn-warning edit-btn"
                            data-id="${student.id}">

                            <i class="fa-solid fa-pen"></i>

                            Edit

                        </button>

                        <button
                            class="btn btn-danger delete-btn"
                            data-id="${student.id}">

                            <i class="fa-solid fa-trash"></i>

                            Delete

                        </button>

                    </div>

                </div>

            </div>

        </div>

        `;

        studentContainer.innerHTML += card;

    });

}

function updateDashboard() {

    document.getElementById("studentCount").textContent = students.length;

    document.getElementById("favoriteCount").textContent =
        students.filter(student => student.favorite).length;

    document.getElementById("departmentCount").textContent =
        [...new Set(students.map(student => student.department))].length;

    const average = (
        students.reduce((sum, student) => sum + student.cgpa, 0)
        / students.length
    ).toFixed(2);

    document.getElementById("averageCgpa").textContent = average;

    const topStudent = students.reduce((best, current) =>
        current.cgpa > best.cgpa ? current : best
    );

    document.getElementById("topStudent").innerHTML = `

        <div class="d-flex align-items-center">

            <img
                src="${topStudent.image}"
                width="80"
                height="80"
                class="rounded-circle me-3">

            <div>

                <h4>${topStudent.name}</h4>

                <p>${topStudent.department}</p>

                <h5 class="text-success">

                    CGPA ${topStudent.cgpa}

                </h5>

            </div>

        </div>

    `;

}

renderStudents();

updateDashboard();