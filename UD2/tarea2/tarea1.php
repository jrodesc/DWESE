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
    <form action="tarea1.php" method="post">
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
    $operacion = $_REQUEST['figura'] ?? '';
    if(isset($_POST["enviar"])) {
        $operacion = $_POST["enviar"];
    }

    $resultado = comprobarOperacion($operacion);

    //en funcion de que seleccione el usuario, se le redirigira a una pagina u otra donde tendra el formulario
    //pertinente.
    function comprobarOperacion($operacion) {
        switch ($operacion) {
            case "create":
                return 0;
                break;

            case "read":
                return 1;
                break;

            case "update":
                return 2;
                break;

            case "delete":
                return 3;
                break;
        }
    }

    echo "$resultado";

    

?>