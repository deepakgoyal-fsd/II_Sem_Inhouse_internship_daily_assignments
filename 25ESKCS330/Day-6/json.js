const postsContainer=document.getElementById("posts");

const loading=document.getElementById("loading");

const error=document.getElementById("error");

const search=document.getElementById("search");

const count=document.getElementById("count");

let posts=[];

async function getPosts(){

try{

const response=await fetch("https://jsonplaceholder.typicode.com/posts");

if(!response.ok){

throw new Error();

}

posts=await response.json();

loading.style.display="none";

displayPosts(posts);

}

catch{

loading.style.display="none";

error.classList.remove("d-none");

}

}

function displayPosts(data){

postsContainer.innerHTML="";

count.textContent=data.length;

data.forEach(post=>{

postsContainer.innerHTML+=`

<div class="col-lg-4 col-md-6 mb-4">

<div class="card h-100">

<div class="card-body">

<h5 class="card-title">

${post.title}

</h5>

<p class="card-text">

${post.body}

</p>

</div>

</div>

</div>

`;

});

}

search.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let filtered=posts.filter(post=>

post.title.toLowerCase().includes(value)||

post.body.toLowerCase().includes(value)

);

displayPosts(filtered);

});

getPosts();