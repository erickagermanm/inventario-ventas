<?php
require_once '../config/database.php';
require_once '../models/Producto.php';

$productoModel = new Producto($pdo);

if ($_POST) {
    $productoModel->guardar($_POST['nombre'], $_POST['precio'], $_POST['stock']);
}

$lista = $productoModel->listar();
?>
<h1>Inventario</h1>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <button type="submit">Registrar</button>
</form>
<table border="1">
    <tr><th>Nombre</th><th>Precio</th><th>Stock</th></tr>
    <?php foreach($lista as $p): ?>
    <tr>
        <td><?= $p['nombre'] ?></td>
        <td><?= $p['precio'] ?></td>
        <td><?= $p['stock'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
