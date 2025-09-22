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

$resultado=comprobarUsuario($usu);

function comprobarUsuario($usu) {
    if($usu == "joselu") {
        return true;
    }
}

if($resultado == true) {
    echo "
    <html>
        <body>
            <h1>Bienvenido Jose Luis</h1>
        </body>
    </html>";
} else {
    echo "
    <html>
        <body>
            <h1>No eres quien esperaba</h1>
        </body>
    </html>";
}
?>
</body>
</html>