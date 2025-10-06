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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $admin = "prueba";
    $password = "1234";
    $base = "tarea_1_db";

    $dwes = new PDO("mysql:host=$server;dbname=$base", $admin, $password);

    $usu = $_POST["usuario"];
    $pass = $_POST["pass"];

    $sql = "SELECT usuario, email FROM usuarios WHERE usuario = ? AND pass = ?";

    $stmt = $dwes->prepare($sql);
    $stmt->execute([$usu, $pass]);

    if ($stmt->rowCount() > 0) {
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