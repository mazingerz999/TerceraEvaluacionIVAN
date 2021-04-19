<?php

//CONEXION//
function getConexionPDO()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexion = new PDO('mysql:host=localhost;dbname=' . 'dwes_01_nba', 'root', '', $opciones);
    return $conexion;
}

//QUERYS//
function getEquipo()
{
    $conexion = getConexionPDO();
    $consulta = $conexion->prepare('select * from equipos');
    if ($consulta->execute()) {
        while ($row = $consulta->fetch()) {
            $aux[] = array(
                'nombre' => $row['nombre'] 
            );
        }
    }
    unset($conexion);
    return $aux;
}

function getJugadores($equipo)
{
    $conexion = getConexionPDO();
    $consulta = $conexion->prepare('select * from jugadores where nombre_equipo=?');
    $consulta->bindParam(1, $equipo);
    if ($consulta->execute()) {
        while ($row = $consulta->fetch()) {
            $aux[] = array(
                'nombre' => $row['nombre'],
                'peso' => $row['peso'],
                'nombre_equipo' => $row['nombre_equipo'],
                'codigo' => $row['codigo']
            );
        }
    }
    unset($conexion);
    return $aux;
}


//TRANSACCIONES, LA PARTE DE TRASPASOS//

function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipo)
{
    $conexion = getConexionPDO();
    try {
        $conexion->beginTransaction();
        $borrar = $conexion->prepare('delete from jugadores where nombre=?');
        $borrar->bindParam(1, $jugadorBaja);
        if ($borrar->execute() != true) {
            throw new Exception('error al borrar');
        }
        $insertar = $conexion->prepare('INSERT INTO jugadores (codigo, nombre, procedencia, altura, peso, posicion, nombre_equipo)
         VALUES ((SELECT (t.codigo + 1) from jugadores AS t ORDER BY t.codigo DESC LIMIT 1),?,?,?,?,?,?)');

        $insertar->bindParam(1, $nombre);
        $insertar->bindParam(2, $procedencia);
        $insertar->bindParam(3, $altura);
        $insertar->bindParam(4, $peso);
        $insertar->bindParam(5, $posicion);
        $insertar->bindParam(6, $equipo);
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



///////

function getPosicion()
{
    $conexion = getConexionPDO();
    $consulta = $conexion->prepare('SELECT distinct posicion  from jugadores');
    if ($consulta->execute()) {
        while ($row = $consulta->fetch()) {
            $aux[] = array(
                'posicion' => $row['posicion']
            );
        }
    }
    unset($conexion);
    return $aux;
}
function updatePeso($peso, $nombre)
{
    $conexion = getConexionPDO();
    $todoOk = true;
    $update = $conexion->prepare('UPDATE jugadores SET peso = ? WHERE nombre = ?');
    $update->bindParam(1, $peso);
    $update->bindParam(2, $nombre);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    return $todoOk;
}
