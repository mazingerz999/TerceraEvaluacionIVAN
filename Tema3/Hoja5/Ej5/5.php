<?php 
$total=0;
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
    <h1>Suma de cantidades</h1>

    <form action="" method="post">
    
    
<?php for ($i=1; $i < 11; $i++) : ?>
<p> <label for='numeros'>Cantidad <?=$i?>:  </label> <input type='number' name='numero[]' id='numeros'  ></p>

<?php endfor  ?>

<p><input type='submit' value='Sumar' id='enviar' name='enviar'> </p>

    
    </form>
<?php 

if (isset($_POST['enviar'])) { 

  $a=$_POST['numero']; 

  foreach ($a as $value) {
      $total=$total+$value;
  }
  echo "EL total  es $total";
 }; 

  ?>
</body>
</html>