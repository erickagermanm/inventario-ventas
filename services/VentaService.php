<?php
require_once '../models/Producto.php';
require_once '../models/Venta.php';

class VentaService {
    private $productoModel;
    private $ventaModel;

    public function __construct($db) {
        $this->productoModel = new Producto($db);
        $this->ventaModel = new Venta($db);
    }

    public function realizarVenta($producto_id, $cantidad) {
        
        $db = $this->productoModel->getPDO();
        
        // 1. Restamos el stock (solo si hay suficiente)
        $sql = "UPDATE productos SET stock = stock - ? WHERE id = ? AND stock >= ?";
        $stmt = $db->prepare($sql);
        
        if ($stmt->execute([$cantidad, $producto_id, $cantidad]) && $stmt->rowCount() > 0) {
            // 2. Registramos la venta si el stock se restó con éxito
            return $this->ventaModel->registrar($producto_id, $cantidad);
        }
        return false; // Retorna falso si no hay stock o el ID no existe
    }
}
