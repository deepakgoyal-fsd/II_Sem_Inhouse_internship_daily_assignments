// ==========================================
// TASK 3: Objects Mission & Code Challenge
// ==========================================

const myProfile = {
    name: "Chirag",
    branch: "CSE",
    year: 2,
    cgpa: 9.77,
    city: "Jaipur",
    skills: ["JavaScript", "HTML", "CSS", "Python", "C/C++"],
    hobbies: ["Coding", "Reading", "Gaming"]
};

// Print a natural-sounding sentence using template literals
console.log(`I am ${myProfile.name} from ${myProfile.branch}, Year ${myProfile.year}, CGPA ${myProfile.cgpa}. Currently in ${myProfile.city}.`);

// Stretch Goal: Print the top skill
console.log(`My top skill is: ${myProfile.skills[0]}`);

// ==========================================
// TASK 1 & 2: Student Directory & jQuery
// ==========================================

// Sample student data
const students = [
    myProfile, // Including the profile from Task 3
    {
        name: "Aarav",
        branch: "ECE",
        year: 3,
        cgpa: 9.1,
        city: "Delhi",
        skills: ["C++", "Embedded Systems", "IoT"],
        hobbies: ["Photography", "Traveling"]
    },
    {
        name: "Daksh",
        branch: "CSE",
        year: 4,
        cgpa: 8.9,
        city: "Mumbai",
        skills: ["Java", "Spring Boot", "AWS"],
        hobbies: ["Painting", "Music"]
    },
    {
        name: "Rohan",
        branch: "ECE",
        year: 1,
        cgpa: 8.2,
        city: "Pune",
        skills: ["Python", "Data Analysis", "SQL"],
        hobbies: ["Football", "Movies"]
    },
    {
        name: "Rohit",
        branch: "Mechanical",
        year: 2,
        cgpa: 7.8,
        city: "Bangalore",
        skills: ["AutoCAD", "SolidWorks", "MATLAB"],
        hobbies: ["Sketching", "Badminton"]
    }
];

// Function to generate student cards
function renderStudents(studentsToRender) {
    const container = $("#studentContainer");
    container.empty();

    if (studentsToRender.length === 0) {
        container.append('<div class="no-results">No students found matching your search.</div>');
        return;
    }

    studentsToRender.forEach(student => {
        // Get initials for avatar
        const initials = student.name.substring(0, 2).toUpperCase();
        
        // Generate skills tags HTML
        const skillsHtml = student.skills.map(skill => `<span class="skill-tag">${skill}</span>`).join(', ');
        
        // Generate hobbies tags HTML
        const hobbiesHtml = student.hobbies.map(hobby => `<span class="skill-tag" style="background: rgba(16, 185, 129, 0.2); color: #29342f;">${hobby}</span>`).join(', ');

        const cardHtml = `
            <div class="card">
                <div class="card-header">
                    <div class="basic-info">
                        <h2>${student.name}</h2>
                        <p>${student.branch}, Year ${student.year}</p>
                    </div>
                </div>
                
                <div class="details">
                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="detail-label">CGPA</span>
                            <span class="detail-value">${student.cgpa}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">City</span>
                            <span class="detail-value">${student.city}</span>
                        </div>
                    </div>
                    
                    <div class="skills-container">
                        <div class="skills-label">Top Skills</div>
                        <div class="skills-list">
                            ${skillsHtml}
                        </div>
                    </div>
                    
                    <div class="skills-container">
                        <div class="skills-label">Hobbies</div>
                        <div class="skills-list">
                            ${hobbiesHtml}
                        </div>
                    </div>
                </div>
                
                <button class="btn-details">Show Details</button>
            </div>
        `;
        
        container.append(cardHtml);
    });
}

// jQuery Document Ready
$(document).ready(function() {
    // Bonus: fadeIn() animation when page loads
    $(".container").fadeIn(1000);

    // Initial render
    renderStudents(students);

    // Event delegation for dynamically created buttons
    $("#studentContainer").on("click", ".btn-details", function() {
        const $btn = $(this);
        const $details = $btn.closest(".card").find(".details");
        
        // jQuery Mission: slideToggle()
        $details.slideToggle(300, function() {
            // Check if details are visible after toggle completes
            if ($details.is(":visible")) {
                // Change Button Text
                $btn.text("Hide Details");
                // Animate Color: Change background color using .css()
                $btn.css({
                    "background-color": "var(--accent-hover)",
                    "color": "white"
                });
            } else {
                // Change Button Text
                $btn.text("Show Details");
                // Revert Color
                $btn.css({
                    "background-color": "var(--button-bg)",
                    "color": "var(--text-primary)"
                });
            }
        });
    });

    // Real-time Search Box
    $("#searchInput").on("input", function() {
        const searchTerm = $(this).val().toLowerCase();
        
        const filteredStudents = students.filter(student => {
            return student.name.toLowerCase().includes(searchTerm);
        });
        
        renderStudents(filteredStudents);
    });
});