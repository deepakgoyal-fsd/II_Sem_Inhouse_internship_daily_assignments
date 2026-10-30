<?php
function calculateGrade($cgpa)
{
    if ($cgpa >= 9) {
        return ['text' => 'Excellent', 'class' => 'alert-success'];
    } elseif ($cgpa >= 8) {
        return ['text' => 'Very Good', 'class' => 'alert-primary'];
    } elseif ($cgpa >= 7) {
        return ['text' => 'Good', 'class' => 'alert-warning'];
    } else {
        return ['text' => 'Keep Improving', 'class' => 'alert-danger'];
    }
}

function getFormattedDate()
{
    return date("l, F j, Y");
}

function getGreeting()
{
    $hour = date('H');
    if ($hour < 12) {
        return "Good Morning";
    } elseif ($hour < 18) {
        return "Good Afternoon";
    } else {
        return "Good Evening";
    }
}
?>