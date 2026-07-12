<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        // global scope
        // var age=15;
        // console.log(age);
        // for(i=0;i<2;i++){
        //     console.log(age);
        // }

        class human{
            // properties
            age=13;
            wt=80;
            ht=180;

            // properties
            walking(){
                console.log("i am walking");
            }
            running(){
                console.log("i am running");
            }
        }
        let obj=new human();
        console.log(obj.age);
        obj.walking();

    </script>
    
</body>
</html>
