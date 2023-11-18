<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alemania=array(
        'País'=>'Alemania',
        'Capital'=>'Berlín', 
        'Extensión'=>557046,
        'Habitantes'=>78420000
    );
    $austria=array(
        'País'=>'Austria',
        'Capital'=>'viena', 
        'Extensión'=>83849,
        'Habitantes'=>7614000
    );
    $belgica=array(
        'País'=>'Bélgica',
        'Capital'=>'Bruselas', 
        'Extensión'=>30518,
        'Habitantes'=>9932000
    );
    $paises=array($alemania,$austria,$belgica);
    echo "<table><tr><td>País</td><td>Capital</td><td>Extensión</td><td>Habitantes</td></tr>";
    
    foreach ($paises as  $pais) {
        echo "<tr>";
        foreach($pais as $dato) echo "<td>$dato</td>";
        echo "</tr>\n";
    }

    
    echo "</table>";


    ?>
    
</body>
</html>
