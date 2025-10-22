<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
Escriba un programa que determine el tipo de seguro que ofrece una compañía de seguros
de vida a un nuevo cliente supuesto que emplea la siguiente política:
● Si tiene buena salud y no ha tenido nunca un accidente, le ofrece un seguro tipo A.
● Si tiene menos de 30 años se le ofrece un seguro A, y uno de tipo B si tiene 30 o
más años.
● Si tiene mala salud o ha tenido un accidente, llama a un experto.
● Si tiene mala salud y ha tenido al menos un accidente no le ofrecerá ningún seguro.
El programa escribirá el tipo de seguro ofertado o la situación que se produce:
● “llamar a experto”.
● “no hacer seguro”.
Las entradas del programa serán:
● Salud del cliente (Enfermo o sano).
● Número de accidentes sufridos.
● Edad.
-->

    <form action="ejercicio2.php" method="post">
        <legend>Formulario de salud:</legend>
        <label>Edad:</label>
        <input type="number" min=0 required id="edad" name="edad">
        <br>
        <label>Numero de accidentes sufridos:</label>
        <input type="number" min=0 required id="accidentes" name="accidentes">
        <br>
        <label>Estado de salud actual:</label>
        <input type="radio"
            id="sano"
            name="estado"
            value="sano" required>
        <label for="sano">Sano</label>
        <input type="radio"
            id="enfermo"
            name="estado"
            value="enfermo" required>
        <label for="enfermo">Enfermo</label>
        <br>
        <input type="submit" value="enviar" id="enviar" name="enviar">

    </form>
</body>
<?php
$respuesta = "";
if(isset($_POST["enviar"])) {
    $edad = $_POST["edad"];
    $estado = $_POST["estado"];
    $accidentes = $_POST["accidentes"];

    if($estado == "enfermo" && $accidentes != 0) {
        $respuesta = "No hacer seguro";
    } elseif($estado == "enfermo" || $accidentes != 0) {
        $respuesta = "Consultar un experto";
    } elseif($estado == "sano" && $accidentes == 0) {
        if($edad < 30) {
            $respuesta = "Seguro Tipo A";
        } else {
            $respuesta = "Seguro Tipo B";
        }
    }

    echo "$respuesta";
}


?>

</html>