function displayStudents(data){

    $("#studentContainer").html("");

    data.forEach(student=>{

        $("#studentContainer").append(`

        <div class="card">

            <div class="watermark">${student.name}</div>

            <img src="${student.photo}" class="photo">

            <h2>${student.name}</h2>

            <p class="branch">${student.branch}</p>

            <button class="show">
            Show Details
            </button>

            <div class="details">

                <p><b>👤 Name :</b> ${student.name}</p>

                <p><b>🆔 Roll No :</b> ${student.roll}</p>

                <p><b>📚 Year :</b> ${student.year}</p>

                <p><b>🏫 Branch :</b> ${student.branch}</p>

                <p><b>📧 Email :</b> ${student.email}</p>

                <p><b>📱 Phone :</b> ${student.phone}</p>

            </div>

        </div>

        `);

    });

}

// Display all students
displayStudents(students);

// Search Student
$("#search").on("keyup",function(){

let value=$(this).val().toLowerCase();

let filtered=students.filter(student=>{

return student.name.toLowerCase().includes(value) ||
student.branch.toLowerCase().includes(value) ||
student.roll.toLowerCase().includes(value);

});

displayStudents(filtered);

});

// Show/Hide Details
$(document).on("click",".show",function(){

$(this).next(".details").slideToggle(500);

if($(this).text()=="Show Details"){

$(this).text("Hide Details");

}else{

$(this).text("Show Details");

}

});

// Card Animation
$(document).ready(function(){

$(".card").hide().fadeIn(1000);

});