script.js
document.getElementById("admissionForm").addEventListener("submit", function(event){

    let phone = document.getElementById("phone").value;
    let pin = document.getElementById("pin").value;
    let marks = document.getElementById("marks").value;

    if(phone.length != 10 || isNaN(phone)){
        alert("Phone number must contain exactly 10 digits.");
        event.preventDefault();
        return;
    }

    if(pin.length != 6 || isNaN(pin)){
        alert("PIN Code must contain exactly 6 digits.");
        event.preventDefault();
        return;
    }

    if(marks < 0 || marks > 100){
        alert("Percentage should be between 0 and 100.");
        event.preventDefault();
        return;
    }

    alert("Admission Form Submitted Successfully!");
});