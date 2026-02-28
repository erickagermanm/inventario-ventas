# inventario-ventas
#  Descripción del Sistema Web: Gestión de Inventario + Ventas
Sistema básico que permite gestionar el inventario, ingreso de productos y registro de ventas
Su desarrollo contiene una interfaz sencilla y de fácil uso.

## 1. Requisitos 
- **XAMPP** con PHP 8.0 o superior.
- Navegador Web (Chrome, Edge, etc).

## 2. Pasos para la instalación 
1. **Descargar el proyecto:** Clona este repositorio en `C:/xampp/htdocs/Sistema_ventas`.
2. **Base de Datos:**
   - Abre `localhost/phpmyadmin`.
   - Crea una base de datos llamada `sistema_inventario`.
   - Importa el archivo situado en `/database/inventario.sql`.
3. **Ejecución:**
   - Abre el Panel de Control de XAMPP e inicia **Apache** y **MySQL**.
   - Ingresa en tu navegador a: `http://localhost/Sistema_ventas/public/index.php`.

## 3. Funcionalidades implementadas
- **Ventas:** Permite el registro automatizado de cada venta que se genera, almacenando cada transacción.
- **Inventario:** Permite el control de stock de mercaderia, precios y nombre de productos.
- **Conexión Segura:** Uso de PDO para la base de datos.

## 4. Usuario prueba
- **No requiere login**

## 5. Capturas
