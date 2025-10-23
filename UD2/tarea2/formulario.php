<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$operacion = $_POST['crud'] ?? '';
$tabla = $_POST['tabla'] ?? '';

// Validaciones...

if ($operacion === 'read' && $tabla === 'empleado') {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Read sobre empleado</title>
    </head>

    <body>
        <h2>Vision de informacion del empleado</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="read">
            <input type="hidden" name="tabla" value="empleado">

            <label>
                ID:
                <input type="text" name="id_empleado" required maxlength="40">
            </label>
            <br>

            <input type="submit" value="Buscar empleado">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === "create" && $tabla === "empleado") {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Crear Empleado</title>
    </head>

    <body>
        <h2>Crear nuevo empleado</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="create">
            <input type="hidden" name="tabla" value="empleado">

            <label>
                Usuario:
                <input type="text" name="usuario_empleado" required maxlength="40">
            </label>
            <br>

            <label>
                Email:
                <input type="email" name="email_empleado" required maxlength="40">
            </label>
            <br>

            <label>
                Contraseña:
                <input type="password" name="pass_empleado" required minlength="6">
            </label>
            <br>

            <label>
                DNI (con letra):
                <input type="text" name="dni_empleado" required pattern="[0-9]{8}[A-Z]"
                    placeholder="12345678A" maxlength="9">
            </label>
            <br>

            <label>
                Fecha de nacimiento:
                <input type="date" name="f_nac_empleado" required>
            </label>
            <br>

            <input type="submit" value="Crear empleado">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === "update" && $tabla === "empleado") {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update empleado</title>
    </head>

    <body>
        <h2>Actualizar informacion del empleado</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="update">
            <input type="hidden" name="tabla" value="empleado">

            <label>
                Seleccione el id del empleado a Actualizar
                <input type="text" name="id_empleado">
            </label>
            <br>
            <label>
                Seleccione el nuevo nombre de usuario
                <input type="text" name="usuario_empleado">
            </label>
            <br>
            <label>
                Seleccione el nuevo email del usuario
                <input type="text" name="email_empleado">
            </label>
            <br>
            <label>
                Seleccione el nuevo dni
                <input type="text" name="dni_empleado">
            </label>
            <br>
            <label>
                Seleccione la nueva fecha de nacimiento
                <input type="date" name="f_nac_empleado">
            </label>
            <br>
            <input type="submit" value="Actualizar empleado">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === 'delete' && $tabla === 'empleado') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar empleado</title>
    </head>

    <body>
        <h2>Eliminar empleado</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="delete">
            <input type="hidden" name="tabla" value="empleado">

            <label>
                Seleccione el id del empleado a borrar
                <input type="text" name="id_empleado">
            </label>
            <br>
            <input type="submit" value="Eliminar empleado">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
}
//-------------------------------------------------------------
//Formularios de Cliente
//-------------------------------------------------------------
else if ($operacion === "create" && $tabla === "cliente") {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Crear cliente</title>
    </head>

    <body>
        <h2>Crear nuevo cliente</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="create">
            <input type="hidden" name="tabla" value="cliente">

            <label>
                Usuario:
                <input type="text" name="usuario_cliente" required maxlength="40">
            </label>
            <br>

            <label>
                Email:
                <input type="email" name="email_cliente" required maxlength="40">
            </label>
            <br>

            <label>
                Contraseña:
                <input type="password" name="pass_cliente" required minlength="6">
            </label>
            <br>

            <label>
                DNI (con letra):
                <input type="text" name="dni_cliente" required pattern="[0-9]{8}[A-Z]"
                    placeholder="12345678A" maxlength="9">
            </label>
            <br>

            <label>
                Fecha de nacimiento:
                <input type="date" name="f_nac_cliente" required>
            </label>
            <br>

            <input type="submit" value="Crear cliente">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === 'read' && $tabla === 'cliente') {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Read sobre cliente</title>
    </head>

    <body>
        <h2>Vision de informacion del cliente</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="read">
            <input type="hidden" name="tabla" value="cliente">

            <label>
                ID:
                <input type="text" name="id_cliente" required maxlength="40">
            </label>
            <br>

            <input type="submit" value="Buscar cliente">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'update' && $tabla === 'cliente') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update cliente</title>
    </head>

    <body>
        <h2>Actualizar informacion del cliente</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="update">
            <input type="hidden" name="tabla" value="cliente">

            <label>
                Seleccione el id del cliente a Actualizar
                <input type="text" name="id_cliente">
            </label>
            <br>
            <label>
                Seleccione el nuevo nombre de cliente
                <input type="text" name="usuario_cliente">
            </label>
            <br>
            <label>
                Seleccione el nuevo email del cliente
                <input type="text" name="email_cliente">
            </label>
            <br>
            <label>
                Seleccione el nuevo dni del cliente
                <input type="text" name="dni_cliente">
            </label>
            <br>
            <label>
                Seleccione la nueva fecha de nacimiento
                <input type="date" name="f_nac_cliente">
            </label>
            <br>
            <input type="submit" value="Actualizar cliente">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'delete' && $tabla === 'cliente') {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar Cliente</title>
    </head>

    <body>
        <h2>Eliminar empleado</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="delete">
            <input type="hidden" name="tabla" value="cliente">

            <label>
                Seleccione el id del empleado a borrar
                <input type="text" name="id_cliente">
            </label>
            <br>
            <input type="submit" value="Eliminar cliente">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'create' && $tabla === 'producto') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear producto</title>
    </head>

    <body>
        <h2>Crear producto</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="create">
            <input type="hidden" name="tabla" value="producto">

            <label>
                Categoria del producto
                <select name="categoria_producto" id="categoria">
                    <option value="ropa">Ropa</option>
                    <option value="libros">Libros</option>
                    <option value="hogar">Hogar</option>
                    <option value="electronica">Electronica</option>
                    <option value="deporte">deporte</option>
                </select>
            </label>
            <br>
            <label>
                Nombre del producto
                <input type="text" name="nombre_producto">
            </label>
            <br>
            <label>
                Precio del producto
                <input type="number" name="precio_producto">
            </label>
            <br>
            <label>
                Stock del producto
                <input type="number" name="stock_producto">
            </label>
            <br>
            <label>
                Descripcion del producto
                <input type="text" name="descripcion_producto">
            </label>
            <br>
            <input type="submit" value="crear producto">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'read' && $tabla === 'producto') {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Read sobre producto</title>
    </head>

    <body>
        <h2>Vision de informacion del producto</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="read">
            <input type="hidden" name="tabla" value="producto">

            <label>
                ID:
                <input type="text" name="id_producto" required maxlength="40" require>
            </label>
            <br>

            <input type="submit" value="Buscar producto">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === 'update' && $tabla === 'producto') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update producto</title>
    </head>

    <body>
        <h2>Actualizar informacion del producto</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="update">
            <input type="hidden" name="tabla" value="producto">

            <label>
                Seleccione el id del producto a Actualizar
                <input type="text" name="id_producto">
            </label>
            <br>
            <label>
                Seleccione la nueva categoria del producto
                <select name="categoria_producto" id="categoria_producto">
                    <option value="ropa">Ropa</option>
                    <option value="libros">Libros</option>
                    <option value="hogar">Hogar</option>
                    <option value="electronica">Electronica</option>
                    <option value="deporte">deporte</option>
                </select>
            </label>
            <br>
            <label>
                Seleccione el nuevo nombre del producto
                <input type="text" name="nombre_producto">
            </label>
            <br>
            <label>
                Seleccione el nuevo precio del producto
                <input type="number" name="precio_producto">
            </label>
            <br>
            <label>
                Seleccione el nuevo stock del producto
                <input type="number" name="stock_producto">
            </label>
            <br>
            <label>
                Seleccione la nueva descripcion del producto
                <input type="text" name="descripcion_producto">
            </label>
            <input type="submit" value="Actualizar producto">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === 'delete' && $tabla === 'producto') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar producto</title>
    </head>

    <body>
        <h2>Eliminar producto</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="delete">
            <input type="hidden" name="tabla" value="producto">

            <label>
                Seleccione el id del producto a borrar
                <input type="text" name="id_producto">
            </label>
            <br>
            <input type="submit" value="Eliminar producto">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'create' && $tabla === 'pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create pedido</title>
    </head>

    <body>
        <h2>Creacion de un pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="create">
            <input type="hidden" name="tabla" value="pedido">

            <label>
                Fecha :
                <input type="date" name="fecha_ped" required maxlength="40">
            </label>
            <br>

            <label>
                Hora:
                <input type="time" name="hora_ped" required>
            </label>
            <br>

            <label>
                Cliente:
                <input type="text" name="cliente" required>
            </label>
            <br>

            <label>
                Empleado:
                <input type="text" name="empleado" required>
            </label>
            <br>
            <input type="submit" value="Crear pedido">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'read' && $tabla === 'pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>read pedido</title>
    </head>

    <body>
        <h2>Consultar pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="read">
            <input type="hidden" name="tabla" value="pedido">

            <label>
                Id del pedido:
                <input type="number" name="id_pedido">
            </label>
            <br>
            <input type="submit" value="Consultar pedido" id="consulta_pedido">
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'update' && $tabla === 'pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update pedido </title>
    </head>

    <body>
        <h2>Actualizar informacion del pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="update">
            <input type="hidden" name="tabla" value="pedido">

            <label>
                Seleccione el id del pedido a Actualizar
                <input type="text" name="id_pedido">
            </label>
            <br>
            <label>
                Seleccione la nueva fecha de pedido
                <input type="date" name="fecha_ped">
            </label>
            <br>
            <label>
                Seleccione la nueva hora del pedido
                <input type="time" name="hora_ped">
            </label>
            <br>
            <label>
                Seleccione el nuevo id de cliente
                <input type="number" name="cliente">
            </label>
            <br>
            <label>
                Seleccione el nuevo id de empleado
                <input type="number" name="empleado">
            </label>
            <input type="submit" value="Actualizar pedido">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>


<?php
} else if ($operacion === 'delete' && $tabla === 'pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar pedido</title>
    </head>

    <body>
        <h2>Eliminar pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="delete">
            <input type="hidden" name="tabla" value="pedido">

            <label>
                Seleccione el id del producto a borrar
                <input type="text" name="id_pedido">
            </label>
            <br>
            <input type="submit" value="Eliminar producto">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === 'create' && $tabla === 'detalle_pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create detalle_pedido</title>
    </head>

    <body>
        <h2>Creacion de un detalle_pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="create">
            <input type="hidden" name="tabla" value="detalle_pedido">

            <label>
                id del pedido
                <input type="number" name="id_pedido" required maxlength="40">
            </label>
            <br>

            <label>
                cantidad:
                <input type="number" name="cantidad" required>
            </label>
            <br>

            <label>
                id_producto:
                <input type="number" name="id_prod" required>
            </label>
            <br>

            <label>
                Precio:
                <input type="number" name="precio" required>
            </label>
            <br>
            <label>
                total:
                <input type="number" name="total" required>
            </label>

            <input type="submit" value="Crear detalle_pedido">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if ($operacion === 'read' && $tabla === 'detalle_pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>read pedido</title>
    </head>

    <body>
        <h2>Consultar detalle pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="read">
            <input type="hidden" name="tabla" value="detalle_pedido">

            <label>
                Id del detalle de pedido:
                <input type="number" name="id_ped">
            </label>
            <br>
            <input type="submit" value="Consultar detalle pedido">
        </form>
    </body>

    </html>

<?php
} else if ($operacion === 'update' && $tabla === 'detalle_pedido') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update pedido </title>
    </head>

    <body>
        <h2>Actualizar informacion del pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="update">
            <input type="hidden" name="tabla" value="detalle_pedido">

            <label>
                Seleccione el id del detalle de pedido a Actualizar
                <input type="number" name="id_detalle">
            </label>
            <br>
            <label>
                Seleccione el nuevo id de pedido
                <input type="number" name="id_ped">
            </label>
            <br>
            <label>
                Seleccione la nueva cantidad
                <input type="number" name="cantidad">
            </label>
            <br>
            <label>
                Seleccione el nuevo id de producto
                <input type="number" name="id_prod">
            </label>
            <br>
            <label>
                Seleccione el nuevo precio
                <input type="number" name="precio">
            </label>
            <br>
            <label>
                Seleccione el nuevo total
                <input type="number" name="total">
            </label>
            <br>
            <input type="submit" value="Actualizar pedido">
            <a href="index.php">Cancelar</a>
        </form>
    </body>

    </html>
<?php
} else if($operacion === 'delete' && $tabla === 'detalle_pedido') {
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar pedido</title>
    </head>

    <body>
        <h2>Eliminar pedido</h2>
        <form action="procesar.php" method="post">
            <input type="hidden" name="crud" value="delete">
            <input type="hidden" name="tabla" value="detalle_pedido">

            <label>
                Seleccione el id del detalle de producto a borrar
                <input type="text" name="id_detalle">
            </label>
            <br>
            <input type="submit" value="Eliminar detalle producto">
            <a href="index.php">Cancelar</a>
        </form>
    </body>
    </html>
<?php  
}
?>