<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        sayMyName('babbar');
        function sayMyName(finalName){
            console.log(finalName);
        }

        var age=25;
        console.log(age);

        // class human{
        // }
        //     const object1=new human();


    let greet=function(){
        console.log("greeting of the day");

    }
    greet()

    const arr=[
        function(a,b){
            return a+b;
        },
         function(a,b){
            return a-b;
        },
         function(a,b){
            return a*b;
        },
    ];
    let first=arr[0];
    let anss=first(5,10);
    console.log(anss);
 </script>   
</body>
</html>
