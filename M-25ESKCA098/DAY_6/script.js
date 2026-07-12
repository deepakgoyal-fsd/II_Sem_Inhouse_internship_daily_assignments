let allPosts=[];

const cards=document.getElementById("cards");
const loading=document.getElementById("loading");
const error=document.getElementById("error");

loading.style.display="block";

fetch("https://jsonplaceholder.typicode.com/posts")

.then(res=>res.json())

.then(data=>{

loading.style.display="none";

allPosts=data;

showData(allPosts);

})

.catch(()=>{

loading.style.display="none";

error.style.display="block";

});

function showData(data){

cards.innerHTML="";

data.forEach(post=>{

cards.innerHTML+=`

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<div class="card-body">

<h5>${post.title}</h5>

<p>${post.body}</p>

</div>

</div>

</div>

`;

});

}

document.getElementById("search")

.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let result=allPosts.filter(post=>

post.title.toLowerCase().includes(value)

);

showData(result);

});