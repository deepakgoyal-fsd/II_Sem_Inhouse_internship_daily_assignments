const steps = document.querySelectorAll(".form-step");
const progress = document.querySelectorAll(".step");

let current = 0;

const nextBtns = document.querySelectorAll(".next");
const prevBtns = document.querySelectorAll(".prev");

nextBtns.forEach(button => {
    button.addEventListener("click", () => {
        const inputs = steps[current].querySelectorAll("input, select, textarea");
        let valid = true;
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.reportValidity();
                valid = false;
            }
        });
        if (!valid) return;

        if (current < steps.length - 1) {
            steps[current].classList.remove("active");
            progress[current].classList.remove("active");
            current++;
            steps[current].classList.add("active");
            progress[current].classList.add("active");
        }
    });
});

prevBtns.forEach(button=>{

    button.addEventListener("click",()=>{

        if(current>0){

            steps[current].classList.remove("active");
            progress[current].classList.remove("active");

            current--;

            steps[current].classList.add("active");
            progress[current].classList.add("active");

        }

    });

});

// document.getElementById("regForm").addEventListener("submit",function(e){

//     e.preventDefault();

//     alert("Registration Successful!");

// });
