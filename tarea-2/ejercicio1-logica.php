<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logica</title>
</head>

<body>
    <?php
    $figura = $_REQUEST['figura'] ?? '';


    if (isset($_POST['calcular'])) {
        $figura = $_POST['calcular'];
    }

    $resultado = comprobarUsuario($figura);

    function comprobarUsuario($figura)
    {
        switch ($figura) {
            case "circulo":
                return 0;
                break;
            case "triangulo":
                return 1;
                break;

            case "cuadrado":
                return 2;
                break;
        }
    }


    if (comprobarUsuario($figura) == 0) {
        echo "<h1>Area del circulo</h1>";
        echo "
        <form method = 'post'>
        <label>Radio del circulo:</label>
        <input type ='number' name='radio' required>
        <input type='hidden' name='calcular' value='circulo'>
        <input type='hidden' name='figura' value='circulo'>
        <button type ='submit' >Calcular</button>
        </form>";

        if (isset($_POST["calcular"]) && $_POST["calcular"] == "circulo") {
            $radio = $_POST["radio"];
            $area = pi() * pow($radio, 2);

            echo "El area del circulo es:" . round($area, 2);
        }
    } elseif (comprobarUsuario($figura) == 1) {
        echo "<h1>Area del triangulo</h1>";
        echo "
        <form method = 'post'>
        <label>base del triangulo:</label>
        <input type ='number' name='base' required>
        <label>altura del triangulo:</label>
        <input type ='number' name='altura' required>
        <input type='hidden' name='figura' value='triangulo'>
        <input type='hidden' name='calcular' value='triangulo'>
        <button type ='submit' >Calcular</button>
        </form>";

        if (isset($_POST['calcular']) && $_POST['calcular'] == 'triangulo') {
            $base = $_POST["base"];
            $altura = $_POST["altura"];
            $area = ($base * $altura) / 2;

            echo "El area del triangulo es:" . round($area, 2);
        }
    } elseif (comprobarUsuario($figura) == 2) {
        echo "<h1>Area del Cuadrado</h1>";
        echo "
        <form method = 'post'>
        <label>lado del Cuadrado:</label>
        <input type ='number' name='lado' required>
        <input type='hidden' name='calcular' value='cuadrado'
        <input type='hidden' name='figura' value='cuadrado'>
        <button type ='submit' >Calcular</button>
        </form>";

        if (isset($_POST['calcular']) && $_POST['calcular'] == 'cuadrado') {
            $lado = $_POST["lado"];
            $area = $lado * $lado;

            echo "El area del cuadrado es:" . round($area, 2);
        }
    } else {
        echo "No has introducido una figura";
    }
    ?>
    <a href="ejercicio1.php">Volver al inicio</a>
</body>
    
</html>