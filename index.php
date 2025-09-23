<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario</title>
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0 rounded-2.1">
                    <div class="card-body p-4">
                        <form method="post" action="Bienvenido.php">
                            <div class="mb-4">
                                <div class="text-center">
                                    <label for="user" class="form-label">Usuario:</label>
                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="user"
                                    name="user"
                                    placeholder="introduzca el usuario joselu"
                                    required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>