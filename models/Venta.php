<?php
class Venta {
    private $pdo;
    public function __construct($db) { $this->pdo = $db; }

    public function registrar($producto_id, $cantidad) {
        $sql = "INSERT INTO ventas (producto_id, cantidad) VALUES (?, ?)";
        return $this->pdo->prepare($sql)->execute([$producto_id, $cantidad]);
    }
}
