let users=[];

function display(data){

$("#count").text(data.length);

let cards="";

data.forEach(user=>{

cards+=`

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<img
src="https://i.pravatar.cc/150?img=${user.id}"
class="user-img">

<div class="card-body text-center">

<h4>${user.name}</h4>

<p>${user.email}</p>

<p>${user.phone}</p>

<h6>${user.company.name}</h6>

</div>

</div>

</div>

`;

});

$("#user-container").html(cards);

}

function loadUsers(){

$("#user-container").html(

`<h3 class="text-center">Loading Users...</h3>`

);

fetch("https://jsonplaceholder.typicode.com/users")

.then(res=>res.json())

.then(data=>{

users=data;

display(users);

})

.catch(()=>{

$("#user-container").html(`

<div class="text-center">

<h3 class="text-danger">
Unable to load users
</h3>

<button
class="btn btn-primary"
onclick="loadUsers()">

Retry

</button>

</div>

`);

});

}

loadUsers();

$("#search").on("keyup",function(){

let value=$(this).val().toLowerCase();

let filtered=users.filter(user=>

user.name.toLowerCase().includes(value)

);

display(filtered);

});

$("#sortBtn").click(function(){

users.sort((a,b)=>a.name.localeCompare(b.name));

display(users);

});