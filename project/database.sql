CREATE DATABASE library_management;

USE library_management;


CREATE TABLE admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);


INSERT INTO admin(username,password)
VALUES
('admin','admin123');



CREATE TABLE books(

    id INT AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(100),

    author VARCHAR(100),

    category VARCHAR(50),

    isbn VARCHAR(50),

    quantity INT,

    available_quantity INT

);



CREATE TABLE members(

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100),

    email VARCHAR(100),

    phone VARCHAR(20),

    address TEXT

);



CREATE TABLE issued_books(

    id INT AUTO_INCREMENT PRIMARY KEY,

    member_id INT,

    book_id INT,

    issue_date DATE,

    due_date DATE,

    return_date DATE,

    status VARCHAR(20) DEFAULT 'Issued'

);