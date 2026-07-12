const photoContainer = document.querySelector("#photoContainer");
const photoCount = document.querySelector("#photoCount");
photoContainer.innerHTML = `
<h2 style="text-align:center;">
Loading Photos...
</h2>
`;
fetch("https://jsonplaceholder.typicode.com/photos?_limit=20")
.then(response => response.json())
.then(data=>{
photoCount.innerText=data.length;
photoContainer.innerHTML="";
data.forEach(photo=>{
    photoContainer.innerHTML+=`
    <div class="card">
    <img src="${photo.thumbnailUrl}" alt="${photo.title}">
    <h3>${photo.title}</h3>
    </div>
        `;
});
})
.catch(error=>{
    photoContainer.innerHTML=`
    <h2 style="color:red;text-align:center;">
    Failed to Load Photos</h2>
`;
console.log(error);
});