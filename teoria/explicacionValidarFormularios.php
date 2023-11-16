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
    if (isset($_GET['enviar']))
    {   $error=false;
        if (empty($_GET['num1'])||empty($_GET['num2'])){
            echo "hay un error";
            $error=true;
        }else{
            $a=$_GET['num1'];
            $b=$_GET['num2'];
            $c=$a+$b;
            echo "La suma es $c";
        }
    }
    if (!isset($_GET['enviar'])|| $error){?>
        <form action="" method="GET">
        Numero1: <input type="text"  name="num1"><br>
        Numero2: <input type="text"  name="num2"><br>
       
        <input type="submit" name="enviar">
    </form>
    <?php
    }
    
    ?>
   
</body>
</html>
