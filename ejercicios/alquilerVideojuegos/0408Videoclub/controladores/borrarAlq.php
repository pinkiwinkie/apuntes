<?php
if (isset($_COOKIE['nombre'])) {


    include "../config/autocarga.php";
    $link = new Bd;
    $alq = new Alquiler($_GET['Id']);
    $dato = $alq->borrar($link->link);
    $dato = "El alquiler se ha borrado correctamente<br>";

    require "../vistas/mensaje.php";
    $link = NULL;
} else {
    $dato = "Tienes que estar validado<br> ";
    $dato .= "<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
