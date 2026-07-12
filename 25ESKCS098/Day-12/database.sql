CREATE DATABASE student_db;

USE student_db;

CREATE TABLE students(

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(100),

email VARCHAR(100),

branch VARCHAR(50),

phone VARCHAR(10),

photo VARCHAR(100)

);

CREATE TABLE users(

id INT AUTO_INCREMENT PRIMARY KEY,

username VARCHAR(50),

password VARCHAR(50)

);

INSERT INTO users(username,password)

VALUES

('admin','admin123');