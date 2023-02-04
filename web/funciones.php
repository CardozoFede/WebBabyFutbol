
<?php

try{
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
    
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function getClubes(PDO $conexion)
{

    $consulta = $conexion->prepare('
    SELECT id, nombre, zona, direccion, telefono, localidad
    FROM clubes
    ');

    $consulta->execute();

    $club = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $club;

}

function getClubesByLegajo(PDO $conexion, $nombre)
{


    $sql = "
         SELECT id, nombre, zona, direccion, telefono, localidad
        FROM clubes
        WHERE nombre = '" . $nombre . "'";

    $consulta = $conexion->prepare($sql);

    //WHERE nombre = :nombre
    //');
    //$consulta->bindValue(':nombre', $nombre);

    $consulta->execute();

    $club = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $club;
}

    function getClubesbById(PDO $conexion, $id)
    {
        $consulta = $conexion->prepare('
        
        SELECT id, nombre, zona, direccion, telefono, localidad
        FROM clubes
        WHERE id = :id
        ');

        $consulta->bindValue(':id', $id);
        $consulta->execute();
        $clu = $consulta->fetch(PDO::FETCH_ASSOC);
        return $clu;
    }

    function updateClubes(PDO $conexion, $id, $data)
{
    $consulta = $conexion->prepare('
        UPDATE clubes
        SET
            nombre = :nombre,
            zona = :zona,
            direccion = :direccion,
            telefono = :telefono,
            localidad = :localidad
        WHERE id = :id
    ');


    $consulta->bindValue(':nombre', $data['nombre']);
    $consulta->bindValue(':zona', $data['zona']);
    $consulta->bindValue(':direccion', $data['direccion']);
    $consulta->bindValue(':telefono', $data['telefono']);
    $consulta->bindValue(':localidad', $data['localidad']);
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    
}

function deleteClubes(PDO $conexion, $id)
{
    $consulta = $conexion->prepare('
        DELETE FROM clubes
        WHERE id = :id
    ');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
}






?>