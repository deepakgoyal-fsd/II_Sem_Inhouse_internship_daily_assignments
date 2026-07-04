let btn = document.getElementById("modeBtn");

btn.onclick = function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        btn.innerHTML=" Light Mode";
    }
    else{
        btn.innerHTML=" Dark Mode";
    }

}