-- Create Database
CREATE DATABASE student_registration;

-- Use Database
USE student_registration;

-- Create Students Table
CREATE TABLE students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL,

    phone VARCHAR(15) NOT NULL,

    gender VARCHAR(20) NOT NULL,

    course VARCHAR(100) NOT NULL,

    address TEXT NOT NULL,

    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);