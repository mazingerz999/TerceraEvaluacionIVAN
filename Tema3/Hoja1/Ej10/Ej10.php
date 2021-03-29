<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <p><label for="numero">Introduce un numero</label><input type="number" name="numero" id=""></p>
    <p><input type="submit" value="Click para saber si es primo" name="enviar"></p>

    </form>
    <?php 


if (isset($_POST["enviar"])) {
   
    $numero=$_POST["numero"];

if ($numero%2==0) {
   print_r("El numero $numero no es un numero primo");
}else{
    print_r("El numero $numero es un numero primo");
}

}


     ?>

</body>
</html>