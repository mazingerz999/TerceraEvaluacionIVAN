<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    $verbosAR=["o", "as", "a", "amos", "ais", "an"];

    $verbosER=["o", "es", "e", "emos","eis", "en"];
    
    $verbosIR=["o", "es", "e", "imos","is", "en"];


    $verbos=["comer", "cenar", "merendar", "alquilar", "marcar"];

    $verboaleatorio=$verbos[rand(0, count($verbos)-1)];


    $parte_verbo=substr($verboaleatorio,0, intval($verboaleatorio)-2);
    $parte_verbofinal=substr($verboaleatorio,-2);

 
        
        if ($parte_verbofinal==="ar") {
            for ($i=0; $i < count($verbosAR); $i++) { 
               echo $verboaleatorio. $verbosAR[$i]. "<br>";
            }
        }else if ($parte_verbofinal=="er") {
            echo $parte_verbo. $verbosER[$i]. "<br>";
        }else if ($parte_verbofinal=="ir") {
            echo $parte_verbo. $verbosIR[$i]. "<br>";
        }

    ?>
</body>
</html>