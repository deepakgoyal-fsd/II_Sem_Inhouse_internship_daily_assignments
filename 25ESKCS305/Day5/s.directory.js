var students = [
  { name: "Kanishka Sharma", branch: "Computer Science", cgpa: "8.9" },
  { name: "Akshita Mishra", branch: "Electronics", cgpa: "9.2" },
  { name: "Shinchan", branch: "Mechanical", cgpa: "7.8" },
  { name: "Ben Tennyson", branch: "Civil", cgpa: "8.1" },
  { name: "Kaashvi Singh", branch: "Information Technology", cgpa: "8.6" }
];

function renderStudents(filter = "") {
  var filteredStudents = students.filter(function(student) {
    return student.name.toLowerCase().includes(filter.toLowerCase());
  });

  document.getElementById("totalStudents").innerHTML = "Total Students: " + filteredStudents.length;

  var cardsHTML = "";

  for (var i = 0; i < filteredStudents.length; i++) {
    cardsHTML += '<div class="col-md-4">';
    cardsHTML += '<div class="card student-card">';
    cardsHTML += '<div class="card-body">';
    cardsHTML += '<span class="badge bg-primary badge-number">' + (i + 1) + '</span>';
    cardsHTML += '<h5 class="card-title">' + filteredStudents[i].name + '</h5>';
    cardsHTML += '<button class="btn btn-secondary showBtn" data-index="' + i + '">Show Details</button>';
    cardsHTML += '<div class="hidden-details mt-2" id="details' + i + '">';
    cardsHTML += '<p>Branch: ' + filteredStudents[i].branch + '</p>';
    cardsHTML += '<p>CGPA: ' + filteredStudents[i].cgpa + '</p>';
    cardsHTML += '</div>';
    cardsHTML += '</div></div></div>';
  }

  document.getElementById("cardContainer").innerHTML = cardsHTML;
}

renderStudents();

$(document).on("input", "#searchInput", function () {
  renderStudents($(this).val());
});

$(document).on("click", ".showBtn", function () {
  var index = $(this).data("index");
  var details = $("#details" + index);

  if (details.is(":visible")) {
    details.slideUp();
    $(this).text("Show Details");
    $(this).css("background-color", "grey");
  } else {
    details.slideDown();
    $(this).text("Hide Details");
    $(this).css("background-color", "green");
  }
});
