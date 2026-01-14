-- Create database and contacts table for Foresight Academy
CREATE DATABASE IF NOT EXISTS foresight_academy CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE foresight_academy;

CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(191) NOT NULL,
  email VARCHAR(191) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
