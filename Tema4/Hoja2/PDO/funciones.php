<?php

function getConexionPDO()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexion = new PDO('mysql:host=localhost;dbname=' . 'libros', 'root', '', $opciones);

    return $conexion;
}

function setLibros($titulo, $anyo, $precio, $fecha)
{
    $conexion = getConexionPDO();
    $todoOK = true;
    $insertar = $conexion->prepare('insert into libro (titulo,  anio, precio, fecha) values (?,?,?,?)');
    $insertar->bindparam(1, $titulo);
    $insertar->bindparam(2, $anyo);
    $insertar->bindparam(3, $precio);
    $insertar->bindparam(4, $fecha);
    if ($insertar->execute() != true) {
        $todoOK = false;
    }
    return $todoOK;
}

function getLibros()
{
    $conexion = getConexionPDO();
    $consulta = $conexion->prepare('select * from libro');
    if ($consulta->execute()) {
        while ($row = $consulta->fetch()) {
            $aux[] = array(
                'Numero' => $row['Numero'],
                'Titulo' => $row['Titulo'],
                'Anio' => $row['Anio'],
                'Precio' => $row['Precio'],
                'Fecha' => $row['Fecha']
            );
        }
    }
    unset($conexion);
    return $aux;
}

function delete_Libros($titulo) {
$conexion= getConexionPDO();
$todoOK=true;
$borrar=$conexion->prepare('DELETE FROM libro WHERE titulo=?');
$borrar->bindParam(1, $titulo);
if ($borrar->execute()!=true) {
$todoOK=false;
}
return $todoOK;
}
