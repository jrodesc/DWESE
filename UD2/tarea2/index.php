<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2</title>
</head>

<body>
    <!--menu para elegir el tipo de formulario
Create
Read    <- AQUI IRA EL JOIN
Update
Delete-->


    <!--Formulario para elegir cual de los CRUD se desea realizar-->
    <form action="formulario.php" method="post">
        <legend>¿Que operacion desea realizar en la base de datos?</legend>
        <label>
            <input type="radio" name="crud" value="create">
            Create
        </label>
        <br>
        <label>
            <input type="radio" name="crud" value="read">
            Read
        </label>
        <br>
        <label>
            <input type="radio" name="crud" value="update">
            Update
        </label>
        <br>
        <label>
            <input type="radio" name="crud" value="delete">
            Delete
        </label>
        <br>
        <legend>Elige la tabla sobre la que realizar la operación.</legend>
        <label>
            <input type="radio" name="tabla" value="cliente">
            Cliente
        </label>
        <br>
        <label>
            <input type="radio" name="tabla" value="empleado">
            Empleado
        </label>
        <br>
        <label>
            <input type="radio" name="tabla" value="pedido">
            Pedido
        </label>
        <br>
        <label>
            <input type="radio" name="tabla" value="producto">
            Producto
        </label>
        <br>
        <label>
            <input type="radio" name="tabla" value="detalle_pedido">
            Detalle pedido
        </label>
        <br>
        <input type="submit" value="enviar">
    </form>

</body>

</html>
<?php
$dwes=null;
$config = parse_ini_file('./config.inc.ini');
$dsn = 'mysql:host='.$config['server'].';dbname='.$config['base'];
$dwes = new PDO($dsn,$config['usu'],$config['pas']);
//aqui realizaremos el codigo para decidir si se realiza una u otra consulta.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['crud']) || !isset($_POST['tabla'])) {
        die("Debe seleccionar operación y tabla");
    }

    $operaciones_validas = ['create', 'read', 'update', 'delete'];
    $tablas_validas = ['cliente', 'empleado', 'pedido', 'producto', 'detalle_pedido'];

    if (
        !in_array($_POST['crud'], $operaciones_validas) ||
        !in_array($_POST['tabla'], $tablas_validas)
    ) {
        die("Operación o tabla no válida");
    }
}
?>