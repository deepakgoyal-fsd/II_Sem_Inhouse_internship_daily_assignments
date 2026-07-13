  const passwordInput = document.getElementById("passwordInput");
    const strengthBar = document.getElementById("strengthBar");
    const strengthText = document.getElementById("strengthText");
    const resetButton = document.getElementById("resetButton");

    const lengthRule = document.getElementById("lengthRule");
    const upperRule = document.getElementById("upperRule");
    const lowerRule = document.getElementById("lowerRule");
    const numberRule = document.getElementById("numberRule");
    const specialRule = document.getElementById("specialRule");

    function toggleShow() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    function updateRule(element, condition) {
        if (condition) {
            element.className = "valid";
        } else {
            element.className = "invalid";
        }
    }

    function resetPassword() {
        passwordInput.value = "";
        passwordInput.type = "password";
        strengthBar.style.width = "0%";
        strengthBar.style.backgroundColor = "#ddd";
        strengthText.textContent = "Strength: -";
        strengthText.style.color = "black";

        updateRule(lengthRule, false);
        updateRule(upperRule, false);
        updateRule(lowerRule, false);
        updateRule(numberRule, false);
        updateRule(specialRule, false);
    }

    resetButton.addEventListener("click", resetPassword);

    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        let score = 0;

        const hasLength = password.length >= 8;
        const hasUpper = /[A-Z]/.test(password);
        const hasLower = /[a-z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        updateRule(lengthRule, hasLength);
        updateRule(upperRule, hasUpper);
        updateRule(lowerRule, hasLower);
        updateRule(numberRule, hasNumber);
        updateRule(specialRule, hasSpecial);

        if (hasLength) score++;
        if (hasUpper) score++;
        if (hasLower) score++;
        if (hasNumber) score++;
        if (hasSpecial) score++;

        let width = (score / 5) * 100;
        strengthBar.style.width = width + "%";

        if (password.length === 0) {
            strengthBar.style.width = "0%";
            strengthText.textContent = "Strength: -";
            strengthText.style.color = "black";
        } else if (score <= 2) {
            strengthBar.style.backgroundColor = "red";
            strengthText.textContent = "Strength: Weak";
            strengthText.style.color = "red";
        } else if (score === 3 || score === 4) {
            strengthBar.style.backgroundColor = "orange";
            strengthText.textContent = "Strength: Medium";
            strengthText.style.color = "orange";
        } else if (score === 5) {
            strengthBar.style.backgroundColor = "green";
            strengthText.textContent = "Strength: Strong";
            strengthText.style.color = "green";
        }
    });