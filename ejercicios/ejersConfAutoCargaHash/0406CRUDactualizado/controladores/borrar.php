<?php
if (isset($_COOKIE['nombre'])){

    include "../vistas/inicio.html";
    include "../config/autocarga.php";
    $link=new Bd;
    $cli= new Cliente($_GET['dni'],'','','','');
    $dato=$cli->borrar($link->link);
    $dato="El cliente se ha borrado correctamente<br>";
    $dato.="<a href='index.php'>Volver</a>";
    require "../vistas/mensaje.php";
    $link=NULL;
    include "../vistas/fin.html";
    
}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}