
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
$nombre="Alberto";
print_r("Informacion de la variable nombre: ");
var_dump($nombre);
print_r("<br>");
print_r("Contenido de la variable: " . $nombre);
print_r("<br>");
$nombre=null;
print_r("Despues de asignarle un valor nulo: ");

var_dump($nombre);

?>


</body>
</html>