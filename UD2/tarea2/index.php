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
    <form action="index.php" method="post">
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
           producto 
        </label>
        <br>
        <label>
            <input type="radio" name="tabla" value="detalle_pedido">
            Detalle pedido 
        </label>
        <input type="submit" value="enviar">
    </form>

</body>

</html>
<?php
$dwes = null;
$config = parse_ini_file('./config.inc.ini');
$dsn = 'mysql:host=' . $config['server'] . ';dbname=' . $config['base'];
$dwes = new PDO($dsn, $config['usu'], $config['pas']);

?>