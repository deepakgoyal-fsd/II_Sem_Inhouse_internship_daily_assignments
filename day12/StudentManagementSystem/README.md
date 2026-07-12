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

## Secure Login System ✅ (Day 9)

| Requirement | Where |
|---|---|
| **Login Page** — Bootstrap form, email + password | `login.php` |
| **Authentication** — verify credentials against MySQL `users` table via `password_verify()` | `authenticate.php` |
| **Sessions** — start session, store `user_id`, `user_name`, `user_email` after login | `authenticate.php` (`session_regenerate_id()` on login to prevent fixation) |
| **Protected Pages** — every CRUD + account page guarded by a session check | `includes/require_login.php`, included first in `index.php`, `add_student.php`, `store_student.php`, `edit_student.php`, `update_student.php`, `delete_student.php`, `dashboard.php`, `profile.php`, `change_password.php` |
| **Logout** — destroys the session, redirects to login | `logout.php` |
| **Failed login** — red Bootstrap alert on `login.php`, credentials never appear in the URL (session-flashed error message) | `authenticate.php` → `login.php` |
| **Welcome message** — "Welcome back, [Name]! 👋" | `dashboard.php` |
| **Last login timestamp** — stored in `users.last_login`, shown on the dashboard and in the sidebar | `authenticate.php`, `dashboard.php`, `includes/header.php` |
| **Session start time** — "Session started at [time]" | `authenticate.php`, `dashboard.php` |

### Bonus Goals ✅
- Logged-in user's name (and avatar) shown in the sidebar on every page
- Professional Bootstrap UI with a sidebar navigation (`includes/header.php`)
- Friendly **Access Denied** page for unauthorized access attempts (`access_denied.php`)
- Last login time displayed on the dashboard card

### Take It Further ✅
- **Forgot Password UI** — email form + confirmation message, no real email is sent (`forgot_password.php`)
- **Profile Picture** — `profile_picture` column on `users`; upload + display in the sidebar avatar and on the profile page (`profile.php`, `update_profile.php`)
- **Change Password UI** — current/new/confirm password form, verifies the current password before updating the bcrypt hash (`change_password.php`, `do_change_password.php`)
- **Push to GitHub** — see the command at the bottom of this file

### Demo Login
A seed admin account is included in `sql/schema.sql`:

```
Email:    admin@example.com
Password: password123
```



## Final Polish Stage ✅ (Day 10/12 — Production-Ready Pass)

| Requirement | Where |
|---|---|
| **Profile Photo Upload** — file input, uploads to `assets/uploads/`, filename saved to `photo` column, shown in list + profile view | `add_student.php`, `edit_student.php`, `store_student.php`, `update_student.php` |
| **Default avatar** when no photo is uploaded | `assets/img/default-avatar.svg`, used as the `<img>` fallback on `index.php` and `dashboard.php` |
| **Client-side image preview** before the form submits | `assets/js/script.js` (`photoInput` change listener) |
| **Unified Student Search** — one query, `LIKE`, across **name, branch, and course** simultaneously | Quick Search box on `index.php` |
| **Highlighted matches** — matched keyword wrapped in `<mark>` in the results | `highlight()` helper in `config/db_connect.php`, used in `index.php`'s table |
| **Empty state** — "No students found matching your search." with a call-to-action button | `index.php` |
| **Persisted search term** — the quick search input keeps its value after submitting | `index.php` |
| **Bootstrap 5 navbar/sidebar with active link highlighting** | `includes/header.php` (sidebar nav, `active` class on current page) |
| **Icons on every button** (Add, Edit, Delete, Search) | Font Awesome throughout `index.php`, `add_student.php`, `edit_student.php` |
| **`table-striped table-hover`** with avatar thumbnail column | `index.php` |
| **Responsive layout** via Bootstrap `col-md-*` | `index.php`, `dashboard.php` |
| **"Total Students" stat card** via `COUNT(*)` | `index.php`, `dashboard.php` |
| **"Added This Week" stat card** | `dashboard.php` (`WHERE date_registered >= NOW() - INTERVAL 7 DAY`) |
| **"Recent Registrations" widget** — last 5 students added | `dashboard.php` |
| **CSS fade-in animation** on dashboard/table cards | `.fade-in` class in `assets/css/style.css` |
| **Session guards on every protected page** | `includes/require_login.php`, included first in every protected file |



## Project Structure

```
StudentManagementSystem/
├── login.php                # Login form (Mission 1)
├── authenticate.php         # Verifies credentials, starts session, stores last_login
├── logout.php               # Destroys session, redirects to login
├── dashboard.php             # Protected welcome page (greeting, stats, recent registrations)
├── access_denied.php        # Friendly page shown to unauthenticated visitors
├── forgot_password.php      # UI-only forgot password flow
├── profile.php               # View/edit own profile + avatar upload
├── update_profile.php       # Handles profile save
├── change_password.php      # Current/new/confirm password form
├── do_change_password.php   # Verifies + updates password hash
├── index.php                # Search/filter + CRUD table (protected)
├── add_student.php          # Create form (protected)
├── store_student.php        # Handles insert (protected)
├── edit_student.php         # Pre-filled edit form (protected)
├── update_student.php       # Handles UPDATE (protected)
├── delete_student.php       # Handles DELETE (protected)
├── config/
│   └── db_connect.php       # mysqli_connect(), h() escaping helper, highlight() search helper
├── includes/
│   ├── require_login.php    # Session guard — include first in every protected page
│   ├── header.php            # App layout: sidebar nav + logged-in user info
│   ├── footer.php
│   ├── guest_header.php      # Simple centered layout for login/forgot/access-denied
│   └── guest_footer.php
├── assets/
│   ├── css/style.css        # Sidebar, gradient guest pages, stat cards, fade-in, avatars
│   ├── js/script.js         # Auto-dismiss alert, delete confirm, photo preview
│   ├── img/default-avatar.svg  # Fallback avatar shown when no photo is uploaded
│   └── uploads/             # Uploaded student + profile photos land here
├── sql/schema.sql           # CREATE DATABASE + students table + users table + seed admin
└── README.md
```

## Setup (XAMPP)

1. Start Apache + MySQL.
2. In phpMyAdmin, run `sql/schema.sql`. This creates the `student_management` DB, the `students` table, the new `users` table, and seeds one admin login. If you already have an existing `students` or `users` table from a previous day, use the commented `ALTER TABLE` statements near the bottom of `schema.sql` instead of recreating everything.
3. Copy the `StudentManagementSystem` folder into `htdocs`.
4. Make sure `assets/uploads/` is writable (XAMPP on Windows usually is by default).
5. Visit `http://localhost/StudentManagementSystem/login.php` and log in with:
   ```
   Email:    admin@example.com
   Password: password123
   ```

## Pushing to GitHub

```bash
git add .
git commit -m "Day 10-12: Search highlighting, dashboard widgets, fade-in polish, final demo prep"
git push origin main
```
