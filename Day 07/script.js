const myProfile = {
    name: "Chirag",
    branch: "CSE",
    cgpa: 9.77,
    skills: ["JavaScript", "React", "Node"],
    city: "Jaipur"
};

const stringifiedProfile = JSON.stringify(myProfile);
console.log(stringifiedProfile);
const parsedProfile = JSON.parse(stringifiedProfile);
console.log(parsedProfile);

const classmates = [
    {
        name: "Aarav",
        branch: "ECE",
        cgpa: 9.1,
        skills: ["C++", "Python", "IoT"],
        city: "Delhi"
    },
    {
        name: "Daksh",
        branch: "CSE",
        cgpa: 8.9,
        skills: ["Java", "AWS", "SQL"],
        city: "Mumbai"
    },
    {
        name: "Rohan",
        branch: "IT",
        cgpa: 8.2,
        skills: ["PHP", "Vue", "CSS"],
        city: "Pune"
    }
];

console.log(JSON.stringify(classmates, null, 2));

let allUsers = [];
let sortAsc = true;

function loadUsers() {
    $('#user-container').html('<div class="col-12 text-center py-5"><div class="spinner-border text-info" role="status"></div><p class="mt-2 text-white">⏳ Loading users...</p></div>');
    $('#userCountBadge').text('Loading...');
    
    setTimeout(() => {
        fetch('https://jsonplaceholder.typicode.com/users')
            .then(res => {
                if (!res.ok) {
                    throw new Error('Network error');
                }
                return res.json();
            })
            .then(data => {
                data.forEach(user => {
                    console.log(user.name, user.email, user.company.name);
                });
                console.log("Total users: " + data.length);
                const usernames = data.map(user => user.username);
                console.log(usernames);
                
                allUsers = data;
                renderCards(allUsers);
            })
            .catch(err => {
                $('#user-container').html(`
                    <div class="col-12 text-center py-5">
                        <p class="text-danger fs-4">❌ Unable to load users.</p>
                        <button class="btn btn-danger mt-2" onclick="loadUsers()">Retry</button>
                    </div>
                `);
                $('#userCountBadge').text('Error');
            });
    }, 500);
}

function renderCards(usersToRender) {
    let cardsHtml = '';
    
    usersToRender.forEach((user, index) => {
        const bgClass = (index % 2 === 0) ? 'bg-teal' : 'bg-default';
        const photoUrl = `https://i.pravatar.cc/150?img=${user.id}`;
        
        cardsHtml += `
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 text-center p-4 text-white ${bgClass}">
                    <img src="${photoUrl}" alt="${user.name}" class="avatar-img">
                    <h4 class="mb-1">${user.name}</h4>
                    <p class="mb-1 opacity-75">${user.email}</p>
                    <p class="mb-3 opacity-75 fw-bold text-info">${user.company.name}</p>
                </div>
            </div>
        `;
    });
    
    if (usersToRender.length === 0) {
        cardsHtml = '<div class="col-12 text-center py-5"><p class="text-warning fs-4">No users found.</p></div>';
    }
    
    $('#user-container').html(cardsHtml);
    $('#userCountBadge').text(`Showing ${usersToRender.length} users`);
}

$('#searchInput').on('input', function() {
    const searchTerm = $(this).val().toLowerCase();
    const filtered = allUsers.filter(user => user.name.toLowerCase().includes(searchTerm));
    renderCards(filtered);
});

$('#sortBtn').on('click', function() {
    sortAsc = !sortAsc;
    $(this).text(sortAsc ? 'Sort Alphabetically A-Z' : 'Sort Alphabetically Z-A');
    
    allUsers.sort((a, b) => {
        if (a.name < b.name) return sortAsc ? -1 : 1;
        if (a.name > b.name) return sortAsc ? 1 : -1;
        return 0;
    });
    
    const searchTerm = $('#searchInput').val().toLowerCase();
    const filtered = allUsers.filter(user => user.name.toLowerCase().includes(searchTerm));
    renderCards(filtered);
});

$(document).ready(function() {
    loadUsers();
});