fetch("https://jsonplaceholder.typicode.com/users")

.then(res=>res.json())

.then(data=>{

    console.log(data);

    let html="";

    for(let i=0;i<data.length;i++)
    {

        html+=`

        <div class="col-md-4">

            <div class="card shadow">

                <img src="https://i.pravatar.cc/150?img=${i+1}" class="rounded-circle">

                <div class="card-body">

                    <h4 class="card-title">
                        ${data[i].name}
                    </h4>

                    <p>

                        <strong>Username :</strong>

                        ${data[i].username}

                    </p>

                    <button class="btn btn-primary btn-sm">

                        Show Details

                    </button>

                    <div class="details mt-3">

                        <p>

                            <strong>Email :</strong>

                            ${data[i].email}

                        </p>

                        <p>

                            <strong>Phone :</strong>

                            ${data[i].phone}

                        </p>

                        <p>

                            <strong>Website :</strong>

                            ${data[i].website}

                        </p>

                        <p>

                            <strong>Company :</strong>

                            ${data[i].company.name}

                        </p>

                    </div>

                </div>

            </div>

        </div>

        `;

    }

    document.getElementById("container").innerHTML=html;

});

$(document).on("click",".btn",function(){

    $(this).next(".details").slideToggle();

});
