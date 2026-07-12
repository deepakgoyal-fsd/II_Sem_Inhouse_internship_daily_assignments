
let users=[];


// Fetch API

function getUsers(){


$("#loading").show();



fetch("https://jsonplaceholder.typicode.com/users")


.then(function(response){


return response.json();


})


.then(function(data){


users=data;


displayUsers(users);


$("#loading").hide();



})


.catch(function(error){


$("#loading").html("Something went wrong. Retry Again");

console.log(error);



});


}





// Display Users


function displayUsers(data){



$("#userContainer").html("");



$("#count").text(data.length);



// No user found


if(data.length==0){


$("#userContainer").html(`

<h3 class="text-center mt-5">

No User Found

</h3>


`);


return;


}




data.forEach(function(user){



let card=`

<div class="col-md-4 mb-4">


<div class="card text-center">


<img src="https://i.pravatar.cc/150?img=${user.id}">



<div class="card-body">


<h4>${user.name}</h4>


<p>📧 ${user.email}</p>


<p>📞 ${user.phone}</p>


<p>🏢 ${user.company.name}</p>



</div>


</div>


</div>


`;



$("#userContainer").append(card);



});


}





// Search Users


$("#searchBox").keyup(function(){



let value=$(this).val().toLowerCase();



let filtered=users.filter(function(user){



return user.name.toLowerCase().includes(value);



});



displayUsers(filtered);



});







// Sort A-Z


$("#sortBtn").click(function(){



users.sort(function(a,b){


return a.name.localeCompare(b.name);



});



displayUsers(users);



});




// Start


getUsers();
