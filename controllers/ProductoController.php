<?php
require_once '../models/Producto.php';

class ProductoController {
    private $modelo;

    public function __construct($db) {
        $this->modelo = new Producto($db);
    }

    public function listarProductos() {
        return $this->modelo->listar();
    }

    public function manejarPeticion() {
        // Lógica para ELIMINAR
        if (isset($_GET['eliminar'])) {
            $this->modelo->eliminar($_GET['eliminar']);
            header("Location: productos.php");
            exit;
        }

        // Lógica para GUARDAR (Crear o Editar)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            if ($id) {
                $this->modelo->editar($id, $nombre, $precio, $stock);
            } else {
                $this->modelo->guardar($nombre, $precio, $stock);
            }
            header("Location: productos.php");
            exit;
        }
    }
}
