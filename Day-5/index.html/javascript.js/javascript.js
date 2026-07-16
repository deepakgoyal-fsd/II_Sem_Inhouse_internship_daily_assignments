let students = [
    { name: "Mohit Soni", major: "B.Tech CSE ", year: "1st Year", location: "SKIT Jaipur" },
    { name: "Emma Smith", major: "Data Science", year: "2nd Year", location: "New York" },
    { name: "David Johnson", major: "Web Development", year: "3rd Year", location: "London" },
    { name: "Sophia Martinez", major: "Cybersecurity", year: "4th Year", location: "Madrid" },
    { name: "Piyush", major: "B.Tech CSE (AI)", year: "1st Year", location: "SKIT Jaipur" },
    { name: "Emma Smith", major: "Data Science", year: "2nd Year", location: "New York" },
    { name: "David Johnson", major: "Web Development", year: "3rd Year", location: "London" },
    { name: "Sophia Martinez", major: "Cybersecurity", year: "4th Year", location: "Madrid" }
];        

for (let i = 0; i < students.length; i++) {
    let cardHtml = '<div class="card">' +
                   '<h3 class="student-name">' + students[i].name + '</h3>' +
                   '<p>' + students[i].major + '</p>' +
                   '<button class="btn-details">Show Details</button>' +
                   '<div class="details">' +
                   '<p>Year: ' + students[i].year + '</p>' +
                   '<p>Campus: ' + students[i].location + '</p>' +
                   '</div>' +
                   '</div>';
                   
    $("#studentContainer").append(cardHtml);
}

$("#studentContainer").hide().fadeIn(1500);

$("#searchBox").on("keyup", function() {
    let searchValue = $(this).val().toLowerCase();
    
    $(".card").each(function() {
        let studentName = $(this).find(".student-name").text().toLowerCase();
        
        if (studentName.indexOf(searchValue) !== -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});

$(".btn-details").click(function() {
    let detailsSection = $(this).closest(".card").find(".details");
    
    detailsSection.slideToggle();
    
    if ($(this).text() === "Show Details") {
        $(this).text("Hide Details");
        $(this).css("background-color", "#e74c3c");
    } else {
        $(this).text("Show Details");
        $(this).css("background-color", "#2ecc71");
    }
});