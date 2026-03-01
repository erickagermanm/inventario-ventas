<?php
require_once '../config/database.php';
require_once '../models/Producto.php';

$productoModel = new Producto($pdo);

// Procesar formulario si se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $stock  = $_POST['stock'] ?? 0;
    
    $productoModel->guardar($nombre, $precio, $stock);
}

$lista = $productoModel->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Inventario Universitario</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .form-box { background: #f9f9f9; padding: 20px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Gestión de Productos</h1>

    <div class="form-box">
        <h3>Agregar Nuevo Producto</h3>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="number" step="0.01" name="precio" min="0.01" placeholder="Precio" required>
            <input type="number" name="stock" min="0" placeholder="Stock" required>
            <button type="submit">Guardar</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['nombre']) ?></td>
                <td>$<?= number_format($p['precio'], 2) ?></td>
                <td><?= $p['stock'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
