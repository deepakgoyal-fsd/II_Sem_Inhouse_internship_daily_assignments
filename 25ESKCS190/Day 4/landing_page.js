let btn = document.getElementById("drkbtn");
let currmode="light";
btn.addEventListener("click" , ()=>{
    if(currmode === "light"){
        currmode="dark";
        console.log("dark");
        document.querySelector("body").style.backgroundColor="black";
    }
    else{
        currmode="light";
        console.log("light");
        document.querySelector("body").style.backgroundColor="white";
    }

})
let count = 0;
 document.querySelector("#click").addEventListener("click", ()=>{
    count++;
    console.log(count);
    document.getElementById("count").innerText=count;
})
document.querySelector("#reset").addEventListener("click", ()=>{
    count=0;
    document.getElementById("count").innerText=count;
})

document.getElementById("myform").onsubmit = function(event){
    event.preventDefault();


let name = document.getElementById("name").value ;
let e_mail = document.getElementById("email").value ;
let error = document.getElementById("error");

if(name==""){
    error.innerText="name can't be empty";
}
else if(!e_mail.include("@")){
    error.innerText = "@ is mandatory" ;
}

else{
    error.innerText="form submit successfully";
}
}