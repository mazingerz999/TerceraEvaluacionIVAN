<?php

$cookie = "as";
if (isset($_COOKIE["login"])) {
    $cookie = $_COOKIE["login"];
}
setcookie("login", time(), time(), time() + 3600);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (isset($_COOKIE["login"])) {
    echo $cookie;
}?>
</body>
</html>