<?php

function lista($link, $tabla, $nomid, $mostrar, $valor = NULL)
{
    $consulta = $tabla::getall($link);
    $string = "<select name='$tabla'>";
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $string .= "<option value='" . $fila[$nomid] . "'";
        if ($fila[$nomid] === $valor) $string .= " selected ";
        $string .= ">" . $fila[$mostrar] . "</option>";
    }
    $string .= "</select>";

    return $string;
}
