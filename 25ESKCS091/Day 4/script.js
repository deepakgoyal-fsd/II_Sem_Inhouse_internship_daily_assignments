function validateForm(){

    let percentage = document.getElementsByName("percentage")[0].value;

    if(percentage > 100 || percentage < 0){
        alert("Percentage should be between 0 and 100.");
        return false;
    }

    alert("Application Submitted Successfully!");
    return true;
}

function toggleMode(){

    document.body.classList.toggle("dark");

    let text = document.getElementById("modeText");

    let btn = document.querySelector("button");

    if(document.body.classList.contains("dark")){
        text.innerHTML = "Current Mode : Dark Mode 🌙";
        btn.innerHTML = "☀️ Light Mode";
    }
    else{
        text.innerHTML = "Current Mode : Light Mode ☀️";
        btn.innerHTML = "🌙 Dark Mode";
    }

}
