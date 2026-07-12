<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script>
    // function definition
    function sayMyName(){
        console.log("pranav")
    }
// function call
sayMyName()

    function printNumber(num){
        console.log("printing number:",num);
    }
    printNumber(5)

    function average(num1,num2){
        console.log("average is:" , (num1+num2)/2);
    }
     average(3,7);


     function getSum(a,b,c){
        let sum=a+b+c;
        return sum;
     }
     let ans=getSum(1,2,3)
     console.log(ans);

     let getMultiplication = function (a,b){
        return a*b;
     }
     let anss= getMultiplication(4,5);
     console.log(anss);


</script>
</html>
