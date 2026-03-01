<?php
require_once '../config/database.php';
require_once '../controllers/VentaController.php';
require_once '../models/Producto.php';

$ventaController = new VentaController($pdo);
$productoModel = new Producto($pdo);

$mensaje = "";

if ($_POST) {
    $resultado = $ventaController->ejecutarVenta();
    if ($resultado) {
        $mensaje = "<script>alert('✅ Venta realizada con éxito. El stock ha sido actualizado.');</script>";
    } else {
        $mensaje = "<script>alert('❌ Error: Stock insuficiente o ID de producto no encontrado.');</script>";
    }
}

$productos = $productoModel->listar();
echo $mensaje;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-venta { background: #f0f8ff; padding: 20px; border: 1px solid #b0c4de; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>🛒 Registrar Venta</h1>
    <nav><a href="productos.php">⬅ Volver a Productos</a></nav><br>

    <div class="form-venta">
        <form method="POST">
            <input type="number" name="producto_id" placeholder="ID del Producto" required>
            <input type="number" name="cantidad" min="1" placeholder="Cantidad a vender" required>
            <button type="submit">Procesar Venta</button>
        </form>
    </div>

    <h3>Lista de Productos (Para verificar ID y Stock)</h3>
    <table>
        <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock Actual</th></tr>
        <?php foreach($productos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nombre'] ?></td>
            <td>$<?= $p['precio'] ?></td>
            <td><strong><?= $p['stock'] ?></strong></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
