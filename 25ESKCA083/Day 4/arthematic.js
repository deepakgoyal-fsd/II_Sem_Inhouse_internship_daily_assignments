function performOperation(){
    
            let varl=10;
            const num1 = parseFloat(document.getElementById("number1").value);
            const num2 = parseFloat(document.getElementById("number2").value);
            const operation = document.getElementById("operation").value;
            let result;

            switch(operation) {
                case "add":
                    result = num1 + num2;
                    break;
                case "sub":
                    result = num1 - num2;
                    break;
                case "mul":
                    result = num1 * num2;
                    break;
                case "div":
                    result = num1 / num2;
                    break;
                default:
                    result = "Invalid operation";
            }
            if (operation === "div" && num2 === 0) {
                result = "Cannot divide by zero.";
            }

            document.getElementById("result").innerText = "Result: " + result;
        }
