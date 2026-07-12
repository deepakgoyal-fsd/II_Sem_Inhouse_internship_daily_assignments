<html>

<?php
$name = "Avani Sharma";
$favouriteLanguage = "PHP";
$year =date("Y");
$month =date("m");
$prev_year = $year-1;
$prev_month = $month -1;
if($month < 7){
    echo "Year $year - $prev_year";

}else{
     echo "Year $prevyear - $year";
    
}


?>
<head>
<title>Welcome</title>
<style>
    body{
font-family: Arial, sans-serif;
background-color: #ff80c7;
text-align: center;
}
.container{
    width: 400px;
    margin: 100px auto;
    padding: 20px;
    background: #faffc4;
    border: 2px solid #333;
    border-radius: 10px;
}
h1{
    color: darkblue;
}
    </style>
    </head>
    <body>
        <div class="container">
            <h1>Welcome Page</h1>
            <?php
           echo"<p><strong>Name:</strong> $name</p>";
           echo"<p><strong>Current Date:</strong>" . date("Y-m-d") ."</p>";
           echo"<p><strong>Favourite Programming Language:</strong> $favouriteLanguage</p>";
           echo"<p><strong>year:</strong>" . year("Y") ."</p>";
           ?>
           </div>

</body>
</html>