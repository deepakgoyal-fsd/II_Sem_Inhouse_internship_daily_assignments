function performarithmeticoperations(){
        
       let number1=parseFloat(document.getElementById("number1").value);
        let number2= parseFloat(document.getElementById("number2").value);
        let operator=document.getElementById("operator").value;
        
        let result=document.getElementById("result");
        switch(operator){
            case"+":
            result.innerHTML=number1+number2;
            break;

        
        
        case"-":
            result.innerHTML=number1-number2;
            break;

        
        case"*":
            result.innerHTML=number1*number2;
            break;

        
        // case"/":
        //     if (number2==0)

        


        // var var2=20;
        // var3;
        // var var2=10;    
    }
    

    
        }