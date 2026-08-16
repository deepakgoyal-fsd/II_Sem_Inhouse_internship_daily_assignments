<?php

/*======================================================
        EMAIL VALIDATOR PRO
        BACKEND VALIDATOR
        validator.php
======================================================*/


header("Content-Type: application/json");



// Check request

if($_SERVER["REQUEST_METHOD"] !== "POST"){


    echo json_encode([

        "status"=>"error",

        "message"=>"Invalid Request"

    ]);


    exit;

}





// Get Email


$email = trim($_POST["email"] ?? "");





// Empty Check


if($email == ""){


    echo json_encode([


        "status"=>"error",


        "message"=>"Email field is empty"


    ]);


    exit;


}







// PHP Email Validation


if(!filter_var($email,FILTER_VALIDATE_EMAIL)){



    echo json_encode([


        "status"=>"invalid",


        "message"=>"Invalid Email Format"


    ]);



    exit;


}






// Split Email


$parts = explode("@",$email);



$username = $parts[0];


$domain = $parts[1];





// Extension


$extension = pathinfo(

    $domain,

    PATHINFO_EXTENSION

);






// Provider Detection


$provider="Unknown";



if(str_contains($domain,"gmail")){


    $provider="Google Gmail";


}


elseif(str_contains($domain,"yahoo")){


    $provider="Yahoo Mail";


}


elseif(str_contains($domain,"outlook")){


    $provider="Microsoft Outlook";


}


elseif(str_contains($domain,"hotmail")){


    $provider="Microsoft Hotmail";


}


elseif(str_contains($domain,"proton")){


    $provider="Proton Mail";


}


elseif(str_contains($domain,"icloud")){


    $provider="Apple iCloud";


}






// Quality Score


$quality=0;



if(strlen($email)>=10){

    $quality+=25;

}



if(strlen($username)>=3){

    $quality+=25;

}



if(str_contains($domain,".")){


    $quality+=25;


}



$validExtensions=[

"com",

"org",

"net",

"edu",

"in"

];



if(in_array($extension,$validExtensions)){


    $quality+=25;


}






// Security Score


$security=0;



if(strlen($email)>=12){


    $security+=30;


}



if(preg_match("/[0-9]/",$email)){


    $security+=20;


}



if(preg_match("/[._-]/",$email)){


    $security+=20;


}



if(str_contains($domain,".")){


    $security+=30;


}








// Final Response


// ===========================
// SAVE VALIDATION HISTORY
// ===========================


$data = [

"email"=>$email,

"username"=>$username,

"domain"=>$domain,

"extension"=>$extension,

"provider"=>$provider,

"quality"=>$quality,

"security"=>$security,

"status"=>"Valid"

];



$options = [

"http" => [

"header" => 

"Content-Type: application/x-www-form-urlencoded",

"method" => "POST",

"content" => http_build_query($data)

]

];



$context = stream_context_create($options);



file_get_contents(

"http://localhost/project3/save_history.php",

false,

$context

);






// ===========================
// SEND RESPONSE TO JAVASCRIPT
// ===========================


echo json_encode([


"status"=>"valid",


"message"=>"Valid Email Format",


"email"=>$email,


"username"=>$username,


"domain"=>$domain,


"extension"=>$extension,


"provider"=>$provider,


"characters"=>strlen($email),


"usernameLength"=>strlen($username),


"domainLength"=>strlen($domain),


"quality"=>$quality,


"security"=>$security


]);



?>