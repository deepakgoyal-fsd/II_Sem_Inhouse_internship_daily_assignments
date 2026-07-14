fetch("https://jsonplaceholder.typicode.com/users")

.then(response => response.json())

.then(users => {

    let container = document.getElementById("container");

    users.forEach(user => {

        container.innerHTML += `

        <div class="card">

            <img src="https://i.pravatar.cc/150?img=${user.id}" alt="profile">

            <h2>${user.name}</h2>

            <p class="username">@${user.username}</p>

            <p class="email">${user.email}</p>

            <p class="phone">${user.phone}</p>

        </div>

        `;

    });

});