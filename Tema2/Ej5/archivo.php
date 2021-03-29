
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
$temporal="Alberto";
print_r(gettype($temporal));
print_r("<br>");
$temporal=3.14;
print_r(gettype($temporal));
print_r("<br>");
$temporal=false;
print_r(gettype($temporal));
print_r("<br>");
$temporal=null;
print_r(gettype($temporal));
print_r("<br>");


?>


</body>
</html>