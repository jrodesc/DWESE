<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nota1 = $_REQUEST['nota1'];
    $nota2 = $_REQUEST['nota2'];
    $nota3 = $_REQUEST['nota3'];

    $notas = [$nota1, $nota2, $nota3];

    rsort($notas);

    $media = ($notas[0] + $notas[1]) / 2;

    echo "La nota media del alumno es: $media"
    ?>


    <a href="ejercicio2.php">Volver al inicio</a>
</body>
</html>