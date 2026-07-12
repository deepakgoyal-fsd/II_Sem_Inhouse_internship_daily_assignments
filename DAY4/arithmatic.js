
    // "use"
    function performarthimaticOperations(){
        let var1=10;
        const pi=3.14;
        // pi=3 error
    // const number1=parseFloat( document.getElementById("number1").value);
    // const number2=parseFloat (document.getElementById("number2").value);
    const number1 = parseFloat(document.querySelector("#number1").value);
    const number2 = parseFloat(document.querySelector("#number2").value);
    const operator=document.getElementById("operator").value;
    let result=0;   
    switch(operator){
        case"+":
            result=number1+number2;
            break;
        case"-":
            result=number1+number2;
        break;
        case"*":
            result=number1+number2;
            break;
        case"/":
            if(number2!=0){
                result=number1/number2;
            }      
            else {
                result = "Cannot divide by zero";
            }
            break;
    }


    const resultDiv = document.getElementById("result");
    resultDiv.innerHTML = result;
  console.log("tbis function is called from arithmatic js");
    }
    // alert(var1);