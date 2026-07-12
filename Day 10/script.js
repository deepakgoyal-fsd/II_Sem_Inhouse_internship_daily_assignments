// Auto hide bootstrap alerts after 3 seconds
setTimeout(function(){

    let alert=document.querySelector(".alert");

    if(alert)
    {
        alert.style.display="none";
    }

},3000);