CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO items (name, description) VALUES
('Sample Item 1', 'This is a test record'),
('Sample Item 2', 'Another test record');
