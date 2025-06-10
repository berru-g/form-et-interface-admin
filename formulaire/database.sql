CREATE DATABASE IF NOT EXISTS berru_template CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- supabase c'est de la merde on reviens sur sql et php
USE berru_template;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    statut VARCHAR(50),
    telephone VARCHAR(20),
    budget VARCHAR(20),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- compteur de message non luee !
ALTER TABLE contacts ADD COLUMN is_read TINYINT(1) DEFAULT 0;
-- Pour initialiser les anciens messages comme non lus
UPDATE contacts SET is_read = 0 WHERE is_read IS NULL;