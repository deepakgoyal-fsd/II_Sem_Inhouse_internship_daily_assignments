# Student Management System (Full CRUD + Dashboard)

A complete, production-ready Student Management Portal built as the "final
boss" build sprint, covering full CRUD, search/filter, a stats dashboard,
and the "Push It Further" homework additions.

## Build Sprint — Core CRUD ✅

| Feature | Where |
|---|---|
| **Create** — add new student with form validation | `add_student.php` → `store_student.php` |
| **Read** — display all students in a Bootstrap table | `index.php` |
| **Update** — pre-filled edit form + success alert | `edit_student.php` → `update_student.php` |
| **Delete** — confirm dialog + success message | delete button on `index.php` → `delete_student.php` |
| **Search** — filter by name and branch | search form on `index.php` |
| **Bonus** — responsive layout, Font Awesome icons, record count badge | throughout |

## Module 1 — Edit Student Mission ✅

- Edit form allows changes to all four core fields: **Name, Email, Branch, CGPA** (validated 0.0–10.0), plus the extra fields added later.
- `update_student.php` runs `UPDATE students SET ... WHERE id = ?` using a **prepared statement**.
- On success, redirects to `index.php` and shows a **Bootstrap `alert-success`** banner: "Record updated successfully."
- The alert **auto-dismisses after 3 seconds** via JavaScript (`assets/js/script.js`).
- An `updated_at` **TIMESTAMP** column (auto-updates on every `UPDATE`) is shown as "Last Updated: [time]" both in the students table and on the edit page.

## Tonight's Assignment — Push It Further ✅

1. **Profile Photo Upload** — file input on add/edit forms; filename stored in MySQL (`photo` column); displayed in the students table via an `<img>` tag with a fallback avatar icon when no photo exists.
2. **Multi-Field Search** — `index.php`'s filter form combines name, email, branch, course, and a CGPA min/max range in one query using combined `WHERE` conditions built dynamically and bound safely with a prepared statement.
3. **Student Status** — `status` column (`Active`/`Inactive` `ENUM`). The table shows **Active students by default**; a "Show inactive students too" checkbox reveals everyone.
4. **Better Dashboard** — stats row at the top of `index.php`: **Total Students**, **Average CGPA**, and **Students per Branch**, each pulled from a dedicated SQL aggregate query (`COUNT`, `AVG`, `GROUP BY`).
5. **Course Filter** — dropdown above the table filters by `course` using `WHERE course = ?`.

## Project Structure

```
StudentManagementSystem/
├── index.php                # Dashboard: stats + search/filter + CRUD table
├── add_student.php          # Create form
├── store_student.php        # Handles insert (validation, duplicate check, photo upload)
├── edit_student.php         # Pre-filled edit form
├── update_student.php       # Handles UPDATE (prepared statement, optional new photo)
├── delete_student.php       # Handles DELETE (also removes the uploaded photo file)
├── config/
│   └── db_connect.php       # mysqli_connect() with error handling + h() escaping helper
├── includes/
│   ├── header.php
│   └── footer.php
├── assets/
│   ├── css/style.css        # Gradient navbar, stat cards, photo styles
│   ├── js/script.js         # Auto-dismiss alert, delete confirm, photo preview
│   └── uploads/             # Uploaded student photos land here
├── sql/schema.sql           # CREATE DATABASE + full table (with status, photo, updated_at)
└── README.md
```

## Setup (XAMPP)

1. Start Apache + MySQL.
2. In phpMyAdmin, run `sql/schema.sql` (creates `student_management` DB + the full `students` table). If you already have an older `students` table from a previous day, use the `ALTER TABLE` statements at the bottom of `schema.sql` instead of recreating it.
3. Copy the `StudentManagementSystem` folder into `htdocs`.
4. Make sure `assets/uploads/` is writable (XAMPP on Windows usually is by default).
5. Visit `http://localhost/StudentManagementSystem/index.php`.

## Pushing to GitHub

```bash
git add .
git commit -m "Day 8: Full CRUD + dashboard + push-it-further features"
git push origin main
```
