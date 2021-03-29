<?php 

$arraymonedas=[
    "Euros"=>["Euro"=>1, "Dolar"=>1.5 , "Libra"=>1.2],
    "Dolar"=>["Euro"=>1.2, "Dolar"=>1 , "Libra"=>1.5],
    "Libra"=>["Euro"=>1.5, "Dolar"=>1.8 , "Libra"=>1],

];

 if (isset($_POST["convertir"])) {
    
    $moneda=$_POST["numero"];
    $valor2=$_POST["valores2"];
    $valor1=$_POST["valores1"];
    
    $total=$moneda*$arraymonedas[$valor1][$valor2];

    echo $total;
    
 }   

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

<h1>Conversor de monedas</h1>

<br>
<form action="" method="post">
<p><label for="moneda1">Cantidad</label><input type="number" name="numero" id=""></p>

<p><select name="valores1" id="">
<?php foreach ($arraymonedas as $key => $value) : ?>
<option value="<?=$key?>"><?=$key?></option>
<?php endforeach ; ?>
 </select>
</p>

<p><select name="valores2" id="">
<?php foreach ($arraymonedas as $key => $value) : ?>
<option value="<?=$key?>"><?=$key?></option>
<?php endforeach ; ?>
 </select>
</p>
<p><input type="submit" value="Convertir" name="convertir"></p>
</form>
   
  
</body>
</html>