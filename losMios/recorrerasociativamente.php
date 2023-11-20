<?php

$api_url = 'http://localhost/examenphp/preexamen/casarural.php';


$response = file_get_contents($api_url);
//En caso de que no vaya
//$response = file_get_contents($api_url);

if ($response) {
    $data = json_decode($response);
    if ($data) {

        foreach ($data as $casa) {
            foreach ($casa as $key => $value) {
                echo $key . " " . $value . "<br>";
            }
        }
    } else {
        echo 'Error al decodificar la respuesta JSON.';
    }
} else {
    echo 'No se recibió una respuesta de la API.';
}
