<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$config = parse_ini_file('./config.inc.ini');
$dsn = 'mysql:host=' . $config['server'] . ';dbname=' . $config['base'];

try {
    $dwes = new PDO($dsn, $config['usu'], $config['pas']);
    $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $operacion = $_POST['crud'] ?? '';
    $tabla = $_POST['tabla'] ?? '';

    if ($operacion === 'create' && $tabla === 'empleado') {

        // Validar que todos los campos existen
        $campos_requeridos = [
            'usuario_empleado',
            'email_empleado',
            'pass_empleado',
            'dni_empleado',
            'f_nac_empleado'
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        // Hash de la contraseña (MUY IMPORTANTE)
        $pass_hash = password_hash($_POST['pass_empleado'], PASSWORD_DEFAULT);

        // Preparar consulta
        $sql = "INSERT INTO empleado 
                (usuario_empleado, email_empleado, pass_empleado, dni_empleado, f_nac_empleado) 
                VALUES (:usuario, :email, :pass, :dni, :fecha)";

        $stmt = $dwes->prepare($sql);

        // Ejecutar con parámetros (previene SQL injection)
        $resultado = $stmt->execute([
            ':usuario' => $_POST['usuario_empleado'],
            ':email' => $_POST['email_empleado'],
            ':pass' => $pass_hash,
            ':dni' => strtoupper($_POST['dni_empleado']), // DNI en mayúsculas
            ':fecha' => $_POST['f_nac_empleado']
        ]);

        if ($resultado) {
            $id_insertado = $dwes->lastInsertId();
            echo "<h2>Empleado creado correctamente</h2>";
            echo "<p>ID asignado: $id_insertado</p>";
            echo '<a href="index.php">Volver al menú</a>';
        }
        //FIN DE PROCESO DE INSERT DE UN EMPLEADO
    } else if ($operacion === "read" && $tabla === "empleado") {
        //validamos que existe el id requerido.
        $campo_requerido = ['id_empleado'];

        foreach ($campo_requerido as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        $sql = "SELECT * FROM empleado WHERE id_empleado = :id_empleado ";
        $stmt = $dwes->prepare($sql);


        $resultado = $stmt->execute([
            ':id_empleado' => $_POST['id_empleado']
        ]);
        $stmt->execute([
            ':id_empleado' => $_POST['id_empleado']
        ]);

        // IMPORTANTE: Obtener el resultado
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($empleado) {
            // Empleado encontrado - mostrar datos
            echo "<h2>Datos del empleado</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Campo</th><th>Valor</th></tr>";
            echo "<tr><td>ID</td><td>" . htmlspecialchars($empleado['id_empleado']) . "</td></tr>";
            echo "<tr><td>Usuario</td><td>" . htmlspecialchars($empleado['usuario_empleado']) . "</td></tr>";
            echo "<tr><td>Email</td><td>" . htmlspecialchars($empleado['email_empleado']) . "</td></tr>";
            echo "<tr><td>DNI</td><td>" . htmlspecialchars($empleado['dni_empleado']) . "</td></tr>";
            echo "<tr><td>Fecha Nacimiento</td><td>" . htmlspecialchars($empleado['f_nac_empleado']) . "</td></tr>";
            echo "</table>";
            // NO mostramos la contraseña por seguridad
        } else {
            // Empleado no encontrado
            echo "<h2>No se encontró ningún empleado con ID: " . htmlspecialchars($_POST['id_empleado']) . "</h2>";
        }

        echo '<a href="index.php">Volver al menú</a>';
        //FIN DE PROCESO DE LECTURA DE EMPLEADO
    } else if($operacion === "update" && $tabla === "empleado") {
        $campos_requeridos = [
            "id_empleado",
            "usuario_empleado",
            "email_empleado",
            "dni_empleado",
            "f_nac_empleado"
        ]; 

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        $sql = "UPDATE empleado SET usuario_empleado = :usuario_empleado, email_empleado = :email_empleado, dni_empleado = :dni_empleado,
         f_nac_empleado = :f_nac_empleado 
         WHERE id_empleado = :id_empleado";

        $stmt = $dwes->prepare($sql);

        // Ejecutar con parámetros (previene SQL injection)
        $resultado = $stmt->execute([
            'id_empleado' => $_POST['id_empleado'],
            ':usuario_empleado' => $_POST['usuario_empleado'],
            ':email_empleado' => $_POST['email_empleado'],
            ':f_nac_empleado' => $_POST['f_nac_empleado']
        ]);

        if ($resultado) {
            echo "<h2>Empleado actualizado correctamente</h2>";
            echo '<a href="index.php">Volver al menú</a>';
        } else {
            echo "<h2>El empleado no se ha actualizado, hubo un fallo</h2>";
            echo '<a href="index.php">Volver al menú</a>';
        }
    }

    // Aquí irían otros casos: create+cliente, update+producto, etc.

} catch (PDOException $e) {
    // Detectar errores específicos
    if ($e->getCode() == 23000) {
        echo "<h2>Error: Datos duplicados</h2>";
        echo "<p>El usuario, email o DNI ya existe en la base de datos</p>";
    } else {
        echo "<h2>Error en la operación</h2>";
        echo "<p>" . $e->getMessage() . "</p>";
    }
    echo '<br><a href="index.php">Volver al menú</a>';
}
