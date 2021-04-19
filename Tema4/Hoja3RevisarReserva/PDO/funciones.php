<?php

function getConexionPDO()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexion = new PDO('mysql:host=localhost;dbname=' . 'dwes_03_funicular', 'root', '', $opciones);
    return $conexion;
}
function TransaccionLlegada()
{
    $conexion = getConexionPDO();
    try {
        $conexion->beginTransaction();
        $borrar = $conexion->prepare('DELETE  FROM pasajeros');
        if ($borrar->execute() != true) {
            throw new Exception('error al borrar');
        }
        $update = $conexion->prepare("UPDATE plazas SET reservada = '0'");

        if ($update->execute() != true) {
            throw new Exception('error al insertar');
        }
        $conexion->commit();
        return true;
    } catch (Exception $ex) {
        echo $ex->getMessage();
        $conexion->rollBack();
        return false;
    }
}
function getAsiento()
{
    $conexion = getConexionPDO();
    $consulta = $conexion->prepare('SELECT * FROM plazas');
    if ($consulta->execute()) {
        while ($row = $consulta->fetch()) {
            $aux[] = array(
                'numero' => $row['numero'],
                'reservada' => $row['reservada'],
                'precio' => $row['precio']
            );
        }
    }
    unset($conexion);
    return $aux;
}
function getDinero()
{
    $conexion = getConexionPDO();
    $consulta = $conexion->prepare('SELECT * FROM plazas');
    if ($consulta->execute()) {
        while ($row = $consulta->fetch()) {
            $aux[] = array(
                'numero' => $row['numero'],
                'reservada' => $row['reservada'],
                'precio' => $row['precio']
            );
        }
    }
    unset($conexion);
    return $aux;
}

function TransaccionReservara($nombre, $dni, $asiento)
{
    $conexion = getConexionPDO();
    try {
        $conexion->beginTransaction();
        $borrar = $conexion->prepare("update plazas set reservada=1 where numero=?");
        $borrar->bindParam(1, $asiento);
        if ($borrar->execute() != true) {
            throw new Exception('error al borrar');
        }
        $insertar = $conexion->prepare("insert into pasajeros value (?,?,'m',?)");
        $insertar->bindParam(1, $nombre);
        $insertar->bindParam(2, $dni);
        $insertar->bindParam(3, $asiento);

        if ($insertar->execute() != true) {
            throw new Exception('error al insertar');
        }
        $conexion->commit();
        return true;
    } catch (Exception $ex) {
        echo $ex->getMessage();
        $conexion->rollBack();
        return false;
    }
}

function updatePrecio($precio, $numero) {
$conexion = getConexionPDO();
$todoOk = true;
$update = $conexion->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");
$update->bindParam(1, $precio);
$update->bindParam(2, $numero);
if ($update->execute() != true) {
$todoOk = false;
}
return $todoOk;

}
