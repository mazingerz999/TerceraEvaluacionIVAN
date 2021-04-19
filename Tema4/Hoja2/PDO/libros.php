<?php 

require_once('funciones.php');

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
        integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>
<body  class="jumbotron">
    <h1>INSERTE LOS DATOS DEL LIBRO</h1>
    <HR></HR>

    <form action="libros_guardar.php" method="post">
    <p> <label for='nombre'>Nombre:  </label> <input type='text' name='nombre' id='nombre'></p>
    <p> <label for='anyo'>Año de edicion:  </label> <input type='number' name='anyo' id='anyo'></p>
    <p> <label for='precio'>Precio:  </label> <input type='number' name='precio' id='precio'></p>
    <p> <label for='fecha'>Fecha de adquisicion:  </label> <input type='date' name='fecha' id='fecha'></p>
    <p><input type='submit' value='Guardar datos de libro' id='enviar' name='enviar'> </p>
    </form>
    <hr>
    <a href="libros_datos.php">Mostrar los libros guardados</a>


</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'
    integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN'
    crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'
    integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q'
    crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'
    integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl'
    crossorigin='anonymous'></script>
</html>