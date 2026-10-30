function PerformArithmeticOperator(){
            let var1 = 10;
            const pi=3.14;
            const number1 = parseFloat(document.getElementById("number1").value);
            const number2 = parseFloat(document.getElementById("number2").value);
            const operator = document.getElementById("operator").value;
            let result = document.getElementById("result");

            switch (operator){
                case "+":
                    result.innerHTML = number1 + number2;
                    break;
                case "-":
                    result.innerHTML = number1 - number2;
                    break;    
                case "*":
                    result.innerHTML = number1 * number2;
                    break;
                case "/":
                    if(number2==0){
                result.innerHTML="OOPS Dispossible"
               } 
               
               else{
                result.innerHTML=number1/number2;
               } 
               break;
               default:
                result.innerHTML="INVALID" ;  
                    
            }
        }
    
    