
#  Descripción del Sistema Web: Gestión de Inventario + Ventas
Sistema básico que permite gestionar el inventario, ingreso de productos y registro de ventas
Su desarrollo contiene una interfaz sencilla y de fácil uso.

## 1. Requisitos 
- **XAMPP** Tener instalado
- Descargar este repositorio en `C:/xampp/htdocs/inventario-ventas`.
- En XAMPP, iniciar Apache y MySQL
- 
## 2. Pasos para la instalación 
1. **Descargar el proyecto:** Clona este repositorio en `C:/xampp/htdocs/inventario-ventas`.
2. **Base de Datos:**
   - Abre `localhost/phpmyadmin`.
   - Importa el archivo `database/productos.sql` en [phpMyAdmin](http://localhost/phpmyadmin/).
3. **Ejecución:**
   - Abre el Panel de Control de XAMPP e inicia **Apache** y **MySQL**.
   - Ingresa en tu navegador a: http://localhost/phpmyadmin/index.php?route=/database/structure&db=inventario_ventas 

## 3. Estructura del Proyecto
- **/config**: Conexión PDO a la Base de Datos.
- **/database**: Script SQL de creación de tablas.
- **/models**: Lógica de negocio (CRUD de Productos).
- **/public**: Interfaz de usuario (Formularios y Tablas).

## 4. Validaciones implementadas
- **No requiere login**
- - Nombre de producto obligatorio.
- Stock no permite valores negativos (Stock >= 0).
- Precio debe ser mayor a cero (Precio > 0).

## 5. Capturas Evidencias de Funcionamiento y Pruebas

### Base de Datos
![Estructura](./public/db_estructura.png)
![Datos](./public/db_datos.png)

### Interfaz y Registro
![Conexión](./public/conexion.png)
![Registro](./public/registro.png)
![Tabla](./public/tabla_final.png)

### Pruebas de Validaciones
![Precio](./public/valida_precio.png)
![Stock](./public/valida_stock.png)

