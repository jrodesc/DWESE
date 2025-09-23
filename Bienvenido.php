<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario</title>
</head>

<body>
    <?php
    $usu = $_REQUEST['user'];

    $resultado = comprobarUsuario($usu);

    function comprobarUsuario($usu)
    {
        if ($usu == "joselu") {
            return true;
        }
    }

    if ($resultado == true) {
        echo "
<div class='container d-flex justify-content-center align-items-center vh-100'>
    <div class='border-0 text-center' style='max-width: 500px;'>
        <div class='card-body p-5'>
            <h1 class='text-success mt-3'>¡Bienvenido Joselu!</h1>
        </div>
    </div>
</div>";
    } else {
        echo "
<div class='container d-flex justify-content-center align-items-center vh-100'>
    <div class=' border-0 text-center border-danger' style='max-width: 500px;'>
        <div class='card-body p-5'>
            <h1 class='text-danger mt-3'>Acceso Denegado, no introducio joselu.</h1>
        </div>
    </div>
</div>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>