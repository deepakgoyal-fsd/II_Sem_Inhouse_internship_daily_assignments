document.addEventListener("DOMContentLoaded", function () {

    const convertBtn = document.getElementById("convert_btn");
    const swapBtn = document.getElementById("swap_btn");
    const resultBox = document.getElementById("result");

    convertBtn.addEventListener("click", function () {
        const amount = document.getElementById("amount").value;
        const from = document.getElementById("from_currency").value;
        const to = document.getElementById("to_currency").value;

        if (amount === "" || amount <= 0) {
            resultBox.innerHTML = "Please enter a valid amount.";
            return;
        }

        resultBox.innerHTML = "Converting...";

        const formData = new FormData();
        formData.append("amount", amount);
        formData.append("from", from);
        formData.append("to", to);

        fetch("convert.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                resultBox.innerHTML = amount + " " + from + " = " + data.converted_amount + " " + to +
                    "<br><small>1 " + from + " = " + data.rate + " " + to + "</small>";
            } else {
                resultBox.innerHTML = "Error: " + data.message;
            }
        })
        .catch(error => {
            resultBox.innerHTML = "Something went wrong. Please try again.";
            console.log(error);
        });
    });

    swapBtn.addEventListener("click", function () {
        const fromSelect = document.getElementById("from_currency");
        const toSelect = document.getElementById("to_currency");
        const temp = fromSelect.value;
        fromSelect.value = toSelect.value;
        toSelect.value = temp;
    });

});