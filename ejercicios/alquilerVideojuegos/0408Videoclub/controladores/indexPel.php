<?php
if (isset($_COOKIE['nombre'])) {

    include "../config/autocarga.php";
    $base = new Bd();
    $dato = Pelicula::getAll($base->link);
    require "../vistas/verTablaPel.php";
} else {
    $dato = "Tienes que estar validado<br> ";
    $dato .= "<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
