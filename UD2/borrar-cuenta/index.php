<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuario</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <label for="pass-confirm">Confirma contraseña:</label>
        <input type="password" id="pass-confirm" name="pass-confirm" required>
        <br>
        <input type="submit" value="eliminar cuenta" id="delete" name="delete">
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
    $pass = $_POST["pass"];
    $passConfirm = $_POST["pass-confirm"];

    if($pass == $passConfirm) {
        $sql = "DELETE FROM usuarios WHERE usuario = ? AND pass = ?";
        $stmt = $dwes->prepare($sql);
        $stmt->execute([$usu, $pass]);
        echo "usuario eliminado";
    } else {
        echo "La confirmacion de contraseña tuvo un error.";
        echo "Introduzca la contraseña nuevamente";
    }
}
?>