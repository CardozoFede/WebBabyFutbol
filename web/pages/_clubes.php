<?php

require_once('conf.php');
require_once('funciones.php');

try {
    $conexion = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    //$conexion = new PDO('mysql:host=localhost;dbname=ligaargentina;charset=utf8', 'root', '');
} catch (PDOException $e) {
    header('Location: error.php');
    echo $e->getMessage();
    exit;
}
if (isset($_GET['nombre'])) {


    $nombre = urldecode($_GET['nombre']) ?? null;
    $clubes = getClubesByLegajo($conexion, $nombre);
}

?>
<!-- clubes section-->
<section class="bg-light" id="clubes">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>CLUBES</h2>
                <table class="table table-bordered">
                    <th>  </th>
                    <th> Nombre </th>
                    <th> Zona </th>
                    <th> Direccion </th>
                    <th> Telefono </th>
                    <th> Localidad </th>
                    <th> </th>
                    <?php if (count($clubes) > 0):
                        foreach ($clubes as $lista): ?>

                    <tr>

                        <td>
                            
                        </td>
                        <td>
                            <?php echo $lista['nombre'] ?>
                        </td>
                        <td>
                            <?php echo $lista['zona'] ?>
                        </td>
                        <td>
                            <?php echo $lista['direccion'] ?>
                        </td>
                        <td>
                            <?php echo $lista['telefono'] ?>
                        </td>
                        <td>
                            <?php echo $lista['localidad'] ?>
                        </td>                     
                        <td><a href="update.php?id=<?php echo $lista['id'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="delete.php?id=<?php echo $lista['id'] ?>" class="btn  btn-danger btn-eliminar" onclick="return confirm('Está segura/o que desea eliminar este club?');">Eliminar</a></td>
                                                           
                        </td>
                    </tr>
                    <?php endforeach;
                    endif; ?>
                    <?php
                    if (count($clubes) == 0): ?>
                    <tr>
                        <td colspan="6"> No hay registros </td>
                    </tr>

                    <?php
                    endif; ?>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($paginado_enlaces['anterior']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?>#clubes"> Primero
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>#clubes">
                                <?php echo $paginado_enlaces['anterior'] ?>
                            </a>
                        </li>
                        <?php endif ?>
                        <li class="page-item active">
                            <span class="page-link">
                                <?php echo $paginado_enlaces['actual'] ?>
                            </span>
                        </li>
                        <?php if ($paginado_enlaces['siguiente']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['siguiente'] ?>#clubes">
                                <?php echo $paginado_enlaces['siguiente'] ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>#clubes"> Último
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container">

    <h1 class="text-center"> Busqueda de Clubes </h1>
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <form action="#clubes" method="get" class="mb-5">
                    <div class="mb-3">
                        <label for="lista" class="form-label"> </label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese el legajo del empleado que desea buscar.">
                    </div>
                    <button type="submit" class="btn btn-primary"> Buscar </button>
                </form>
            </div>
        </div>
    </div>


</div>