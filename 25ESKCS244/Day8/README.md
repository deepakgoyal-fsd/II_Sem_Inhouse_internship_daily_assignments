# Student Registration Confirmation System

A responsive Student Registration Confirmation System built using PHP and Bootstrap 5.

## Features

- Responsive Bootstrap 5 registration form
- Student name, email, CGPA, branch and college fields
- Gender selection using radio buttons
- Course selection using dropdown
- Address textarea
- Student profile photo upload UI
- POST form processing using PHP
- Empty field validation
- Email validation
- CGPA validation
- Dynamic grade calculation using the calculateGrade() function
- Bootstrap alert colors based on student grade
- Responsive confirmation card
- Font Awesome icons
- Gradient confirmation header
- Student profile placeholder
- Dynamic registration date
- Shared header and footer using PHP include

## Technologies Used

- HTML
- CSS
- Bootstrap 5
- PHP
- Font Awesome

## How to Run

1. Install XAMPP.
2. Place the project folder inside the htdocs directory.
3. Start Apache from the XAMPP Control Panel.
4. Open the project using localhost in your browser.

Example:

http://localhost:8080/student-registration/

## Project Flow

Student fills the registration form.

The form data is submitted using the POST method.

PHP validates the submitted data.

The calculateGrade() function calculates the student's grade based on CGPA.

A confirmation card displays the student's submitted details, grade and registration date.

## Author

Student Project