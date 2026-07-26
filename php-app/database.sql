-- database.sql - Schema for Global Hackathon 2026
CREATE DATABASE IF NOT EXISTS hackathon_2026
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE hackathon_2026;

CREATE TABLE IF NOT EXISTS registrations (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    full_name       VARCHAR(100)  NOT NULL,
    email           VARCHAR(150)  NOT NULL UNIQUE,
    phone           VARCHAR(20)   NOT NULL,
    team_name       VARCHAR(100)  NOT NULL,
    submission_date TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS admins (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    username      VARCHAR(50)  NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at    TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default admin: username = admin, password = admin123
INSERT INTO admins (username, password_hash) VALUES
('admin', '$2y$10$e0NRl1p6c3vQmQ3B0m1oXeE7fH5W8g0YyH4G8m3Q9Zj1Vn6qJ2xQu')
ON DUPLICATE KEY UPDATE username = username;
