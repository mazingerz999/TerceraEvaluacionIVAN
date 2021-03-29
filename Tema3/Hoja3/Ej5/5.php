<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
 
<!-- Repasar en casa
 -->
 <?php 
 
 $articulos=[
     "nombre"=>["fanta","bezoya","lays"],
     "descripcion"=>["refresco", "agua", "patatas"],
     "existencias"=>[2,5,6]
 ];

 foreach ($articulos as $key => $value) {

     foreach ($value as $ke2 => $value2) {

         echo $value2. "<br>";
        
     }
 }


 ?>

</body>
</html>