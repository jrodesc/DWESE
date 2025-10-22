<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="tarea1-pdo.php" method="post">
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
//si el metodo de request es igual a post se ejecuta el codigo si no pues no
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //declaramos las variables que usaremos para iniciar sesion
    $server = "localhost";
    $admin = "prueba";
    $password = "1234";
    $base = "tarea_1_db";

    //establecemos la nueva conexion con la base de datos
    $dwes = new PDO("mysql:host=$server;dbname=$base", $admin, $password);

    //declaramos e iniciamos las variables usuario y contraseña
    $usu = $_POST["usuario"];
    $pass = $_POST["pass"];

    //declaramos la sentencia SQL 
    $sql = "SELECT usuario, email FROM usuarios WHERE usuario = ? AND pass = ?";

    //preparamos el statement
    $stmt = $dwes->prepare($sql);
    //ejecutamos el statement con los valores asignados
    $stmt->execute([$usu, $pass]);

    //si el total de filas es mayor a 0
    if ($stmt->rowCount() > 0) {
        //mientras que se puedan buscar objetos, se buscaran
        while ($res = $stmt->fetchObject()) {
            echo "Bienvenido " . $res->usuario;
            echo "<br>";
            echo "Tu email es: " . $res->email;
        }
    } else {
        echo "No se pudo realizar el login";
    }
}
?>