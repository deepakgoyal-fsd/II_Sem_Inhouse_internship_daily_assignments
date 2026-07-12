let editStudentId = null;
$(document).on("click", ".view-btn", function () {

    let id = $(this).data("id");

    $("#details-" + id).slideToggle(300);

    if ($(this).html().includes("View")) {

        $(this).html('<i class="fa-solid fa-eye-slash"></i> Hide Details');

    } else {

        $(this).html('<i class="fa-solid fa-eye"></i> View Details');

    }

});

console.log(document.getElementById("addStudentModal"));

const modal = new bootstrap.Modal(document.getElementById("addStudentModal"));

$("#addStudentBtn").click(function () {

    modal.show();

});

$("#saveStudent").click(function () {

    console.log($("#city").val());
console.log($("#email").val());
console.log($("#phone").val());
    const student = {

        id: editStudentId ?? students.length + 1,

        name: $("#name").val(),

        city: $("#city").val(),

        email: $("#email").val(),

        phone: $("#phone").val(),

        department: $("#department").val(),

        year: Number($("#year").val()),

        cgpa: Number($("#cgpa").val()),

        image: $("#image").val(),

        skills: ["HTML","CSS","JavaScript"],

        favorite:false

    };

    if(editStudentId===null){

        console.log(student);
        
        students.push(student);
        saveStudents();

    }

    else{

        const index=students.findIndex(s=>s.id===editStudentId);

        student.favorite=students[index].favorite;

        student.skills=students[index].skills;

        students[index]=student;
        saveStudents();

    }

    renderStudents();

    updateDashboard();

    modal.hide();

    editStudentId=null;

    $("#addStudentModal input").val("");

});

$(document).on("click", ".delete-btn", function () {

    let id = $(this).data("id");

    if (confirm("Are you sure you want to delete this student?")) {

        const index = students.findIndex(student => student.id === id);

        if (index !== -1) {

            students.splice(index, 1);
            saveStudents();

            renderStudents();

            updateDashboard();

        }

    }

});

$(document).on("click",".edit-btn",function(){

    editStudentId=$(this).data("id");

    const student=students.find(s=>s.id===editStudentId);

    $("#name").val(student.name);

    $("#city").val(student.city);

    $("#email").val(student.email);

    $("#phone").val(student.phone);

    $("#department").val(student.department);

    $("#year").val(student.year);

    $("#cgpa").val(student.cgpa);

    $("#image").val(student.image);

    $(".modal-title").text("Edit Student");

    $("#saveStudent").text("Update Student");

    modal.show();

});

$("#addStudentModal").on("hidden.bs.modal",function(){

    editStudentId=null;

    $(".modal-title").text("Add Student");

    $("#saveStudent").text("Save Student");

    $("#addStudentModal input").val("");

});

$(document).on("click", ".favorite-btn", function () {

    let id = $(this).data("id");

    const student = students.find(student => student.id === id);

    student.favorite = !student.favorite;
    saveStudents();

    renderStudents();

    updateDashboard();

});

$("#searchInput").on("keyup", function () {

    let value = $(this).val().toLowerCase();

    const filtered = students.filter(student =>

        student.name.toLowerCase().includes(value) ||

        student.department.toLowerCase().includes(value)

    );

    renderStudents(filtered);

});

$("#departmentFilter").change(function () {

    let department = $(this).val();

    if (department === "All Departments") {

        renderStudents();

        return;

    }

    const filtered = students.filter(student =>

        student.department === department

    );

    renderStudents(filtered);

});
$("#sortStudents").change(function () {

    let value = $(this).val();

    let sorted = [...students];

    switch (value) {

        case "A-Z":

            sorted.sort((a, b) => a.name.localeCompare(b.name));

            break;

        case "Z-A":

            sorted.sort((a, b) => b.name.localeCompare(a.name));

            break;

        case "Highest CGPA":

            sorted.sort((a, b) => b.cgpa - a.cgpa);

            break;

        case "Lowest CGPA":

            sorted.sort((a, b) => a.cgpa - b.cgpa);

            break;

    }

    renderStudents(sorted);

});

const ctx = document.getElementById("cgpaChart");

if (ctx) {

    new Chart(ctx, {

        type: "bar",

        data: {

            labels: students.map(student => student.name),

            datasets: [{

                label: "CGPA",

                data: students.map(student => student.cgpa)

            }]

        },

        options: {

            scales: {

                y: {

                    beginAtZero: true,

                    max: 10

                }

            }

        }

    });

}

function saveStudents(){

    localStorage.setItem(

        "students",

        JSON.stringify(students)

    );

}

$("#exportPDF").click(function () {

    const { jsPDF } = window.jspdf;

    const doc = new jsPDF();

    doc.setFontSize(18);
    doc.text("CampusConnect Student Report", 20, 20);

    let y = 40;

    students.forEach((student, index) => {

        doc.setFontSize(12);

        doc.text(
            `${index + 1}. ${student.name}
Department: ${student.department}
CGPA: ${student.cgpa}
City: ${student.city}
Email: ${student.email}
Phone: ${student.phone}`,
            20,
            y
        );

        y += 35;

        if (y > 260) {

            doc.addPage();

            y = 20;

        }

    });

    doc.save("CampusConnect-Students.pdf");

});

function showToast(message){

    $("#toastBody").text(message);

    const toast=new bootstrap.Toast(document.getElementById("liveToast"));

    toast.show();

}

// Dark Mode

$("#darkModeBtn").click(function(){

    $("body").toggleClass("dark-mode");

    if($("body").hasClass("dark-mode")){

        localStorage.setItem("theme","dark");

    }

    else{

        localStorage.setItem("theme","light");

    }

});

// Load Theme

if(localStorage.getItem("theme")=="dark"){

    $("body").addClass("dark-mode");

}