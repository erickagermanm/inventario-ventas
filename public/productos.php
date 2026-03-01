<?php
// 1. Enlaces a la configuración y al controlador
require_once '../config/database.php';
require_once '../controllers/ProductoController.php';

$controller = new ProductoController($pdo);

// 2. Ejecutar acciones (Crear, Editar o Eliminar) si se envían datos
$controller->manejarPeticion();

// 3. Obtener la lista de productos para mostrarla en la tabla
$productos = $controller->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Productos - CRUD</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .form-container { background: #f9f9f9; padding: 20px; border: 1px solid #ccc; margin-bottom: 20px; }
        .btn-edit { color: blue; cursor: pointer; text-decoration: underline; }
        .btn-delete { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <h1> Gestión de Productos (Módulo 1)</h1>
    <nav><a href="ventas.php">Ir a Módulo de Ventas</a></nav><br>

    <div class="form-container">
        <h3 id="form-title">Crear Producto</h3>
        <form method="POST">
            <!-- Campo oculto para el ID al editar -->
            <input type="hidden" name="id" id="prod_id">
            
            <input type="text" name="nombre" id="prod_nombre" placeholder="Nombre" required>
            <input type="number" step="0.01" name="precio" id="prod_precio" min="0.01" placeholder="Precio > 0" required>
            <input type="number" name="stock" id="prod_stock" min="0" placeholder="Stock >= 0" required>
            
            <button type="submit" name="accion" value="guardar">Guardar Producto</button>
            <button type="button" onclick="limpiarForm()">Cancelar</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['nombre']) ?></td>
                <td>$<?= number_format($p['precio'], 2) ?></td>
                <td><?= $p['stock'] ?></td>
                <td>
                    <!-- Función para cargar datos en el formulario y EDITAR -->
                    <span class="btn-edit" onclick="editarProducto(<?= htmlspecialchars(json_encode($p)) ?>)">Editar</span> | 
                    <!-- Enlace para ELIMINAR -->
                    <a href="productos.php?eliminar=<?= $p['id'] ?>" class="btn-delete" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function editarProducto(producto) {
            document.getElementById('form-title').innerText = "Editar Producto ID: " + producto.id;
            document.getElementById('prod_id').value = producto.id;
            document.getElementById('prod_nombre').value = producto.nombre;
            document.getElementById('prod_precio').value = producto.precio;
            document.getElementById('prod_stock').value = producto.stock;
        }

        function limpiarForm() {
            document.getElementById('form-title').innerText = "Crear Producto";
            document.getElementById('prod_id').value = "";
            document.getElementById('prod_nombre').value = "";
            document.getElementById('prod_precio').value = "";
            document.getElementById('prod_stock').value = "";
        }
    </script>
</body>
</html>
