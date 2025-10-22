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
} else if($operacion === "create" && $tabla === "empleado") {
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
} else if($operacion === "update" && $tabla === "empleado") {
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
    <form action="procesar.php" method = "post">
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
}
// Aquí irían los otros casos: create+cliente, read+pedido, etc.
?>