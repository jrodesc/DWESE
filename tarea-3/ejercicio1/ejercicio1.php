<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
<h1>Doble o nada</h1>
<p>En este juego de azar, el usuario debe apostar el dinero que el considere, despues se lanza una moneda,
     si sale cara, se dobla el dinero apostado, si sale cruz se pierde todo.</p>
<form action="ejercicio1.php" method="post">
    <label for="cantidad" name="cantidad" id="cantidad">Apuesta:</label>
    <input type="number" name="cantidad" id="cantidad" required>
    <br>
    <input type="submit" value="apostar" name="apostar">
</form>
<?php

    if(!isset($_SESSION["vecesJugadas"])) {
        $_SESSION["vecesJugadas"] = 0;
    }

    if(!isset($_SESSION["total"])) {
        $_SESSION["total"] = 0;
    }

    if(isset($_POST["apostar"])) {
        $_SESSION["vecesJugadas"]++;
        $apuesta = $_POST["cantidad"];
        $tirada = lanzarMoneda();
        echo "veces jugadas: " . $_SESSION["vecesJugadas"];
        echo "<br>";


        if($tirada == 0 && $_SESSION["total"] > 0) {
            echo "cruz";
            $_SESSION["total"] = $_SESSION["total"] - $apuesta;
        } elseif($tirada == 1) {
            echo "cara";
            $_SESSION["total"] = ($apuesta * 2) + $_SESSION["total"];
        } elseif($tirada == 0 && $_SESSION["total"] <= 0) {
            echo "cruz";
            $_SESSION["total"] = $_SESSION["total"] - $apuesta;
        } elseif($tirada == 0 && $_SESSION["total"] == 0) {
            echo "cruz";
            $_SESSION["total"] = $_SESSION["total"] - $apuesta;
        }

        echo "<br>";
        echo "Balance: " . $_SESSION["total"] . "€";
    }
    function lanzarMoneda() {
        $resultado = rand(0, 1);
        return $resultado;
    }
?>


<form action="ejercicio1.php" method="post">
    <input type="submit" name="logout" value="reiniciar">
</form>

<?php
if(isset($_POST["logout"])) {
    session_destroy();
}
?>
</body>
</html>