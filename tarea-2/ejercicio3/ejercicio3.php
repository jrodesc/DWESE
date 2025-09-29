<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descuentos del ferrocarril</title>
</head>
<body>
<!--
Debemos de asignar descuentos en los precios de los billetes en funcion de la edad de cada usuario
menores de 4 no pagan nada
entre 4 y 7 50% de descuento
mayores de 65 60% de descuento
estudiantes 55%
familia numerosa 30%

Debemos hacer un programa que tome como input lo siguiente:
precio base de billete, edad de usuario, si es estudiante o no o si es de familia numerosa o no.
Los tickets NO son acumulativos, se aplicara siempre la opcion con maximo descuento.
-->
<form method="post" action="ejercicio3-logica.php">
        <label for="user" class="form-label">formulario de compra:</label>
        <br>
        <label for="billete">Introduzca el precio del billete:</label>
        <br>
        <input
            type="number"
            class="form-control"
            id="billete"
            name="billete"
            min='0'
            step='0.1'
            value="billete" required>
            <br>
        <label for="edad">Introduzca la edad</label>
        <br>
        <input
            type="number"
            class="form-control"
            id="edad"
            name="edad"
            value="edad"
            min='0'
            required>
            <br>
        <label for="estudiante">
            <input type="checkbox" id="estudiante" value="estudiante" name="estudiante" />
            ¿Es usted estudiante?
        </label>
        <br>
        <label for="numerosa">
            <input type="checkbox" id="numerosa" value="numerosa" name="numerosa" />
            ¿Es usted parte de familia numerosa?
        </label>
        <br>
        <button type="submit" class="btn-primary">
            Enviar
        </button>
    </form>
</body>
</html>