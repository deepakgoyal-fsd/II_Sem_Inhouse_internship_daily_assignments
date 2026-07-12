<?php

function calculateGrade($cgpa)
{

if($cgpa>=9)
{
return ["Excellent","success"];
}

elseif($cgpa>=8)
{
return ["Very Good","primary"];
}

elseif($cgpa>=7)
{
return ["Good","warning"];
}

else
{
return ["Keep Improving","danger"];
}

}

function greeting()
{

$hour=date("H");

if($hour<12)
{
return "Good Morning";
}

elseif($hour<17)
{
return "Good Afternoon";
}

else
{
return "Good Evening";
}

}

?>