# Student Registration Confirmation System

A multi-page PHP + Bootstrap 5 web app that collects a student's registration
details, validates them server-side, and shows a polished confirmation page
with an auto-calculated grade badge.

## Features

- ✅ **Bootstrap Form** — Name, Email, CGPA, Branch, College styled with Bootstrap 5 form components, plus client-side validation feedback.
- ✅ **POST + Validation** — All fields sent via POST; PHP checks for empty/invalid inputs before processing (`includes/functions.php` → `validateRegistration()`).
- ✅ **Grade Logic** — `calculateGrade()` maps CGPA to a letter grade with a color-coded Bootstrap badge and icon.
- ✅ **Welcome/Confirmation Card** — Shows all submitted details plus the submission date/time on a styled card.
- ✅ **Header & Footer** — Shared layout via `include` (`includes/header.php`, `includes/footer.php`) for navbar, branding, and footer.
- ⭐ **Bonus**
  - Profile photo upload field with a live JS preview (no server-side storage — placeholder only).
  - Font Awesome icons throughout.
  - Gradient navbar and gradient header on the confirmation card.
  - Extra fields: Gender (radio), Course (dropdown), Address (textarea).
  - POST/Redirect/GET pattern with session-based error + old-input repopulation.
  - XSS-safe output via `h()` helper (`htmlspecialchars` wrapper) on every echoed value.

## Project Structure

```
StudentRegistrationSystem/
├── index.php              # Registration form (GET)
├── process.php            # Validates POST data, redirects (PRG pattern)
├── confirmation.php       # Welcome/confirmation card (GET, reads session)
├── includes/
│   ├── header.php         # Shared <head> + navbar
│   ├── footer.php         # Shared footer + scripts
│   └── functions.php      # h(), calculateGrade(), validateRegistration()
├── assets/
│   ├── css/style.css      # Gradient theme, cards, photo placeholder
│   └── js/script.js       # Live photo preview + Bootstrap validation UI
└── README.md
```

## How It Works

1. `index.php` renders the Bootstrap form and submits via POST to `process.php`.
2. `process.php` validates the input. On failure, it stores errors + old input
   in the session and redirects back to `index.php` (so a page refresh never
   re-submits the form). On success, it stores the clean data in the session
   and redirects to `confirmation.php`.
3. `confirmation.php` reads the session data, computes the grade badge via
   `calculateGrade()`, and displays a gradient-header welcome card with every
   submitted field.

## Running Locally (XAMPP)

1. Copy the `StudentRegistrationSystem` folder into `htdocs`.
2. Start Apache in XAMPP.
3. Visit `http://localhost/StudentRegistrationSystem/index.php`.

No database or server-side file storage is required — the photo field is a
UI-only preview, and registration data lives in the PHP session for the
current visit.
