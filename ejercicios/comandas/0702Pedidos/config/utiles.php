<?php

function lista($url, $tabla, $nomid, $mostrar)
{
    $consulta = json_decode(file_get_contents($url), true);
    $string = "<select name='$tabla'>";
    foreach ($consulta as $fila) {
        $string .= "<option value='" . $fila[$nomid] . "'>" . $fila[$mostrar] . "</option>";
    }
    $string .= "</select>";

    return $string;
}
