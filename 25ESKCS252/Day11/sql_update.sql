USE students_management;

ALTER TABLE students ADD COLUMN photo VARCHAR(255) DEFAULT NULL;

-- Create uploads directory in your project folder
-- mkdir uploads/ (in day11 folder)