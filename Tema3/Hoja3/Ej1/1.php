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
    
   function cargarArray($numerodeElementos)
   {
       $aux=[];
      for ($i=0; $i <$numerodeElementos ; $i++) { 
        
        $aux[$i]=(int)rand(1, 100); 

      }
      return $aux;

   }

$array1=cargarArray(10);
$array2=cargarArray(5);


function mostrar($array){
    for ($i=0; $i < count($array); $i++) { 
        
        echo $array[$i]." ";
    }
    echo "<br><br>";
}
echo "Array 1 "."<br>";
mostrar($array1);

//El simbolo del ampersand es para trabajar directamente con el array y no con una copia 
//Si quiero ordenar de la otra forma es machacar la variable y devolver array en el metodo burbuja
function ordenar(&$array)
{
    for($i=1;$i<count($array);$i++)
    {
        for($j=0;$j<count($array)-$i;$j++)
        {
            if($array[$j]>$array[$j+1])
            {
                $k=$array[$j+1];
                $array[$j+1]=$array[$j];
                $array[$j]=$k;
            }
        }
    }
 
   // return $array;
}
echo "Array 2 sin ordenar "."<br>";
mostrar($array2);
ordenar($array2);

echo "Array 2 ordenado "."<br>";
mostrar($array2);

function mezclar($array1, $array2)
{
    $mezcla=array_merge($array1,$array2);

    return $mezcla;
}
echo "Array 1 y array 2 juntos "."<br>";
$mezcla=mezclar($array1, $array2);

mostrar($mezcla);

    ?>

</body>
</html>