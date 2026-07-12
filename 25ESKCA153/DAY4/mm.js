function operation(){
            const number1= parseFloat(document.querySelector("#number1").value);
            const number2= parseFloat(document.getElementById("number2").value);
            const operator=document.getElementById("operator").value;

            let result=0;
            switch(operator){
                case "+":
                    result=number1+number2;
                    break;
                case "-":
                    result=number1-number2;
                    break;
                case "*":
                    result=number1*number2;
                    break;
                case "/":
                    if(number2 == 0){
                        result="Naan khaalo"
                    }
                    else{
                        result=number1/number2;
                    }
                    break;
            }
            const resultDiv= document.getElementById("result");
            resultDiv.innerHTML=result;
        }