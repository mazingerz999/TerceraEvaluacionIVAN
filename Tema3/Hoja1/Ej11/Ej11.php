<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ver una piramide los valores del numero</h1>
    <form action="" method="post">
    <p><label for="numero">Introduce tu numero</label><input type="number" name="numero" id=""></p>
    <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>

    <?php 
    if (isset($_POST["enviar"])) {
        
        $numero=$_POST["numero"];

        for ($i=$numero; $i > 0; $i--) { 
            for ($j=$i; $j >0 ; $j--) { 
               
                echo($j);
            }
            echo("<br>");
        }
    }
    ?>
</body>
</html>