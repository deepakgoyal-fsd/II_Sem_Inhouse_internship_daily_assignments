# Global Hackathon 2026

PHP + MySQL + Bootstrap 5 event site with countdown, seat counter, registration, and admin panel.

## Quick Start
1. Copy `php-app/` into your web root (e.g. XAMPP `htdocs/`).
2. Import `database.sql` into MySQL.
3. Edit DB creds in `db.php` if needed.
4. Visit `http://localhost/php-app/`.

Default admin: **admin / admin123**

## Files
- `index.php` – landing page (hero, countdown, seat counter)
- `register.php` – registration form + handler
- `login.php` / `logout.php` – admin auth
- `admin.php` – dashboard (list / delete registrations)
- `readme.php` – in-app documentation
- `header.php` / `footer.php` – shared layout
- `db.php` – PDO connection + helpers
- `database.sql` – MySQL schema
- `assets/style.css` – custom styles
- `assets/style.js` – countdown + smooth scroll
