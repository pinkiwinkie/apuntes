<?php
if (isset($_COOKIE['nombre'])) {

    require "../vistas/parciales/inicio.parcial.php";
    echo "Bienvenido a la aplicación";
    require "../vistas/parciales/fin.parcial.php";
} else {
    $dato = "Tienes que estar validado<br> ";
    $dato .= "<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
