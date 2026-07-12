-- =========================================================
-- TIME ZONE CONVERTER - DATABASE SETUP FILE
-- =========================================================
-- This file creates the database and table needed for the project.
-- Just import this file in phpMyAdmin and everything will be ready.
-- =========================================================

-- Create the database (only if it doesn't already exist)
CREATE DATABASE IF NOT EXISTS timezone_converter;

-- Select the database so the next commands apply to it
USE timezone_converter;

-- =========================================================
-- Table: conversion_history
-- This table stores every time zone conversion the user makes
-- =========================================================
CREATE TABLE IF NOT EXISTS conversion_history (

    -- Unique ID for every record (auto increases by itself)
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- The date the user picked in the form
    input_date DATE NOT NULL,

    -- The time the user picked in the form
    input_time TIME NOT NULL,

    -- The time zone the user is converting FROM
    from_timezone VARCHAR(50) NOT NULL,

    -- The time zone the user is converting TO
    to_timezone VARCHAR(50) NOT NULL,

    -- The final converted date and time (stored as text, e.g. "2026-07-12 14:30:00")
    converted_datetime VARCHAR(50) NOT NULL,

    -- Automatically stores the exact moment this record was created
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- Insert some sample data (optional)
-- This helps you see the History table working immediately
-- =========================================================
INSERT INTO conversion_history
    (input_date, input_time, from_timezone, to_timezone, converted_datetime, created_at)
VALUES
    ('2026-07-12', '10:00:00', 'Asia/Kolkata', 'America/New_York', '2026-07-12 00:30:00', NOW()),
    ('2026-07-12', '15:00:00', 'Asia/Kolkata', 'Europe/London', '2026-07-12 10:30:00', NOW());
