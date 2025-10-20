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
        <input type="submit" value="enviar">
    </form>

</body>

</html>

<?php  
    $operacion = $_POST['crud'] ?? '';

    switch($operacion) {
        case "create":
            include_once("create.php");
            break;
        case "read":
            include_once("read.php");
            break;
        case "update":
            include_once("update.php");
            break;
        case "delete":
            include_once("delete.php");
            break;
        // Si no hay operación, no hace nada (muestra el formulario)
    }
?> 