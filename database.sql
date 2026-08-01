CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO users (name, email) VALUES
('Jhoan Ceron', 'jhoan@itla.edu.do'),
('Ricky Ceron', 'ricky@itla.edu.do'),
('Alanna Ceron', 'alanna@itla.edu.do');