<?php require_once( 'funciones.php' ); 
session_start();

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    exit();
} else {
    if (!compruebaUser($_SERVER["PHP_AUTH_USER"], $_SERVER["PHP_AUTH_PW"])) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit();

    }
}
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
<body>
    <h1>Gestion del funicular</h1>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <p> <label for='user'>Usuario:  </label> <input type='text' name='user' id='user'></p>
    <p> <label for='password'>Password:  </label> <input type='password' name='password' id='password'></p>
    <p><input type='submit' value='Enviar' id='enviar' name='enviar'> </p>
    </form>
<?php if (isset($_POST['enviar'])){

 foreach (compruebaTodos() as  $value) {
        if ($value['usuario']==$_POST['user'] ) {
            $_SESSION['usuario']=$value['usuario'];
            // if ($value['password']==$_POST['password']) {
               
            // }
        }
    }

 }

?>
    <p>Elige una opcion</p>
    <ul>
    <li><a href="reserva.php">Realizar una reserva</a></li>
    <li><a href="llegada.php">Llegada</a></li>
    <li><a href="registro.php">Registro</a></li>
    </ul>
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