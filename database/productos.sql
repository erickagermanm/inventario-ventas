CREATE DATABASE IF NOT EXISTS inventario_ventas;
USE inventario_ventas;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL, 
    stock INT NOT NULL DEFAULT 0    
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    fecha_venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO productos (nombre, precio, stock) VALUES 
('Laptop Dell', 850.00, 10),
('Mouse Logi', 25.50, 50),
('Teclado RGB', 45.00, 30);
