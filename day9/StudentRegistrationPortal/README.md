# Student Registration Portal (PHP + MySQL)

A data-driven student registration portal built in a 30-minute hackathon
sprint, then extended with the "Improve Your Project Tonight" additions.

## Core Requirements ✅

- **Registration Form (Bootstrap)** — `index.php`
- **Server-side validation (PHP)** — `register.php` checks every field before touching the database
- **Save records to MySQL** — prepared statements via `mysqli`, no raw string queries
- **Display all records** in a Bootstrap table on `index.php`
- **No crashes, no SQL errors** — connection errors and query failures are caught and shown as friendly messages, never raw MySQL output

## Bonus Features ⭐

- Bootstrap success alert on registration (dismissible, shown after redirect)
- Record counter — "Total: N students" badge
- Top CGPA row(s) highlighted in green with a crown icon
- Duplicate email prevention (checked before insert, with a clear warning alert)
- Professional gradient navbar with the project name

## Tonight's Additions ✅

- `photo` column — `VARCHAR(255)`, stores a filename only (no upload handling)
- `address` column — `TEXT`
- `course` column — `VARCHAR(100)`
- `date_registered` column — `TIMESTAMP DEFAULT CURRENT_TIMESTAMP`
- Bootstrap table updated to display all new fields

## Project Structure

```
StudentRegistrationPortal/
├── index.php               # Form + records table (GET)
├── register.php             # Validates + inserts via prepared statements
├── config/
│   └── db_connect.php       # mysqli_connect() with error handling
├── includes/
│   ├── header.php            # Navbar + <head>
│   └── footer.php            # Footer + scripts
├── assets/css/style.css     # Gradient navbar, top-CGPA highlight
├── sql/schema.sql           # CREATE DATABASE + CREATE TABLE
└── README.md
```

## Setup (XAMPP)

1. Start Apache and MySQL in the XAMPP control panel.
2. Open phpMyAdmin (or the MySQL CLI) and run `sql/schema.sql` to create the
   `student_management` database and `students` table.
3. Copy the `StudentRegistrationPortal` folder into `htdocs`.
4. Visit `http://localhost/StudentRegistrationPortal/index.php`.
5. If your MySQL root user has a password, update `config/db_connect.php`
   accordingly.

## Pushing to GitHub

```bash
git add .
git commit -m "Day 9: PHP-MySQL integration"
git push origin main
```
