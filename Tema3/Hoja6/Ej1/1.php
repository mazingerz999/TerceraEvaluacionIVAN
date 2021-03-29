<?php 

    $arraycoches=[

        "FORD"=>["FOCUS", "FIESTA", "ESCORT"],
        "FERRARI"=>["518", "MARANELLO", "PISTA"],
        "BMW"=>["M1", "M2", "M3"]

    ];

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
    <H1>Busca tu coche</H1>
    <hr>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="formulariocoches">
    
    <p> <label for='marca'>Marca:  </label>
    
    <select name="marca" id="marca">

    <?php foreach ($arraycoches as $key => $value) : ?>
    
        <option value="<?=$key?>"><?=$key?></option>
    <?php endforeach ?>

    </select>
    
    </p>
     <p><input type='submit' value='Enviar' id='enviar' name='enviar'> </p>
    
    </form>
    <hr>
    <br>

    <?php if (isset($_POST["enviar"])) : ?> 
    <table border="2">
    <thead>Coche</thead>
    <?php foreach ($arraycoches[$_POST['marca']] as  $valor) : ?>
    <tr><td><input type="text" name="coches" value="<?=$valor?>"></td></tr>
    <?php endforeach ?>
    </table>
    <?php endif ?>

    <?php if (isset($_POST["enviar"]) && $_POST['coches']) : ?> 
    <table border="2">
    <thead>Coche</thead>
    <?php foreach ($arraycoches[$_POST['marca']] as  $valor) : ?> 
        <?php if ($valor != $_POST['coches'] ) : ?>
        <p>Se a actualizado el modelo <?= $_POST['coches'] ?></p>
     <?php endif ?>
    <?php endforeach ?>

    </table>
    <?php endif ?>
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