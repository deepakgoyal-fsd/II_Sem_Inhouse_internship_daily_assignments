const students = [
    { name: "Aarav Sharma", branch: "CSE", rollNo: "101", cgpa: 8.7, city: "Jaipur", skills: "HTML, CSS", image: 12 },
    { name: "Priya Singh", branch: "IT", rollNo: "102", cgpa: 9.1, city: "Delhi", skills: "JavaScript, Bootstrap", image: 47 },
    { name: "Rohan Verma", branch: "ECE", rollNo: "103", cgpa: 7.8, city: "Kota", skills: "C, Python", image: 33 },
    { name: "Neha Gupta", branch: "CSE AI", rollNo: "104", cgpa: 8.9, city: "Udaipur", skills: "HTML, JavaScript", image: 44 },
    { name: "Aditya Meena", branch: "Mechanical", rollNo: "105", cgpa: 7.6, city: "Ajmer", skills: "AutoCAD, C++", image: 15 },
    { name: "Kavya Joshi", branch: "CSE DS", rollNo: "106", cgpa: 9.3, city: "Bikaner", skills: "Python, SQL", image: 49 },
    { name: "Arjun Kumar", branch: "Civil", rollNo: "107", cgpa: 8.2, city: "Jodhpur", skills: "Surveying, AutoCAD", image: 68 },
    { name: "Simran Kaur", branch: "IT", rollNo: "108", cgpa: 8.5, city: "Chandigarh", skills: "CSS, React Basics", image: 32 }
];

function createStudentCards() {
    let html = "";

    for (let i = 0; i < students.length; i++) {
        const student = students[i];
        const cgpaClass = student.cgpa > 8 ? "cgpa-high" : "cgpa-normal";
        const alternateClass = i % 2 === 0 ? "alternate-card" : "";

        html += `
            <div class="col-sm-6 col-lg-3 student-item">
                <article class="card student-card ${alternateClass}" data-search="${student.name} ${student.branch} ${student.rollNo}">
                    <div class="card-body text-center p-4">
                        <span class="badge serial-badge float-start">#${i + 1}</span>
                        <img class="student-photo" src="https://i.pravatar.cc/200?img=${student.image}" alt="${student.name}">
                        <h3 class="student-name">${student.name}</h3>
                        <p class="student-basic">${student.branch} | Roll No: ${student.rollNo}</p>
                        <span class="badge ${cgpaClass}">CGPA: ${student.cgpa}</span>
                        <button class="details-btn d-block w-100 mt-3" type="button">Show Details</button>
                        <div class="details">
                            <p><strong>City:</strong> ${student.city}</p>
                            <p><strong>Skills:</strong> ${student.skills}</p>
                            <p><strong>Status:</strong> Active Student</p>
                        </div>
                    </div>
                </article>
            </div>`;
    }

    $("#studentContainer").html(html);
    $("#studentCount").text(`${students.length} Students`);
}

$(document).ready(function () {
    createStudentCards();
    $("#studentContainer").hide().fadeIn(500);

    $("#search").on("input", function () {
        const value = $(this).val().toLowerCase().trim();
        let visibleCards = 0;

        $(".student-item").each(function () {
            const text = $(this).find(".student-card").data("search").toLowerCase();
            const matches = text.includes(value);

            $(this).toggle(matches);
            if (matches) {
                visibleCards++;
            }
        });

        $("#studentCount").text(`${visibleCards} Student${visibleCards === 1 ? "" : "s"}`);
        $("#emptyMessage").prop("hidden", visibleCards !== 0);
    });

    $("#studentContainer").on("click", ".details-btn", function () {
        const button = $(this);
        const details = button.closest(".student-card").find(".details");

        details.stop(true, true).slideToggle(250);
        button.toggleClass("open");
        button.text(button.hasClass("open") ? "Hide Details" : "Show Details");
    });

    $("#modeBtn").on("click", function () {
        $("body").toggleClass("dark");
        $(this).text($("body").hasClass("dark") ? "Light Mode" : "Dark Mode");
    });
});
