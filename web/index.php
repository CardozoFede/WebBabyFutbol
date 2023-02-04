<?php

require_once('conf.php');

require_once('funciones.php');
require_once('funciones_paginador.php');

try {
    $conexion = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    //$conexion = new PDO('mysql:host=localhost;dbname=ligaargentina;charset=utf8', 'root', '');
} catch (PDOException $e) {
    header('Location: error.php');
    echo $e->getMessage();
    exit;
}

$clubes = getClubes($conexion);

$cantidad = count($clubes);

$pagina_actual = $_GET['pag'] ?? 1;

$cuantos_por_pagina = 6;

$paginado_enlaces = paginador_enlaces($cantidad, $pagina_actual, $cuantos_por_pagina);

$clubes = paginador_lista($clubes, $pagina_actual, $cuantos_por_pagina);

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
</head>

<body id="page-top">
    <img src="./imagenes/pelotas.jpg" class="img-fluid" width="100%" height="100%">

    <!-- Navigation-->

    <?php require('layout/_nav.php') ?>

    <!-- Header-->
    <header class="container">
        <div class="container px-4 text-center">

            <p style="margin-top:-1050px;">
            <section id="home">
                <h3>BIENVENIDOS!!</h3>
                </p>
                <p class="fw-bolder-margin-top:-1050px;">
                <h5>A un Torneo de Baby Futbol Infantil, participa de la liga mas competitiva de BS AS.!</h5>
                </p>
                <p class="lead">
                <h5>Orientada a enseñar valores y respeto a todos los chicos.</h5>
                </p>
                <a class="btn btn-lg btn-light" href="#inscripcion">Inscripción 2022</a>
        </div>
        </section>
        </div>
    </header>
    <!-- About section-->
    <section id="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>TORNEOS</h2>
                    <p class="lead">Arranca el TORNEO ANUAL DE BABY FÚTBOL de LIGA ARGENTINA, el primero de distintos
                        torneos de fútbol infantil con una gran cantidad de equipos y de distintas categorias (2015,
                        2014, 2013, 2012, 2011, 2010 y 2009). </p>
                    <ul>
                        <li>Torneo Anual</li>
                        <li>Copa Challenger</li>
                        <li>Copa de Campeones</li>
                        <li>Torneo de Verano</li>
                    </ul>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./imagenes/trofeo6.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./imagenes/trofeo4.jpg" " class=" d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./imagenes/trofeo5.jpg" " class=" d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- noticias section-->

    <?php require('pages/_noticias.php') ?>

    <!-- clubes section-->

    <?php require('pages/_clubes.php') ?>

    <!-- inscripcion section-->

    <?php require('pages/_inscripcion.php') ?>

    <!-- Contacto section-->

    <?php require('pages/_contacto.php') ?>

    <!-- Footer-->

    <?php require('layout/_footer.php') ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>