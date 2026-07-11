$(document).ready(function () {

    let totalStudents = 0;

    // ==========================
    // Welcome Button
    // ==========================
    $("#welcomeBtn").click(function () {
        $("#message")
            .hide()
            .html("🎉 Welcome to Student Directory Project 🎓")
            .fadeIn(1000);
    });

    // ==========================
    // Add Student
    // ==========================
    $("#studentForm").submit(function (e) {
        e.preventDefault();

        let name = $("#name").val().trim();
        let roll = $("#roll").val().trim();
        let course = $("#course").val().trim();
        let city = $("#city").val().trim();

        if (name == "" || roll == "" || course == "" || city == "") {
            alert("Please fill all fields.");
            return;
        }

        let row = `
        <tr>
            <td>${name}</td>
            <td>${roll}</td>
            <td>${course}</td>
            <td>${city}</td>
            <td>
                <button class="btn btn-danger btn-sm deleteBtn">
                    Delete
                </button>
            </td>
        </tr>`;

        $("#studentTable tbody").append(row);

        totalStudents++;
        $("#count").text(totalStudents);

        $("#studentForm")[0].reset();

        alert("Student Added Successfully!");
    });

    // ==========================
    // Delete Student
    // ==========================
    $("#studentTable").on("click", ".deleteBtn", function () {

        if (confirm("Delete this student?")) {

            $(this).closest("tr").fadeOut(500, function () {
                $(this).remove();

                totalStudents--;

                if (totalStudents < 0) {
                    totalStudents = 0;
                }

                $("#count").text(totalStudents);
            });

        }

    });

    // ==========================
    // Live Search
    // ==========================
    $("#search").keyup(function () {

        let value = $(this).val().toLowerCase();

        $("#studentTable tbody tr").filter(function () {

            $(this).toggle(
                $(this).text().toLowerCase().indexOf(value) > -1
            );

        });

    });

    // ==========================
    // Hide Table
    // ==========================
    $("#hideTable").click(function () {
        $("#studentTable").hide(700);
    });

    // ==========================
    // Show Table
    // ==========================
    $("#showTable").click(function () {
        $("#studentTable").show(700);
    });

    // ==========================
    // Fade Table
    // ==========================
    $("#fadeBtn").click(function () {
        $("#studentTable").fadeToggle(800);
    });

    // ==========================
    // Slide Form
    // ==========================
    $("#slideBtn").click(function () {
        $(".card-body").slideToggle();
    });

    // ==========================
    // Dark Mode
    // ==========================
    $("#darkMode").click(function () {

        $("body").toggleClass("dark");

        if ($("body").hasClass("dark")) {

            $(this).html("☀️ Light Mode");

        } else {

            $(this).html("🌙 Dark Mode");

        }

    });

    // ==========================
    // Highlight Rows
    // ==========================
    $("#highlightBtn").click(function () {

        $("#studentTable tbody tr").toggleClass("highlight");

    });

    // ==========================
    // Row Click Animation
    // ==========================
    $("#studentTable").on("click", "tr", function () {

        $(this).animate({
            opacity: 0.6
        }, 150).animate({
            opacity: 1
        }, 150);

    });

});