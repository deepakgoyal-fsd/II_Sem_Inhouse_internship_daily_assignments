const modeToggle = document.getElementById('modeToggle');
const body = document.body;

modeToggle.addEventListener('click', () => {
  body.classList.toggle('dark-mode');
  modeToggle.textContent = body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
});

let clickCount = 0;
const countValue = document.getElementById('countValue');
const incrementBtn = document.getElementById('incrementBtn');
const resetBtn = document.getElementById('resetBtn');

incrementBtn.addEventListener('click', () => {
  clickCount++;
  countValue.textContent = clickCount;
});

resetBtn.addEventListener('click', () => {
  clickCount = 0;
  countValue.textContent = clickCount;
});

const signupForm = document.getElementById('signupForm');
const nameInput = document.getElementById('nameInput');
const emailInput = document.getElementById('emailInput');
const formMessage = document.getElementById('formMessage');

signupForm.addEventListener('submit', (e) => {
  e.preventDefault();

  const nameValue = nameInput.value.trim();
  const emailValue = emailInput.value.trim();

  nameInput.classList.remove('invalid');
  emailInput.classList.remove('invalid');
  formMessage.textContent = '';
  formMessage.classList.remove('error', 'success');

  if (nameValue === '' && !emailValue.includes('@')) {
    formMessage.textContent = 'Please enter your name and a valid email.';
    formMessage.classList.add('error');
    nameInput.classList.add('invalid');
    emailInput.classList.add('invalid');
    return;
  }

  if (nameValue === '') {
    formMessage.textContent = 'Name cannot be empty.';
    formMessage.classList.add('error');
    nameInput.classList.add('invalid');
    return;
  }

  if (!emailValue.includes('@')) {
    formMessage.textContent = 'Please enter a valid email address.';
    formMessage.classList.add('error');
    emailInput.classList.add('invalid');
    return;
  }

  formMessage.textContent = 'Thanks, you are on the list!';
  formMessage.classList.add('success');
  signupForm.reset();
});
