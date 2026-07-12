let modeBtn = document.getElementById("modeBtn");

modeBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark-mode");

    if(document.body.classList.contains("dark-mode")){
        modeBtn.innerHTML = "☀️ Light Mode";
    }
    else{
        modeBtn.innerHTML = "🌙 Dark Mode";
    }

});