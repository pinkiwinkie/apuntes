<?php

//QUITAR ESPACIOS AL PRINCIPIO Y AL FINAL
$nombre = "   Paco Lopez Arroyo   ";
$nombre = trim($nombre);
echo "<p>$nombre</p>";


//LONGITUD DE STRING
$longitudNombre = strlen($nombre);
echo "<p>Longitud del nombre: $longitudNombre</p>";

//CONVERTIR A MAYUSCULAS
$nombreMayusculas = strtoupper($nombre);
echo "<p>Nombre en mayúsculas: $nombreMayusculas</p>";

//CONVERTIR A MINUSCULAS
$nombreMinusculas = strtolower($nombre);
echo "<p>Nombre en minúsculas: $nombreMinusculas</p>";

//SABER EN QUE SITIO SE ENCUENTRA UNA CADENA ESPECIFICA EN UN STRING
$prefijo = 'Pac';
$pos = strpos($nombre, $prefijo);
if ($pos === 0)
    echo "<p>El nombre $nombre comienza por $prefijo</p>";
else
    echo "<p>El nombre $nombre no comienza por $prefijo</p>";


//CONTAR NUMERO DE APARICIONES DE UN CARACTER EN UN STRING
$letra = 'A';
$numApariciones = substr_count($nombreMayusculas, $letra);

echo "<p>El nombre contiene $numApariciones veces la letra $letra (mayúscula o minúscula)</p>";


//SABER SI UN STRING CONTIENE UN CARACTER Y SU POSICION
//CONVERTIRLO A UPPER O LOWER
$posicion = stripos($strtolower($nombreMayusculas), $strtolower($letra));

if ($posicion === false)
    echo "<p>El nombre $nombre no contiene la letra $letra (mayúscula ni minúscula)</p>";
else
    echo "<p>La posición de la primera $letra (mayúscula o minúscula) en $nombre es $posicion </p>";

//SUSTITUIR UN CARACTER POR OTRO EN UN STRING
$nombreSustituido = str_ireplace('o', '0', $nombre);
echo "<p>Al sustituir las o por 0 el nombre queda así $nombreSustituido</p>";


//COJER DIFERENTES ELEMENTOS DE UNA URL POR SEPARADO
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
echo '</ul>';

//PARSEAR UNA FECHA A UN FORMATO EN ESPECIFICO
$fechaOriginal = "2003-11-28";
$fechaFormateada = date("d/m/Y", strtotime($fechaOriginal));
echo $fechaFormateada;
