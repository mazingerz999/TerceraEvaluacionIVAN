<?php

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'dwes_03_funicular');
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

function TransaccionLlegada()
{
    $conexion = getConexionSQLi();
    $todoOk = true;
    $conexion->autocommit(false);
    $borrado = $conexion->prepare('DELETE  FROM pasajeros');
    if ($borrado->execute() != true) {
        $todoOk = false;
    }
    $update = $conexion->prepare("UPDATE plazas SET reservada = '0'");

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
function getAsiento()
{
    $conexion = getConexionSQLi();
    $consulta = "SELECT * FROM plazas";
    if ($resultado = $conexion->query($consulta)) {
        while ($row = $resultado->fetch_array()) {
            $aux[] = array(
                'numero' => $row['numero'],
                'reservada' => $row['reservada'],
                'precio' => $row['precio']
            );
        }
    }
    $conexion->close();
    return $aux;
}
function getDinero()
{
    $conexion = getConexionSQLi();
    $consulta = "SELECT * FROM plazas";
    if ($resultado = $conexion->query($consulta)) {
        while ($row = $resultado->fetch_array()) {
            $aux[] = array(
                'numero' => $row['numero'],
                'reservada' => $row['reservada'],
                'precio' => $row['precio']
            );
        }
    }
    $conexion->close();
    return $aux;
}

function TransaccionReservara($nombre, $dni, $asiento)
{
    $consola= getConexionSQLi();
    $consola->autocommit(false); 
    $sqlupdate=$consola->stmt_init();
    $sql = "update plazas set reservada=1 where numero=?";
    $sqlupdate->prepare($sql);
    $sqlupdate->bind_param('i', $asiento);
    $sqlupdate->execute();
    $filasafectadasUpdate=$sqlupdate->affected_rows;
    $sqlupdate->close();
    
    $sqlinsert=$consola->stmt_init();
    $sql2="insert into pasajeros value (?,?,'m',?)";
    $sqlinsert->prepare($sql2);
    $sqlinsert->bind_param('ssi', $dni, $nombre, $asiento);
    $sqlinsert->execute();
    $filasafectadasInsert=$sqlinsert->affected_rows;
    $sqlinsert->close();
    if ($filasafectadasUpdate==1 && $filasafectadasInsert   ==1) {
       $consola->commit();
       return true;
    }else{
        return false;;
    }
}
function updatePrecio($precio, $numero) {
    $conexion = getConexionSQLi();
    $todoOk = true;
    $update = $conexion->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");
    $update->bind_param("ds", $precio, $numero);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    return $todoOk;
}