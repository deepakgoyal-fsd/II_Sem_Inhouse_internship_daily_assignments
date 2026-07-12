    function performOperation(){
        let var1 = 10;
        const pi=3.14;
        const number1= parseFloat(document.getElementById("num1").value);
        const number2= parseFloat(document.getElementById("num2").value);

        const operator= document.getElementById("operator").value;
        let result =0;
        switch(operator){
            case "add":
                result = number1 + number2;
                break;
            case "subtract":
                result = number1 - number2;
                break;
            case "multiply":
                result = number1 * number2;
                break;
            case "divide":
                if(number2 == 0) {
                    result = "Error: Division by zero";
                } else {
                    result = number1 / number2;
                }
                break;
        }
        document.getElementById("result").innerText = "Result: " + result;
    }