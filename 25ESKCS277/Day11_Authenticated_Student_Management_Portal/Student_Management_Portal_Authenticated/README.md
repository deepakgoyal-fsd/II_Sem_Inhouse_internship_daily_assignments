# Student Management Portal — Authenticated Edition

A complete PHP + MySQL + Bootstrap Student Management Portal with authentication and account management.

## Features

- Secure login with MySQL credentials
- Password hashing and verification
- PHP sessions and 30-minute inactivity timeout
- Protected CRUD pages
- Logged-in user name and avatar in navbar
- Logout
- Last login tracking
- Forgot Password UI (interface only; no email sending)
- Profile page with name and profile picture update
- Change Password form
- Full Student CRUD
- Search and filters
- Student photo upload
- Dashboard statistics

## Setup

1. Copy `Student_Management_Portal_Authenticated` into `C:\xampp\htdocs\`.
2. Start Apache and MySQL in XAMPP.
3. Import `database.sql` in phpMyAdmin for a fresh install.
4. For an existing `student_management` database, import `upgrade_authentication.sql`.
5. Open:

   `http://localhost/Student_Management_Portal_Authenticated/login.php`

## Demo Login

- Email: `admin@example.com`
- Password: `Admin@123`

## Database Settings

Edit `config/database.php` only if your MySQL host, port, username, password, or database name differs.
