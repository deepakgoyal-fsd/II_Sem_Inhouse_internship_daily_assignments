CREATE DATABASE student_management;
USE student_management;
CREATE TABLE students(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(150) UNIQUE,
branch VARCHAR(50),
cgpa DECIMAL(3,2)
);
