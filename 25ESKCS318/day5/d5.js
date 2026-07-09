const buttons = document.querySelectorAll(".toggle-btn");

buttons.forEach(button => {

    button.addEventListener("click", () => {

        const details = button.nextElementSibling;

        details.classList.toggle("show");
        button.classList.toggle("active");

        if(details.classList.contains("show")){
            button.textContent = "Hide Details";
        }
        else{
            button.textContent = "Show Details";
        }

    });

});