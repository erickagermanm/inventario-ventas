<?php
class Producto {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }
    
    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function guardar($nombre, $precio, $stock) {
        if (empty($nombre) || $precio <= 0 || $stock < 0) {
            return false; // No cumple las validaciones
        }
        $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$nombre, $precio, $stock]);
    }
}
?>
