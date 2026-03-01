<?php
class Producto {
    private $pdo;
    public function __construct($db) { $this->pdo = $db; }

    // LISTAR productos
    public function listar() {
        return $this->pdo->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function guardar($nombre, $precio, $stock) {
        if(empty($nombre) || $precio <= 0 || $stock < 0) return false;
        $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$nombre, $precio, $stock]);
    }

    
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = ?";
        return $this->pdo->prepare($sql)->execute([$id]);
    }

    
    public function editar($id, $nombre, $precio, $stock) {
        if(empty($nombre) || $precio <= 0 || $stock < 0) return false;
        $sql = "UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?";
        return $this->pdo->prepare($sql)->execute([$nombre, $precio, $stock, $id]);
    }
}
?>
