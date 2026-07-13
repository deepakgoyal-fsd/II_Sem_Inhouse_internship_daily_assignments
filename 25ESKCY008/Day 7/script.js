let usersDiv = document.getElementById("users");
let allUsers;
let filteredUsers;
let loading = document.getElementById("loading");
let searchInput = document.getElementById("searchInput");

loading.innerHTML = "Loading Users...";
fetch("users.json")
.then(function(response){
    if (!response.ok) {
        throw new Error("Failed to fetch users");
    }
    return response.json();
})

.then (function(data){
    allUsers = data;
    displayUsers(allUsers);
    
})

.catch(function(error){
    loading.innerHTML = "";
    usersDiv.innerHTML = `<h3>Failed to load users</h3>`;
    console.log(error);
})

function displayUsers(users){
    loading.innerHTML = "";
    usersDiv.innerHTML = "";
    for(let i = 0; i <users.length; i++){
        usersDiv.innerHTML += ` 
        <div class = "col-md-4 mb-4">
            <div class = "card h-100 shadow">
                <img src="https://ui-avatars.com/api/?name=${users[i].name}&background=random&size=150"
                class="card-img-top rounded-circle w-50 mx-auto mt-3">
                <div class = "card-body">
                    <h5 class = "card-title">${users[i].name}</h5>
                    <p class = "card-text">Email Id: ${users[i].email}</p>
                    <p class = "card-text">City: ${users[i].address.city}</p>
                </div>
            </div>
        </div>
        `
    }
}

searchInput.addEventListener("input",function(){
    console.log(searchInput.value);
    filteredUsers = allUsers.filter(function(users){
        return ((users.name).toLowerCase()).includes((searchInput.value).toLowerCase());
    });
    displayUsers(filteredUsers);
});