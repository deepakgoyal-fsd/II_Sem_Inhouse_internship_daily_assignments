const darkModeToggle = document.createElement('button');
darkModeToggle.id = 'darkModeToggle';
darkModeToggle.type = 'button';
darkModeToggle.className = 'btn btn-outline-light btn-lg ms-3';
darkModeToggle.textContent = 'Dark Mode';

const navContainer = document.querySelector('.navbar .container');
if (navContainer) {
  navContainer.appendChild(darkModeToggle);
}

function updateDarkModeLabel() {
  darkModeToggle.textContent = document.body.classList.contains('dark') ? 'Light Mode' : 'Dark Mode';
}

darkModeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark');
  updateDarkModeLabel();
});

updateDarkModeLabel();

const form = document.getElementById('enrollForm');
const formMessage = document.getElementById('formMessage');
const nameInput = form.querySelector('input[name="name"]');
const emailInput = form.querySelector('input[name="email"]');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  let valid = true;
  
  if (!nameInput.value.trim()) {
    valid = false;
    nameInput.classList.add('is-invalid');
  } else {
    nameInput.classList.remove('is-invalid');
  }

  if (!emailInput.value.includes('@')) {
    valid = false;
    emailInput.classList.add('is-invalid');
  } else {
    emailInput.classList.remove('is-invalid');
  }

  if (!valid) {
    formMessage.textContent = 'Please enter a valid name and email address.';
    formMessage.className = 'form-message mt-3 error';
    return;
  }

  formMessage.textContent = 'Your enrollment request has been sent successfully!';
  formMessage.className = 'form-message mt-3 success';
  form.reset();
});

const hero = document.querySelector('.hero .container .row');
const counterWrapper = document.createElement('div');
counterWrapper.className = 'hero-counter mt-4';
counterWrapper.innerHTML = `
  <h5>Visitor Click Counter</h5>
  <p>Track your clicks and reset anytime while you explore the page.</p>
  <div class="d-flex align-items-center gap-2">
    <button id="clickCounterBtn" class="btn btn-info btn-sm">Click Me</button>
    <button id="resetCounterBtn" class="btn btn-outline-light btn-sm">Reset</button>
    <span id="clickCount" class="badge bg-light text-dark rounded-pill">0</span>
  </div>
`;

if (hero) {
  hero.appendChild(counterWrapper);
}

let counter = 0;
const clickCountEl = document.getElementById('clickCount');
const clickCounterBtn = document.getElementById('clickCounterBtn');
const resetCounterBtn = document.getElementById('resetCounterBtn');

clickCounterBtn.addEventListener('click', () => {
  counter += 1;
  clickCountEl.textContent = counter;
});

resetCounterBtn.addEventListener('click', () => {
  counter = 0;
  clickCountEl.textContent = counter;
});