CREATE DATABASE php_ajax_crud;
USE php_ajax_crud;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    regist_number VARCHAR(50) NOT NULL,
    avg DECIMAL(5, 2),
    move_next BOOLEAN
);
