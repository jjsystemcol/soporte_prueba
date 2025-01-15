CREATE DATABASE IF NOT EXISTS support_system;

USE support_system;

CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status ENUM('Pendiente', 'En Progreso', 'Completado') NOT NULL DEFAULT 'Pendiente',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);