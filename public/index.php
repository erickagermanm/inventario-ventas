<?php 
include '../config/database.php'; 


if ($_POST) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];
    
    if($precio > 0 && $stock >= 0) {
        $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)";
        $pdo->prepare($sql)->execute([$nombre, $precio, $stock]);
    }
}


$productos = $pdo->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Mi Inventario</title></head>
<body>
    <h1>Gestión de Productos</h1>
    
    <!-- Formulario para Crear -->
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio (Ej: 10.50)" required>
        <input type="number" name="stock" placeholder="Stock inicial" required>
        <button type="submit">Agregar Producto</button>
    </form>

    <hr>

    <!-- Tabla para Listar -->
    <table border="1">
        <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>
        <?php foreach($productos as $p): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['nombre']; ?></td>
            <td>$<?php echo $p['precio']; ?></td>
            <td><?php echo $p['stock']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
