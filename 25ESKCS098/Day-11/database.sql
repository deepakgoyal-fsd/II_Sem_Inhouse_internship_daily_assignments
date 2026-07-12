CREATE DATABASE student_db;

USE student_db;

CREATE TABLE users(

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(100),

email VARCHAR(100) UNIQUE,

password VARCHAR(100),

profile_picture VARCHAR(255)

);

INSERT INTO users(name,email,password,profile_picture)

VALUES

('Dhruv Singh','dhruv@gmail.com','12345','default.png'),

('Rahul Sharma','rahul@gmail.com','12345','default.png');