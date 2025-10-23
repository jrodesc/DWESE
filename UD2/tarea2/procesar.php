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
        //-----------------------------------------
        //INICIO DE PROCESO DE UPDATE DE EMPLEADO
    } else if ($operacion === 'update' && $tabla === 'empleado') {
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

        $sql = "UPDATE empleado 
        SET usuario_empleado = :usuario_empleado, 
        email_empleado = :email_empleado, 
        dni_empleado = :dni_empleado,
         f_nac_empleado = :f_nac_empleado 
         WHERE id_empleado = :id_empleado";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            ':id_empleado' => $_POST['id_empleado'],
            ':usuario_empleado' => $_POST['usuario_empleado'],
            ':email_empleado' => $_POST['email_empleado'],
            ':f_nac_empleado' => $_POST['f_nac_empleado'],
            ':dni_empleado' => $_POST['dni_empleado']
        ]);

        if ($resultado) {
            $filas_afectadas = $stmt->rowCount();

            if ($filas_afectadas > 0) {
                echo "<h2>Empleado actualizado correctamente.</h2>";
            } else {
                echo "<h2>No se realizaron cambios.</h2>";
            }
            echo '<a href="index.php">Volver a inicio</a>';
        }
    } else if ($operacion === 'delete' && $tabla === 'empleado') {
        $campos_requeridos = [
            "id_empleado"
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                echo "No se han insertado los datos correctos, falta" . $campo;
            }
        }

        $sql = "DELETE FROM empleado WHERE id_empleado = :id_empleado";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            "id_empleado" => $_POST["id_empleado"]
        ]);

        if ($resultado) {
            echo "<h2>Empleado eliminado de manera exitosa</h2>";
        } else {
            echo "<h2>No se pudo eliminar al empleado.</h2>";
        }
        echo '<a href="index.php">Volver al menú</a>';
        //--------------------------------------------------------
    } else if ($operacion === 'create' && $tabla === 'cliente') {
        // Validar que todos los campos existen
        $campos_requeridos = [
            'usuario_cliente',
            'email_cliente',
            'pass_cliente',
            'dni_cliente',
            'f_nac_cliente'
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        // Hash de la contraseña (MUY IMPORTANTE)
        $pass_hash = password_hash($_POST['pass_cliente'], PASSWORD_DEFAULT);

        // Preparar consulta
        $sql = "INSERT INTO cliente
                (usuario_cliente, email_cliente, pass_cliente, dni_cliente, f_nac_cliente) 
                VALUES (:usuario, :email, :pass, :dni, :fecha)";

        $stmt = $dwes->prepare($sql);

        // Ejecutar con parámetros (previene SQL injection)
        $resultado = $stmt->execute([
            ':usuario' => $_POST['usuario_cliente'],
            ':email' => $_POST['email_cliente'],
            ':pass' => $pass_hash,
            ':dni' => strtoupper($_POST['dni_cliente']), // DNI en mayúsculas
            ':fecha' => $_POST['f_nac_cliente']
        ]);

        if ($resultado) {
            $id_insertado = $dwes->lastInsertId();
            echo "<h2>Cliente creado correctamente</h2>";
            echo "<p>ID asignado: $id_insertado</p>";
        } else {
            echo "<h2>Cliente no se ha creado correctamente</h2>";
        }
        echo '<a href="index.php">Volver al menú</a>';
    } else if ($operacion === "read" && $tabla === "cliente") {
        //validamos que existe el id requerido.
        $campo_requerido = ['id_cliente'];

        foreach ($campo_requerido as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        $sql = "SELECT * FROM cliente WHERE id_cliente = :id_cliente ";
        $stmt = $dwes->prepare($sql);


        $resultado = $stmt->execute([
            ':id_cliente' => $_POST['id_cliente']
        ]);
        $stmt->execute([
            ':id_cliente' => $_POST['id_cliente']
        ]);

        // IMPORTANTE: Obtener el resultado
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            // Empleado encontrado - mostrar datos
            echo "<h2>Datos del cliente</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Campo</th><th>Valor</th></tr>";
            echo "<tr><td>ID</td><td>" . htmlspecialchars($cliente['id_cliente']) . "</td></tr>";
            echo "<tr><td>Usuario</td><td>" . htmlspecialchars($cliente['usuario_cliente']) . "</td></tr>";
            echo "<tr><td>Email</td><td>" . htmlspecialchars($cliente['email_cliente']) . "</td></tr>";
            echo "<tr><td>DNI</td><td>" . htmlspecialchars($cliente['dni_cliente']) . "</td></tr>";
            echo "<tr><td>Fecha Nacimiento</td><td>" . htmlspecialchars($cliente['f_nac_cliente']) . "</td></tr>";
            echo "</table>";
            // NO mostramos la contraseña por seguridad
        } else {
            // Empleado no encontrado
            echo "<h2>No se encontró ningún cliente con ID: " . htmlspecialchars($_POST['id_cliente']) . "</h2>";
        }

        echo '<a href="index.php">Volver al menú</a>';
    } else if ($operacion === 'update' && $tabla === 'cliente') {
        $campos_requeridos = [
            "id_cliente",
            "usuario_cliente",
            "email_cliente",
            "dni_cliente",
            "f_nac_cliente"
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        $sql = "UPDATE cliente 
        SET usuario_cliente = :usuario_cliente, 
        email_cliente = :email_cliente, 
        dni_cliente = :dni_cliente,
         f_nac_cliente = :f_nac_cliente 
         WHERE id_cliente = :id_cliente";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            ':id_cliente' => $_POST['id_cliente'],
            ':usuario_cliente' => $_POST['usuario_cliente'],
            ':email_cliente' => $_POST['email_cliente'],
            ':f_nac_cliente' => $_POST['f_nac_cliente'],
            ':dni_cliente' => $_POST['dni_cliente']
        ]);

        if ($resultado) {
            $filas_afectadas = $stmt->rowCount();

            if ($filas_afectadas > 0) {
                echo "<h2>Cliente actualizado correctamente.</h2>";
            } else {
                echo "<h2>No se realizaron cambios.</h2>";
            }
            echo '<a href="index.php">Volver a inicio</a>';
        }
    } else if ($operacion === 'delete' && $tabla === 'cliente') {
        $campos_requeridos = [
            "id_cliente"
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                echo "No se han insertado los datos correctos, falta" . $campo;
            }
        }

        $sql = "DELETE FROM cliente WHERE id_cliente = :id_cliente";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            "id_cliente" => $_POST["id_cliente"]
        ]);

        if ($resultado) {
            echo "<h2>Cliente eliminado de manera exitosa</h2>";
        } else {
            echo "<h2>No se pudo eliminar al cliente.</h2>";
        }
        echo '<a href="index.php">Volver al menú</a>';
    } else if ($operacion === 'create' && $tabla === 'producto') {
        // Validar que todos los campos existen
        $campos_requeridos = [
            'categoria_producto',
            'nombre_producto',
            'precio_producto',
            'stock_producto',
            'descripcion_producto'
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        // Preparar consulta
        $sql = "INSERT INTO producto 
                (categoria_producto, nombre_producto, precio_producto, stock_producto, descripcion_producto) 
                VALUES (:categoria, :nombre, :precio, :stock, :descripcion)";

        $stmt = $dwes->prepare($sql);

        // Ejecutar con parámetros (previene SQL injection)
        $resultado = $stmt->execute([
            ':categoria' => $_POST['categoria_producto'],
            ':nombre' => $_POST['nombre_producto'],
            ':precio' => $_POST['precio_producto'],
            ':stock' => $_POST['stock_producto'], 
            ':descripcion' => $_POST['descripcion_producto']
        ]);

        if ($resultado) {
            $id_insertado = $dwes->lastInsertId();
            echo "<h2>Producto creado correctamente</h2>";
            echo "<p>ID asignado: $id_insertado</p>";
            echo '<a href="index.php">Volver al menú</a>';
        }
    } else if($operacion === 'read' && $tabla === 'producto') {
        $campos_requerido = 'id_producto';

        $sql = "SELECT * FROM producto WHERE id_producto = :id";

        $stmt = $dwes->prepare($sql);

        $stmt->execute([
            ':id' => $_POST['id_producto']
        ]);

        // IMPORTANTE: Obtener el resultado
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            // Empleado encontrado - mostrar datos
            echo "<h2>Datos del producto</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Campo</th><th>Valor</th></tr>";
            echo "<tr><td>ID</td><td>" . htmlspecialchars($producto['id_producto']) . "</td></tr>";
            echo "<tr><td>Categoria Producto</td><td>" . htmlspecialchars($producto['categoria_producto']) . "</td></tr>";
            echo "<tr><td>Nombre</td><td>" . htmlspecialchars($producto['nombre_producto']) . "</td></tr>";
            echo "<tr><td>precio</td><td>" . htmlspecialchars($producto['precio_producto']) . "</td></tr>";
            echo "<tr><td>Stock</td><td>" . htmlspecialchars($producto['stock_producto']) . "</td></tr>";
            echo "</table>";
        } else {
            echo "<h2>No se encontró ningún producto con ID: " . htmlspecialchars($_POST['id_producto']) . "</h2>";
        }

        echo '<a href="index.php">Volver al menú</a>'; 
    } else if($operacion === 'update' && $tabla === 'producto') {
        $campos_requeridos = [
            "id_producto",
            "categoria_producto",
            "nombre_producto",
            "precio_producto",
            "stock_producto",
            "descripcion_producto"
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                die("Error: Falta el campo $campo");
            }
        }

        $sql = "UPDATE producto 
        SET categoria_producto = :categoria, 
        nombre_producto = :nombre, 
        precio_producto = :precio,
        stock_producto = :stock,
        descripcion_producto = :descripcion
         WHERE id_producto = :id";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            ':categoria' => $_POST['categoria_producto'],
            ':nombre' => $_POST['nombre_producto'],
            ':precio' => $_POST['precio_producto'],
            ':stock' => $_POST['stock_producto'],
            ':descripcion' => $_POST['descripcion_producto'],
            ':id' => $_POST['id_producto']
        ]);

        if ($resultado) {
            $filas_afectadas = $stmt->rowCount();

            if ($filas_afectadas > 0) {
                echo "<h2>Producto actualizado correctamente.</h2>";
            } else {
                echo "<h2>No se realizaron cambios.</h2>";
            }
            echo '<a href="index.php">Volver a inicio</a>';
        }
    } else if($operacion === 'delete' && $tabla === 'producto') {
        $campos_requeridos = [
            "id_producto"
        ];

        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                echo "No se han insertado los datos correctos, falta" . $campo;
            }
        }

        $sql = "DELETE FROM producto WHERE id_producto = :id";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            "id" => $_POST["id_producto"]
        ]);

        if ($resultado) {
            echo "<h2>Producto eliminado de manera exitosa</h2>";
        } else {
            echo "<h2>No se pudo eliminar al cliente.</h2>";
        }
        echo '<a href="index.php">Volver al menú</a>';
    } else if($operacion === 'create' && $tabla === 'pedido') {
        $campos_requeridos = [
            "fecha_ped", 
            "hora_ped", 
            "cliente",
            "empleado"
        ];

        foreach($campos_requeridos as $campo) {
            if(empty($_POST[$campo])) {
                echo "No se ha insertado el campo " . $campo;
            }
        }

        $sql = "INSERT INTO  pedido (fecha_ped, hora_ped, cliente, empleado) 
        VALUES (:fecha_ped, :hora_ped, :cliente, :empleado)";

        $stmt = $dwes->prepare($sql);

        // Ejecutar con parámetros (previene SQL injection)
        $resultado = $stmt->execute([
            ':fecha_ped' => $_POST['fecha_ped'],
            ':hora_ped' => $_POST['hora_ped'],
            ':cliente' => $_POST['cliente'],
            ':empleado' => $_POST['empleado'], 
        ]);

        if ($resultado) {
            $id_insertado = $dwes->lastInsertId();
            echo "<h2>Producto creado correctamente</h2>";
            echo "<p>ID asignado: $id_insertado</p>";
            echo '<a href="index.php">Volver al menú</a>';
        }


    } else if($operacion === 'read' && $tabla === 'pedido') {
        $campos_requerido = 'id_pedido';

    // Aquí usamos JOIN para obtener información relacionada
    $sql = "SELECT 
                p.id_pedido,
                p.fecha_ped,
                p.hora_ped,
                p.cliente,
                p.empleado,
                c.usuario_cliente,
                c.email_cliente,
                c.dni_cliente,
                e.usuario_empleado,
                e.email_empleado,
                e.dni_empleado
            FROM pedido p
            INNER JOIN cliente c ON p.cliente = c.id_cliente
            INNER JOIN empleado e ON p.empleado = e.id_empleado
            WHERE p.id_pedido = :id";

    $stmt = $dwes->prepare($sql);

    $stmt->execute([
        ':id' => $_POST['id_pedido']
    ]);

    // IMPORTANTE: Obtener el resultado
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pedido) {
        // Pedido encontrado - mostrar datos
        echo "<h2>Datos del pedido</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Campo</th><th>Valor</th></tr>";
        echo "<tr><td>ID Pedido</td><td>" . htmlspecialchars($pedido['id_pedido']) . "</td></tr>";
        echo "<tr><td>Fecha</td><td>" . htmlspecialchars($pedido['fecha_ped']) . "</td></tr>";
        echo "<tr><td>Hora</td><td>" . htmlspecialchars($pedido['hora_ped']) . "</td></tr>";
        
        echo "<tr><th colspan='2'>Información del Cliente</th></tr>";
        echo "<tr><td>ID Cliente</td><td>" . htmlspecialchars($pedido['cliente']) . "</td></tr>";
        echo "<tr><td>Usuario Cliente</td><td>" . htmlspecialchars($pedido['usuario_cliente']) . "</td></tr>";
        echo "<tr><td>Email Cliente</td><td>" . htmlspecialchars($pedido['email_cliente']) . "</td></tr>";
        echo "<tr><td>DNI Cliente</td><td>" . htmlspecialchars($pedido['dni_cliente']) . "</td></tr>";
        
        echo "<tr><th colspan='2''>Información del Empleado</th></tr>";
        echo "<tr><td>ID Empleado</td><td>" . htmlspecialchars($pedido['empleado']) . "</td></tr>";
        echo "<tr><td>Usuario Empleado</td><td>" . htmlspecialchars($pedido['usuario_empleado']) . "</td></tr>";
        echo "<tr><td>Email Empleado</td><td>" . htmlspecialchars($pedido['email_empleado']) . "</td></tr>";
        echo "<tr><td>DNI Empleado</td><td>" . htmlspecialchars($pedido['dni_empleado']) . "</td></tr>";
        
        echo "</table>";
    } else {
        echo "<h2>No se encontró ningún pedido con ID: " . htmlspecialchars($_POST['id_pedido']) . "</h2>";
    }

    echo '<a href="index.php">Volver al menú</a>'; 
    }else if($operacion === 'update' && $tabla === 'pedido') {
        $campos_requeridos = [
            "id_pedido",
            "fecha_ped",
            "hora_ped",
            "cliente",
            "empleado"
        ];

        foreach($campos_requeridos as $campo) {
            if(empty($_POST[$campo])) {
                echo "Error: falta el campo: " . $campo;
            }
        }

        $sql = "UPDATE pedido 
        SET fecha_ped = :fecha_ped, 
        hora_ped = :hora_ped, 
        cliente = :cliente,
        empleado = :empleado
         WHERE id_pedido = :id";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            ':fecha_ped' => $_POST['fecha_ped'],
            ':hora_ped' => $_POST['hora_ped'],
            ':cliente' => $_POST['cliente'],
            ':empleado' => $_POST['empleado'],
            ':id' => $_POST['id_pedido']
        ]);

        if ($resultado) {
            $filas_afectadas = $stmt->rowCount();

            if ($filas_afectadas > 0) {
                echo "<h2>Pedido actualizado correctamente.</h2>";
            } else {
                echo "<h2>No se realizaron cambios.</h2>";
            }
            echo '<a href="index.php">Volver a inicio</a>';
        }


    } else if ($operacion === 'delete' && $tabla === 'pedido') {
        $campos_requeridos = ["id_pedido"];

        foreach($campos_requeridos as $campo) {
            if(empty($_POST[$campo])) {
                echo "Error: falta el campo: " . $campo;
            }
        }


        $sql = "DELETE FROM pedido WHERE id_pedido = :id";

        $stmt = $dwes->prepare($sql);

        $resultado = $stmt->execute([
            ":id" => $_POST["id_pedido"]
        ]);

        if ($resultado) {
            echo "<h2>Pedido eliminado de manera exitosa</h2>";
        } else {
            echo "<h2>No se pudo eliminar al pedido.</h2>";
        }
        echo '<a href="index.php">Volver al menú</a>';
    } else if($operacion === 'create' && $tabla === 'detalle_pedido' ) {
        $campos_requeridos = [
            "id_pedido",
            "cantidad",
            "id_prod",
            "precio",
            "total"
        ];


        foreach($campos_requeridos as $campo) {
            if(empty($_POST[$campo])) {
                echo "Error: falta el campo" . $campo;
            }
        }

        $sql = "INSERT INTO detalle_pedido (id_pedido, cantidad, id_prod, precio, total) 
        VALUES (:id_pedido, :cantidad, :id_prod, :precio, :total)";

        $stmt = $dwes->prepare($sql);

        // Ejecutar con parámetros (previene SQL injection)
        $resultado = $stmt->execute([
            ':id_pedido' => $_POST['id_pedido'],
            ':cantidad' => $_POST['cantidad'],
            ':id_prod' => $_POST['id_prod'],
            ':precio' => $_POST['precio'], 
            ':total' => $_POST['total']
        ]);

        if ($resultado) {
            $id_insertado = $dwes->lastInsertId();
            echo "<h2>Producto creado correctamente</h2>";
            echo "<p>ID asignado: $id_insertado</p>";
            echo '<a href="index.php">Volver al menú</a>';
        }


    }
} catch (PDOException $e) {
    // Detectar errores específicos
    if ($e->getCode() == 23000) {
        echo "<h2>Error: Datos duplicados</h2>";
    } else {
        echo "<h2>Error en la operación</h2>";
        echo "<p>" . $e->getMessage() . "</p>";
    }
    echo '<br><a href="index.php">Volver al menú</a>';
}
