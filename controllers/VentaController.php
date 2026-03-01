<?php
require_once '../services/VentaService.php';

class VentaController {
    private $servicio;
    public function __construct($db) { $this->servicio = new VentaService($db); }

    public function ejecutarVenta() {
        if ($_POST) {
            return $this->servicio->realizarVenta($_POST['producto_id'], $_POST['cantidad']);
        }
        return false;
    }
}
