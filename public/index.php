<?php
require_once '../config/database.php';
require_once '../models/Producto.php';
$productoModel = new Producto($pdo);


if (isset($_GET['eliminar'])) {
    $productoModel->eliminar($_GET['eliminar']);
    header("Location: index.php");
}

if ($_POST) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // EDITAR
        $productoModel->editar($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['stock']);
    } else {
        // CREAR NUEVO
        $productoModel->guardar($_POST['nombre'], $_POST['precio'], $_POST['stock']);
    }
    header("Location: index.php");
}

$productos = $productoModel->listar();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Inventario Universitario</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        .btn-del { color: red; }
        .btn-edit { color: blue; }
    </style>
</head>
<body>
    <h1> Gestión de Productos (Módulo 1)</h1>

    <form method="POST">
        <input type="hidden" name="id" id="id">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        <input type="number" step="0.01" name="precio" id="precio" min="0.01" placeholder="Precio > 0" required>
        <input type="number" name="stock" id="stock" min="0" placeholder="Stock >= 0" required>
        <button type="submit">Guardar Producto</button>
    </form>

    <table>
        <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>
        <?php foreach($productos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nombre'] ?></td>
            <td>$<?= $p['precio'] ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
                <!-- Botón Editar (Carga los datos en el formulario) -->
                <a href="#" class="btn-edit" onclick="llenarForm(<?= htmlspecialchars(json_encode($p)) ?>)">Editar</a> | 
                <!-- Botón Eliminar -->
                <a href="index.php?eliminar=<?= $p['id'] ?>" class="btn-del" onclick="return confirm('¿Eliminar?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script>
    function llenarForm(p) {
        document.getElementById('id').value = p.id;
        document.getElementById('nombre').value = p.nombre;
        document.getElementById('precio').value = p.precio;
        document.getElementById('stock').value = p.stock;
    }
    </script>
</body>
</html>
