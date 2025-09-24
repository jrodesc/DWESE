<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <form method="post" action="ejercicio1-logica.php">
        <label for="user" class="form-label">Escoja la figura que desea calcular:</label>
        <input
            type="radio"
            class="form-control"
            id="circulo"
            name="figura"
            value="circulo"
            min='0'
            step='0.1'>
        <label for="circulo">Circulo</label>
        <input
            type="radio"
            class="form-control"
            id="triangulo"
            name="figura"
            value="triangulo"
            min='0'
            step='0.1'>
        <label for="triangulo">Triangulo</label>
        <input
            type="radio"
            class="form-control"
            id="cuadrado"
            name="figura"
            value="cuadrado"
            min='0'
            step='0.1'>
        <label for="cuadrado">Cuadrado</label>
        <button type="submit" class="btn-primary">
            Enviar
        </button>
    </form>
</body>

</html>