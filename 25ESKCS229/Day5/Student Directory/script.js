var students = [
  { name: "Nobita Nobi", branch: "Computer Science", cgpa: "8.9" },
  { name: "Shizuka Minamoto", branch: "Electronics", cgpa: "9.2" },
  { name: "Suneo Honekawa", branch: "Mechanical", cgpa: "7.8" },
  { name: "Hidetoshi Dekisugi", branch: "Civil", cgpa: "8.1" },
  { name: "Takeshi Gian Goda", branch: "Information Technology", cgpa: "8.6" }
];

document.getElementById("totalStudents").innerHTML = "Total Students: " + students.length;

var cardsHTML = "";

for (var i = 0; i < students.length; i++) {
  cardsHTML += '<div class="col-md-4">';
  cardsHTML += '<div class="card student-card">';
  cardsHTML += '<div class="card-body">';
  cardsHTML += '<span class="badge bg-primary badge-number">' + (i + 1) + '</span>';
  cardsHTML += '<h5 class="card-title">' + students[i].name + '</h5>';
  cardsHTML += '<button class="btn btn-secondary showBtn" data-index="' + i + '">Show Details</button>';
  cardsHTML += '<div class="hidden-details mt-2" id="details' + i + '">';
  cardsHTML += '<p>Branch: ' + students[i].branch + '</p>';
  cardsHTML += '<p>CGPA: ' + students[i].cgpa + '</p>';
  cardsHTML += '</div>';
  cardsHTML += '</div></div></div>';
}


document.getElementById("cardContainer").innerHTML = cardsHTML;

$(document).on("click", ".showBtn", function () {
  var index = $(this).data("index");
  var details = $("#details" + index);

  if (details.is(":visible")) {
    details.slideUp();
    $(this).text("Show Details");
    $(this).css("background-color", "gray");
  } else {
    details.slideDown();
    $(this).text("Hide Details");
    $(this).css("background-color", "green");
  }
});
