<?php
$server = "localhost";
$user = "prueba";
$pass = "1234";
$base = "test_dwes";

//llamando a las funciones
$dwes = mysqli_connect($server, $user, $pass, $base);
//funcion para cerrar la conexion con la DB
if ($dwes == true) {
    echo "Se ha realizado la conexión";
} else {
    echo "No se ha realizado la conexión";
}

echo "<br>";
$sql = "SELECT * FROM alumnos WHERE curso = 'DAW'";
$sql2 = "SELECT * FROM alumnos WHERE curso = 'DAM'";

$resultado = $dwes->query($sql);
$resultado2 = $dwes->query($sql2);

echo '<table>';
while ($res = $resultado->fetch_array()) {
    echo "<tr>";
    echo "<tr>" . $res['alumno'] . "</tr>";
    echo "<td>" . $res['pass'] . "</td>";
    echo "</tr>";
}
echo '</table>';

echo '<table>';
while ($res2 = $resultado2->fetch_array()) {
    echo "<tr>";
    echo "<tr>" . $res2['alumno'] . "</tr>";
    echo "<td>" . $res2['pass'] . "</td>";
    echo "</tr>";
}
echo '</table>';

//version con fetch_all
echo "Version con fetch_all";
$sql = "SELECT * FROM alumnos; ";
$resultado = $dwes->query($sql);
echo '<table>';
$res = $resultado->fetch_All(MYSQLI_BOTH);
foreach ($res as $row) {
    echo "<tr>";
    echo "<td>" . $row["alumno"] . "</td>";
    echo "<td>" . $row["pass"] . "</td>";
    echo '</tr>';
}
echo '</table>';

//Version con fetch_object
echo "Version con fetch_object";
$sql = "SELECT * FROM alumnos; ";
$resultado = $dwes->query($sql);
echo '<table>';
while ($res = $resultado->fetch_object()) {
    echo '<tr>';
    echo "<td> $res->alumno </td>";
    echo "<td> $res->pass </td>";
    echo '</tr>';
}
echo '</table>';

//consultas preparadas
$usu = "Antonio";
$pass = "a87654321";
$curso = "DAW";
$sql = "INSERT INTO alumnos (alumno,pass,curso) VALUES (?,?,?);";
$res = $dwes->stmt_init();
$res->prepare($sql);
$res->bind_param('sss', $usu, $pass, $curso); /* con ss le estoy diciendo que son dos strings*/
$res->execute();
$res->close();

//transacciones
$usu="Antonio";
$dwes->autocommit(false); // deshabilitamos el modo transaccional automático
$sql="DELETE FROM alumnos WHERE alumno='$usu';";
$dwes->query($sql);
$dwes->commit(); // Confirma los cambios

//eliminar usuario
$usu = "Antonio";
$sql = "DELETE FROM alumnos WHERE alumno='$usu';";
$dwes->query($sql);