-- Student Registration Portal — Database Schema
-- Run this once to create the database and table.

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
    photo            VARCHAR(255)  NULL,           -- stores filename only, no BLOB
    date_registered  TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);
