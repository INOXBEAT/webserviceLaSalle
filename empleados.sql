-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS empleados;

-- Seleccionar la base de datos
USE empleados;

-- Crear la tabla "funcionarios"
CREATE TABLE IF NOT EXISTS funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    rol VARCHAR(100),
    codigo INT,
    area VARCHAR(100)
);

-- Insertar algunos datos de ejemplo en la tabla "funcionarios"
INSERT INTO funcionarios (nombre, rol, codigo, area) VALUES
('Andrés García', 'Docente', 302010, 'Humanidades'),
('Paula Saenz', 'Rector', 102050, 'Ingeniería'),
('Jorge Valbuena', 'Docente', 302060, 'Artes'),
('Enrique González', 'Decano', 421520, 'Humanidades'),
('Juana López', 'Docente', 306023, 'Ingeniería');
