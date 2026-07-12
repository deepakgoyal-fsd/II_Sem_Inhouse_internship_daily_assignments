<?php

function greeting()
{
    $hour = date("H");

    if ($hour < 12)
        return "Good Morning";
    elseif ($hour < 17)
        return "Good Afternoon";
    else
        return "Good Evening";
}

function todayDate()
{
    return date("l, d F Y");
}

function grade($cgpa)
{
    if ($cgpa >= 9)
        return "Excellent";
    elseif ($cgpa >= 8)
        return "Very Good";
    elseif ($cgpa >= 7)
        return "Good";
    else
        return "Needs Improvement";
}

?>