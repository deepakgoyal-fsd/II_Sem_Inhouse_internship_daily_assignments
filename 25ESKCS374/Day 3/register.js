const themeButton = document.getElementById("theme");
const registrationForm = document.getElementById("registration-form");
const messageBox = document.getElementById("message");

themeButton.addEventListener("click", () => {
    document.body.classList.toggle("dark");
    themeButton.textContent = document.body.classList.contains("dark") ? "Light Mode" : "Dark Mode";
});

registrationForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const formData = new FormData(registrationForm);
    const firstName = formData.get("firstName").trim();
    const lastName = formData.get("lastName").trim();

    messageBox.textContent = `Thanks, ${firstName} ${lastName}! Your registration is complete.`;
    messageBox.classList.add("success");
    registrationForm.reset();
});