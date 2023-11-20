<?php
if (isset($_COOKIE['nombre'])) {

    include "vistas/inicio.html";
    require "modelo.php";
    $base = new Bd();
    $dato = Cliente::getAll($base->link);
    require "vistas/verTabla.php";
} else {
    $dato = "Tienes que estar validado<br> ";
    $dato .= "<a href='validar.php'>Validarse</a>";
    require "vistas/mensaje.php";
}
