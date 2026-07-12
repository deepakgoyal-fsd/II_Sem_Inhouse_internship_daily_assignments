fetch("https://jsonplaceholder.typicode.com/users")
.then(res=>res.json())
.then(data=>{

    $("#count").text(`Showing ${data.length} Users`);

    let cards="";

    data.forEach((user,index)=>{

        let bg = index%2==0 ? "even-card" : "";

        cards +=`

        <div class="col-md-4 mb-4">

            <div class="card h-100 ${bg}">

                <img src="https://i.pravatar.cc/150?img=${user.id}" class="user-img">

                <div class="card-body text-center">

                    <h4>${user.name}</h4>

                    <p>${user.email}</p>

                    <h6>${user.company.name}</h6>

                </div>

            </div>

        </div>

        `;
    });

    $("#user-container").html(cards);

});