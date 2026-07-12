<?php

function calculateGrade($cgpa) {
    $cgpa = (float) $cgpa;

    if ($cgpa >= 9.0) {
        return ['grade' => 'A+', 'class' => 'success',  'remark' => 'Outstanding performance'];
    } elseif ($cgpa >= 8.0) {
        return ['grade' => 'A',  'class' => 'success',  'remark' => 'Excellent performance'];
    } elseif ($cgpa >= 7.0) {
        return ['grade' => 'B',  'class' => 'info',     'remark' => 'Good performance'];
    } elseif ($cgpa >= 6.0) {
        return ['grade' => 'C',  'class' => 'warning',  'remark' => 'Average performance'];
    } elseif ($cgpa >= 5.0) {
        return ['grade' => 'D',  'class' => 'warning',  'remark' => 'Below average, needs improvement'];
    } else {
        return ['grade' => 'F',  'class' => 'danger',   'remark' => 'Fail - immediate attention needed'];
    }
}

function sanitize($value) {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}
