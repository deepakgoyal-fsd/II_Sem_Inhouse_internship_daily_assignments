<?php

function calculateGrade($cgpa)
{
    if ($cgpa >= 9) {
        return "A+";
    } elseif ($cgpa >= 8) {
        return "A";
    } elseif ($cgpa >= 7) {
        return "B";
    } elseif ($cgpa >= 6) {
        return "C";
    } else {
        return "F";
    }
}

?>