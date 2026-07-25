# Hostel Room Request Tracker

A PHP-based web application for managing hostel room allocation and requests. Students can request rooms, admins can manage room inventory and approvals.

## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [User Roles](#user-roles)
- [File Descriptions](#file-descriptions)

## Features

- **User Authentication**: Secure login and registration system
- **Role-Based Access**: Separate interfaces for students and administrators
- **Room Management**: Admin can manage hostel rooms and availability
- **Room Requests**: Students can request hostel rooms with detailed information
- **Receipt Generation**: Automatic receipt generation for room allocations
- **Password Recovery**: Forgot password functionality for users
- **Responsive Design**: Mobile-friendly dark/light mode interface
- **Database Persistence**: All data stored in MySQL database

## Requirements

- **PHP**: 7.4 or higher
- **MySQL**: 5.7 or higher
- **Server**: Apache (XAMPP recommended)
- **Browser**: Modern browser with JavaScript enabled

## Installation

### 1. Prerequisites
Ensure XAMPP is installed and running with Apache and MySQL services active.

### 2. Clone/Download Project
Place the project folder in your web root:
```
C:\xampp\htdocs\Hostel_Room_Request_Tracker
```

### 3. Database Setup
The database will be **automatically created** on first access:
- Database Name: `hostel_db`
- Tables: `users`, `rooms`, `room_requests` (auto-created)
- Character Set: UTF-8 (utf8mb4)

### 4. Configure Database Connection
Edit `db.php` if needed (default settings for local XAMPP):
```php
$host = "localhost";
$user = "root";
$pass = "";  // Empty password for default XAMPP setup
$dbName = "hostel_db";
```

### 5. Start Application
Open your browser and navigate to:
```
http://localhost/Hostel_Room_Request_Tracker/
```

## Project Structure

```
Hostel_Room_Request_Tracker/
├── index.php                    # Landing page - Role selection
├── login.php                    # User login
├── register.php                 # User registration
├── logout.php                   # User logout
├── forgot_password.php          # Password recovery
├── student_dashboard.php        # Student interface
├── admin_dashboard.php          # Admin interface
├── db.php                       # Database connection & schema
├── generate_receipt.php         # Receipt generation
├── receipt.php                  # Receipt display
├── style.css                    # Global styling
├── images/                      # Image assets
└── README.md                    # This file
```

## Usage

### For Students
1. **Sign Up**: Register with your email and password
2. **Login**: Access your dashboard
3. **Request Room**: Browse available rooms and submit requests
4. **View Status**: Check request approval status
5. **Download Receipt**: Get receipt for approved allocations

### For Administrators
1. **Login**: Use admin credentials
2. **Manage Rooms**: Add, edit, or delete hostel rooms
3. **View Requests**: See all room requests from students
4. **Approve/Reject**: Process student requests
5. **Generate Reports**: View hostel occupancy and statistics

## Database Schema

### Users Table
```
id (INT)
name (VARCHAR)
email (VARCHAR, UNIQUE)
password (VARCHAR)
role (ENUM: 'admin', 'student')
phone_number (VARCHAR)
fathers_name (VARCHAR)
mothers_name (VARCHAR)
branch (VARCHAR)
permanent_address (TEXT)
created_at (TIMESTAMP)
```

### Rooms Table
```
id (INT)
room_number (VARCHAR)
room_type (VARCHAR)
location (VARCHAR)
fees_per_sem (DECIMAL)
available_beds (INT)
image_path (VARCHAR)
```

### Room Requests Table
```
id (INT)
user_id (INT FOREIGN KEY)
room_id (INT FOREIGN KEY)
request_date (TIMESTAMP)
status (ENUM: 'pending', 'approved', 'rejected')
notes (TEXT)
```

## User Roles

### Student
- Register and login
- View available rooms
- Submit room requests
- Track request status
- Download receipts
- Update profile information
- Reset password

### Admin
- Manage all users
- Add/edit/delete rooms
- Review room requests
- Approve or reject requests
- Generate reports
- Manage hostel inventory

## File Descriptions

| File | Purpose |
|------|---------|
| `index.php` | Entry point - role selection landing page |
| `login.php` | Authentication handler for users |
| `register.php` | New user registration form |
| `logout.php` | Session termination |
| `forgot_password.php` | Password reset functionality |
| `student_dashboard.php` | Student management interface |
| `admin_dashboard.php` | Administrative control panel |
| `db.php` | Database initialization and connection |
| `generate_receipt.php` | Receipt PDF generation |
| `receipt.php` | Receipt display page |
| `style.css` | Application styling (dark/light modes) |

## Security Features

- **Password Hashing**: User passwords are securely hashed
- **SQL Injection Prevention**: Prepared statements used for all queries
- **Session Management**: Secure PHP sessions for authentication
- **Input Sanitization**: HTML special characters escaped
- **Role-Based Access Control**: Separate access levels for users

## Troubleshooting

### Database Connection Failed
- Ensure MySQL service is running
- Verify `db.php` credentials match your local setup
- Check if port 3306 is accessible

### Blank Pages
- Check PHP error logs in XAMPP
- Verify all required tables were created
- Clear browser cache and restart

### Session Issues
- Ensure cookies are enabled in browser
- Check PHP session directory permissions
- Verify session.save_path in php.ini

## Future Enhancements

- Email notifications for request status
- Multi-semester room tracking
- Advanced reporting and analytics
- Hostel fee payment integration
- Mobile app development
- Room inspection and maintenance logs

## License

This project is for educational purposes.

## Support

For issues or questions, please check the error logs or contact the development team.

---

**Last Updated**: 2026-07-25
**Version**: 1.0
