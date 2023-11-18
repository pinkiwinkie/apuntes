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
     $a=$_GET['num1'];
     $b=$_GET['num2'];
     $c=$_GET['num3'];
     $min=$a;
     $max=$a;
     if ($b<$min)    
        $min=$b; 
    if ($c<$min)
        $min=$c; 
    if ($b>$max)
        $max=$b;
    if ($c>$max)
        $max=$c;
    echo "El máximo es $max y el mínimo es $min";
    ?>
   
</body>
</html>