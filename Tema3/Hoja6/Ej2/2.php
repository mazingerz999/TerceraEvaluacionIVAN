<?php 

$equipos=[
  
    "Real Madrid"=>[
        "Entrenador"=>["Zidane"=>"zidane.jpg"],
        "Futbolistas"=>["Ramos"=>"ramos.jpg", "Raul"=>"raul.jpg", "Ronaldo"=>"ronaldo.jpg", "Ozil"=>"ozil.jpg"]
    ],
    "Barcelona"=>[
        "Entrenador"=>["Koeman"=>"koeman.jpg"],
        "Futbolistas"=>["Pique"=>"pique.jpg", "Messi"=>"messi.jpg", "Griezman"=>"griezman.jpg", "Ter Stegen"=>"terstegen.jpg"]
    ], 
     
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
    <h1>Elige un equipo</h1>
    <hr>
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
   Elige un equipo: <select name="equipo" >
   <option value="todos">Todos</option>
    <?php foreach ($equipos as $key => $value) : ?>
    <option value="<?=$key?>"><?=$key?></option>
    <?php endforeach ?>
    </select>
    <br>
    <br>
<p>
<label>Posicion: </label>
<?php foreach ($equipos["Barcelona"] as $key => $value) : ?>
<?=$key?><input type="radio" name="posicion" id="" value="<?=$key?>">
<?php endforeach ?>
</p>
<p><input type='submit' value='Buscar' id='enviar' name='enviar'> </p>
</form>

<?php if (isset($_POST["enviar"])) {
    $equi=$_POST['equipo'];
/*
    echo "<table border='2'>";
    echo "<thead><tr><td> $equi</td></tr></thead>";
   foreach ($equipos[$_POST['equipo']][$_POST['posicion']] as $key => $value) {
   
    
    echo "<tr><td>$key</td><td><img src='" . $value . "' alt='img'></td></tr>";
    
    
   }
   echo"</table>";*/

   todos($equipos);

}

function todos($array)
{
    echo "<table>";
    foreach ($array as $equipo => $value) {
        echo "<thead><tr><td>$equipo</td></tr></thead>";
        foreach ($value as $posicion => $value2) {
            echo "<tr><td>$posicion</td></tr>";
            foreach ($value2 as $nombres => $imagenes) {
                echo "<tr><td>$nombres</td><td><img src='" . $imagenes . "' alt='img'></td></tr>";
            }
        }
    }
    echo "</table>";
}

?>
</body>

</html>