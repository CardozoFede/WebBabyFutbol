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
 
?>