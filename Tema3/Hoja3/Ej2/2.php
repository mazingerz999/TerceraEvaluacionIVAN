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

$arrayMonedas=[200,100,50,20,10,5,2,1];
$dinero=2300;

foreach ($arrayMonedas as $value) {
    
    $resul=(int)($dinero/$value);

echo "Hay ". $resul." monedas de "."$value"."<br>";


$dinero=($dinero%$value);

}


     ?>
</body>
</html>