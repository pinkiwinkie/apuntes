<?php
if (isset($_COOKIE['nombre'])) {


    include "../config/autocarga.php";
    $link = new Bd;
    $pel = new Pelicula($_GET['Id']);
    $dato = $pel->borrar($link->link);
    $dato = "La Película se ha borrado correctamente<br>";

    require "../vistas/mensaje.php";
    $link = NULL;
} else {
    $dato = "Tienes que estar validado<br> ";
    $dato .= "<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
