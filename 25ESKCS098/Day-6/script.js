let photos = [];

loadPhotos();

function loadPhotos(){

    $("#user-container").html(

    '<div class="loading">Loading Photos...</div>'

    );

    setTimeout(function(){

        fetch("https://jsonplaceholder.typicode.com/photos?_limit=30")

        .then(response=>response.json())

        .then(data=>{

            photos=data;

            displayPhotos(photos);

        })

        .catch(function(){

            $("#user-container").html(

            `<div class="error">

            <h4>Unable to load photos.</h4>

            <button class="btn btn-primary mt-3"

            onclick="loadPhotos()">

            Retry

            </button>

            </div>`

            );

        });

    },500);

}

function displayPhotos(data){

    let cards="";

    $("#count").text("Photos : "+data.length);

    data.forEach(function(photo,index){

        let color=index%2==0 ? "even-card":"odd-card";

        cards+=`

<div class="col-md-4">

<div class="card ${color}">

<img src="${photo.thumbnailUrl}" class="mt-3">

<div class="card-body">

<h5>${photo.title}</h5>

<p>

Photo ID : ${photo.id}

</p>

<p>

Album ID : ${photo.albumId}

</p>

</div>

</div>

</div>

`;

    });

    $("#user-container").html(cards);

}

$("#search").keyup(function(){

    let value=$(this).val().toLowerCase();

    let filtered=photos.filter(function(photo){

        return photo.title.toLowerCase().includes(value);

    });

    displayPhotos(filtered);

});