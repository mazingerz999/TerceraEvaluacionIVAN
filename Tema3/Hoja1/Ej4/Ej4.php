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

 
    for ($numero=100; $numero < 999; $numero++) { 
        $inverso=0;
        $aux=$numero;
        while ($aux !=0) {
            $resto=$numero%10;
            $inverso=$inverso*10+$resto;
            $aux=floor($aux/10);
          }
          if ($numero==$inverso) {
              print_r("El numero $numero es capicua"."<br>");
          }else{
           print_r("El numero $numero no es capicua"."<br>");
          }
    }
   

    
     ?>

</body>
</html>