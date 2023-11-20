<?php
session_start();
if (isset($_SESSION['nombre'])) {

    include "vistas/inicio.html";
    require "modelo.php";
    $link = new Bd;
    $cli = new Cliente($_GET['dni'], '', '', '', '');
    $dato = $cli->borrar($link->link);
    $dato = "El cliente se ha borrado correctamente<br>";
    $dato .= "<a href='index.php'>Volver</a>";
    require "vistas/mensaje.php";
    $link = NULL;
    include "vistas/fin.html";
} else {
    $dato = "Tienes que estar validado<br> ";
    $dato .= "<a href='validar.php'>Validarse</a>";
    require "vistas/mensaje.php";
}
