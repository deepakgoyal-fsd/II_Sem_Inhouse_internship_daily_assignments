CREATE DATABASE student_db;

USE student_db;

CREATE TABLE students(

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(100) NOT NULL,

email VARCHAR(100) NOT NULL,

branch VARCHAR(100) NOT NULL,

cgpa DECIMAL(3,2) NOT NULL,

updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
ON UPDATE CURRENT_TIMESTAMP

);

INSERT INTO students(name,email,branch,cgpa)

VALUES

('Rahul','rahul@gmail.com','CSE',8.50),

('Priya','priya@gmail.com','ECE',9.10),

('Amit','amit@gmail.com','ME',7.80),

('Neha','neha@gmail.com','CSE',8.90);