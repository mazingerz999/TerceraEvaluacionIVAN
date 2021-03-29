<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ver numeros primos entre dos valores</h1>
    <form action="" method="post">
    <p><label for="numero">Introduce el numero de partida</label><input type="number" name="numero" id=""></p>
    <p><label for="numero2">Introduce el numero final</label><input type="number" name="numero2" id=""></p>
    <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>

    <?php 
    if (isset($_POST["enviar"])) {
        
        $numero=$_POST["numero"];
        $numero2=$_POST["numero2"];

        for ($i=$numero; $i < $numero2 ; $i++) { 
            
            if ($i%2==0) {
                echo "El numero $i no es  primo "."<br>";
            }else{
                echo "El numero $i es  primo "."<br>";
            }
        }

        
    }
    ?>
</body>
</html>