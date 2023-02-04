<?php
$nombre = "";
$zona = "";
$direccion = "";
$telefono = "";
$localidad = "";

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
}

if (isset($_GET['zona'])) {
    $zona = $_GET['zona'];
}

if (isset($_GET['direccion'])) {
    $direccion = $_GET['direccion'];
}
if (isset($_GET['telefono'])) {
    $telefono = $_GET['telefono'];
}
if (isset($_GET['localidad'])) {
    $localidad = $_GET['localidad'];
}

$campos = array();

if ($nombre == "") {
    array_push($campos, "El campo nombre no puede estar vacio");
}
if ($zona == "") {
    array_push($campos, "El campo zona no puede estar vacio");
}
if ($direccion == "") {
    array_push($campos, "El campo direccion no puede estar vacio");
}
if ($telefono == "") {
    array_push($campos, "El campo telefono no puede estar vacio");
}
if ($localidad == "") {
    array_push($campos, "El campo localidad no puede estar vacio");
}

if (count($campos) > 0) {
    echo "<div class='error'>";
    for ($i = 0; $i < count($campos); $i++) {
        echo "<li>" . $campos[$i] . "</i>";

    }
    echo "</div>";
    die();
} else {
    echo "<div class='correcto'>
               Datos correctos </div>";
}
echo "";

require_once('../conf.php');
require_once('../funciones.php');

try {
    $conexion = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    //$conexion = new PDO('mysql:host=localhost;dbname=ligaargentina;charset=utf8', 'root', '');
} catch (PDOException $e) {
    header('Location: error.php');
    echo $e->getMessage();
    exit;
}

$nombre = $_GET['nombre'];
$zona = $_GET['zona'];
$direccion = $_GET['direccion'];
$telefono = $_GET['telefono'];
$localidad = $_GET['localidad'];


$sql = "INSERT INTO clubes (nombre,zona,direccion,telefono, localidad) VALUES ('" . $nombre . "','" . $zona . "','" . $direccion . "'," . $telefono . ",'" . $localidad . "')";

$statement = $conexion->prepare($sql);
if ($statement->execute() == true):
    echo "Se cargo correctamente";
?>
<a href="../index.php" class="btn btn-primary">Volver</a>
<?php else:
    echo "Hubo un error en la carga";

endif




?>