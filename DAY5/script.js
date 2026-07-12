const userContainer=document.getElementById("userContainer");
const loading=document.getElementById("loading");
const error=document.getElementById("error");

fetch("https://jsonplaceholder.typicode.com/users")

.then(response=>{

if(!response.ok){
throw new Error("Failed to fetch users");
}

return response.json();

})

.then(users=>{

loading.style.display="none";

users.forEach(user=>{

userContainer.innerHTML+=`

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<div class="card-body">

<h5 class="card-title">${user.name}</h5>

<p><strong>Username :</strong> ${user.username}</p>

<p><strong>Email :</strong> ${user.email}</p>

<p><strong>Phone :</strong> ${user.phone}</p>

<p><strong>Website :</strong> ${user.website}</p>

<p><strong>Company :</strong> ${user.company.name}</p>

</div>

</div>

</div>

`;

});

})

.catch(err=>{

loading.style.display="none";

error.innerHTML=err.message;

});