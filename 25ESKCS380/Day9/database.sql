CREATE DATABASE student_portal;
USE student_portal;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cgpa DECIMAL(3,2) NOT NULL,
    branch VARCHAR(50) NOT NULL
);