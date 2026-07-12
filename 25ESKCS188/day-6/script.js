function loadUsers(){

$("#user-container").html(

'<div class="loading">⏳ Loading users...</div>'

);

fetch("https://jsonplaceholder.typicode.com/users")

.then(function(response){

if(!response.ok){

throw new Error("Error");

}

return response.json();

})

.then(function(data){

setTimeout(function(){

$("#user-container").html("");

$("#totalUsers").text("Showing " + data.length + " users");

console.log("Total Users : " + data.length);

const usernames=data.map(user=>user.username);

console.log(usernames);

data.forEach(function(user,index){

console.log(user.name);

console.log(user.email);

console.log(user.company.name);

let color="";

if(index%2==0){

color="even";

}

let card=`

<div class="col-md-4">

<div class="card p-3 shadow ${color}">

<img src="https://i.pravatar.cc/150?img=${user.id}">

<div class="card-body text-center">

<h4>${user.name}</h4>

<p>${user.email}</p>

<p>${user.company.name}</p>

</div>

</div>

</div>

`;

$("#user-container").append(card);

});

},500);

})

.catch(function(){

$("#user-container").html(

`<div class="error">

❌ Unable to load users.

<br><br>

<button class="btn btn-danger"

onclick="loadUsers()">

Retry

</button>

</div>`

);

});

}

loadUsers();