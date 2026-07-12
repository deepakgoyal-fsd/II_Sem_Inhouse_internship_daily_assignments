-- Student Management System — Full Schema
-- Run this once to (re)create the database and table with all CRUD + bonus columns.

CREATE DATABASE IF NOT EXISTS student_management;
USE student_management;

CREATE TABLE IF NOT EXISTS students (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    name             VARCHAR(100)  NOT NULL,
    email            VARCHAR(150)  NOT NULL UNIQUE,
    cgpa             DECIMAL(3,2)  NOT NULL,
    branch           VARCHAR(100)  NOT NULL,
    college          VARCHAR(150)  NOT NULL,
    course           VARCHAR(100)  NULL,
    address          TEXT          NULL,
    photo            VARCHAR(255)  NULL,                 -- stores uploaded filename
    status           ENUM('Active','Inactive') NOT NULL DEFAULT 'Active',
    date_registered  TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
    updated_at       TIMESTAMP     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ---------- Users table for the secure login system ----------
CREATE TABLE IF NOT EXISTS users (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    name             VARCHAR(100)  NOT NULL,
    email            VARCHAR(150)  NOT NULL UNIQUE,
    password         VARCHAR(255)  NOT NULL,          -- stores a bcrypt hash, never plain text
    profile_picture  VARCHAR(255)  NULL,               -- stores uploaded filename
    last_login       TIMESTAMP     NULL,
    created_at       TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);

-- Seed one admin user so you can log in immediately.
-- Email: admin@example.com   Password: password123
-- (This is a standard bcrypt hash, fully compatible with PHP's password_verify().)
INSERT INTO users (name, email, password)
SELECT 'Admin User', 'admin@example.com', '$2b$12$qbSvYlOd8rl6QHZ5qQ.bd.KW7k7ay9I/cWLycsjwk1gYaZ1Sth80K'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE email = 'admin@example.com');

-- If you already have a `users` table and just want to add the new columns:
--
-- ALTER TABLE users ADD COLUMN profile_picture VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN last_login TIMESTAMP NULL;
