<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="tarea1.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" require>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <input type="submit" value="login" id="login" name="login">
    </form>
</body>

</html>

<?php
//nos aseguramos de que el metodo post ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $admin = "prueba";
    $password = "1234";
    $base = "tarea_1_db";

    //realizamos la conexion con la base de datos
    $dwes = mysqli_connect($server, $admin, $password, $base);

    //si la conexion no se puede realizar se lanzara un mensaje avisando de que hubo un error al conectar con la base de datos
    if (!$dwes) {
        echo "Error al conectar con la base de datos: ";
    }

    //aqui declaramos las variables que tomamos del usuario
    //con real escape string nos aseguramos de que no se puede inyectar sentencias SQL en el campo
    $usu = mysqli_real_escape_string($dwes, $_POST["usuario"]);
    $pass = mysqli_real_escape_string($dwes, $_POST["pass"]);

    //preparamos la sentencia SQL diciendo que los datos se van a añadir.
    $stmt = $dwes->prepare("SELECT usuario, email FROM usuarios WHERE usuario = ? AND pass = ?");
    //al statement ya preparado le decimos que esos interrogantes de arriba se llenaran con las variables dadas
    $stmt->bind_param("ss", $usu, $pass);
    //se ejecuta el statement SQL
    $stmt->execute();
    //se devuelve el resultado de la sentencia SQL
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while($res = $resultado->fetch_object()) {
            echo "Bienvenido " . $res->usuario;
            echo "<br>";
            echo "Tu email es: " . $res->email;
        }
    } else {
        echo "No se pudo realizar el login.";
    }
}

?>