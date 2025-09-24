<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Vamos a hacer un programa que reciba 3 numeros por input, seleccione los dos mayores y saque la media. -->

    <form method="post" action="ejercicio2-logica.php">
        <label for="user" class="form-label">Introduzca las 3 notas:</label>
        <label for="nota1">Nota 1</label>
        <input
            type="number"
            class="form-control"
            id="nota1"
            name="nota1"
            min='0'
            step='0.1'
            max='10'
            value="n1" required>
        <label for="nota2">Nota 2</label>
        <input
            type="number"
            class="form-control"
            id="nota2"
            name="nota2"
            value="n2"
            min='0'
            max='10'
            step='0.1'
            required>
        <label for="nota3">Nota 3</label>
        <input
            type="number"
            class="form-control"
            id="nota3"
            name="nota3"
            min='0'
            step='0.1'
            max='10'
            value="n3" required>
        <button type="submit" class="btn-primary">
            Enviar
        </button>
    </form>
</body>
</html>