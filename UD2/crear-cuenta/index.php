<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="email">email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <label for="pass-confirm">Confirma contraseña:</label>
        <input type="password" id="pass-confirm" name="pass-confirm" required>
        <br>
        <input type="submit" value="login" id="login" name="login">
    </form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $admin = "prueba";
    $password = "1234";
    $base = "tarea_1_db";

    $dwes = new PDO("mysql:host=$server;dbname=$base", $admin, $password);

    $usu = $_POST["usuario"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passConfirm = $_POST["pass-confirm"];

    if($pass == $passConfirm) {
        $sql = "INSERT INTO usuarios (usuario, pass, email) VALUES (?, ?, ?);";
        $stmt = $dwes->prepare($sql);
        $stmt->execute([$usu, $pass, $email]);
        echo "usuario creado";
    } else {
        echo "La confirmacion de contraseña tuvo un error.";
        echo "Introduzca la contraseña nuevamente";
    }
}





?>