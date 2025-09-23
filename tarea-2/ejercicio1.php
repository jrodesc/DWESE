<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <body>
        <form method="post" action="Bienvenido.php">
            <label for="user" class="form-label">Escoja la figura que desea calcular:</label>
            <input
                type="radio"
                class="form-control"
                id="circulo"
                name="areas"
                value="circulo">
            <label for="circulo">Circulo</label>
            <input
                type="radio"
                class="form-control"
                id="triangulo"
                name="areas"
                value="triangulo">
            <label for="triangulo">Triangulo</label>
            <input
                type="radio"
                class="form-control"
                id="cuadrado"
                name="areas"
                value="cuadrado">
            <label for="cuadrado">Cuadrado</label>
            <button type="submit" class="btn-primary">
                Enviar
            </button>
        </form>
    </body>
</html>