<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de años bisiestos</title>
</head>

<body>
    <h1>Calculadora de años bisiestos.</h1>

    <form action="ejercicio2.php" method="post">
        <label for="date" name="fecha">Ingrese el año:</label>
        <br>
        <input type="number" name="date" id="date" required>
        <br>
        <input type="submit" value="calcular" name="calcular">
    </form>
    <?php
    function calcularBisiesto($year)
    {
        return ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
    }



    if (isset($_POST["calcular"])) {
        $anio = $_POST["date"];

        if (calcularBisiesto($anio) == true) {
            echo "Es bisiesto.";
        } else {
            echo "No es bisiesto";
        }
    }
    ?>

<form action="ejercicio2.php" method="post">
    <input type="submit" name="logout" value="reiniciar">
</form>

<?php
if(isset($_POST["logout"])) {
    session_destroy();
}
?>
</body>

</html>