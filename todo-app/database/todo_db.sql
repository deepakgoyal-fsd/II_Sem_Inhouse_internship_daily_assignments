-- ============================================================
-- To-Do List with Category Management System
-- Database Structure
-- ============================================================
-- How to use:
-- 1. Open phpMyAdmin (or MySQL command line)
-- 2. Run this entire file
-- 3. It will create the database "todo_db" with 3 tables:
--    users, categories, tasks
-- ============================================================

CREATE DATABASE IF NOT EXISTS todo_db;
USE todo_db;

-- ------------------------------------------------------------
-- Table: users
-- Stores registered user accounts
-- ------------------------------------------------------------
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,   -- stores hashed password, never plain text
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ------------------------------------------------------------
-- Table: categories
-- Each user can create their own categories
-- (Study, Work, Personal, Shopping, Health, etc.)
-- ------------------------------------------------------------
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ------------------------------------------------------------
-- Table: tasks
-- Stores every task created by a user
-- ------------------------------------------------------------
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    priority ENUM('High', 'Medium', 'Low') NOT NULL DEFAULT 'Medium',
    due_date DATE NULL,
    status ENUM('Pending', 'Completed') NOT NULL DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- ------------------------------------------------------------
-- Note: Default categories (Study, Work, Personal, Shopping,
-- Health) are automatically created for every new user by
-- register.php at the time of registration.
-- ------------------------------------------------------------
