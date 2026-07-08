const form = document.getElementById("registrationForm");
const message = document.getElementById("message");

form.addEventListener("submit", function(event) {

    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const email = document.getElementById("email").value.trim();

    if (name === "" || phone === "" || email === "") {
        message.style.color = "red";
        message.textContent = "Please fill all fields.";
        return;
    }

    message.style.color = "green";
    message.textContent =
        "🎉 Thank you, " + name + "! Your registration has been submitted.";

    form.reset();
});