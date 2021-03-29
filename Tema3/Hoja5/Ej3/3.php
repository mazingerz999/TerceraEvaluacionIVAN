<?php 

$arraypeliculas=[
    " casablanca"=>["cas.jpg"]
, " bladerunner"=>["bla.jpg"]
, " gladiator"=>["gla.jpg"]
," akira"=>["aki.jpg"]
," señor de los anillos" =>["ani.jpg"]
, " matrix" =>["mat.jpg"]
, " guardianes de la galaxia"=>["gua.jpg"]
 ," star wars"=>["sta.jpg"]
  ," joker"=>["jok.jpg"]
];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Buscador de peliculas</h1> 

  <form action="" method="post">
  <p><label for="texto">Buscador</label><input type="text" name="texto" id="texto"></p>
    <p><input type="submit" value="Buscar" name="buscar"></p>

  
  </form>
    <?php 
    if (isset($_POST["buscar"])) {
        
        $texto=$_POST["texto"];

        foreach ($arraypeliculas as $key => $value) {
           $busca=strpos($key, $texto);
           
           if ($busca==true) {

          foreach ($value as  $value2) {
             
            echo "<img src='" . $value2 . "' alt='img'>";
          }
           }else{

         
           }
        }
    }
    
    ?>

</body>
</html>