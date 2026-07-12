document.addEventListener('DOMContentLoaded', () => {
    // Countdown Timer Configuration Logic
    const deadline = new Date("July 10, 2026 23:59:59").getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const difference = deadline - now;

        const dEl = document.getElementById("days");
        const hEl = document.getElementById("hours");
        const mEl = document.getElementById("minutes");
        const sEl = document.getElementById("seconds");
        const msgEl = document.getElementById("deadline-message");

        if (difference < 0) {
            clearInterval(countdownInterval);
            dEl.textContent = "00";
            hEl.textContent = "00";
            mEl.textContent = "00";
            sEl.textContent = "00";
            
            msgEl.textContent = "Registrations are officially closed!";
            msgEl.classList.remove("hidden-msg");
            msgEl.classList.add("expired");
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        dEl.textContent = String(days).padStart(2, '0');
        hEl.textContent = String(hours).padStart(2, '0');
        mEl.textContent = String(minutes).padStart(2, '0');
        sEl.textContent = String(seconds).padStart(2, '0');
    }

    const countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown(); // Call immediately on load step

    // Form Handling Code Pipeline Elements
    const form = document.getElementById('registrationForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnSpinner = submitBtn.querySelector('.btn-spinner');
    
    const formSection = document.querySelector('.form-section');
    const successSection = document.getElementById('successState');
    const jsonOutput = document.getElementById('jsonOutput');
    const resetBtn = document.getElementById('resetBtn');

    const fields = {
        fullName: {
            el: document.getElementById('fullName'),
            validate: val => val.trim().length >= 3
        },
        email: {
            el: document.getElementById('email'),
            validate: val => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)
        },
        password: {
            el: document.getElementById('password'),
            validate: val => val.length >= 8
        },
        role: {
            el: document.getElementById('role'),
            validate: val => val !== "" && val !== null
        }
    };

    Object.keys(fields).forEach(key => {
        const inputObj = fields[key];
        ['input', 'blur', 'change'].forEach(evtType => {
            inputObj.el.addEventListener(evtType, () => validateField(inputObj));
        });
    });

    function validateField(fieldObj) {
        const isValid = fieldObj.validate(fieldObj.el.value);
        const parent = fieldObj.el.parentElement;

        if (isValid) {
            parent.classList.remove('error');
            if (fieldObj.el.value !== "") parent.classList.add('success');
            return true;
        } else {
            parent.classList.remove('success');
            if (fieldObj.el.value === "" && document.activeElement === fieldObj.el) {
                parent.classList.remove('error');
            } else {
                parent.classList.add('error');
            }
            return false;
        }
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        let isFormValid = true;

        Object.keys(fields).forEach(key => {
            const isValid = validateField(fields[key]);
            if (!isValid) {
                isFormValid = false;
                fields[key].el.parentElement.classList.add('shake');
                setTimeout(() => fields[key].el.parentElement.classList.remove('shake'), 400);
            }
        });

        if (isFormValid) {
            submitBtn.disabled = true;
            btnText.style.opacity = '0';
            btnSpinner.classList.remove('hidden');

            const formDataPayload = {
                event: "HackTheFuture_2026",
                fullName: fields.fullName.el.value.trim(),
                email: fields.email.el.value.trim(),
                password: fields.password.el.value,
                trackRole: fields.role.el.value,
                timestamp: new Date().toISOString()
            };

            setTimeout(() => {
                console.log('Hacker Registered:', formDataPayload);
                jsonOutput.textContent = JSON.stringify(formDataPayload, null, 4);

                formSection.classList.add('hidden');
                successSection.classList.remove('hidden');

                submitBtn.disabled = false;
                btnText.style.opacity = '1';
                btnSpinner.classList.add('hidden');
            }, 1200);
        }
    });

    resetBtn.addEventListener('click', () => {
        form.reset();
        Object.keys(fields).forEach(key => {
            fields[key].el.parentElement.classList.remove('success', 'error');
        });
        successSection.classList.add('hidden');
        formSection.classList.remove('hidden');
    });
});