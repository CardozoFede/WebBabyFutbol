<?php

require_once('conf.php');
require_once('funciones.php');

$id = test_input( $_GET['id'] ?? null );

deleteClubes($conexion, $id);

header('Location: eliminar.php');



?>