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
    $numerodias=5;
     $distancia=850;
    $precioxkm=2.5;
    $precioBillete=0;


    if ($distancia>800 && $numerodias>7) {

           $precioBillete=$distancia*(($precioxkm*30)/100);
    

    }else{
        $precioBillete=$distancia*$precioxkm;

    }

    print_r("El precio del billete es de $precioBillete €"); ?>
</body>
</html>