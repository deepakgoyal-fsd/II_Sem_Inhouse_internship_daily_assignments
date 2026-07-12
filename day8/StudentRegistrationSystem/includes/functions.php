<?php
/**
 * Shared helper functions for the Student Registration Confirmation System
 */

// XSS-safe output helper
function h($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

// Determine letter grade + Bootstrap color + icon based on CGPA
function calculateGrade($cgpa) {
    $cgpa = (float) $cgpa;

    if ($cgpa >= 9.0) {
        return ['label' => 'A+ (Outstanding)', 'class' => 'success',  'icon' => 'fa-trophy'];
    } elseif ($cgpa >= 8.0) {
        return ['label' => 'A (Excellent)',    'class' => 'primary',  'icon' => 'fa-star'];
    } elseif ($cgpa >= 7.0) {
        return ['label' => 'B (Very Good)',    'class' => 'info',     'icon' => 'fa-thumbs-up'];
    } elseif ($cgpa >= 6.0) {
        return ['label' => 'C (Good)',         'class' => 'warning',  'icon' => 'fa-face-smile'];
    } elseif ($cgpa >= 5.0) {
        return ['label' => 'D (Pass)',         'class' => 'secondary','icon' => 'fa-face-meh'];
    } else {
        return ['label' => 'F (Needs Improvement)', 'class' => 'danger', 'icon' => 'fa-triangle-exclamation'];
    }
}

// Simple validation helper — returns array of error messages
function validateRegistration($data) {
    $errors = [];

    if (empty(trim($data['name'] ?? ''))) {
        $errors[] = 'Name is required.';
    }

    if (empty(trim($data['email'] ?? '')) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email is required.';
    }

    if ($data['cgpa'] === '' || $data['cgpa'] === null) {
        $errors[] = 'CGPA is required.';
    } elseif (!is_numeric($data['cgpa']) || $data['cgpa'] < 0 || $data['cgpa'] > 10) {
        $errors[] = 'CGPA must be a number between 0 and 10.';
    }

    if (empty(trim($data['branch'] ?? ''))) {
        $errors[] = 'Branch is required.';
    }

    if (empty(trim($data['college'] ?? ''))) {
        $errors[] = 'College is required.';
    }

    if (empty($data['gender'] ?? '')) {
        $errors[] = 'Please select a gender.';
    }

    if (empty($data['course'] ?? '')) {
        $errors[] = 'Please select a course.';
    }

    if (empty(trim($data['address'] ?? ''))) {
        $errors[] = 'Address is required.';
    }

    return $errors;
}
