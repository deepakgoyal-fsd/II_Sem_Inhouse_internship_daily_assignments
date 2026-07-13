# Student Registry — Live Search Portal (PHP + XAMPP version)

Same live-search student portal, now backed by **PHP + MySQL**, built to run
under **XAMPP**.

## Stack
- **Backend:** PHP (PDO + MySQL) — plain PHP, no framework
- **Database:** MySQL/MariaDB (as bundled with XAMPP)
- **Frontend:** plain HTML / CSS / JavaScript

## Project structure
```
student-portal-php/
├── index.html              # main page
├── style.css                # styling
├── script.js                 # search/filter/sort + calls to the API
├── student_registry.sql      # database schema + sample data (import this)
└── api/
    ├── db.php                # MySQL connection (PDO)
    └── students.php           # REST API: list, get, create, update, delete
```

## Setup (XAMPP)

1. **Install XAMPP** if you haven't already: https://www.apachefriends.org

2. **Copy this whole folder** into your XAMPP `htdocs` directory, e.g.:
   - Windows: `C:\xampp\htdocs\student-portal-php`
   - macOS: `/Applications/XAMPP/htdocs/student-portal-php`
   - Linux: `/opt/lampp/htdocs/student-portal-php`

3. **Start Apache and MySQL** from the XAMPP Control Panel.

4. **Import the database:**
   - Open `http://localhost/phpmyadmin`
   - Click the **Import** tab
   - Choose the file `student_registry.sql` from this folder
   - Click **Go**
   - This creates the `student_registry` database, the `students` table, and
     6 sample records.

5. **Open the portal:**
   ```
   http://localhost/student-portal-php/
   ```

That's it — the page loads `script.js`, which calls the PHP API in `api/`,
which reads/writes the MySQL database.

## If MySQL has a root password

By default XAMPP's MySQL user is `root` with **no password**, which is what
`api/db.php` assumes. If you've set a password, open `api/db.php` and update:
```php
$user = 'root';
$pass = '';   // <- put your password here
```

## What you can do in the app
- **Search live** by name, roll number, department, or email
- **Filter** by department and status (Active / On Leave / Graduated)
- **Jump by letter** using the A–Z rail
- **Sort** by name, roll no., GPA, or year
- **Add a new record** with the "+ New Record" button
- **Edit or delete** any record from its detail card

All of this now reads and writes directly to the MySQL `students` table, so
it survives page refreshes and server restarts.

## API reference

All endpoints are served from `api/students.php`, using a query-string `id`
for single-record operations (kept deliberately simple — no URL rewriting
needed, so it works on any stock Apache/XAMPP install).

| Method | Endpoint                          | Description                        |
|--------|------------------------------------|-------------------------------------|
| GET    | `api/students.php`                 | List all students                   |
| GET    | `api/students.php?id=5`            | Get a single student                |
| POST   | `api/students.php`                 | Create a student (JSON body)        |
| PUT    | `api/students.php?id=5`            | Update a student (JSON, full/partial) |
| DELETE | `api/students.php?id=5`            | Delete a student                    |

**Required fields for POST:** `name`, `roll`, `dept`, `year`, `status`, `gpa`, `email`
(`phone` is optional).

`status` must be one of: `Active`, `OnLeave`, `Graduated`.
`roll` must be unique — duplicates return a `409` response.

Example — create a student with `curl`:
```bash
curl -X POST http://localhost/student-portal-php/api/students.php \
  -H "Content-Type: application/json" \
  -d '{
        "name": "Aarav Sharma",
        "roll": "REG-2024-1001",
        "dept": "Computer Science",
        "year": 2,
        "status": "Active",
        "gpa": 8.4,
        "email": "aarav.sharma@campus.edu",
        "phone": "+91 98765 43210"
      }'
```

## Troubleshooting

- **"Database connection failed"** — make sure MySQL is running in the XAMPP
  Control Panel and that you imported `student_registry.sql`.
- **Blank page / 500 error** — check the PHP error log in XAMPP
  (`xampp/apache/logs/error.log` or via the XAMPP Control Panel → Apache → Logs).
  This project uses PHP 8 syntax (`str_contains`, typed properties); XAMPP's
  bundled PHP (8.0+) supports this out of the box.
- **Changes not saving** — open your browser's DevTools → Network tab and
  check the response from `api/students.php` for an error message; the API
  always returns JSON with an `error` key when something goes wrong.

## Notes on going further
- **Authentication:** there's currently no login — anyone who can reach the
  server can add/edit/delete records. Add a login page and session check in
  `api/students.php` before exposing this beyond your own machine.
- **Deploying:** for real deployment (not just local XAMPP), you'd move this
  to a proper LAMP/LEMP host and make sure `api/db.php` points at your
  production database credentials.
