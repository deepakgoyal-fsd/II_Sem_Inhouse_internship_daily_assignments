# Student Registration Portal

A responsive Student Registration Portal developed using PHP, MySQL, Bootstrap 5, and Font Awesome.

The application allows students to submit their registration details. PHP validates the submitted information and stores valid student records permanently in a MySQL database.

## Features

- Responsive Bootstrap 5 registration form
- Student photo upload UI
- Profile photo placeholder
- Full name field
- Email field
- Branch selection
- CGPA input
- Gender radio buttons
- Course dropdown
- Address textarea
- PHP server-side validation
- Required field validation
- Name number validation
- Valid email checking
- CGPA range validation
- Address minimum length validation
- Required gender selection
- All validation errors displayed together
- Duplicate email prevention
- MySQL database storage
- Registration confirmation page
- Gradient confirmation header
- Font Awesome icons
- Bootstrap cards
- Bootstrap badges
- Professional navbar
- Student record counter
- Responsive Bootstrap table
- Top CGPA student highlighting

## Technologies Used

- HTML
- CSS
- Bootstrap 5
- PHP
- MySQL
- Font Awesome

## Database

Database Name:

student_portal_project

Table Name:

students

The students table stores:

- ID
- Name
- Email
- Branch
- CGPA
- Gender
- Course
- Address

## Project Flow

1. The student opens the registration form.
2. The student enters registration details.
3. The form sends data using POST.
4. PHP validates the submitted data.
5. All validation errors are displayed together.
6. PHP checks for a duplicate email.
7. Valid student data is stored in MySQL.
8. A registration confirmation card is displayed.
9. Registered students can be viewed in a Bootstrap table.
10. Students with CGPA above 8.0 are highlighted in green.

## How to Run

1. Install XAMPP.
2. Start Apache and MySQL.
3. Place the student-registration-project folder inside htdocs.
4. Open phpMyAdmin.
5. Create the student_portal_project database.
6. Create the students table.
7. Open the project using localhost.

Local project address:

http://localhost:8080/student-registration-project/

## Author

Student Project