CREATE DATABASE student_portal;

USE student_portal;

CREATE TABLE students(

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(100) NOT NULL,

email VARCHAR(100) UNIQUE NOT NULL,

branch VARCHAR(100) NOT NULL,

cgpa DECIMAL(3,1) NOT NULL

);