<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $billete = $_POST["billete"];
    $edad = $_POST["edad"];
    if(!isset($_POST["estudiante"])) {
        $estudiante = 0;
    } else {
        $estudiante = $_POST["estudiante"];
    }
    if(!isset($_POST["numerosa"])) {
        $numerosa = 0;
    } else {
        $numerosa = $_POST["numerosa"];
    }
    
    $descuento = 0;

    function calculoDescuento($edad, $estudiante, $numerosa, $descuento) {
        if($edad < 4) {
            $descuento = 100;
        } elseif($edad > 65) {
            $descuento = 60;
        } elseif($estudiante == true) {
            $descuento = 55;
        } elseif($edad >= 4 && $edad <7) {
            $descuento = 50;
        } elseif($numerosa == true) {
            $descuento = 30;
        }

        return $descuento;


    }
    echo "El precio inicial era: $billete";
    echo "<br>";
    $total = $billete - ($billete * (calculoDescuento($edad, $estudiante, $numerosa, $descuento)/100) );
    echo "Con descuento aplicado el total es: $total";
    ?>

    <a href="ejercicio3.php">Volver al inicio</a>
</body>
</html>