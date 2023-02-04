<?php

$nombre = "";
$zona = "";
$direccion = "";
$telefono = "";
$localidad = "";

if (isset($_GET['nombre'])) {
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


}

require_once('conf.php');
require_once('funciones.php');

//$id = test_input($_REQUEST['id'] ?? null);
$id = $_GET["id"];
$clubes = getClubesbById($conexion, $id);
//die(implode(",",$clubes));

//var_dump($clubes);

if (!$clubes) {
    header('Location: index.php');
}

$nombre = test_input($_GET['nombre'] ?? $clubes['nombre']);
$zona = test_input($_GET['zona'] ?? $clubes['zona']);
$direccion = test_input($_GET['direccion'] ?? $clubes['direccion']);
$telefono = test_input($_GET['telefono'] ?? $clubes['telefono']);
$localidad = test_input($_GET['localidad'] ?? $clubes['localidad']);

if (isset($_GET["nombre"])) {
    $data = array();
    $data["nombre"] = $nombre;
    $data["zona"] = $zona;
    $data["direccion"] = $direccion;
    $data["telefono"] = $telefono;
    $data["localidad"] = $localidad;
    $id = $_GET["id"];
    updateClubes($conexion, $id, $data);
    header('Location: actualizada.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Scrolling Nav - Start Bootstrap Template</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <section class="bg-light" id="update">
        <div class="container px-4">

            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>ACTUALIZAR DATOS</h2><br />
                    <form class="row g-3" method="GET" action="update.php">
                        <fieldset>
                            <div class="col-md-12">
                                <label for="nombre" class="form-label">Club</label>
                                <input type="text" name="nombre" class="form-control" id="nombre"
                                    placeholder="ingrese nombre del club" value="<?php echo $clubes['nombre'] ?>">
                            </div>
                            <div class="col-12">
                                <label for="zona" class="form-label">Zona</label>
                                <input type="text" name="zona" class="form-control" id="zona" placeholder="ingrese zona"
                                    value="<?php echo $clubes['zona'] ?>">
                            </div>
                            <div class="col-12">
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" name="direccion" class="form-control" id="direccion"
                                    placeholder="ingrese direccion del club" value="<?php echo $clubes['direccion'] ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" name="telefono" class="form-control" id="telefono"
                                    placeholder="ingrese numero de telefono" value="<?php echo $clubes['telefono'] ?>">
                                <div class="col-md-12">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input type="text" name="localidad" class="form-control" id="localidad"
                                        placeholder="ingrese la localidad" value="<?php echo $clubes['localidad'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <label class="form-check-label" for="clubes">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <button type="submit" value="enviar" class="btn btn-primary"  onclick="return confirm('Está segura/o que desea actualizar este club?');"
                                        href=actualizada.php>Actualizar</button>
                                    <input type ="hidden" name="id" value="<?php echo $id ?>"required>
                                    <a class="btn btn-danger" href=index.php>Cancelar</a>
                                </div>
                    </form>
                </div>
              
            </div>
        </div>
    </section>
</head>