<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Echo y print</title>
</head>

<body>
  <!-- 
    <p> <?php echo "Este texto se mostrará en la página web." ?></p>
    <p><?= "Este texto se mostrará en la página web." ?></p>
    <p><?php print("Este texto se mostrará en la página web.") ?></p>
  -->
  <?php
  $nombre = "Jose Luis";
  if (isset($nombre)) {
    echo "<h1>Hola, $nombre</h1>";
  } else {
    echo "<h1>El nombre no esta definido</h1>";
  }
  ?>

  <?php
  $nombre_prueba;
  $nombre_prueba = $nombre_prueba ?? "sin nombre";
  if ($nombre_prueba == "sin nombre") {
    echo "el usuario no tiene nombre definido";
  } else {
    echo "El usuario se llama $nombre_prueba";
  }
  ?>

  <?php
  echo "<br>";
  $texto = "Hola ";
  echo "$texto";
  $mundo = $texto . "mundo";
  echo "<br>";
  echo "$mundo";
  $texto .= "mundo";
  echo "<br>";
  echo "$texto";
  ?>


  <?php
  echo "<br>";
  echo "calculo del IVA";
  echo "<br></br>";



  function calcular_iva($base, $porcentaje)
  {
    $total = $base * $porcentaje / 100;
    return $total + $base;
  }
  ?>

  <?php
  $precio_base = 348;
  echo "El total con IVA añadido a " . $precio_base . " es " . calcular_iva($precio_base, 21);
  ?>

  <?php
  function calcular_por_valor($valor)
  {
    $total = $valor * 100;
    return $total;
  }
  ?>


<?php
function calcular_por_referencia($valor) {
  $valor = $valor * 100;
  return $valor;
}
?>


 
<?php
echo "<br>";
echo "el calculo por valor: " . calcular_por_valor(32);
echo "<br>";
echo "el calculo por referencia: " .  calcular_por_referencia(45);
?>



<?php
$coches = array("Toyota", "Honda", "Audi");

$coche = $coches[1];

echo $coche;
?>
</body>

</html>