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

## 5. Capturas Evidencias de Funcionamiento y Pruebas

###  1. Base de Datos (Estructura y Datos)
![Estructura BD](./public/1.%20Base%20de%20Datos%20en%20phpMyAdmin.png)
![Productos en BD](./public/1.1%20Productos%20en%20BD%20phpMyAdmin.png)

###  2. Interfaz y Conexión
*Carga inicial del sistema conectando con la base de datos:*
![Carga y Conexión](./public/2.%20Carga%20y%20Conexión.png)

###  3. Registro de Productos (CRUD)
*Proceso de inserción y confirmación de nuevo dato:*
![Inserción de Datos](./public/3.%20Inserción%20de%20Datos%20(Crear).png)
![Dato Creado](./public/4.%20Datos%20creado.png)

###  4. Pruebas de Validaciones (Seguridad)
*El sistema rechaza precios negativos y campos vacíos según lo solicitado:*
![Precio Negativo](./public/5.1%20Validaciones%20Prueba%20de%20Precio%20Negativo.png)
![Stock Vacío](./public/5.2%20Validaciones%20rueba%20de%20Stock%20Vacío.png)


