document.addEventListener("DOMContentLoaded", () => {
    const steps = Array.from(document.querySelectorAll(".form-step"));
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");
    let currentStep = 0;

    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            if (validateStep(currentStep)) {
                currentStep++;
                updateFormStep();
            }
        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            currentStep--;
            updateFormStep();
        });
    });

    function updateFormStep() {
        steps.forEach((step, index) => {
            step.classList.toggle("active-step", index === currentStep);
        });

        document.querySelectorAll(".step").forEach((node, index) => {
            node.classList.toggle("active", index <= currentStep);
        });
    }

    function validateStep(stepIndex) {
        const currentInputs = steps[stepIndex].querySelectorAll("input[required], textarea[required]");
        let isValid = true;

        currentInputs.forEach((input) => {
            if (!input.checkValidity()) {
                input.reportValidity();
                isValid = false;
            }
        });

        return isValid;
    }
});