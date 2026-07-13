-- Student Registry — Database Schema & Seed Data
-- Import this file via phpMyAdmin (Import tab) or run it in the MySQL console.

CREATE DATABASE IF NOT EXISTS student_registry
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE student_registry;

CREATE TABLE IF NOT EXISTS students (
  id      INT AUTO_INCREMENT PRIMARY KEY,
  name    VARCHAR(255) NOT NULL,
  roll    VARCHAR(50)  NOT NULL UNIQUE,
  dept    VARCHAR(100) NOT NULL,
  year    INT NOT NULL,
  status  ENUM('Active','OnLeave','Graduated') NOT NULL DEFAULT 'Active',
  gpa     DECIMAL(3,2) NOT NULL,
  email   VARCHAR(255) NOT NULL,
  phone   VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed data so the portal isn't empty on first run.
-- Safe to re-run: it will error on duplicate roll numbers if the table
-- already has these rows, which is fine — just skip this step then.
INSERT INTO students (name, roll, dept, year, status, gpa, email, phone) VALUES
('Aarav Sharma',  'REG-2024-1001', 'Computer Science', 2, 'Active',    8.40, 'aarav.sharma@campus.edu',  '+91 98765 43210'),
('Isha Verma',    'REG-2023-1002', 'Economics',         3, 'Active',    7.90, 'isha.verma@campus.edu',    '+91 91234 56780'),
('Rohan Iyer',    'REG-2022-1003', 'Mechanical Eng.',   4, 'OnLeave',   6.80, 'rohan.iyer@campus.edu',    '+91 90000 11122'),
('Meera Reddy',   'REG-2021-1004', 'Physics',           4, 'Graduated', 9.10, 'meera.reddy@campus.edu',  '+91 99887 76655'),
('Kabir Kapoor',  'REG-2024-1005', 'Design',            1, 'Active',    7.20, 'kabir.kapoor@campus.edu', '+91 98123 45678'),
('Ananya Nair',   'REG-2023-1006', 'Biotechnology',     2, 'Active',    8.90, 'ananya.nair@campus.edu',  '+91 97654 32109'),
('Vivaan Malhotra','REG-2024-1007', 'Computer Science', 1, 'Active',    7.60, 'vivaan.malhotra@campus.edu','+91 90112 23344'),
('Saanvi Joshi',  'REG-2022-1008', 'Mathematics',       3, 'Active',    9.30, 'saanvi.joshi@campus.edu', '+91 98221 10098'),
('Arjun Menon',   'REG-2021-1009', 'Mechanical Eng.',   4, 'Graduated', 8.05, 'arjun.menon@campus.edu',  '+91 99001 22334'),
('Diya Chatterjee','REG-2023-1010','Literature',        2, 'Active',    8.20, 'diya.chatterjee@campus.edu','+91 91002 33445'),
('Kian Bose',     'REG-2024-1011', 'Design',            1, 'OnLeave',   6.50, 'kian.bose@campus.edu',    '+91 90223 44556'),
('Anika Rao',     'REG-2022-1012', 'Physics',           3, 'Active',    8.75, 'anika.rao@campus.edu',    '+91 98334 55667'),
('Reyansh Gupta', 'REG-2020-1013', 'Economics',         4, 'Graduated', 7.40, 'reyansh.gupta@campus.edu','+91 97445 66778'),
('Myra Desai',    'REG-2024-1014', 'Biotechnology',     1, 'Active',    9.05, 'myra.desai@campus.edu',   '+91 96556 77889'),
('Advait Pillai', 'REG-2023-1015', 'Computer Science',  2, 'Active',    8.55, 'advait.pillai@campus.edu','+91 95667 88990'),
('Ira Singh',     'REG-2021-1016', 'Mathematics',       4, 'OnLeave',   7.10, 'ira.singh@campus.edu',    '+91 94778 99001'),
('Vihaan Chauhan','REG-2022-1017', 'Mechanical Eng.',   3, 'Active',    7.85, 'vihaan.chauhan@campus.edu','+91 93889 00112'),
('Navya Bhatt',   'REG-2024-1018', 'Design',            1, 'Active',    8.30, 'navya.bhatt@campus.edu',  '+91 92990 11223'),
('Aryan Kulkarni','REG-2020-1019', 'Physics',           4, 'Graduated', 8.95, 'aryan.kulkarni@campus.edu','+91 91101 22334'),
('Prisha Agarwal','REG-2023-1020', 'Literature',        2, 'Active',    7.75, 'prisha.agarwal@campus.edu','+91 90212 33445');
