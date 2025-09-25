<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 
Reutilizando el programa del ejercicio anterior, 
haz un programa que muestre los años
bisiestos desde el año 1900 hasta la actualidad, empleando bucles. -->

    <form action="ejercicio3.php" method="post">
        <input type="submit" name="calcular" value="calcular">
    </form>

    <?php
    $aniosBisiestos = [];
    if (!isset($_SESSION["anioInicial"]) && isset($_POST["calcular"])) {
        $_SESSION["anioInicial"] = 1900;
        while ($_SESSION["anioInicial"] < 2025) {
            $esBisiesto = calcularBisiesto($_SESSION["anioInicial"]);

            if ($esBisiesto == true) {
                $aniosBisiestos[] = $_SESSION["anioInicial"];
            }
            $_SESSION["anioInicial"]++;
        }
    }
    foreach ($aniosBisiestos as $anio) {
        echo $anio . ", ";
    }





    function calcularBisiesto($year)
    {
        return ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
    }
    ?>

    <form action="ejercicio3.php" method="post">
        <input type="submit" name="logout" value="reiniciar">
    </form>

    <?php
    if (isset($_POST["logout"])) {
        session_destroy();
    }
    ?>
</body>

</html>