 
        function performArithmeticOperation(){
            
            const pi=3.14;
            const number1 = parseFloat( document.getElementById("number1").value);
            const number2 = parseFloat( document.getElementById("number2").value);

            const operator=document.getElementById("operator").value;
            let result;

            switch(operator){
                case "+":
                    result= parseFloat(number1) + parseFloat(number2);
                    break;
                    case "-":
                    result= parseFloat(number1) - parseFloat(number2);
                    break;
                    case "*":
                    result= parseFloat(number1) * parseFloat(number2);
                    break;
                    default:
                        result="invalid";
            }
            document.getElementById("result").innerHTML="result="+result;
        }
    