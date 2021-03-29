
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">

<p><label for="num1">introduce un numero</label> <input type="number" name="num1" id="num1"> </p>
<p><label for="num2">introduce un numero</label> <input type="number" name="num2" id="num2"></p>
<p><label for="seleccion">Elige una operacion</label>
<select name="seleccion" id="seleccion">
<option value="suma">Suma</option>
<option value="resta">Resta</option>
<option value="multi">Multiplicacion</option>
<option value="divi">Division</option>
</select></p>
<p><input type="submit" value="Operar" name="enviar"></p>
</form>
<?php 

if (isset($_POST["enviar"])) {
 
    $seleccion=$_POST["seleccion"];

    switch ($seleccion) {
        case 'suma':
         
            print_r($_POST["num1"]+$_POST["num2"]);
            break;
        case 'resta':
        
            print_r($_POST["num1"]-$_POST["num2"]);
            break;
        case 'multi':
            print_r($_POST["num1"]*$_POST["num2"]);
            break;
        case 'divi':
            print_r($_POST["num1"]/$_POST["num2"]);
            break;
        
        default:
         
            break;
    }

}





 ?>


</body>
</html>