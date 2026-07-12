let allPhotos=[];


fetch("https://jsonplaceholder.typicode.com/photos?_limit=30")

.then(response=>{

    if(!response.ok){

        throw new Error("Failed to load data");

    }

    return response.json();

})



.then(data=>{

    document.getElementById("loading").style.display="none";

    allPhotos=data;

    display(data);

})

.catch(error=>{

    document.getElementById("loading").style.display="none";

    document.getElementById("error").classList.remove("d-none");

    document.getElementById("error").innerHTML=error.message;

});

function display(data){

let cards="";

document.getElementById("count").innerHTML=data.length;

data.forEach(photo=>{

cards+=`

<div class="col-md-4 col-lg-3 mb-4">

<div class="card h-100">

<img src="https://picsum.photos/300/200?random=${photo.id}" class="card-img-top">

<div class="card-body">

<h6 class="card-title">${photo.title}</h6>

<p class="text-muted">

Photo ID : ${photo.id}

</p>

</div>

</div>

</div>

`;

});

document.getElementById("cards").innerHTML=cards;

}

document.getElementById("search").addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let filtered=allPhotos.filter(photo=>

photo.title.toLowerCase().includes(value)

);

display(filtered);

});