const body = document.body;
const themeToggle = document.querySelector("#themeToggle");
const countButton = document.querySelector("#countButton");
const resetButton = document.querySelector("#resetButton");
const clickCount = document.querySelector("#clickCount");
const contactForm = document.querySelector("#contactForm");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const nameError = document.querySelector("#nameError");
const emailError = document.querySelector("#emailError");
const successMessage = document.querySelector("#successMessage");

let count = 0;

function updateThemeButton() {
  if (body.classList.contains("dark")) {
    themeToggle.textContent = "Light Mode";
  } else {
    themeToggle.textContent = "Dark Mode";
  }
}

function toggleTheme() {
  body.classList.toggle("dark");
  updateThemeButton();
}

function updateCounter() {
  clickCount.textContent = count;
}

function increaseCounter() {
  count += 1;
  updateCounter();
}

function resetCounter() {
  count = 0;
  updateCounter();
}

function isValidEmail(email) {
  return email.includes("@") && email.includes(".");
}

function validateForm(event) {
  event.preventDefault();

  const nameValue = nameInput.value.trim();
  const emailValue = emailInput.value.trim();
  let formIsValid = true;

  nameError.textContent = "";
  emailError.textContent = "";
  successMessage.textContent = "";

  if (nameValue === "") {
    nameError.textContent = "Name cannot be empty.";
    formIsValid = false;
  }

  if (emailValue === "") {
    emailError.textContent = "Email cannot be empty.";
    formIsValid = false;
  } else if (!isValidEmail(emailValue)) {
    emailError.textContent = "Email must contain @ and a dot.";
    formIsValid = false;
  }

  if (formIsValid) {
    successMessage.textContent = `Thanks, ${nameValue}. Your form was submitted successfully.`;
    contactForm.reset();
  }
}

themeToggle.addEventListener("click", toggleTheme);
countButton.addEventListener("click", increaseCounter);
resetButton.addEventListener("click", resetCounter);
contactForm.addEventListener("submit", validateForm);

updateThemeButton();
updateCounter();