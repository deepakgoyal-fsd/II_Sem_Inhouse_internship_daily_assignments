-- =====================================================================
-- PRAVAH 2026 — DATABASE.SQL
-- Creates the database and the "registrations" table
-- =====================================================================

-- -----------------------------------------------------------------
-- 1. CREATE DATABASE
-- -----------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS pravah2026
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

-- Select the database for the statements below
USE pravah2026;

-- -----------------------------------------------------------------
-- 2. CREATE TABLE: registrations
-- -----------------------------------------------------------------
CREATE TABLE IF NOT EXISTS registrations (

    -- Unique ID for each registration (Primary Key, auto increments)
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Participant's full name
    full_name VARCHAR(100) NOT NULL,

    -- Participant's email address (must be unique to prevent duplicates)
    email VARCHAR(150) NOT NULL,

    -- 10-digit mobile number
    mobile VARCHAR(15) NOT NULL,

    -- College / institution name
    college_name VARCHAR(150) NOT NULL,

    -- Branch / department of study
    branch VARCHAR(100) NOT NULL,

    -- Academic year (e.g. 1st, 2nd, 3rd, 4th)
    academic_year VARCHAR(20) NOT NULL,

    -- Gender (kept flexible using ENUM)
    gender ENUM('Male', 'Female', 'Other') NOT NULL,

    -- City the participant is coming from
    city VARCHAR(100) NOT NULL,

    -- Event category the participant is registering for
    event_category VARCHAR(100) NOT NULL,

    -- Whether the participant has previous experience in similar events
    previous_experience ENUM('Yes', 'No') NOT NULL DEFAULT 'No',

    -- Date & time when the registration was submitted (auto-filled)
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    -- Set id as the Primary Key
    PRIMARY KEY (id),

    -- Ensure no two registrations share the same email
    UNIQUE KEY unique_email (email)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;