
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

$var1=5;
$var2=7;
print_r($var1);
print_r($var2 );
print_r("<br>");
$aux=$var2;
$var2=$var1;
$var1=$aux;
print_r($var1.$var2);
?>


</body>
</html>