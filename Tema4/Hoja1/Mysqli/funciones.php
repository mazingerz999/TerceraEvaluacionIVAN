<?php

//CONEXION//
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'dwes_01_nba');
function getConexionSQLi()
{
    $conexion = new mysqli(HOST, USERNAME, PASSWORD, DATABASE, 3306);
    $conexion->set_charset('utf8');
    $error = $conexion->connect_errno;
    if ($error != null) {
        print '<p>Se ha producido el error:' . $conexion->connect_error . '</p>';
        exit();
    }
    return $conexion;
}

//QUERYS//
function getEquipo()
{
    $conexion = getConexionSQLi();
    $consulta = 'select  * from equipos';
    if ($resultado = $conexion->query($consulta)) {
        while ($row = $resultado->fetch_array()) {
            $aux[] = array(
                'nombre' => $row['nombre']
            );
        }
    }
    $conexion->close();
    return $aux;
}

function getJugadores($getEquipo)
{
    //CREO LA CONEXION
    $conexiom = getConexionSQLi();
    //HAGO  EL STMT INIT
    $consulta = $conexiom->stmt_init();
    //HAGO EL PREPARE  CON LA CONSULTA
    $consulta->prepare("select nombre, peso, nombre_equipo, codigo from jugadores where nombre_equipo=?");
    //BIND PARAN CON EL TIPO  DE  DATO Y VARIABLE AUX
    $consulta->bind_param("s", $getEquipo);
    //EJECUTO
    $consulta->execute();
    //HAGO LAS VARIABLES DE  LO QUE QUIERO en este caso peso y nombre ordenadas
    $consulta->bind_result($nombre, $peso, $codigo, $nombre_equipo);
    //SACO LOS DATOS CON EL  FETCH
    while ($consulta->fetch()) {
        //GUARDO EN AUX
        $aux[] = array(
            //EL ORDEN ESTE MEJOR PONLO SIEMPRE COMO EN LA QUERY
            "nombre" => $nombre, "peso" => $peso, "codigo" => $codigo, "nombre_equipo" => $nombre_equipo,
        );
    }
    //CIERRO CONSULTA
    $consulta->close();
    return $aux;
}

//TRANSACCIONES, LA PARTE DE TRASPASOS//
function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipo)
{
    $conexion = getConexionSQLi();
    $todoOk = true;
    $conexion->autocommit(false);
    $borrado = $conexion->prepare('DELETE  FROM jugadores WHERE nombre=?');
    $borrado->bind_param('s', $jugadorBaja);
    if ($borrado->execute() != true) {
        $todoOk = false;
       
    }
    $update = $conexion->prepare('INSERT INTO jugadores (codigo, nombre, procedencia, altura, peso, posicion, nombre_equipo)
     VALUES ((SELECT (t.codigo + 1) from jugadores AS t ORDER BY t.codigo DESC LIMIT 1),?,?,?,?,?,?)');
    $update->bind_param('ssddss', $nombre, $procedencia, $altura, $peso, $posicion, $equipo);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    if ($todoOk) {
        $conexion->commit();
        return true;
    } else {
        $conexion->rollBack();
        return false;
    }
}


function getPosicion()
{
    $conexion = getConexionSQLi();
    $consulta = 'SELECT distinct posicion  from jugadores';
    if ($resultado = $conexion->query($consulta)) {
        while ($row = $resultado->fetch_array()) {
            $aux[] = array(
                'posicion' => $row['posicion']
            );
        }
    }
    $conexion->close();
    return $aux;
}

//UPDATES//
function updatePeso($peso, $nombre)
{
    $conexion = getConexionSQLi();
    $todoOk = true;
    $update = $conexion->prepare('UPDATE jugadores SET peso = ? WHERE nombre = ?');
    $update->bind_param('ds', $peso, $nombre);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    return $todoOk;
}
