
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

$dinero=67;

$billetes10= floor($dinero/10);
print_r("Hay un total de ".$billetes10. " billetes de 10");
print_r("<br>");
$dinero=($dinero%10);
$billetes5=floor($dinero/5);
print_r("Hay un total de ".$billetes5. " billetes de 5");
print_r("<br>");
$dinero=($dinero%5);
print_r("Hay un total de $dinero monedas")
?>


</body>
</html>