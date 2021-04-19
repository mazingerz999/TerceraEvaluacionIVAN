<?php

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'libros');
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


function setLibros($titulo, $anyo, $precio, $fecha)
{
    $conexion = getConexionSQLi();
    $todoOK = true;
    $insertar = $conexion->prepare('insert into libro  (Titulo,  Anio, Precio, Fecha) values (?,?,?,?)');
    $insertar->bind_param('siis', $titulo,  $anyo, $precio, $fecha);
    if ($insertar->execute() != true) {
        $todoOK = false;
    }
    return $todoOK;
}
function getLibros()
{
    $conexion = getConexionSQLi();
    $consulta = 'select  * from libro';
    if ($resultado = $conexion->query($consulta)) {
        while ($row = $resultado->fetch_array()) {
            $aux[] = array(
                'Numero' => $row['Numero'],
                'Titulo' => $row['Titulo'],
                'Anio' => $row['Anio'],
                'Precio' => $row['Precio'],
                'Fecha' => $row['Fecha']
            );
        }
    }
    $conexion->close();
    return $aux;
}

function delete_Libros($titulo)
{
    $conexion = getConexionSQLi();
    $todoOK = true;
    $borrar = $conexion->prepare('DELETE FROM libro WHERE Numero=?');
    $borrar->bind_param('s', $titulo);
    if ($borrar->execute() != true) {
        $todoOK = false;
    }
    return $todoOK;
}
