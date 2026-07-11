 
       function arithematicOperation(){
        //  let var1 = 10;
        
        //  const pi = 3.14; 

         const number1 = parseFloat(document.getElementById("number1").value);
         const number2 = parseFloat(document.getElementById("number2").value);
        //  var var2 = 20; to be avoided
        const operator = document.getElementById("operator").value;

        let result = 0;
        switch(operator){
            case '+' : 
            result = number1+number2
            break;

            case '-' :
            result = number1-number2
            break;

            case '*' :
            result = number1 * number2
            break;
             
            case '/' :
                if(0 != number2)
            result = number1 / number2
              else
                result = "Invalid number2";
            break;
        }
         const resultDiv = document.getElementById("result")
         resultDiv.textContent = "Result: " + result;

         console.log("the arithemic perform through eternal js")
       }