document.addEventListener('DOMContentLoaded', () => {

    const themeToggleBtn = document.getElementById('themeToggle');
    const bodyElement = document.body;

    themeToggleBtn.addEventListener('click', () => {
        bodyElement.classList.toggle('dark');
        
        if (bodyElement.classList.contains('dark')) {
            themeToggleBtn.textContent = 'Switch to Light Mode';
            themeToggleBtn.classList.replace('btn-outline-primary', 'btn-outline-light');
        } else {
            themeToggleBtn.textContent = 'Switch to Dark Mode';
            themeToggleBtn.classList.replace('btn-outline-light', 'btn-outline-primary');
        }
    });

    let count = 0;
    const counterValueDisplay = document.getElementById('counterValue');
    const clickBtn = document.getElementById('clickBtn');
    const resetBtn = document.getElementById('resetBtn');

    clickBtn.addEventListener('click', () => {
        count++;
        counterValueDisplay.textContent = count;
    });

    resetBtn.addEventListener('click', () => {
        count = 0;
        counterValueDisplay.textContent = count;
    });

    const sprintForm = document.getElementById('sprintForm');
    const nameInput = document.getElementById('nameInput');
    const emailInput = document.getElementById('emailInput');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const successMessage = document.getElementById('successMessage');

    sprintForm.addEventListener('submit', (event) => {

        event.preventDefault(); 
        
        nameError.textContent = '';
        emailError.textContent = '';
        successMessage.classList.add('d-none');

        let isValid = true;

        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Name is required.';
            isValid = false;
        }

        if (!emailInput.value.includes('@')) {
            emailError.textContent = 'Please enter a valid email containing "@".';
            isValid = false;
        }

        if (isValid) {
            successMessage.classList.remove('d-none');
            sprintForm.reset(); 
        }
    });
});