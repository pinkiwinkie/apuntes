<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web con PHP 7 y MVC</title>
</head>
<body>
    <h1>Tema 1: Actividad 2</h1>
<?php
    $nombre = "   Paco Lopez Arroyo   ";
    $nombre = trim($nombre);
    echo "<p>$nombre</p>";

    $longitudNombre = strlen($nombre);
    echo "<p>Longitud del nombre: $longitudNombre</p>";

    $nombreMayusculas = strtoupper($nombre);
    echo "<p>Nombre en mayúsculas: $nombreMayusculas</p>";

    $nombreMinusculas = strtolower($nombre);
    echo "<p>Nombre en minúsculas: $nombreMinusculas</p>";

    
        $prefijo = 'Pac';
        $pos = strpos($nombre, $prefijo);
        if ($pos === 0)
            echo "<p>El nombre $nombre comienza por $prefijo</p>";
        else
            echo "<p>El nombre $nombre no comienza por $prefijo</p>";
   

    $letra = 'A';
    $numApariciones = substr_count($nombreMayusculas, $letra);
    
    echo "<p>El nombre contiene $numApariciones veces la letra $letra (mayúscula o minúscula)</p>";

    $posicion = stripos($nombreMayusculas, $letra);

    if ($posicion === false)
        echo "<p>El nombre $nombre no contiene la letra $letra (mayúscula ni minúscula)</p>";
    else
        echo "<p>La posición de la primera $letra (mayúscula o minúscula) en $nombre es $posicion </p>";

    $nombreSustituido = str_ireplace('o', '0', $nombre);
    echo "<p>Al sustituir las o por 0 el nombre queda así $nombreSustituido</p>";

    $url = 'http://alex:password@hostname:9090/path?arg=value';
    $protocolo = parse_url($url, PHP_URL_SCHEME);
    $usuario = parse_url($url,  PHP_URL_USER);
    $path = parse_url($url,  PHP_URL_PATH);
    $query = parse_url($url,  PHP_URL_QUERY);

    echo '<ul>';
    echo "<li>Protocolo: $protocolo</li>";
    echo "<li>Usuario: $usuario</li>";
    echo "<li>Path: $path</li>";
    echo "<li>Querystring: $query</li>";
    echo '</ul>'
?>
</body>
</html>
