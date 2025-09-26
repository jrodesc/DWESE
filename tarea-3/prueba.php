<?php
if(isset($_POST["enviar"])) {
    $totalHijos = $_POST["hijos"];
    $sueldoBruto = $_POST["sueldo"];
    $sueldoRestante = $sueldoBruto;
    $totalImpuestos = 0;
    
    // Procesar cada tramo de mayor a menor
    
    // Tramo 5: más de 4600 (25% - 1.5% por hijo, max 15%)
    if($sueldoRestante > 4600) {
        $cantidadTramo = $sueldoRestante - 4600;
        $impuesto = 0.25;
        $descuento = min(1.5 * $totalHijos, 15) / 100;
        $impuestoReal = max(0, $impuesto - $descuento);
        $totalImpuestos += $cantidadTramo * $impuestoReal;
        $sueldoRestante = 4600;
    }
    
    // Tramo 4: 3000-4600 (20% - 1% por hijo, max 10%)
    if($sueldoRestante > 3000) {
        $cantidadTramo = $sueldoRestante - 3000;
        $impuesto = 0.20;
        $descuento = min(1 * $totalHijos, 10) / 100;
        $impuestoReal = max(0, $impuesto - $descuento);
        $totalImpuestos += $cantidadTramo * $impuestoReal;
        $sueldoRestante = 3000;
    }
    
    // Tramo 3: 1600-3000 (15% - 1% por hijo, max 10%)
    if($sueldoRestante > 1600) {
        $cantidadTramo = $sueldoRestante - 1600;
        $impuesto = 0.15;
        $descuento = min(1 * $totalHijos, 10) / 100;
        $impuestoReal = max(0, $impuesto - $descuento);
        $totalImpuestos += $cantidadTramo * $impuestoReal;
        $sueldoRestante = 1600;
    }
    
    // Tramo 2: 1000-1600 (10% - 1% por hijo, max 10%)
    if($sueldoRestante > 1000) {
        $cantidadTramo = $sueldoRestante - 1000;
        $impuesto = 0.10;
        $descuento = min(1 * $totalHijos, 10) / 100;
        $impuestoReal = max(0, $impuesto - $descuento);
        $totalImpuestos += $cantidadTramo * $impuestoReal;
        $sueldoRestante = 1000;
    }
    
    // Tramo 1: 0-1000 (0%)
    // No se pagan impuestos en este tramo
    
    $sueldoNeto = $sueldoBruto - $totalImpuestos;
    
    echo "<div style='margin-top: 20px; padding: 15px; border: 1px solid #ccc; background-color: #f9f9f9;'>";
    echo "<h3>Resultado del cálculo de impuestos:</h3>";
    echo "<p><strong>Sueldo bruto:</strong> " . number_format($sueldoBruto, 2) . " €</p>";
    echo "<p><strong>Número de hijos:</strong> " . $totalHijos . "</p>";
    echo "<p><strong>Total impuestos a pagar:</strong> " . number_format($totalImpuestos, 2) . " €</p>";
    echo "<p><strong>Sueldo neto:</strong> " . number_format($sueldoNeto, 2) . " €</p>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Impuestos</title>
</head>
<body>
    <h2>Calculadora de Impuestos</h2>
    
    <form action="prueba.php" method="post">
        <label for="sueldo">Sueldo bruto:</label>
        <input type="number" name="sueldo" id="sueldo" step="0.01" required>
        <br><br>
        <label for="hijos">Número de hijos:</label>
        <input type="number" name="hijos" id="hijos" min="0" value="0" required>
        <br><br>
        <input type="submit" name="enviar" value="Calcular">
    </form>
</body>
</html>